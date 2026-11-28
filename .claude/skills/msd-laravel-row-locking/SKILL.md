---
name: msd-laravel-row-locking
description: Standar row locking untuk data sensitif (saldo/wallet/kuota) di proyek ini — pessimistic lock (lockForUpdate) di dalam DB::transaction(), pola kolom balance + tabel mutasi sebagai audit trail, urutan lock konsisten untuk cegah deadlock, dan exception domain untuk saldo tidak cukup. Gunakan SETIAP KALI menulis logic yang mengubah saldo/kuota/stok yang bisa diakses bersamaan oleh lebih dari satu request, atau saat user menyebut "saldo", "lock", "race condition", "wallet", "balance", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Row Locking Standard

Skill ini mengatur cara mengunci row data sensitif (saldo, kuota, stok) di proyek ini agar
aman dari race condition saat diakses bersamaan oleh lebih dari satu request/proses.
Berpasangan dengan `msd-laravel-db-transaction` — lock HARUS selalu di dalam transaction yang
dibungkus `App\Support\TransactionRetry::run()` (bukan `DB::transaction()` telanjang), karena
`lockForUpdate()` adalah kandidat utama penyebab deadlock/lock-timeout yang perlu retry
dengan backoff.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Default: Pessimistic Lock (`lockForUpdate()`)

Untuk semua data sensitif yang berpotensi diakses bersamaan (saldo, kuota, stok), pakai
`lockForUpdate()`, **bukan** optimistic lock (kolom `version`). Optimistic lock hanya dipakai
kalau ada kebutuhan nyata lain (kontensi rendah, data non-finansial) — tanyakan ke user
sebelum pakai pendekatan itu untuk data finansial.

```php
namespace App\Http\Services;

use App\Models\Wallet\Wallet;
use App\Exceptions\InsufficientBalanceException;
use App\Support\TraceId;
use App\Support\TransactionRetry;
use Illuminate\Support\Facades\Log;

class WalletService
{
    protected $headerLog = '[WalletService] => ';
    protected $channelLog = 'frontend';

    public function debit(int $walletId, int $amount, string $reason): void
    {
        $traceId = TraceId::current();

        TransactionRetry::run(function () use ($walletId, $amount, $reason, $traceId) {
            $wallet = Wallet::lockForUpdate()->findOrFail($walletId);

            if ($wallet->balance < $amount) {
                throw new InsufficientBalanceException($walletId);
            }

            $wallet->decrement('balance', $amount);

            $wallet->mutations()->create([
                'type' => 'debit',
                'amount' => $amount,
                'reason' => $reason,
                'balance_after' => $wallet->balance,
                'trace_id' => $traceId,
            ]);

            Log::channel($this->channelLog)->info(
                $this->headerLog.'DEBIT => '.$traceId.' => debit : SUCCESS',
                ['trace_id' => $traceId, 'wallet_id' => $walletId, 'amount' => $amount]
            );
        });
    }
}
```

`lockForUpdate()` **wajib** dipanggil di dalam transaction (`TransactionRetry::run()`).
Dipanggil di luar transaction, lock langsung dilepas setelah query dan tidak berguna.

## 2. Sumber Kebenaran Saldo: Kolom `balance` + Tabel Mutasi sebagai Audit

Keputusan proyek ini: saldo **disimpan sebagai kolom** di tabel utama (`wallets.balance`,
atau sejenis), dimutasi langsung lewat `increment()`/`decrement()` di dalam lock. Tabel
mutasi (`*_mutations`) **bukan** sumber kebenaran saldo saat ini — ia audit trail: histori
tiap perubahan, dipakai untuk investigasi dan rekonsiliasi, bukan untuk dihitung ulang
(`SUM`) sebagai saldo real-time.

Setiap mutasi yang mengubah `balance` **wajib** diikuti insert ke tabel mutasi dalam
transaction yang sama (bagian 1), minimal kolom:

| Kolom | Isi |
|---|---|
| `type` | `debit` / `credit` (atau sesuai domain, misal `topup`, `withdrawal`) |
| `amount` | Nilai mutasi, selalu positif — arah ditentukan oleh `type` |
| `reason` | Alasan/konteks mutasi (referensi order id, dsb) |
| `balance_after` | Saldo setelah mutasi — snapshot untuk audit tanpa perlu hitung ulang |
| `trace_id` | Trace-id yang sama dengan log (lihat `msd-laravel-logging`) |

Penamaan model dan folder mengikuti `msd-laravel-folder` bagian 2 (dikelompokkan per nama
tabel dasar), contoh: `app/Models/Wallet/Wallet.php` dan `app/Models/Wallet/WalletMutation.php`.

**Catatan risiko yang disadari dan diterima**: karena `balance` bukan hasil agregasi, ada
kemungkinan drift kalau ada bug/mutasi yang melewati service ini (misal query manual di
luar `WalletService`). Mitigasi: SEMUA mutasi saldo wajib lewat service ini, tidak ada
`DB::table('wallets')->update()` atau `Wallet::query()->update()` langsung di tempat lain.
Rekonsiliasi berkala (job yang membandingkan `balance` vs `SUM` tabel mutasi) adalah topik
terpisah yang belum diputuskan — dicatat di `discuss.txt` sebagai topik lanjutan, jangan
diasumsikan sudah ada.

## 3. Urutan Lock Konsisten (Cegah Deadlock)

Kalau satu transaksi mengunci lebih dari satu row (misal transfer: debit wallet A, kredit
wallet B), urutan lock **wajib konsisten** di semua tempat kode yang melakukan operasi
sejenis — urutkan berdasarkan `id` ascending sebelum lock, bukan berdasarkan urutan
"pengirim dulu baru penerima" yang bisa terbalik antar pemanggilan.

```php
public function transfer(int $fromWalletId, int $toWalletId, int $amount): void
{
    TransactionRetry::run(function () use ($fromWalletId, $toWalletId, $amount) {
        $ids = [$fromWalletId, $toWalletId];
        sort($ids);

        $wallets = Wallet::whereIn('id', $ids)
            ->lockForUpdate()
            ->orderBy('id')
            ->get()
            ->keyBy('id');

        $from = $wallets[$fromWalletId];
        $to = $wallets[$toWalletId];

        if ($from->balance < $amount) {
            throw new InsufficientBalanceException($fromWalletId);
        }

        $from->decrement('balance', $amount);
        $to->increment('balance', $amount);

        // insert mutasi untuk $from (debit) dan $to (credit), lihat bagian 2
    });
}
```

Mengunci dalam satu query (`whereIn(...)->lockForUpdate()`) dengan `orderBy('id')` lebih
aman daripada dua query `lockForUpdate()` terpisah berurutan, karena mengurangi jendela
waktu antar lock.

## 4. Exception Domain

`InsufficientBalanceException` (atau sejenis sesuai domain: kuota habis, stok habis) dilempar
dari dalam closure transaction, dipetakan ke response HTTP di `bootstrap/app.php`
(`withExceptions`), bukan try/catch di controller — pola sama seperti
`msd-laravel-db-transaction` bagian 8.

## 5. Larangan

- Jangan ubah kolom saldo/kuota lewat query langsung (`DB::table(...)->update()`,
  `Model::query()->update()`) di luar service yang sudah menerapkan lock ini.
- Jangan lakukan `lockForUpdate()` tanpa `DB::transaction()` membungkusnya.
- Jangan panggil service eksternal (payment gateway, dsb) di dalam closure yang memegang lock
  — lock akan ditahan selama panggilan eksternal berjalan, memperbesar risiko lock wait
  timeout untuk request lain. Panggil service eksternal SEBELUM membuka transaction (hasilnya
  dipakai sebagai input), atau SETELAH commit lewat `afterCommit()` sesuai
  `msd-laravel-db-transaction` bagian 5.

## 6. Checklist Sebelum Menulis/Review Row Locking

- [ ] `lockForUpdate()` ada di dalam `TransactionRetry::run()`, tidak berdiri sendiri dan
      tidak di dalam `DB::transaction()` telanjang
- [ ] Setiap mutasi saldo diikuti insert ke tabel mutasi (audit trail) dalam transaction yang
      sama, dengan `trace_id`
- [ ] Tidak ada tempat lain yang mengubah kolom saldo/kuota di luar service ini
- [ ] Kalau mengunci >1 row, urutan lock konsisten (by ID ascending), idealnya satu query
      `whereIn()->lockForUpdate()`
- [ ] Tidak ada panggilan service eksternal di dalam closure yang memegang lock
- [ ] Exception domain (saldo/kuota tidak cukup) dipetakan di `bootstrap/app.php`
- [ ] Log sukses/gagal memakai `trace_id` sesuai `msd-laravel-logging`, masuk `urgent` kalau
      kondisinya kritis (gagal potong saldo, dsb)
