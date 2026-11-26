---
name: msd-laravel-testing
description: Standar menulis test Laravel 13 di proyek ini memakai PHPUnit native (bukan Pest) — struktur `tests/Unit` vs `tests/Feature`, konvensi penamaan, `RefreshDatabase` & factory, mocking/fake facade, testing response JSON:API, testing log dengan trace-id, dan checklist "test lengkap" sesuai dokumentasi resmi Laravel. Gunakan SETIAP KALI membuat atau mengubah test, menambah endpoint/Controller/Action/Service/Repository/Job/Command baru yang butuh test, atau saat user menyebut "unit test", "feature test", "test coverage", "mock", "factory", "assert", walaupun tidak menyebut nama skill ini secara eksplisit. Jika ragu assertion mana yang representatif untuk suatu behavior, atau apakah suatu test harus Unit atau Feature — TANYAKAN ke user, jangan menebak.
---

# MSD Laravel Testing Standard (Laravel 13, PHPUnit)

Skill ini mengatur **cara menulis test** di proyek ini mengikuti dokumentasi resmi Laravel 13 (testing fundamentals, HTTP tests, database testing, mocking), diselaraskan dengan konvensi project: struktur folder dari [[msd-laravel-folder]] (jika sudah ditulis), format response dari [[msd-laravel-jsonapi]], dan standar log dari [[msd-laravel-logging]].

Bahasa: ikuti bahasa user dalam komunikasi. Nama method test, assertion, dan pesan tetap bahasa Inggris, konsisten dengan `tests/Feature/Api/V1/AuthControllerTest.php` yang sudah ada.

**Proyek ini memakai PHPUnit 12 native (class-based, `test_snake_case` method), BUKAN Pest.** `composer.json` tidak punya dependency `pestphp/pest`. Jangan tulis test dengan syntax `it(...)`/`test(...)` kecuali user secara eksplisit minta migrasi ke Pest (itu keputusan besar — tanyakan dulu, jangan lakukan diam-diam).

## 1. Prinsip Umum

- Setiap behavior baru (endpoint, Action, Service, Repository, Job, Command, validasi) **wajib ada test** sebelum dianggap selesai.
- Test harus **deterministik**: tidak bergantung urutan eksekusi, tidak bergantung waktu nyata (pakai `Carbon::setTestNow()`/`$this->travelTo()`), tidak memanggil API eksternal sungguhan (lihat bagian 6, fake wajib).
- Satu test method = satu behavior/skenario. Jangan gabung banyak assertion tak terkait dalam satu method hanya untuk "irit setup".
- Arrange - Act - Assert: pisahkan secara jelas (boleh dengan baris kosong atau komentar `// Arrange/Act/Assert` jika alurnya panjang).
- Jangan assert implementasi internal (private property, query count tanpa alasan) kecuali memang itu yang diuji (misal N+1 guard di [[msd-laravel-jsonapi]]).

## 2. Lokasi & Penamaan File Test

Ikuti struktur bawaan Laravel: `tests/Unit/` dan `tests/Feature/`, **mirror path dari `app/`** supaya mudah ditemukan.

| Yang diuji | Lokasi app | Lokasi test |
|---|---|---|
| Controller / endpoint HTTP (web atau API) | `app/Http/Controllers/...` | `tests/Feature/...` (mirror path, tanpa `Controllers`) |
| FormRequest (validasi) | `app/Http/Requests/...` | `tests/Unit/Requests/...` (via Feature test endpoint jika authorize()/rules() butuh request context — lihat bagian 4) |
| Action | `app/Actions/...` | `tests/Unit/Actions/...` |
| Service | `app/Http/Services/...` | `tests/Unit/Services/...` |
| Repository | `app/Repositories/...` | `tests/Unit/Repositories/...` |
| Model (scope, accessor, relasi) | `app/Models/...` | `tests/Unit/Models/...` |
| Job / Listener | `app/Jobs/`, `app/Listeners/` | `tests/Unit/Jobs/...`, `tests/Unit/Listeners/...` |
| Command (artisan) | `app/Console/Commands/...` | `tests/Feature/Console/...` (command butuh boot kernel, treat sebagai Feature) |

Contoh nyata di repo ini sudah benar: `app/Http/Controllers/Api/V1/AuthController.php` → `tests/Feature/Api/V1/AuthControllerTest.php`. Ikuti pola yang sama untuk `app/Actions/Api/Auth/AuthenticateUser.php` → `tests/Unit/Actions/Api/Auth/AuthenticateUserTest.php` (belum ada, buat jika menyentuh file ini).

Aturan penamaan:
- Nama class test: `{NamaClassYangDiuji}Test`.
- Nama method: `test_snake_case` deskriptif tentang **behavior**, bukan nama method yang dipanggil. Contoh benar: `test_login_fails_with_invalid_credentials`. Contoh salah: `test_login_method`.
- Jangan pakai anotasi docblock `@test`/`@dataProvider` (deprecated sejak PHPUnit 10). Kalau butuh data provider, pakai attribute PHP: `#[DataProvider('provider')]` (lihat bagian 9).

## 3. Unit vs Feature: Cara Memutuskan

Laravel membedakan berdasarkan **apakah test melewati HTTP kernel / full application boot**, bukan berdasarkan "ada DB atau tidak".

- **Feature test** → melalui route/HTTP (`$this->get(...)`, `$this->postJson(...)`, `$this->call(...)`), atau menguji Console Command lewat `$this->artisan(...)`. Selalu extends `Tests\TestCase` dan boleh pakai `RefreshDatabase`.
- **Unit test** → menguji satu class terisolasi (Action, Service, Repository, DTO, Model method, Helper) **tanpa** memanggil route/controller. Boleh tetap extends `Tests\TestCase` (bukan `PHPUnit\Framework\TestCase` murni) kalau class yang diuji memakai Eloquent/Facade Laravel (Log, Hash, dsb) — itu tetap sah disebut "Unit" selama tidak lewat HTTP layer. Contoh: `AuthenticateUser::handle()` memakai `User::query()`, `Hash::check()`, `Log::channel()` — test-nya tetap taruh di `tests/Unit/`, extends `Tests\TestCase`, pakai `RefreshDatabase` karena butuh tabel `users`.
- Kalau sebuah class **tidak** menyentuh Eloquent/Facade sama sekali (pure PHP, misal helper di `app/Support/`), boleh extends `PHPUnit\Framework\TestCase` langsung (lebih cepat, tanpa boot aplikasi) — tapi ini opsional, extends `Tests\TestCase` tetap valid dan lebih konsisten.

Kalau ragu suatu class masuk Unit atau Feature (misal Job yang juga memanggil service HTTP eksternal), **tanyakan ke user** daripada menebak.

## 4. Setup Dasar Test Class

```php
<?php

namespace Tests\Unit\Actions\Api\Auth;

use App\Actions\Api\Auth\AuthenticateUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class AuthenticateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_user_and_token_for_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'amil@example.test',
            'password' => Hash::make('secret123'),
        ]);

        [$authenticatedUser, $token] = (new AuthenticateUser())->handle(
            email: 'amil@example.test',
            password: 'secret123',
            deviceName: 'phpunit',
        );

        $this->assertTrue($user->is($authenticatedUser));
        $this->assertNotEmpty($token);
    }

    public function test_throws_validation_exception_for_wrong_password(): void
    {
        User::factory()->create([
            'email' => 'amil@example.test',
            'password' => Hash::make('secret123'),
        ]);

        $this->expectException(ValidationException::class);

        (new AuthenticateUser())->handle('amil@example.test', 'wrong', 'phpunit');
    }
}
```

Catatan: `RefreshDatabase` me-migrate ulang skema tiap test (di-wrap transaksi, cepat karena `DB_CONNECTION=sqlite`/`:memory:` sudah diset di `phpunit.xml`). Jangan pakai `DatabaseMigrations` (lebih lambat, migrate ulang beneran tiap test) kecuali ada alasan spesifik.

## 5. Database Testing: Factory & Assertion

- Selalu buat data lewat **factory** (`database/factories/`), jangan `User::create([...])` manual kecuali memang menguji proses create itu sendiri.
- State factory untuk variasi kondisi (contoh: `User::factory()->unverified()->create()` sudah ada di `UserFactory`). Tambah state baru di factory kalau butuh kondisi berulang, jangan override attribute manual di banyak test.
- Assertion database yang dipakai (bukan query manual lalu `assertEquals`):

| Assertion | Kegunaan |
|---|---|
| `assertDatabaseHas('table', [...])` | Row dengan kondisi tertentu ada |
| `assertDatabaseMissing('table', [...])` | Row tidak ada |
| `assertDatabaseCount('table', $n)` | Jumlah row persis |
| `assertModelExists($model)` / `assertModelMissing($model)` | Berdasarkan instance model (menghindari typo nama tabel/kolom) |
| `assertSoftDeleted($model)` | Kalau model pakai `SoftDeletes` |

Jangan assert password/hash mentah di `assertDatabaseHas` (hash selalu beda per run) — ambil user lalu `assertTrue(Hash::check($plain, $user->password))`.

## 6. Mocking & Fake: Wajib untuk Semua I/O Eksternal

**Test TIDAK BOLEH memanggil API pihak ketiga, mengirim email/SMS sungguhan, atau dispatch job ke queue sungguhan.** Pakai fake bawaan Laravel:

| Facade | Fake | Assertion umum |
|---|---|---|
| `Http` | `Http::fake([...])` | `Http::assertSent(fn ($req) => ...)` |
| `Mail` | `Mail::fake()` | `Mail::assertSent(InvoiceReminderMail::class)` |
| `Notification` | `Notification::fake()` | `Notification::assertSentTo($user, ...)` |
| `Queue` | `Queue::fake()` | `Queue::assertPushed(SendInvoiceReminder::class)` |
| `Bus` | `Bus::fake()` | `Bus::assertDispatched(...)` |
| `Event` | `Event::fake()` | `Event::assertDispatched(...)` |
| `Storage` | `Storage::fake('local')` | `Storage::assertExists(...)` |
| Waktu | `$this->travelTo(now()->addDay())` / `Carbon::setTestNow(...)` | — |

Untuk dependency custom (interface di `app/Repositories/Contracts/` atau `app/Contracts/` sesuai [[msd-laravel-folder]]), pakai helper bawaan `Tests\TestCase`:

```php
$this->mock(PaymentGatewayContract::class, function ($mock) {
    $mock->shouldReceive('charge')->once()->andReturn(new ChargeResult(success: true));
});
```

- `$this->mock(Interface::class, ...)` → full mock, binding diganti total di container.
- `$this->partialMock(Class::class, ...)` → mock sebagian method, method lain tetap jalan asli.
- `$this->spy(Interface::class)` → kalau ingin assert "dipanggil dengan X" setelah act, tanpa expectation di awal.

Jangan mock class Eloquent model langsung (Model final/concrete sulit dan tidak idiomatic) — pakai `RefreshDatabase` + factory untuk data, mock hanya untuk boundary eksternal (payment gateway, SSH, storage pihak ketiga, dsb, sesuai bagian 2A [[msd-laravel-folder]]).

## 7. HTTP Feature Test (Web & JSON:API)

### 7.1 Web biasa (session, Blade view) — contoh `ProfileController`

```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_update_profile(): void
    {
        $user = User::factory()->create(['name' => 'Old Name']);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'New Name',
                'email' => $user->email,
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'New Name']);
    }

    public function test_guest_cannot_access_profile_edit(): void
    {
        $this->get(route('profile.edit'))
            ->assertRedirect(route('login'));
    }
}
```

Assertion umum untuk route web: `assertOk`, `assertRedirect`, `assertSessionHasErrors`, `assertSessionHasNoErrors`, `assertViewIs`, `assertViewHas`, `assertSee`.

### 7.2 API / JSON:API — WAJIB baca [[msd-laravel-jsonapi]] sebelum menulis test endpoint API

Pola di `tests/Feature/Api/V1/AuthControllerTest.php` adalah acuan: helper `postJsonApi()` untuk set header `Content-Type`/`Accept` ke `application/vnd.api+json`, lalu assert struktur dokumen JSON:API, bukan assert field sembarang.

```php
$response->assertStatus(201)
    ->assertHeader('Content-Type', 'application/vnd.api+json')
    ->assertJsonStructure([
        'jsonapi' => ['version'],
        'data' => ['type', 'id', 'attributes' => ['title', 'body']],
    ])
    ->assertJsonPath('data.type', 'articles')
    ->assertJsonMissingPath('data.attributes.id'); // id tidak boleh dobel di attributes
```

Checklist tambahan yang WAJIB diuji untuk setiap endpoint JSON:API baru (selaras checklist bagian 10 [[msd-laravel-jsonapi]]):
- Status code dan header `Content-Type` sesuai tabel status code di skill tersebut.
- Error response: `assertJsonPath('errors.0.source.pointer', '/data/attributes/{field}')` untuk validasi per field.
- `POST` sukses → `assertHeader('Location', ...)`.
- `DELETE` sukses → `assertStatus(204)` dan **tanpa body** (`assertNoContent()`).
- Sparse fieldset/`include`/`sort`/`filter` kalau endpoint mendukungnya — minimal satu test untuk whitelist ditolak (`400`) dan satu untuk kombinasi valid.
- N+1: kalau endpoint `index` dengan relasi, boleh tambah assertion jumlah query (`DB::enableQueryLog()` + `assertCount`) untuk mengunci regresi N+1.

## 8. Testing Auth (Session & Sanctum)

- Guard **session/web** (Blade, `LoginController` dsb): `$this->actingAs($user)` sebelum request, atau test alur login lewat form (`$this->post('/login', [...])->assertRedirect('/home')`).
- Guard **API/Sanctum** (`AuthController`, token-based): dua pola valid, pilih sesuai yang diuji:
  - End-to-end: `createToken()` lalu kirim `Authorization: Bearer {token}` di header (persis seperti `AuthControllerTest::test_authenticated_user_can_fetch_profile_and_logout`) — pakai ini kalau ingin menguji behavior token sungguhan (expiry, revoke, device name).
  - Shortcut: `Sanctum::actingAs($user, ['*'])` dari `Laravel\Sanctum\Sanctum` — pakai ini kalau fokus test endpoint lain yang **mensyaratkan** auth tapi bukan tentang auth itu sendiri, supaya tidak perlu setup token tiap kali.
- Selalu uji juga kasus **tanpa auth** (`401`) dan kalau ada otorisasi per-resource, kasus **auth tapi tidak berhak** (`403`) — jangan hanya uji happy path.

## 9. Validasi & Data Provider

FormRequest diuji lewat endpoint (Feature test), bukan dipanggil langsung sebagai Unit test (karena `authorize()`/`rules()` butuh request context, route model binding, dsb) — kecuali rules-nya murni fungsi tanpa dependency route.

Untuk banyak kombinasi input invalid, pakai `#[DataProvider]` (attribute, bukan docblock):

```php
use PHPUnit\Framework\Attributes\DataProvider;

class UpdateProfileRequestTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('invalidPayloads')]
    public function test_update_profile_rejects_invalid_payload(array $payload, string $invalidField): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('profile.update'), $payload)
            ->assertSessionHasErrors($invalidField);
    }

    public static function invalidPayloads(): array
    {
        return [
            'missing name' => [['email' => 'a@a.com'], 'name'],
            'invalid email' => [['name' => 'A', 'email' => 'not-an-email'], 'email'],
            'password too short' => [['name' => 'A', 'email' => 'a@a.com', 'password' => '123', 'password_confirmation' => '123'], 'password'],
        ];
    }
}
```

## 10. Testing Log & Trace-ID — WAJIB baca [[msd-laravel-logging]] untuk class yang menulis log

**Jangan assert isi file log fisik** (rapuh, bergantung filesystem). Pakai `Log::spy()` atau `Log::shouldReceive()` per channel:

```php
use Illuminate\Support\Facades\Log;

public function test_failed_login_is_logged_to_auth_channel_with_trace_id(): void
{
    User::factory()->create(['email' => 'amil@example.test', 'password' => Hash::make('secret123')]);

    Log::shouldReceive('channel')
        ->with('auth')
        ->andReturnSelf();

    Log::shouldReceive('warning')
        ->once()
        ->withArgs(function (string $message, array $context) {
            return str_contains($message, '[AuthenticateUser] => HANDLE =>')
                && str_contains($message, '=> handle : FAILED')
                && array_key_exists('trace_id', $context)
                && ! empty($context['trace_id']);
        });

    $this->expectException(ValidationException::class);

    (new AuthenticateUser())->handle('amil@example.test', 'wrong-password', 'phpunit');
}
```

Aturan:
- **Jangan** assert nilai UUID trace-id yang eksak (selalu beda per run via `TraceId::generate()`). Assert `array_key_exists('trace_id', $context)` dan `! empty(...)`, atau gunakan `TraceId::set('fixed-id-for-test')` di awal test kalau perlu nilai pasti untuk dibandingkan antar log (misal memverifikasi trace-id yang sama diteruskan ke channel `urgent`).
- Assert **format header log** (`[ClassName] => FUNCTION => ... => subfunction : STATUS`) sesuai bagian 4a [[msd-laravel-logging]], bukan hanya "log dipanggil".
- Untuk kondisi yang seharusnya masuk channel `urgent` juga (bagian 3 [[msd-laravel-logging]]), tambahkan expectation terpisah untuk `Log::shouldReceive('channel')->with('urgent')->...` memastikan trace-id yang sama dikirim ke dua channel.
- Kalau test tidak secara spesifik menguji logging, **tidak perlu** mock `Log` sama sekali — biarkan log jalan apa adanya (menulis ke `storage/logs/testing/...` kalau `APP_ENV=testing` diarahkan ke channel terpisah; default `env` di `phpunit.xml` belum override `LOG_CHANNEL`, jadi log tetap jalan ke channel asli saat test — ini tidak masalah untuk test yang tidak fokus ke logging, tapi kalau mulai mengganggu/lambat, tanyakan ke user apakah perlu set `LOG_CHANNEL=null` khusus testing).

## 11. Console Command Test

```php
public function test_cron_command_runs_successfully(): void
{
    $this->artisan('network-discovery-logger:cron')
        ->assertSuccessful();
}
```

Pakai `expectsOutput()`/`expectsConfirmation()`/`expectsQuestion()` untuk command interaktif. Command yang menulis log channel `cron` ikut aturan bagian 10 kalau test memang menguji logging-nya.

## 12. Menjalankan Test

```bash
php artisan test                        # semua test
php artisan test --filter=AuthController
php artisan test tests/Unit/Actions     # satu folder
php artisan test --parallel             # paralel, hati-hati RefreshDatabase + state global (TraceId::$current)
```

Catatan `--parallel`: `App\Support\TraceId` memakai static property per-proses, aman di parallel testing (tiap proses punya memory sendiri) — tapi **jangan** tambah state static baru di class lain tanpa sadar implikasinya ke parallel test.

## 13. Checklist "Test Lengkap" Sebelum Menyatakan Selesai

- [ ] Ada minimal satu test untuk **happy path** dan satu untuk **failure path** (validasi gagal, tidak auth, tidak berhak, resource tidak ada).
- [ ] Lokasi file test mirror `app/` (bagian 2), nama class `*Test`, method `test_snake_case` deskriptif.
- [ ] Unit vs Feature ditentukan oleh HTTP layer, bukan ada/tidaknya DB (bagian 3).
- [ ] Data dibuat lewat factory, assertion DB lewat `assertDatabaseHas`/`assertModelExists`, bukan query manual.
- [ ] Tidak ada panggilan API/email/SMS/queue sungguhan — semua di-`fake()` atau di-mock (bagian 6).
- [ ] Endpoint API/JSON:API diuji sesuai checklist [[msd-laravel-jsonapi]] bagian 10 (status code, header, struktur error, `Location`, dsb).
- [ ] Kalau class menulis log, test logging (jika ada) assert format header + `trace_id` ada di context — bukan assert isi file log (bagian 10).
- [ ] Tidak ada data sensitif (password plain, token penuh) ikut di-assert atau muncul di output test.
- [ ] `php artisan test` hijau sebelum PR, termasuk test yang sudah ada (regresi).

## 14. Kapan Harus Bertanya ke User (Jangan Menebak)

- Ragu suatu class masuk Unit atau Feature test (bagian 3).
- Ragu apakah suatu dependency eksternal perlu di-fake penuh atau ada mode "sandbox" resmi dari pihak ketiga yang lebih representatif untuk diuji.
- Ragu nilai ambang/expected business logic yang diuji (misal aturan diskon, minimum saldo) dan tidak ada sumber kebenaran di kode/dokumen.
- Mempertimbangkan migrasi ke Pest atau menambah `laravel/dusk` untuk browser test — ini keputusan tooling, bukan keputusan test individual.
- Butuh menambah `.env.testing` terpisah atau mengubah `LOG_CHANNEL` khusus testing (bagian 10) karena test mulai terganggu I/O log asli.
