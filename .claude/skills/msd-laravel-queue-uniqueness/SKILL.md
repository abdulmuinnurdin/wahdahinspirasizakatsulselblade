---
name: msd-laravel-queue-uniqueness
description: Standar unique job di proyek ini — ShouldBeUnique dengan cache driver database, TTL lock dari config (default 10 menit), dan wajib log saat dispatch di-skip karena duplicate. Gunakan SETIAP KALI membuat job queue yang menyentuh resource yang bisa didispatch dobel dari trigger berbeda (event, cron, request), atau saat user menyebut "unique job", "duplicate job", "ShouldBeUnique", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Queue Uniqueness Standard

Skill ini mengatur cara mencegah job queue yang menyentuh resource yang sama berjalan
dobel, memakai `ShouldBeUnique`. Ini melengkapi, **bukan menggantikan**
`msd-laravel-row-locking` — unique job mencegah duplicate di level dispatch/queue, row lock
tetap wajib di level DB untuk data sensitif karena unique job tidak melindungi proses lain
yang tidak lewat job ini (misal panggilan synchronous langsung dari HTTP request).

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Driver: `database` (Cukup, Tidak Perlu Redis)

Project ini memakai `CACHE_STORE=database`. Driver `database` sudah didukung Laravel untuk
unique job lock sejak versi yang dipakai project ini — **cukup**, tidak perlu menambah Redis
khusus untuk kebutuhan ini. Jangan tambah dependency Redis hanya untuk unique job tanpa
kebutuhan lain yang nyata.

## 2. Pola Baku: `ShouldBeUnique` (Bukan `ShouldBeUniqueUntilProcessing`)

Pakai `ShouldBeUnique` — lock dilepas setelah job **selesai diproses** (termasuk kalau gagal
dan masuk retry). **Jangan** pakai `ShouldBeUniqueUntilProcessing` (lock dilepas begitu job
mulai diproses) kecuali ada kebutuhan spesifik yang disetujui user, karena tujuan default di
sini adalah mencegah dua job yang menyentuh resource sama berjalan *bersamaan*, bukan cuma
mencegah dua job *mulai* bersamaan.

```php
namespace App\Jobs;

use App\Support\TraceId;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProcessWalletTopup implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, Queueable;

    protected $headerLog = '[ProcessWalletTopup] => ';
    protected $channelLog = 'queue';

    public int $uniqueFor;

    public function __construct(
        public int $walletId,
        public string $traceId = '',
    ) {
        $this->traceId = $traceId ?: TraceId::current();
        $this->uniqueFor = config('queue-uniqueness.default_ttl_seconds');
    }

    public function uniqueId(): string
    {
        return 'wallet-topup:'.$this->walletId;
    }

    public function handle(): void
    {
        TraceId::set($this->traceId);

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$this->traceId.' => processWalletTopup : RUN',
            ['trace_id' => $this->traceId, 'wallet_id' => $this->walletId]
        );

        // ... logic, termasuk row locking sesuai msd-laravel-row-locking kalau ubah saldo
    }
}
```

## 3. `uniqueId()` Harus Spesifik ke Resource, Bukan ke Payload Lengkap

`uniqueId()` dibentuk dari identitas resource yang ingin dilindungi dari duplicate (contoh:
`'wallet-topup:'.$this->walletId`), **bukan** dari seluruh payload job. Kalau `uniqueId()`
menyertakan data yang selalu berubah (timestamp, request id), unique lock tidak akan pernah
mendeteksi duplicate karena setiap dispatch dianggap "berbeda".

## 4. TTL Lock WAJIB dari Config

`$uniqueFor` **wajib** diambil dari `config('queue-uniqueness.default_ttl_seconds')`, bukan
angka literal — konsisten dengan pola `db-transaction.attempts` dan `rate-limit.*`. Default
**10 menit (600 detik)**.

`config/queue-uniqueness.php`:

```php
<?php

return [
    'default_ttl_seconds' => env('QUEUE_UNIQUE_TTL_SECONDS', 600),
];
```

TTL ini adalah **jaring pengaman** kalau job macet/worker crash tanpa melepas lock secara
normal (lock otomatis dilepas setelah job selesai, TTL hanya berlaku kalau itu tidak
terjadi). TTL harus lebih besar dari estimasi durasi terlama job yang memakainya — kalau
sebuah job butuh TTL berbeda dari default (job yang jauh lebih lama), tambahkan key
config terpisah (contoh: `'long_running_ttl_seconds'`), jangan hardcode angka beda di job.

## 5. WAJIB Log Saat Dispatch Di-skip Karena Duplicate

Laravel **diam-diam tidak mendispatch** job kedua yang terdeteksi duplicate (tidak error,
tidak masuk queue, tidak ada exception) — ini menyulitkan debugging kalau tidak di-log. Cek
dan log secara eksplisit di titik dispatch:

```php
$job = new ProcessWalletTopup($walletId, TraceId::current());

if (! $job->uniqueId() || ! \Illuminate\Support\Facades\Cache::lock(
    'laravel_unique_job:'.$job->uniqueId(), $job->uniqueFor
)->get()) {
    // lock tidak berhasil didapat secara manual di sini hanya untuk deteksi —
    // lock sebenarnya tetap dikelola Laravel saat dispatch() dipanggil.
}

ProcessWalletTopup::dispatch($walletId, TraceId::current());
```

Pendekatan yang lebih sederhana dan disarankan: cek dulu apakah lock untuk `uniqueId()` yang
sama sedang aktif sebelum dispatch, kalau aktif → log skip, kalau tidak → dispatch seperti
biasa dan biarkan Laravel yang menjaga uniqueness-nya:

```php
$uniqueKey = 'laravel_unique_job:wallet-topup:'.$walletId;

if (Cache::has($uniqueKey)) {
    Log::channel('queue')->info(
        '[ProcessWalletTopup] => DISPATCH => '.TraceId::current().' => processWalletTopup : SKIPPED_DUPLICATE',
        ['trace_id' => TraceId::current(), 'wallet_id' => $walletId]
    );

    return;
}

ProcessWalletTopup::dispatch($walletId, TraceId::current());
```

Catatan: format key cache internal Laravel (`laravel_unique_job:...`) bisa berubah antar versi
framework — kalau dipakai untuk cek manual seperti contoh di atas, verifikasi dulu prefix yang
benar di versi Laravel project ini sebelum dipakai, atau cukup log di `handle()` bagian job
yang gagal start karena constraint lain, sesuaikan dengan kebutuhan nyata saat implementasi.

## 6. Hubungan dengan Row Locking

`ShouldBeUnique` mencegah dua **job** untuk resource yang sama berjalan bersamaan. Ini tidak
menggantikan `lockForUpdate()` di `msd-laravel-row-locking` — tetap wajib dipakai di dalam
`handle()` kalau job itu mengubah data sensitif, karena:
- Proses lain (bukan job ini) masih bisa mengubah data yang sama secara synchronous.
- Unique lock berbasis cache, bukan transactional dengan DB — tidak memberi atomicity yang
  sama dengan row lock.

## 7. Checklist Sebelum Menulis/Review Unique Job

- [ ] Job implements `ShouldBeUnique` (bukan `ShouldBeUniqueUntilProcessing`, kecuali
      disetujui user dengan alasan jelas)
- [ ] `uniqueId()` dibentuk dari identitas resource, bukan dari payload yang selalu berubah
- [ ] `$uniqueFor` dari `config('queue-uniqueness.*')`, bukan angka literal
- [ ] Dispatch yang di-skip karena duplicate WAJIB ter-log ke channel `queue` dengan
      `trace_id`
- [ ] Job yang mengubah data sensitif tetap pakai `lockForUpdate()` di dalam `handle()`
      sesuai `msd-laravel-row-locking` — unique job bukan pengganti row lock
