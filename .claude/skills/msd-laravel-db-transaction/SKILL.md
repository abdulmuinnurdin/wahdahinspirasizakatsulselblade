---
name: msd-laravel-db-transaction
description: Standar penulisan DB transaction di proyek ini — closure DB::transaction() dibungkus retry manual dengan backoff+jitter (bukan argumen $attempts bawaan Laravel), nilai dari config (bukan hardcode), penanganan side effect non-DB, nested transaction/savepoint, mapping exception domain, dan wajib log ke urgent saat retry habis. Gunakan SETIAP KALI menulis logic yang melakukan lebih dari satu insert/update/delete yang harus atomic (semua berhasil atau semua batal), atau saat user menyebut "transaction", "rollback", "commit", "atomic", "deadlock", "retry", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel DB Transaction Standard

Skill ini mengatur cara menulis database transaction di proyek ini agar konsisten: atomicity
terjamin, retry deadlock terkontrol lewat config (bukan angka hardcode di banyak file), dan
side effect non-DB tidak ikut rollback/terduplikasi.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Lokasi Penulisan Transaction

Logic transaction masuk ke **`app/Http/Services/`** (lihat `msd-laravel-folder`), bukan di
controller. Controller hanya memanggil method service dan meneruskan hasil/exception.

## 2. Pola Baku: Closure `DB::transaction()` Dibungkus Retry Manual + Backoff/Jitter

Gunakan closure-style untuk transaction itu sendiri, **bukan** manual
`DB::beginTransaction()/commit()/rollBack()`, kecuali ada kebutuhan nyata untuk kontrol
granular — tanyakan ke user dulu alasannya sebelum menulis manual.

**Jangan** pakai argumen ke-2 bawaan Laravel (`DB::transaction($closure, $attempts)`) untuk
retry — itu retry langsung tanpa delay sama sekali, yang bisa memperburuk kontensi kalau
penyebab deadlock belum hilang. **Wajib** bungkus dengan helper retry manual yang punya
backoff + jitter: `App\Support\TransactionRetry::run()`.

```php
namespace App\Support;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

final class TransactionRetry
{
    public static function run(callable $callback): mixed
    {
        $maxAttempts = config('db-transaction.attempts');
        $retryableCodes = config('db-transaction.retryable_error_codes');

        for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
            try {
                return DB::transaction($callback);
            } catch (QueryException $e) {
                $errorCode = (int) ($e->errorInfo[1] ?? 0);
                $isRetryable = in_array($errorCode, $retryableCodes, true);

                if (! $isRetryable || $attempt === $maxAttempts) {
                    throw $e;
                }

                $minMs = config('db-transaction.backoff_min_ms');
                $maxMs = config('db-transaction.backoff_max_ms');

                usleep(random_int($minMs * 1000, $maxMs * 1000) * $attempt);
            }
        }
    }
}
```

Pemakaian di service:

```php
namespace App\Http\Services;

use App\Models\Order\Order;
use App\Support\TraceId;
use App\Support\TransactionRetry;
use Illuminate\Support\Facades\Log;

class OrderService
{
    protected $headerLog = '[OrderService] => ';
    protected $channelLog = 'frontend';

    public function createOrder(array $data): Order
    {
        $traceId = TraceId::current();

        $order = TransactionRetry::run(function () use ($data, $traceId) {
            $order = Order::create([
                'customer_id' => $data['customer_id'],
            ]);

            foreach ($data['items'] as $item) {
                $this->reserveStock($item);
                $order->items()->create($item);
            }

            return $order;
        });

        Log::channel($this->channelLog)->info(
            $this->headerLog.'CREATE_ORDER => '.$traceId.' => createOrder : SUCCESS',
            ['trace_id' => $traceId, 'order_id' => $order->id]
        );

        return $order;
    }
}
```

Semua pemanggilan transaction yang berisiko deadlock (lebih dari satu baris
diupdate/dikunci) **wajib** lewat `TransactionRetry::run()`, bukan `DB::transaction()`
telanjang — supaya backoff+jitter konsisten di semua tempat tanpa ditulis ulang.

## 3. Nilai Retry WAJIB dari Config, Bukan Hardcode

Semua angka yang dipakai `TransactionRetry::run()` **wajib** dari
`config('db-transaction.*')`, tidak boleh angka literal ditulis langsung. Tujuannya: ubah
jumlah retry/backoff di seluruh aplikasi cukup lewat env, tanpa ubah kode di banyak service.

File `config/db-transaction.php`:

```php
<?php

return [
    'attempts' => env('DB_TRANSACTION_ATTEMPTS', 3),
    'backoff_min_ms' => env('DB_TRANSACTION_BACKOFF_MIN_MS', 50),
    'backoff_max_ms' => env('DB_TRANSACTION_BACKOFF_MAX_MS', 150),
    'retryable_error_codes' => [1213, 1205],
];
```

Env (`.env` dan `.env.example`):

```
DB_TRANSACTION_ATTEMPTS=3
DB_TRANSACTION_BACKOFF_MIN_MS=50
DB_TRANSACTION_BACKOFF_MAX_MS=150
```

Retry **hanya berlaku untuk kode error di `retryable_error_codes`** — deadlock (`1213`) dan
lock wait timeout (`1205`). Exception lain (domain exception seperti
`InsufficientStockException`, validasi, dll) langsung bubble up dari dalam closure, tidak
masuk logic retry sama sekali (lihat implementasi `TransactionRetry::run()` — hanya
`QueryException` dengan kode di daftar itu yang ditangkap).

Delay antar retry = random antara `backoff_min_ms`–`backoff_max_ms`, **dikali nomor
percobaan** (`$attempt`) — jitter makin besar di percobaan berikutnya, supaya dua transaksi
yang sama-sama deadlock tidak langsung retry bersamaan lagi di waktu yang sama.

Kalau butuh nilai berbeda untuk satu kasus spesifik (misal job background yang boleh retry
lebih banyak/backoff lebih lama), tetap taruh sebagai key terpisah di
`config/db-transaction.php` (contoh: `'attempts_queue'`), jangan hardcode. Kalau ragu perlu
key baru atau tidak, tanyakan ke user.

## 4. Closure Harus Idempotent/Aman Diulang

Karena closure bisa di-retry otomatis oleh Laravel saat deadlock, closure **tidak boleh**
berisi efek samping di luar DB yang tidak aman dipanggil berulang: kirim email, call API
pihak ketiga (payment gateway), push notification, dsb. Kalau closure berisi efek samping
semacam itu dan terjadi retry, efek samping tersebut bisa terpanggil lebih dari sekali.

## 5. Side Effect Non-DB: Pakai `afterCommit`, Bukan di Dalam Closure

Efek samping yang harus terjadi SETELAH transaksi benar-benar commit (email, API eksternal,
event broadcast) wajib dijalankan lewat salah satu dari:

- `DB::afterCommit(fn () => ...)` dipanggil di dalam closure transaction, atau
- Dispatch job/event yang konfigurasinya `afterCommit()` (default Laravel untuk job yang
  di-dispatch dari dalam transaction kalau `QUEUE_CONNECTION` mendukung, atau set eksplisit
  `->afterCommit()` saat dispatch).

Jangan panggil `Mail::send()`, HTTP client ke gateway eksternal, atau event langsung di dalam
closure `DB::transaction()`. Alasan: (1) kalau transaksi rollback, efek samping itu sudah
terkirim dan tidak bisa dibatalkan; (2) kalau transaksi di-retry karena deadlock, efek
samping bisa terpanggil dobel (lihat bagian 4).

## 6. Jangan Catch Exception Tanpa Re-throw di Dalam Closure

Kalau menangkap exception di dalam closure transaction untuk diterjemahkan ke exception
domain (misal `QueryException` → `DuplicateOrderException`), exception hasil terjemahan tetap
**wajib di-throw ulang**. Jangan catch lalu diam (swallow) — itu membuat `DB::transaction()`
menganggap closure sukses dan tetap commit walau state sudah tidak konsisten.

```php
try {
    $order->items()->create($item);
} catch (\Illuminate\Database\QueryException $e) {
    if ($e->getCode() === '23000') {
        throw new DuplicateOrderItemException(previous: $e);
    }

    throw $e;
}
```

## 7. Nested Transaction (Savepoint)

Kalau service A memanggil service B yang juga membungkus logic dengan `DB::transaction()`,
Laravel otomatis memakai **savepoint** untuk transaction bagian dalam — ini aman dan tidak
perlu ditangani manual. Yang perlu disadari:

- Rollback di closure bagian dalam hanya rollback ke savepoint itu, **tidak otomatis**
  membatalkan transaksi terluar.
- Kalau requirement-nya "semua atau tidak sama sekali" lintas service, **jangan** catch
  exception dari service dalam di service luar tanpa re-throw — biarkan bubble naik supaya
  transaksi terluar juga rollback.

## 8. Exception Mapping Tetap di `bootstrap/app.php`

Exception domain yang dilempar dari service (lihat bagian 6) dipetakan ke HTTP response lewat
`withExceptions` di `bootstrap/app.php`, bukan try/catch berlapis di controller. Controller
hanya memanggil service.

## 9. Logging

Ikuti `msd-laravel-logging` sepenuhnya:

- Log sukses/gagal pakai `$headerLog` + `$channelLog` milik service tersebut, dengan
  `trace_id` di context.
- **Keputusan final**: begitu `TransactionRetry::run()` habis `attempts` dan exception masih
  deadlock/lock-timeout, itu **selalu** masuk channel `urgent` dengan `trace_id` yang sama —
  tanpa threshold/akumulasi tambahan, karena kejadian itu sendiri sudah melewati seluruh
  mekanisme retry yang ada dan signifikan untuk diketahui segera.
- Exception domain kritis lain (misal gagal potong saldo) tetap mengikuti aturan `urgent` di
  skill domain masing-masing (contoh: `msd-laravel-row-locking`).

Contoh titik tangkap untuk log `urgent` di pemanggil `TransactionRetry::run()`:

```php
try {
    $order = TransactionRetry::run(function () use ($data) { ... });
} catch (\Illuminate\Database\QueryException $e) {
    Log::channel('urgent')->error(
        $this->headerLog.'CREATE_ORDER => '.$traceId.' => createOrder : DEADLOCK_RETRY_EXHAUSTED',
        ['trace_id' => $traceId, 'source' => $this->channelLog, 'error' => $e->getMessage()]
    );

    throw $e;
}
```

## 10. Checklist Sebelum Menulis/Review Transaction

- [ ] Logic ada di `app/Http/Services/`, bukan di controller
- [ ] Pakai `TransactionRetry::run(function () {...})`, bukan `DB::transaction()` telanjang
      dengan argumen `$attempts` bawaan Laravel, dan bukan manual
      `beginTransaction/commit/rollBack` (kecuali disetujui user dengan alasan jelas)
- [ ] Nilai attempts/backoff diambil dari `config('db-transaction.*')`, tidak ada angka
      literal hardcode
- [ ] Tidak ada efek samping non-DB (email, API eksternal, event) langsung di dalam closure —
      semua lewat `afterCommit()`
- [ ] Tidak ada `catch` yang menelan exception tanpa re-throw di dalam closure
- [ ] Kalau ada nested transaction antar service, sudah dipastikan exception dari service
      dalam tetap bubble up kalau butuh rollback lintas service
- [ ] Exception domain dipetakan di `bootstrap/app.php`, bukan try/catch di controller
- [ ] Log sukses/gagal memakai `trace_id` sesuai `msd-laravel-logging`
- [ ] Deadlock/lock-timeout yang habis retry WAJIB masuk `urgent` — tidak ada threshold,
      selalu dilog
