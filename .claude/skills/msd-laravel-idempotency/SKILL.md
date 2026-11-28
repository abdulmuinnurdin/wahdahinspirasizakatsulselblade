---
name: msd-laravel-idempotency
description: Standar idempotency key di proyek ini — header Idempotency-Key wajib untuk semua endpoint create/insert, unique constraint (user_id, key) untuk cegah race saat key sama datang bersamaan, deteksi body berbeda dengan key sama (409 Conflict), dan TTL 12 jam. Gunakan SETIAP KALI membuat endpoint POST yang insert data (terutama transaksi/finansial), atau saat user menyebut "idempotency", "idempotent", "duplicate request", "retry", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Idempotency Standard

Skill ini mengatur cara mencegah insert duplikat ketika client (web/app/bot) mengirim ulang
request yang sama — misal karena timeout di sisi client padahal request pertama sebenarnya
sudah sukses di server. Ini beda dari rate limiting (`msd-laravel-rate-limiting`, mencegah
spam/volume) dan row locking (`msd-laravel-row-locking`, mencegah race condition pada data
yang sama) — idempotency mencegah **efek eksekusi berulang dari request yang secara logis
sama**.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method tetap bahasa Inggris sesuai
konvensi existing di proyek.

## 1. Wajib di Semua Endpoint Create/Insert

Header `Idempotency-Key` **wajib** dikirim client untuk semua endpoint `POST`/create yang
melakukan insert data (bukan hanya endpoint finansial). Client meng-generate UUID per aksi
logis (bukan per HTTP attempt) — key yang sama dikirim ulang kalau client melakukan retry
atas aksi yang sama.

Endpoint read-only (`GET`) tidak relevan dengan skill ini.

## 2. Skema Tabel

```php
Schema::create('idempotency_keys', function (Blueprint $table) {
    $table->id();
    $table->string('key');
    $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
    $table->string('request_hash', 64); // sha256 dari method+path+body
    $table->enum('status', ['processing', 'completed']);
    $table->unsignedSmallInteger('response_status')->nullable();
    $table->text('response_body')->nullable();
    $table->timestamp('expires_at');
    $table->timestamps();

    $table->unique(['user_id', 'key']);
});
```

Model: `app/Models/IdempotencyKey/IdempotencyKey.php` (konvensi `msd-laravel-folder`).

## 3. Pola Wajib: Insert Placeholder Dulu, Bukan Select-Then-Insert

**Jangan** pakai pola "cek dulu via `SELECT`, kalau belum ada baru proses" — ini race-prone:
dua request dengan key sama yang datang hampir bersamaan bisa lolos `SELECT` bersamaan
sebelum salah satu `INSERT`. Pola wajib: **insert row placeholder dulu** dengan status
`processing`, biarkan `UNIQUE(user_id, key)` di database jadi penentu siapa yang menang.

```php
namespace App\Http\Middleware;

use App\Models\IdempotencyKey\IdempotencyKey;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class EnsureIdempotent
{
    public function handle(Request $request, \Closure $next)
    {
        $key = $request->header('Idempotency-Key');

        if (! $key) {
            throw new \InvalidArgumentException('Idempotency-Key header wajib diisi.');
        }

        $requestHash = hash('sha256', $request->method().'|'.$request->path().'|'.$request->getContent());
        $userId = $request->user()?->id;

        try {
            $record = IdempotencyKey::create([
                'key' => $key,
                'user_id' => $userId,
                'request_hash' => $requestHash,
                'status' => 'processing',
                'expires_at' => now()->addHours(config('idempotency.ttl_hours')),
            ]);
        } catch (QueryException $e) {
            if ((string) $e->getCode() !== '23000') {
                throw $e;
            }

            $existing = IdempotencyKey::where('user_id', $userId)->where('key', $key)->first();

            if (! $existing || $existing->request_hash !== $requestHash) {
                throw new ConflictHttpException('Idempotency-Key sudah dipakai untuk request lain.');
            }

            if ($existing->status === 'processing') {
                throw new ConflictHttpException('Request dengan Idempotency-Key ini masih diproses.');
            }

            return response()->json(
                json_decode($existing->response_body, true),
                $existing->response_status
            );
        }

        $response = $next($request);

        $record->update([
            'status' => 'completed',
            'response_status' => $response->getStatusCode(),
            'response_body' => $response->getContent(),
        ]);

        return $response;
    }
}
```

Pasang di route yang relevan:

```php
Route::middleware(['auth:sanctum', 'idempotent'])->post('/transactions', [TransactionController::class, 'store']);
```

## 4. Body Berbeda dengan Key Sama → 409 Conflict

Kalau `request_hash` tersimpan tidak sama dengan request yang datang (key dipakai ulang
untuk payload berbeda), ini **bukan** retry yang sah — kembalikan `409 Conflict` (lihat
blok `try/catch` bagian 3). Jangan proses request itu seolah valid.

## 5. Request Masih `processing` (Konkuren, Belum Selesai) → 409 Conflict

Kalau ada request dengan key sama yang masih berstatus `processing` (belum sempat
`completed`), request kedua yang datang hampir bersamaan dibalas `409 Conflict`
("masih diproses"), **bukan** menunggu (blocking) dan **bukan** diproses ulang. Client yang
menerima 409 ini disarankan retry dengan backoff singkat, bukan dianggap gagal permanen.

## 6. TTL dan Pembersihan

TTL **12 jam** sejak key pertama dipakai (`config('idempotency.ttl_hours')`, env
`IDEMPOTENCY_TTL_HOURS`). Setelah lewat `expires_at`, row boleh dibersihkan oleh command
terjadwal (channel log `cron`, lihat `msd-laravel-logging`):

```php
IdempotencyKey::where('expires_at', '<', now())->delete();
```

Key yang sudah kadaluarsa dan dipakai ulang oleh client dianggap request baru (tidak ada
cek duplikat lagi) — ini risiko yang diterima, konsisten dengan tujuan TTL sebagai jendela
retry yang wajar, bukan penyimpanan permanen.

## 7. Hubungan dengan Skill Lain

- Insert row `idempotency_keys` dan proses request sebaiknya **tidak** dibungkus dalam
  `DB::transaction()` yang sama dengan logic bisnis utama — placeholder harus ter-commit
  SEBELUM logic bisnis jalan, supaya request konkuren lain langsung kena `UNIQUE` constraint
  tanpa menunggu transaksi besar selesai. Update `status` ke `completed` dilakukan setelah
  response terbentuk, sebagai statement terpisah.
- Endpoint finansial yang juga pakai `msd-laravel-row-locking` tetap jalan seperti biasa di
  dalam `TransactionController::store()` — idempotency ada di layer middleware, row locking
  ada di layer service, dua-duanya aktif bersamaan tanpa konflik.

## 8. Checklist Sebelum Menulis/Review Idempotency

- [ ] Endpoint `POST`/create data mewajibkan header `Idempotency-Key` (request ditolak kalau
      tidak ada)
- [ ] Insert placeholder (`status = processing`) dilakukan DULU, bukan `SELECT` dulu baru
      `INSERT`
- [ ] `UNIQUE(user_id, key)` ada di migration tabel `idempotency_keys`
- [ ] Body berbeda dengan key sama → `409 Conflict`, bukan diproses
- [ ] Request konkuren dengan key sama yang masih `processing` → `409 Conflict`, bukan
      diproses ulang atau di-block menunggu
- [ ] TTL dari `config('idempotency.ttl_hours')`, bukan angka literal
- [ ] Ada command terjadwal pembersihan key kadaluarsa, log ke channel `cron`
- [ ] Placeholder idempotency key di-commit sebelum logic bisnis utama berjalan, tidak
      digabung dalam satu `DB::transaction()` besar
