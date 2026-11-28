---
name: msd-laravel-bulk-insert
description: Standar bulk insert/import data di proyek ini — chunking per transaction dengan ukuran dari config (default 50 baris), partial success + laporan baris gagal (bukan all-or-nothing), dan wajib lewat job queue untuk import besar. Gunakan SETIAP KALI membuat fitur import/insert data dalam jumlah banyak (CSV, Excel, bulk API), atau saat user menyebut "bulk insert", "import", "chunking", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Bulk Insert Standard

Skill ini mengatur cara insert data dalam jumlah banyak (bulk import) di proyek ini, agar
tidak satu transaksi raksasa memegang lock terlalu lama, tidak kena limit
`max_allowed_packet`/memory, dan hasil gagal-sebagian tetap bisa dilaporkan ke user.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Chunk Size WAJIB dari Config

Ukuran chunk **wajib** diambil dari `config('bulk-insert.chunk_size')`, bukan angka literal —
konsisten dengan pola `db-transaction.attempts`, `rate-limit.*`, `queue-uniqueness.*`.
Default **50 baris per batch**.

`config/bulk-insert.php`:

```php
<?php

return [
    'chunk_size' => env('BULK_INSERT_CHUNK_SIZE', 50),
];
```

## 2. Pola Baku: 1 Transaction per Chunk (Bukan 1 Transaction untuk Semua)

```php
namespace App\Http\Services;

use App\Models\Donation\DonationImportRow;
use App\Support\TraceId;
use App\Support\TransactionRetry;
use Illuminate\Support\Facades\Log;

class DonationImportService
{
    protected $headerLog = '[DonationImportService] => ';
    protected $channelLog = 'queue';

    public function import(array $rows): array
    {
        $traceId = TraceId::current();
        $failed = [];

        collect($rows)
            ->chunk(config('bulk-insert.chunk_size'))
            ->each(function ($chunk, $chunkIndex) use (&$failed, $traceId) {
                try {
                    TransactionRetry::run(function () use ($chunk) {
                        DonationImportRow::insert($chunk->values()->toArray());
                    });
                } catch (\Throwable $e) {
                    $failed[] = ['chunk' => $chunkIndex, 'error' => $e->getMessage()];

                    Log::channel($this->channelLog)->error(
                        $this->headerLog.'IMPORT => '.$traceId.' => importChunk : FAILED',
                        ['trace_id' => $traceId, 'chunk' => $chunkIndex, 'error' => $e->getMessage()]
                    );
                }
            });

        return $failed;
    }
}
```

**Keputusan proyek**: setiap chunk punya transaction sendiri (bukan 1 transaction untuk
seluruh import). Konsekuensi yang diterima: kalau chunk ke-N gagal, chunk sebelumnya **sudah
commit** — hasil akhirnya **partial success**, bukan all-or-nothing untuk keseluruhan
import. Chunk yang gagal dicatat dan dilaporkan (lihat bagian 3), bukan membuat seluruh
import dianggap gagal total.

## 3. Validasi Per-Baris, Laporan Baris Gagal

Baris yang gagal validasi (bukan DB error) di-skip dan dicatat per baris, tidak membatalkan
seluruh chunk tempat baris itu berada:

```php
$validRows = [];
$validationErrors = [];

foreach ($rows as $index => $row) {
    $validator = Validator::make($row, [...]);

    if ($validator->fails()) {
        $validationErrors[] = ['row' => $index, 'errors' => $validator->errors()->all()];
        continue;
    }

    $validRows[] = $row;
}

// lanjut chunking $validRows sesuai bagian 2
```

Hasil akhir import (dikembalikan ke user/disimpan sebagai laporan) berisi: jumlah sukses,
daftar baris gagal validasi, dan daftar chunk gagal DB — bukan cuma status sukses/gagal
biner.

## 4. Baca Data Besar: Jangan Load Semua ke Memory Sekaligus

Untuk sumber data besar (file CSV/Excel upload), baca secara stream, jangan
`file_get_contents()`/load seluruh isi ke array sekaligus sebelum chunking:

```php
LazyCollection::make(function () use ($filePath) {
    $handle = fopen($filePath, 'r');

    while (($row = fgetcsv($handle)) !== false) {
        yield $row;
    }

    fclose($handle);
})->chunk(config('bulk-insert.chunk_size'))->each(function ($chunk) {
    // ...
});
```

## 5. Bulk Import Besar WAJIB Lewat Job Queue

Sesuai `msd-laravel-rate-limiting` bagian 4: import yang berpotensi besar (upload file, bukan
beberapa baris kecil dari form biasa) **tidak** diproses sinkron di request HTTP. Controller
hanya menyimpan file upload dan dispatch job, response HTTP langsung balas "diterima, diproses
di background" (misal `202 Accepted` + id untuk cek status), job yang menjalankan logic
chunking di atas secara async.

```php
namespace App\Jobs;

use App\Http\Services\DonationImportService;
use App\Support\TraceId;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessDonationImport implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $headerLog = '[ProcessDonationImport] => ';
    protected $channelLog = 'queue';

    public function __construct(
        public string $filePath,
        public string $traceId = '',
    ) {
        $this->traceId = $traceId ?: TraceId::current();
    }

    public function handle(DonationImportService $service): void
    {
        TraceId::set($this->traceId);

        $failed = $service->import($this->filePath);

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$this->traceId.' => processDonationImport : DONE',
            ['trace_id' => $this->traceId, 'failed_count' => count($failed)]
        );
    }
}
```

## 6. Hubungan dengan Row Locking

Chunking di skill ini **hanya mengurangi besarnya 1 transaksi**, bukan pengganti row
locking. Kalau baris yang di-import juga memotong saldo/kuota (bukan sekadar insert
independent rows), tiap baris yang menyentuh data sensitif tetap wajib
`lockForUpdate()` sesuai `msd-laravel-row-locking` di dalam transaction chunk-nya.

## 7. Checklist Sebelum Menulis/Review Bulk Insert

- [ ] Chunk size dari `config('bulk-insert.chunk_size')`, bukan angka literal
- [ ] 1 `TransactionRetry::run()` per chunk, bukan 1 transaction untuk seluruh import
- [ ] Baris gagal validasi di-skip + dicatat per baris, tidak membatalkan seluruh chunk
- [ ] Chunk yang gagal DB dicatat (chunk index + error), tidak membatalkan chunk lain yang
      sudah commit
- [ ] Sumber data besar dibaca secara stream/`LazyCollection`, tidak di-load penuh ke memory
- [ ] Import besar (upload file) dispatch ke job `ShouldQueue`, tidak sinkron di request HTTP
- [ ] Baris yang menyentuh saldo/kuota tetap pakai `lockForUpdate()` sesuai
      `msd-laravel-row-locking`, chunking tidak menggantikannya
- [ ] Log sukses/gagal per chunk ke channel `queue` dengan `trace_id`
