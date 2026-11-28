---
name: msd-laravel-rate-limiting
description: Standar rate limiting di proyek ini — named RateLimiter dengan nilai dari config (bukan hardcode), key per user/API-key dengan fallback IP, dan aturan wajib pekerjaan berat (email, notifikasi, bulk insert, call API eksternal) dilempar ke Queue agar tidak membebani request thread maupun DB. Gunakan SETIAP KALI membuat endpoint API yang bisa dipanggil berulang oleh bot/client otomatis, atau saat user menyebut "rate limit", "throttle", "bot", "queue", "job", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Rate Limiting Standard

Skill ini mengatur dua hal yang saling terkait untuk melindungi database dari beban
berlebihan akibat insert/request yang datang berulang dari bot/client otomatis:
(1) rate limiting di level HTTP, dan (2) pekerjaan berat wajib lewat Queue agar tidak
dieksekusi sinkron di request thread.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Named Rate Limiter dengan Nilai dari Config

Daftarkan limiter di `bootstrap/app.php` (atau provider yang sesuai), nilainya **wajib**
diambil dari `config('rate-limit.*')`, tidak boleh angka literal di closure — konsisten
dengan pola `db-transaction.attempts` di `msd-laravel-db-transaction`.

```php
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

RateLimiter::for('api-write', function (Request $request) {
    $config = config('rate-limit.api_write');

    return Limit::perMinutes($config['decay_minutes'], $config['max_attempts'])
        ->by($request->user()?->id ?: $request->ip());
});
```

`config/rate-limit.php`:

```php
<?php

return [
    'api_write' => [
        'max_attempts' => env('RATE_LIMIT_API_WRITE_MAX', 30),
        'decay_minutes' => env('RATE_LIMIT_API_WRITE_DECAY', 1),
    ],
];
```

Setiap limiter baru untuk endpoint/grup lain ditambahkan sebagai key baru di
`config/rate-limit.php` (contoh: `'bulk_import'`), dengan env var sendiri. Jangan hardcode
angka langsung di closure `RateLimiter::for()`.

## 2. Key Limiter: Per User/API-Key, Fallback IP

Key limiter memakai identitas user/API-key yang authenticated (`$request->user()?->id`),
**fallback ke IP** hanya kalau endpoint publik/belum authenticated. Per-IP saja tidak dipakai
sebagai default karena satu IP bisa dipakai banyak user (NAT/kantor) dan satu bot bisa
rotasi banyak IP.

```php
Route::middleware(['auth:sanctum', 'throttle:api-write'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'store']);
});
```

## 3. Response 429: Tidak Perlu Handler Tambahan

`ThrottleRequestsException` adalah `HttpException` (status 429), sehingga sudah otomatis
tertangkap oleh `JsonApiErrorResponse::from()` di `msd-laravel-jsonapi`
(branch `$e instanceof HttpExceptionInterface => $e->getStatusCode()`). Tidak perlu menulis
exception handling tambahan untuk 429 — cukup pastikan route API sudah lewat exception
handler JSON:API yang sama.

## 4. Pekerjaan Berat WAJIB Lewat Queue

Selain dibatasi rate limit di level HTTP, pekerjaan yang **berat atau punya side effect ke
luar sistem** wajib dilempar ke job (`ShouldQueue`), tidak dieksekusi sinkron di request
thread. Termasuk kategori ini:

- Kirim email (`Mail::send()`)
- Kirim notifikasi (`Notification::send()`, WA/SMS gateway)
- Panggilan ke API pihak ketiga (payment gateway, dsb)
- Bulk insert/import dalam jumlah besar

```php
namespace App\Jobs;

use App\Support\TraceId;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendTransactionNotification implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $headerLog = '[SendTransactionNotification] => ';
    protected $channelLog = 'queue';

    public function __construct(
        public int $transactionId,
        public string $traceId = '',
    ) {
        $this->traceId = $traceId ?: TraceId::current();
    }

    public function handle(): void
    {
        TraceId::set($this->traceId);
        // kirim notifikasi di sini
    }
}
```

Controller/service hanya `dispatch()` job ini, balas response cepat ke client (sinkron bagian
yang murni DB write boleh tetap langsung sesuai `msd-laravel-db-transaction`, hanya efek
samping di luar DB yang wajib lewat queue — selaras dengan aturan `afterCommit()` di skill
tersebut bagian 5).

Ini bukan pengganti rate limiting di bagian 1 — keduanya dipakai bersamaan: rate limit
mencegah request masuk berlebihan dari bot, queue mencegah pekerjaan berat yang lolos rate
limit membebani request thread/DB secara sinkron.

## 5. Constraint UNIQUE di DB: Tetap Pertahanan Terakhir

Rate limit dan queue tidak menggantikan constraint `UNIQUE` di migration untuk kolom yang
tidak boleh duplikat. Race condition tetap bisa lolos validasi aplikasi kalau dua request
datang hampir bersamaan sebelum salah satu commit — ini tanggung jawab layer migration/
database, bukan topik skill ini.

## 6. Tidak Termasuk Skill Ini: Idempotency Key

Idempotency key (mencegah insert duplikat dari retry client/bot yang mengirim request yang
"sama" berkali-kali) **sengaja dipisah** sebagai topik/skill tersendiri
(`msd-laravel-idempotency` — belum dibuat, lihat `discuss.txt`), karena relevan juga untuk
retry dari frontend biasa, bukan cuma bot.

## 7. Checklist Sebelum Menulis/Review Rate Limiting

- [ ] Limiter didaftarkan via `RateLimiter::for()`, nilai dari `config('rate-limit.*')`,
      bukan angka literal
- [ ] Key limiter pakai `user()?->id` dengan fallback IP, bukan IP saja (kecuali endpoint
      memang publik tanpa auth)
- [ ] Middleware `throttle:{nama-limiter}` dipasang di route yang relevan
- [ ] Tidak menulis handler khusus untuk 429 — sudah tertangkap generic handler JSON:API
- [ ] Email/notifikasi/call API eksternal/bulk insert dilempar ke job `ShouldQueue`, tidak
      sinkron di request thread
- [ ] Constraint `UNIQUE` tetap ada di migration untuk kolom yang tidak boleh duplikat
