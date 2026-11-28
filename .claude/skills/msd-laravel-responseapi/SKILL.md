---
name: msd-laravel-responseapi
description: Merekam contoh request+response NYATA (hasil eksekusi test suite, bukan karangan) dari setiap endpoint JSON:API, disimpan ke SATU file per versi API (`api-examples/{version}.json`, mis. `api-examples/v1.json`). Dipakai sebagai dokumentasi hidup "contoh hasil penerimaan data" per endpoint. WAJIB dijalankan setelah [[msd-laravel-jsonapi]] diterapkan dan test Feature-nya ditulis sesuai [[msd-laravel-testing]] — berjalan SEBELUM [[msd-laravel-extract-postman]], karena hasilnya dipakai mengisi field `response` di Postman collection. Trigger juga saat user menyebut "rekam response", "contoh response API", "capture response", "api-examples", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Response API Recorder

Skill ini merekam **response API yang benar-benar dieksekusi** (lewat test suite yang sudah ada sesuai [[msd-laravel-testing]]), bukan contoh yang dikarang dari membaca kode. Hasilnya disimpan ke satu file JSON per versi API, jadi tim punya "contoh nyata" tiap endpoint tanpa harus menjalankan server atau Postman manual.

Urutan kerja yang benar: [[msd-laravel-jsonapi]] (bangun endpoint) → [[msd-laravel-testing]] (tulis Feature test) → **skill ini** (jalankan test, rekam response) → [[msd-laravel-extract-postman]] (generate/update collection, isi field `response` dari hasil rekaman skill ini). Jangan lompat ke extract-postman sebelum skill ini jalan kalau mau field `response`-nya terisi.

## Cara kerja

- **Source of truth adalah hasil eksekusi test sungguhan** (`TestResponse` dari `postJson()`/`getJson()`/dst di Feature test), bukan response yang ditulis manual/dikarang. Kalau endpoint belum punya Feature test happy-path yang hijau, rekam dulu test-nya (ikuti [[msd-laravel-testing]]), baru rekam response-nya.
- File `api-examples/{version}.json` adalah **derived artifact** yang di-upsert per entry (key `"{Group} > {Name}"`), bukan ditimpa penuh — jalankan test untuk sebagian endpoint saja tidak akan menghapus entry endpoint lain yang sudah terekam sebelumnya.
- **Tidak jalan otomatis di setiap `php artisan test`** — sengaja di-gate di belakang env var `RECORD_API_EXAMPLES=true` supaya test run biasa (termasuk CI) tidak menulis file setiap kali. Jalankan secara eksplisit sebagai langkah terakhir: `RECORD_API_EXAMPLES=true php artisan test --filter=Api`.
- **Redaksi wajib** mengikuti [[msd-laravel-logging]] §6: key seperti `password`, `token`, `access_token`, `secret`, `otp`, `card_number`, `account_number`, `pin` otomatis diganti `"[REDACTED]"` di request maupun response sebelum ditulis ke file — file ini akan di-commit ke git, jadi tidak boleh ada secret asli (password test, token Sanctum asli, dsb) ikut tersimpan. Matching-nya **exact-match untuk key seperti `token`/`secret`/`pin`** (supaya `token_type` yang isinya cuma `"Bearer"` TIDAK ikut ter-redact), dan substring-match hanya untuk key berisiko rendah false-positive (`password`, `secret`, `otp`, `card_number`, `account_number`). Kalau nambah key baru ke daftar ini, pikirkan dulu potensi false-positive-nya (lihat `ApiExampleRecorder::REDACT_EXACT_KEYS` vs `REDACT_SUBSTRING_KEYS`).
- Nama `Group`/`Name` di `recordApiExample()` **WAJIB sama persis** dengan nama folder/request di `postman/*.postman_collection.json` (lihat [[msd-laravel-extract-postman]] §2: `Auth`/`Login`, `Organization Units`/`Create Organization Unit`, dst) — ini kunci lookup saat extract-postman mengisi field `response`.

## 1. Infrastruktur (sudah dibuat, pakai langsung)

- `tests/Support/ApiExampleRecorder.php` — penulis file, dengan lock (`flock`) dan redaksi.
- `tests/Concerns/RecordsApiExamples.php` — trait berisi method `recordApiExample()`.
- `tests/TestCase.php` sudah `use RecordsApiExamples;` — semua Feature/Unit test otomatis punya akses ke `$this->recordApiExample(...)` tanpa import tambahan.

Kalau butuh field tambahan di hasil rekaman (misal query string, response link pagination), tambahkan di `ApiExampleRecorder::record()`, jangan tulis file JSON secara manual di luar class ini.

## 2. Cara pakai di Feature test

Panggil persis **setelah** assertion happy-path endpoint tersebut selesai (supaya yang terekam adalah response yang sudah lolos assert, bukan response gagal):

```php
public function test_authenticated_user_can_create_country(): void
{
    $user = User::factory()->create();

    $payload = [
        'data' => [
            'type' => 'countries',
            'attributes' => ['code' => 'ID', 'name' => 'Indonesia'],
        ],
    ];

    $response = $this->actingAs($user, 'sanctum')
        ->postJson('/api/v1/countries', $payload, ['Content-Type' => self::MEDIA_TYPE, 'Accept' => self::MEDIA_TYPE]);

    $response->assertStatus(201)
        ->assertJsonPath('data.attributes.code', 'ID');

    $this->recordApiExample('v1', 'Countries', 'Create Country', 'POST', '/api/v1/countries', $response, $payload);
}
```

Aturan:
- **Satu panggilan per endpoint per happy-path** sudah cukup (bukan di setiap test method untuk endpoint yang sama) — kalau endpoint punya beberapa skenario sukses yang bentuknya beda (misal `index` dengan filter vs tanpa filter), rekam yang paling representatif saja. Jangan rekam skenario gagal (422/401/dst) ke file ini — fokusnya "contoh hasil penerimaan data" yang valid.
- Untuk endpoint tanpa body (GET, DELETE, POST activate/deactivate tanpa payload), parameter `$requestBody` cukup `null`.
- `$method`/`$uri` ditulis eksplisit (bukan ditebak dari `$response`), supaya hasil rekaman tetap benar walau route berubah prefix di masa depan.

## 3. Format file `api-examples/{version}.json`

```json
{
    "version": "v1",
    "generated_at": "2026-11-28T03:12:00+00:00",
    "examples": {
        "Auth > Login": {
            "group": "Auth",
            "name": "Login",
            "method": "POST",
            "uri": "/api/v1/auth/login",
            "status": 200,
            "request": {
                "data": {
                    "type": "logins",
                    "attributes": { "email": "amil@example.test", "password": "[REDACTED]", "device_name": "phpunit" }
                }
            },
            "response": {
                "headers": { "Content-Type": "application/vnd.api+json" },
                "body": {
                    "jsonapi": { "version": "1.1" },
                    "data": {
                        "type": "users",
                        "id": "1",
                        "attributes": { "name": "Amil", "email": "amil@example.test" },
                        "meta": { "token": "[REDACTED]", "token_type": "Bearer" }
                    }
                }
            },
            "captured_by": "Tests\\Feature\\Api\\V1\\AuthControllerTest::test_user_can_login_with_valid_credentials",
            "captured_at": "2026-11-28T03:12:00+00:00"
        }
    }
}
```

## 4. Integrasi dengan [[msd-laravel-extract-postman]] (WAJIB, sesuai keputusan user)

Berbeda dari sebelumnya ("response boleh dikosongkan"), sekarang kalau `api-examples/{version}.json` **ada** entry yang `group`+`name`-nya cocok dengan folder+request di `postman/*.postman_collection.json`, field `response` request item itu **wajib diisi** dari entry tersebut, bentuk Postman response object:

```json
"response": [
    {
        "name": "Example",
        "originalRequest": { "method": "...", "header": [...], "body": {...}, "url": {...} },
        "status": "Created",
        "code": 201,
        "header": [{ "key": "Content-Type", "value": "application/vnd.api+json" }],
        "body": "<json_encode(entry.response.body, JSON_PRETTY_PRINT)>",
        "_postman_previewlanguage": "json"
    }
]
```

- `status` adalah teks standar HTTP (`"OK"`, `"Created"`, `"No Content"`, dst) untuk `entry.status`, `code` adalah angkanya.
- `body` STRING hasil `json_encode` dari `entry.response.body` (bukan object mentah — field `body` di Postman response object memang string, beda dari `request.body.raw` yang juga string tapi field-nya terpisah).
- Kalau tidak ada entry yang cocok (endpoint belum direkam skill ini), `response` tetap `[]` seperti aturan lama — jangan mengarang response.

## 5. Checklist verifikasi

- [ ] Hanya merekam response dari assertion yang SUDAH lolos (happy-path), tidak pernah merekam response gagal/exception.
- [ ] Tidak ada password/token/secret/OTP/nomor kartu asli tersisa di file (cek redaksi jalan, bukan cuma percaya kode).
- [ ] `Group`/`Name` di `recordApiExample()` sama persis dengan nama folder/request di Postman collection.
- [ ] Satu file per versi (`api-examples/v1.json`), bukan berantakan jadi banyak file kecil.
- [ ] Entry lama untuk endpoint lain tidak hilang setelah test suite dijalankan parsial (`--filter`).
- [ ] `postman/*.postman_collection.json` sudah di-update field `response`-nya untuk entry yang sudah terekam (bagian 4), kalau task-nya memang sampai ke extract-postman.
- [ ] Tidak menjalankan dengan `--parallel` saat merekam (write ke file yang sama dari banyak proses berisiko korup walau sudah pakai `flock`) — jalankan tanpa `--parallel` khusus saat `RECORD_API_EXAMPLES=true`.

## 6. Kapan Harus Bertanya ke User

- Ragu apakah suatu field termasuk sensitif dan harus masuk daftar redaksi tambahan di luar bagian ini — tanyakan, jangan diam-diam menambah/mengurangi daftar `REDACT_KEYS`.
- Endpoint punya beberapa response shape valid yang signifikan beda (misal `index` kosong vs ada data) dan tidak jelas mana yang representatif untuk direkam — tanyakan ke user mana yang mau dijadikan contoh baku.
