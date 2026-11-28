---
name: msd-laravel-balance-reconciliation
description: Standar rekonsiliasi saldo berkala di proyek ini — command artisan yang membandingkan kolom balance vs SUM tabel mutasi, dijalankan harian via scheduler dan bisa on-demand, baca dengan lockForUpdate() untuk konsistensi, TIDAK auto-koreksi (log urgent per-wallet untuk investigasi manual). Gunakan SETIAP KALI membuat job/command yang mendeteksi drift data finansial, atau saat user menyebut "rekonsiliasi", "reconcile", "drift saldo", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Balance Reconciliation Standard

Skill ini mengatur cara mendeteksi drift antara kolom `balance` dan histori mutasi, sebagai
mitigasi risiko yang disadari di `msd-laravel-row-locking` bagian 2 (saldo disimpan sebagai
kolom, bukan dihitung ulang dari ledger penuh).

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Command Artisan, Dijadwalkan Harian + Bisa On-Demand

```php
namespace App\Console\Commands;

use App\Models\Wallet\Wallet;
use App\Support\TraceId;
use App\Support\TransactionRetry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ReconcileWalletBalance extends Command
{
    protected $signature = 'wallet:reconcile';
    protected $description = 'Bandingkan kolom balance vs SUM tabel mutasi, deteksi drift';

    protected $headerLog = '[ReconcileWalletBalance] => ';
    protected $channelLog = 'cron';

    public function handle(): void
    {
        $traceId = TraceId::current();
        $driftCount = 0;

        Wallet::query()->chunkById(config('bulk-insert.chunk_size'), function ($wallets) use (&$driftCount, $traceId) {
            foreach ($wallets as $wallet) {
                TransactionRetry::run(function () use ($wallet, &$driftCount, $traceId) {
                    $locked = Wallet::lockForUpdate()->find($wallet->id);

                    $computed = $locked->mutations()
                        ->selectRaw("SUM(CASE WHEN type = 'credit' THEN amount ELSE -amount END) as total")
                        ->value('total') ?? 0;

                    if ((int) $computed !== (int) $locked->balance) {
                        $driftCount++;

                        Log::channel('urgent')->error(
                            $this->headerLog.'HANDLE => '.$traceId.' => reconcileWalletBalance : DRIFT_DETECTED',
                            [
                                'trace_id' => $traceId,
                                'wallet_id' => $locked->id,
                                'balance' => $locked->balance,
                                'computed' => $computed,
                            ]
                        );
                    }
                });
            }
        });

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$traceId.' => reconcileWalletBalance : DONE',
            ['trace_id' => $traceId, 'drift_count' => $driftCount]
        );
    }
}
```

Jadwal (`routes/console.php` atau `bootstrap/app.php` sesuai versi Laravel project ini):

```php
Schedule::command('wallet:reconcile')
    ->dailyAt(config('balance-reconciliation.schedule_time'));
```

**Keputusan proyek**: command ini dijalankan **otomatis harian** via scheduler (jam dari
`config('balance-reconciliation.schedule_time')`, default `02:00` — di luar jam sibuk), **dan
juga bisa dijalankan manual on-demand** kapan saja lewat `php artisan wallet:reconcile` tanpa
menunggu jadwal — misal saat investigasi insiden atau dipicu dari tombol admin. Tidak perlu
command/flag terpisah untuk mode manual, command yang sama dipakai untuk keduanya.

## 2. WAJIB Baca dengan `lockForUpdate()`, Bukan Baca Bebas

Saat menghitung `SUM` mutasi untuk dibandingkan dengan `balance`, **wajib** kunci row
(`lockForUpdate()`) di dalam `TransactionRetry::run()` sesuai `msd-laravel-row-locking` —
bukan baca tanpa lock. Ini memastikan perbandingan dilakukan terhadap state yang konsisten
(tidak membaca `balance` dan `SUM` mutasi dari dua titik waktu yang berbeda kalau ada mutasi
lain berjalan bersamaan).

Konsekuensi yang diterima: job ini **akan sedikit memperlambat/menunggu** kalau wallet yang
sedang diperiksa kebetulan sedang dipakai transaksi lain — ini trade-off yang disengaja demi
akurasi deteksi, bukan bug. Jalankan di luar jam sibuk (lihat jadwal bagian 1) untuk
meminimalkan dampak.

## 3. TIDAK Auto-Koreksi — Hanya Log untuk Investigasi Manual

**Keputusan final**: job ini **tidak** mengubah `balance` secara otomatis saat drift
ditemukan. Hanya mendeteksi dan melaporkan. Alasan: auto-koreksi data finansial tanpa review
manusia berisiko menutupi bug nyata atau memperbesar kesalahan kalau job rekonsiliasi sendiri
punya bug. Koreksi `balance` (kalau memang diperlukan setelah investigasi) dilakukan manual
oleh orang yang berwenang, dicatat sebagai mutasi `adjustment` terpisah (bukan ditulis
langsung ke skill ini).

## 4. Log Per-Wallet, Satu per Satu ke `urgent`

**Keputusan final**: setiap wallet yang drift dilog **satu per satu** ke channel `urgent`
(bukan 1 summary log untuk semua drift) — sesuai contoh kode bagian 1. Ini supaya setiap
kejadian drift langsung terlihat sebagai entry tersendiri di `urgent` (sesuai sifat channel
itu sebagai sinyal cepat per `msd-laravel-logging` bagian 3), bukan tersembunyi di dalam satu
angka agregat. Log ringkasan (`drift_count` total) tetap ditulis ke channel `cron` di akhir
proses sebagai rekap, bukan pengganti log per-wallet di `urgent`.

## 5. Hubungan dengan Skill Lain

- `lockForUpdate()` + `TransactionRetry::run()` sesuai `msd-laravel-row-locking` dan
  `msd-laravel-db-transaction` — job ini tidak punya mekanisme lock/retry sendiri yang
  berbeda.
- Chunk size baca wallet pakai `config('bulk-insert.chunk_size')` yang sama dengan
  `msd-laravel-bulk-insert`, tidak perlu config terpisah.
- Command ini berjalan di channel log `cron` untuk ringkasan proses, tapi menulis ke `urgent`
  untuk tiap drift — dua channel dipakai bersamaan sesuai perannya masing-masing.

## 6. Checklist Sebelum Menulis/Review Rekonsiliasi

- [ ] Command bisa dijalankan manual (`php artisan wallet:reconcile`) tanpa flag khusus,
      dan terjadwal harian via `config('balance-reconciliation.schedule_time')`
- [ ] Baca untuk perbandingan `balance` vs `SUM` mutasi WAJIB pakai `lockForUpdate()` di
      dalam `TransactionRetry::run()`, bukan baca bebas
- [ ] Tidak ada auto-koreksi `balance` di dalam command ini
- [ ] Setiap wallet yang drift dilog satu per satu ke channel `urgent`, bukan 1 summary
- [ ] Ringkasan proses (`drift_count`, durasi) tetap dilog ke channel `cron`
- [ ] Chunk baca pakai `config('bulk-insert.chunk_size')`, konsisten dengan
      `msd-laravel-bulk-insert`
