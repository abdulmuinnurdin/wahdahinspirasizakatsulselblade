---
name: msd-laravel-logging
description: Standar logging Laravel untuk proyek ini — channel log, retensi/rotasi per channel, trace-id wajib, dan format header log (nama class + function + trace-id) di setiap entry log. Gunakan skill ini SETIAP KALI membuat atau mengubah konfigurasi `config/logging.php`, menambah `Log::channel(...)`, menulis log di controller/job/command/middleware/service, menangani exception, mencatat request ke API eksternal, atau saat user menyebut "log", "channel log", "trace id", "retensi log", "rotasi log", "header log", walaupun tidak menyebut nama skill ini secara eksplisit. Jika ragu channel mana yang tepat atau retensi yang sesuai untuk kasus baru, TANYAKAN ke user — jangan menebak.
---

# MSD Laravel Logging Standard

Skill ini mengatur channel log, retensi penyimpanan per channel, dan kewajiban trace-id di setiap log pada proyek ini. Tujuannya: log terpisah berdasarkan sumber/konteks proses, mudah ditelusuri lintas layer (request → job → mail → API eksternal) lewat satu trace-id, dan ukuran file log terkendali sesuai kebutuhan retensi masing-masing.

Bahasa: ikuti bahasa user dalam komunikasi. Nama channel, key context, dan pesan log tetap dalam bahasa Inggris atau sesuai konvensi existing di proyek — konsisten, jangan campur per file.

**Jika Anda (assistant) ragu channel mana yang cocok untuk sebuah proses baru, atau ragu berapa retensi yang sesuai, ragu soal PII yang boleh/tidak boleh dicatat — TANYAKAN ke user terlebih dahulu. Jangan menebak dan jangan diam-diam memilih channel yang "kelihatan masuk akal".**

## 1. Daftar Channel & Retensi

| Channel | Dipicu oleh | Retensi | Catatan |
|---|---|---|---|
| `cron` | `schedule:run`, command artisan terjadwal | 7 hari | Satu entry per eksekusi command, termasuk durasi & status akhir |
| `frontend` | Aksi langsung user (web/app: submit form, klik, request halaman) | 30 hari | Jangan catat password/token mentah; redact field sensitif |
| `urgent` | ERROR fatal script/sistem, saldo/kredit habis, API client gagal total, kondisi kritis lain | **Tidak dirotasi otomatis** (single file, retensi manual/arsip berkala) | Append-only, dipantau pertama sebelum cek log detail. Lihat bagian 3 |
| `api` | Request/response ke atau dari sistem pihak ketiga (payment gateway, SMS, WA, dsb) | 30 hari | Catat endpoint, status code, durasi, payload ringkas (redact secret) |
| `queue` | Job/listener yang dieksekusi queue worker (async) | 7 hari | Pisah dari `cron` — siklus hidup job berbeda (retry, backoff, failed) |
| `auth` | Login, logout, gagal login, ganti password, reset password | 90 hari | Untuk audit keamanan — jangan hapus lebih cepat dari ini |
| `database` | Query lambat (slow query) atau error query | 3 hari | Volume besar, retensi pendek, hanya untuk debugging jangka pendek |

Channel lain hanya ditambahkan jika benar-benar ada kebutuhan baru yang tidak cocok ke 7 channel di atas — **tanyakan ke user sebelum menambah channel baru**, termasuk nama dan retensinya.

## 2. Konfigurasi `config/logging.php`

Setiap channel memakai driver `daily` (kecuali `urgent`, lihat bagian 3) dengan `days` sesuai retensi, dan formatter yang menyisipkan `trace_id` (lihat bagian 4).

```php
'channels' => [

    'cron' => [
        'driver' => 'daily',
        'path' => storage_path('logs/cron/cron.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 7,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'frontend' => [
        'driver' => 'daily',
        'path' => storage_path('logs/frontend/frontend.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 30,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'urgent' => [
        'driver' => 'single',
        'path' => storage_path('logs/urgent/urgent.log'),
        'level' => 'error',
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'api' => [
        'driver' => 'daily',
        'path' => storage_path('logs/api/api.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 30,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'queue' => [
        'driver' => 'daily',
        'path' => storage_path('logs/queue/queue.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 7,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'auth' => [
        'driver' => 'daily',
        'path' => storage_path('logs/auth/auth.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 90,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

    'database' => [
        'driver' => 'daily',
        'path' => storage_path('logs/database/database.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 3,
        'tap' => [\App\Logging\TraceIdTap::class],
    ],

],
```

Catatan:
- `urgent` memakai driver `single` (satu file, tidak dirotasi harian) sesuai permintaan — agar selalu bisa dilihat utuh tanpa harus mencari tanggal file. Arsipkan/truncate manual secara berkala (misal tiap awal bulan) lewat command terjadwal terpisah jika file mulai besar, **tapi jangan hapus isi lama tanpa konfirmasi user**.
- Path log dipisah per subfolder (`storage/logs/<channel>/`) agar tidak campur dengan `laravel.log` default dan mudah di-tail per channel.
- Pastikan `storage/logs/<channel>/` ada atau dibuat otomatis (Laravel `daily`/`single` driver akan membuat file, tapi folder harus ada — tambahkan ke `.gitignore` seperti folder `logs` bawaan).

## 3. Channel `urgent`: Aturan Khusus

`urgent` BUKAN pengganti log detail — ia adalah **sinyal cepat** sebelum menelusuri log lengkap di channel lain. Tulis ke `urgent` HANYA untuk kondisi yang benar-benar kritis:

- Error fatal dari script/sistem (uncaught exception, `Error`, out-of-memory, dsb)
- Saldo/kredit/kuota pihak ketiga habis (SMS gateway, payment balance, dsb)
- API client gagal total (bukan sekadar 1x timeout, tapi circuit-breaker/berulang gagal)
- Kondisi lain yang kalau tidak segera dilihat berdampak langsung ke operasional

Setiap entry `urgent` WAJIB menyertakan `trace_id` yang sama dengan log detail di channel asalnya (`api`, `cron`, `queue`, dst), supaya dari `urgent` bisa langsung di-grep ke log lengkapnya. Contoh pola: tulis log detail di channel asal, lalu tulis ringkasan ke `urgent` dengan trace_id yang sama:

```php
// di dalam class dengan $headerLog = '[PaymentGatewayClient] => ' dan $channelLog = 'api'
$traceId = TraceId::current();

Log::channel($this->channelLog)->error(
    $this->headerLog.'CHARGE => '.$traceId.' => requestGateway : FAILED',
    ['trace_id' => $traceId, 'endpoint' => $endpoint, 'response' => $response]
);

Log::channel('urgent')->error(
    $this->headerLog.'CHARGE => '.$traceId.' => requestGateway : API client gagal total',
    ['trace_id' => $traceId, 'source' => 'api', 'detail' => 'Lihat channel api untuk detail lengkap']
);
```

Jangan menulis log rutin/non-kritis ke `urgent` — itu akan merusak tujuan channel ini sebagai sinyal cepat.

## 4. Trace-ID Wajib di Setiap Log

**Setiap entry log, di semua channel, wajib menyertakan `trace_id`.** Satu request/eksekusi (HTTP request, job queue, command cron) menghasilkan satu trace-id yang dibawa ke semua log, mail, dan panggilan API yang terjadi selama eksekusi itu — termasuk ketika proses lanjut ke queue job lain (trace-id diteruskan, bukan dibuat baru).

### 4.1 Generator & pembawa trace-id

Buat helper di `app/Support/TraceId.php`:

```php
<?php

namespace App\Support;

use Illuminate\Support\Str;

final class TraceId
{
    private static ?string $current = null;

    public static function generate(): string
    {
        return self::$current = (string) Str::uuid();
    }

    public static function set(string $traceId): string
    {
        return self::$current = $traceId;
    }

    public static function current(): string
    {
        return self::$current ??= self::generate();
    }

    public static function clear(): void
    {
        self::$current = null;
    }
}
```

### 4.2 Sumber trace-id per jenis proses

| Jenis proses | Kapan trace-id dibuat | Kapan diteruskan |
|---|---|---|
| HTTP request (frontend/api) | Middleware di awal request, dari header `X-Trace-Id` jika client sudah kirim, atau generate baru | Diteruskan ke job yang di-dispatch, mail yang dikirim, request API eksternal |
| Cron/command | Di awal `handle()` command, generate baru | Diteruskan ke service/job yang dipanggil dari command tersebut |
| Queue job | Ambil dari payload job (trace-id disimpan saat job di-dispatch), **jangan generate baru** | Diteruskan ke job lanjutan, mail, API call di dalam job |

Middleware untuk HTTP:

```php
<?php

namespace App\Http\Middleware;

use App\Support\TraceId;
use Closure;
use Illuminate\Http\Request;

class AssignTraceId
{
    public function handle(Request $request, Closure $next)
    {
        $traceId = $request->header('X-Trace-Id') ?: TraceId::generate();
        TraceId::set($traceId);

        $response = $next($request);
        $response->headers->set('X-Trace-Id', $traceId);

        return $response;
    }
}
```

Job yang membawa trace-id — simpan sebagai property, bukan mengandalkan static state (karena job berjalan di proses worker yang berbeda):

```php
<?php

namespace App\Jobs;

use App\Support\TraceId;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendInvoiceReminder implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $headerLog = '[SendInvoiceReminder] => ';
    protected $channelLog = 'queue';

    public function __construct(
        public int $invoiceId,
        public string $traceId = '',
    ) {
        $this->traceId = $traceId ?: TraceId::current();
    }

    public function handle(): void
    {
        TraceId::set($this->traceId);

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$this->traceId.' => sendInvoiceReminder : RUN',
            ['trace_id' => $this->traceId, 'invoice_id' => $this->invoiceId]
        );
    }
}
```

### 4.3 Tap agar `trace_id` otomatis masuk tanpa harus ditulis manual terus-menerus

Tambahkan `Monolog` processor lewat tap class supaya setiap `Log::channel(...)->info(...)` otomatis menyisipkan `trace_id` ke `context` walau programmer lupa menambahkannya manual:

```php
<?php

namespace App\Logging;

use App\Support\TraceId;
use Illuminate\Log\Logger;
use Monolog\Processor\ProcessorInterface;
use Monolog\LogRecord;

class TraceIdTap
{
    public function __invoke(Logger $logger): void
    {
        $logger->pushProcessor(function (LogRecord $record) {
            $record->extra['trace_id'] = TraceId::current();

            return $record;
        });
    }
}
```

Dengan tap ini, `trace_id` tetap disisipkan otomatis ke setiap log meski context manual tidak menuliskannya — tapi tetap WAJIB tulis manual di context untuk log penting (terutama `urgent` dan `api`) agar mudah di-grep tanpa parsing `extra`.

### 4.4 Format context minimal setiap log

Setiap `Log::channel(...)->...()` minimal berisi:

```php
// di dalam class dengan $headerLog = '[ProfileController] => ' dan $channelLog = 'frontend'
$traceId = TraceId::current();

Log::channel($this->channelLog)->info(
    $this->headerLog.'UPDATE => '.$traceId.' => updateProfile : SUCCESS',
    ['trace_id' => $traceId, 'user_id' => $user->id]
);
```

Jangan menulis log tanpa `trace_id` di context, walaupun tap sudah menyisipkan ke `extra` — konsistensi ini memudahkan `grep trace_id` langsung dari file log mentah.

## 4a. Header Log Wajib: Nama Class + Function + Trace-ID

Setiap entry log, di semua channel, WAJIB diawali header yang menunjukkan class pemicu, diikuti nama function (uppercase) dan trace-id, sebelum pesan/aksi yang sebenarnya. Ini memudahkan menelusuri log langsung ke source code tanpa harus menebak file mana yang menulis log tersebut.

### Format baku

```
{headerLog}{FUNCTION_UPPERCASE} => {trace_id} => {subfunction} : {aksi/data}
```

Contoh hasil akhir di file log:

```
[2026-11-25 05:07:07] production.INFO: [NetworkDiscoveryLoggerCron] LOGIN => AUTOMATION ID : 207647 => checkTextfsmParse : RUN
```

### 4a.1 Property `$headerLog` di setiap class yang menulis log

Setiap class (Command, Controller, Job, Service, dll) yang menulis log wajib mendeklarasikan property `$headerLog` berisi nama class itu sendiri dibungkus siku, dan property `$channelLog` untuk channel yang dipakai:

```php
class NetworkDiscoveryLoggerCron extends Command
{
    protected $signature = 'network-discovery-logger:cron';

    protected $description = 'Command description';

    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[NetworkDiscoveryLoggerCron] => ';

    /**
     * Channel log yang dipakai command ini.
     *
     * @var string
     */
    protected $channelLog = 'cron';

    public function handle(): void
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$traceId.' => checkTextfsmParse : RUN'
        );
    }
}
```

Pola penulisan: `Log::channel($this->channelLog)->info($this->headerLog.'{FUNCTION_UPPERCASE} => {trace_id} => {subfunction} : {aksi/data}');`

Aturan penulisan setiap bagian:

| Bagian | Isi | Contoh |
|---|---|---|
| `$headerLog` | Nama class exact, dibungkus `[...]`, diakhiri `=> ` | `[NetworkDiscoveryLoggerCron] => ` |
| `{FUNCTION_UPPERCASE}` | Nama method/function tempat log ini ditulis, UPPERCASE | `HANDLE`, `LOGIN`, `STORE` |
| `{trace_id}` | Trace-id berjalan dari `TraceId::current()` — boleh diberi label kontekstual di depannya seperti pada contoh (`AUTOMATION ID : 207647`) **selama trace-id aslinya tetap ikut tercatat di context array**, lihat bagian 4.4 | `AUTOMATION ID : 207647` atau UUID trace-id langsung |
| `{subfunction}` | Nama sub-proses/langkah di dalam function tersebut, camelCase sesuai nama method/private function yang benar-benar dipanggil | `checkTextfsmParse` |
| `{aksi/data}` | Status/aksi singkat: `RUN`, `SUCCESS`, `FAILED`, atau ringkasan data singkat | `RUN`, `SUCCESS: 12 devices`, `FAILED: timeout` |

**Catatan trace-id di pesan vs context:** label seperti `AUTOMATION ID : 207647` di pesan log boleh dipakai sebagai identifier yang mudah dibaca manusia, TAPI `trace_id` (UUID) versi lengkap tetap wajib ada di context array (bagian 4.4) agar tetap bisa di-grep lintas channel. Jangan hanya menaruh trace-id di pesan string tanpa menaruhnya juga di context.

### 4a.2 Konsisten di semua jenis class

Terapkan pola `$headerLog` + `$channelLog` ini di semua class yang menulis log — bukan hanya Command:

```php
class AuthController extends Controller
{
    protected $headerLog = '[AuthController] => ';
    protected $channelLog = 'auth';

    public function login(Request $request)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'LOGIN => '.$traceId.' => attemptLogin : RUN',
            ['trace_id' => $traceId, 'email' => $request->input('email')]
        );
    }
}
```

Kalau ragu nama function/subfunction apa yang representatif untuk header log (misal di closure anonim atau function yang dipanggil tidak langsung), tanyakan ke user daripada menebak nama yang tidak mencerminkan alur kode sebenarnya.

## 5. Mail & Notifikasi

Saat mengirim mail/notifikasi yang terkait suatu request/job, sisipkan trace-id ke log sebelum dan setelah pengiriman, bukan di body email:

```php
// di dalam class dengan $headerLog dan $channelLog = 'queue'
$traceId = TraceId::current();

Log::channel($this->channelLog)->info(
    $this->headerLog.'HANDLE => '.$traceId.' => dispatchMail : RUN',
    ['trace_id' => $traceId, 'mailable' => InvoiceReminderMail::class, 'to' => $user->email]
);

Mail::to($user)->send(new InvoiceReminderMail($invoice));
```

## 6. Redaksi Data Sensitif

Jangan pernah menulis ke log manapun (termasuk `urgent`): password mentah, token/API key penuh (mask sebagian, misal `sk_live_****1234`), nomor kartu/rekening penuh, OTP. Field ini wajib di-redact sebelum masuk context log, di semua channel termasuk `frontend` dan `auth`.

## 7. Checklist Sebelum Menulis Log Baru

- [ ] Channel sudah tepat sesuai tabel bagian 1 — kalau ragu, tanyakan ke user, jangan menebak
- [ ] Class punya property `$headerLog` (`[NamaClass] => `) dan `$channelLog`
- [ ] Pesan log memakai format `{headerLog}{FUNCTION} => {trace_id} => {subfunction} : {aksi/data}` (bagian 4a)
- [ ] `{FUNCTION}` sesuai nama method tempat log ditulis, UPPERCASE
- [ ] `trace_id` ada di context (bukan hanya di `extra` dari tap)
- [ ] Kalau proses lanjut ke job/mail/API lain, trace-id yang sama diteruskan, bukan generate baru
- [ ] Kalau kondisi kritis sesuai bagian 3, tulis juga ringkasan ke channel `urgent` dengan trace_id yang sama
- [ ] Tidak ada data sensitif (password, token penuh, OTP, nomor kartu) di context log
- [ ] Retensi channel sudah sesuai tabel bagian 1, belum ditambah channel baru tanpa konfirmasi user

## 8. Kapan Harus Bertanya ke User (Jangan Menebak)

Tanyakan ke user, jangan asumsikan sendiri, jika:
- Proses baru tidak jelas masuk channel mana (misal: ambigu antara `api` dan `cron` untuk job terjadwal yang memanggil API eksternal)
- Perlu channel baru yang belum ada di bagian 1
- Ragu nama function/subfunction apa yang representatif untuk header log (misal di closure, Blade component, atau function yang dipanggil tidak langsung)
- Ragu apakah suatu kondisi cukup kritis untuk masuk `urgent` atau tidak
- Ragu apakah suatu field termasuk data sensitif yang harus di-redact
- Retensi default di tabel bagian 1 dirasa tidak cocok untuk kasus spesifik (misal butuh retensi lebih panjang untuk keperluan audit/legal)
