---
name: msd-laravel-extract-postman
description: Generate/update Postman Collection (v2.1) + Environment dari endpoint API Laravel yang sudah dibuat sesuai skill msd-laravel-jsonapi, supaya API langsung bisa di-load/test di Postman atau aplikasi testing API lain (Insomnia, Bruno, Thunder Client). WAJIB dijalankan sebagai langkah TERAKHIR setiap kali endpoint API baru dibuat atau diubah (route, Controller, FormRequest, atau Serializer) — SETELAH msd-laravel-responseapi (kalau sudah ada contoh response hasil rekaman, dipakai mengisi field `response` di collection). Juga trigger saat user menyebut "postman", "export ke postman", "generate collection", "collection untuk testing API", "import ke insomnia", walaupun tidak menyebut nama skill ini secara eksplisit.
---

# MSD Laravel Extract to Postman

Skill ini mengubah endpoint API yang sudah ditulis sesuai [[msd-laravel-jsonapi]] menjadi **Postman Collection Schema v2.1** + file environment, sehingga endpoint bisa langsung di-import dan di-test di Postman/Insomnia/Bruno/Thunder Client tanpa ada yang menyusun request manual.

Bahasa: ikuti bahasa user. Nama folder/request di collection tetap English, konsisten dengan nama resource JSON:API.

## Cara kerja

- **Source of truth adalah kode**, bukan asumsi. Baca `routes/api.php` (dan route file versi lain kalau ada), Controller, FormRequest (`rules()`), dan Serializer terkait. Jangan mengarang field, endpoint, atau contoh value yang tidak ada di kode. Tandai `ASUMSI:` bila ada hal yang tidak eksplisit (mis. contoh value untuk field bebas seperti `name`).
- File collection & environment adalah **derived artifact**: setiap kali skill ini jalan, **regenerate penuh** dari kode saat itu — jangan tempelkan patch parsial yang bisa basi. Jangan edit hasil generate langsung di aplikasi Postman dan berharap persist; kalau butuh script/test tambahan yang permanen, tambahkan ke aturan generate di skill ini (bagian 5), bukan di file hasil generate.
- Skill ini jalan **setelah** [[msd-laravel-jsonapi]] diterapkan — bukan pengganti. Urutan lengkap: [[msd-laravel-jsonapi]] (endpoint) → [[msd-laravel-testing]] (Feature test) → [[msd-laravel-responseapi]] (rekam response nyata) → **skill ini** (generate/update collection, isi `response` dari hasil rekaman). Jalankan sebagai langkah terakhir sebelum menyatakan task endpoint selesai.
- Kalau route, FormRequest, atau Serializer yang relevan tidak ditemukan di kode (mis. user minta generate tapi belum ada endpoint), berhenti dan tanyakan — jangan generate collection kosong atau karangan.

## 1. Lokasi output

```
postman/<slug>.postman_collection.json
postman/<slug>.postman_environment.json
```

- `<slug>` = kebab-case dari `APP_NAME` di `.env`/`.env.example`. Kalau `APP_NAME` masih default (`Laravel`), gunakan kebab-case nama folder project sebagai fallback, dan catat sebagai `ASUMSI:`.
- Buat folder `postman/` di root project kalau belum ada.
- Commit file ini ke git seperti source code lain (bukan file ignored) — tim butuh collection yang sinkron dengan branch.

## 2. Struktur collection

- `info.schema`: `https://schema.getpostman.com/json/collection/v2.1.0/collection.json`
- 1 **folder** per controller/grup resource, mengikuti grouping di routes file. Nama folder: Title Case dari nama controller tanpa suffix `Controller` (mis. `OrganizationUnitController` → `Organization Units`, `AuthController` → `Auth`).
- Urutan folder & request mengikuti urutan deklarasi route di routes file — jangan diacak atau diurut alfabetis.
- Nama request: deskriptif, Title Case, mis. `Login`, `List Organization Units`, `Create Organization Unit`, `Show Organization Unit`, `Update Organization Unit`, `Activate Organization Unit`, `Deactivate Organization Unit`.

## 3. Pemetaan route → request Postman

- **URL**: `{{base_url}}/api/<prefix>/...` — ambil `<prefix>` (mis. `v1`) dari grup prefix asli di routes file, jangan di-hardcode kalau project punya versi API lain.
- **Route model binding** (`{organizationUnit}`) → collection/environment variable `{{organization_unit_id}}` (snake_case dari nama parameter + `_id`). Daftarkan juga nilainya di file environment.
- **Header wajib** tiap request (sesuai [[msd-laravel-jsonapi]]):
  - `Accept: application/vnd.api+json`
  - `Content-Type: application/vnd.api+json` — hanya untuk request yang punya body (POST/PATCH).
- **Auth**: kalau route berada di dalam middleware group `auth:sanctum` (atau middleware auth lain), tambahkan header `Authorization: Bearer {{token}}`.
- **Body** (POST/PATCH): bentuk JSON:API sesuai `rules()` di FormRequest terkait — bukan dari Serializer (Serializer itu bentuk *response*, bukan *request*):
  ```json
  {
    "data": {
      "type": "<resource-type-dari-FormRequest>",
      "attributes": { "...": "..." }
    }
  }
  ```
  - Untuk PATCH, tambahkan `"id": "{{xxx_id}}"` di dalam `data` (sesuai aturan type/id match di [[msd-laravel-jsonapi]]).
  - Contoh value tiap attribute ikuti tipe rule: `string` → string pendek relevan nama field, `integer`/`exists:...` → `1` (atau `{{..._id}}` kalau mengacu ke resource lain yang juga ada di collection), `boolean` → `true`, `in:a,b,c` → opsi pertama. Field `sometimes`/`nullable` tetap disertakan sebagai contoh (boleh dikomentari lewat `disabled: true` di key body kalau mau tunjukkan opsional).
- **Auto-capture token**: untuk endpoint yang me-return token (mis. login), tambahkan script di `event` dengan `listen: "test"` pada request item, isi sesuai field asli di Serializer response (BUKAN tebakan):
  ```js
  const json = pm.response.json();
  if (json?.data?.meta?.token) {
      pm.environment.set("token", json.data.meta.token);
  }
  ```
  Path field (`data.meta.token`, `data.attributes.token`, dst.) WAJIB dicek langsung dari Serializer yang dipakai controller tersebut — jangan disalin dari contoh lain tanpa verifikasi.
- **Body `response` examples di request item**: isi dari [[msd-laravel-responseapi]] kalau sudah ada entry yang cocok — baca `api-examples/{version}.json`, cari key `"{Group} > {Name}"` yang sama dengan nama folder+request di collection ini, lalu isi `response` array (lihat bagian 4a untuk bentuknya). Kalau belum ada entry yang cocok (endpoint belum direkam), `response` tetap `[]` — jangan mengarang.

### 4a. Mengisi `response` dari hasil rekaman [[msd-laravel-responseapi]]

Untuk tiap entry di `api-examples/{version}.json` yang `group`+`name`-nya cocok dengan request di collection ini:

```json
"response": [
    {
        "name": "Example",
        "originalRequest": { "method": "<entry.method>", "header": [...], "body": { "mode": "raw", "raw": "<json_encode(entry.request)>" }, "url": { "raw": "{{base_url}}<entry.uri>" } },
        "status": "<teks HTTP standar untuk entry.status, mis. \"Created\" untuk 201>",
        "code": "<entry.status>",
        "header": [{ "key": "Content-Type", "value": "<entry.response.headers['Content-Type']>" }],
        "body": "<json_encode(entry.response.body, JSON_PRETTY_PRINT)>",
        "_postman_previewlanguage": "json"
    }
]
```

`body` di Postman response object SELALU string hasil `json_encode`, bukan object mentah. `entry.request`/`entry.response.body` dari `api-examples/{version}.json` sudah ter-redact ([[msd-laravel-responseapi]] §bagian redaksi) — jangan unredact atau isi ulang dengan nilai asli.

## 4. Contoh nyata (grounded di kode project ini)

Login (`POST /api/v1/auth/login`, FormRequest `LoginRequest`, response via `UserSerializer` dengan token di `data.meta.token`):

```json
{
    "name": "Login",
    "request": {
        "method": "POST",
        "header": [
            { "key": "Content-Type", "value": "application/vnd.api+json" },
            { "key": "Accept", "value": "application/vnd.api+json" }
        ],
        "body": {
            "mode": "raw",
            "raw": "{\n  \"data\": {\n    \"type\": \"logins\",\n    \"attributes\": {\n      \"email\": \"user@example.com\",\n      \"password\": \"secret\",\n      \"device_name\": \"postman\"\n    }\n  }\n}"
        },
        "url": {
            "raw": "{{base_url}}/api/v1/auth/login",
            "host": ["{{base_url}}"],
            "path": ["api", "v1", "auth", "login"]
        }
    },
    "event": [
        {
            "listen": "test",
            "script": {
                "type": "text/javascript",
                "exec": [
                    "const json = pm.response.json();",
                    "if (json?.data?.meta?.token) { pm.environment.set(\"token\", json.data.meta.token); }"
                ]
            }
        }
    ],
    "response": []
}
```

Create Organization Unit (`POST /api/v1/organization-units`, butuh auth, FormRequest `StoreOrganizationUnitRequest`):

```json
{
    "name": "Create Organization Unit",
    "request": {
        "method": "POST",
        "header": [
            { "key": "Content-Type", "value": "application/vnd.api+json" },
            { "key": "Accept", "value": "application/vnd.api+json" },
            { "key": "Authorization", "value": "Bearer {{token}}" }
        ],
        "body": {
            "mode": "raw",
            "raw": "{\n  \"data\": {\n    \"type\": \"organization-units\",\n    \"attributes\": {\n      \"unit_type\": \"province\",\n      \"name\": \"Sulawesi Selatan\",\n      \"code\": \"SULSEL\",\n      \"parent_id\": 1,\n      \"is_active\": true\n    }\n  }\n}"
        },
        "url": {
            "raw": "{{base_url}}/api/v1/organization-units",
            "host": ["{{base_url}}"],
            "path": ["api", "v1", "organization-units"]
        }
    },
    "response": []
}
```

## 5. File environment

Minimal variable:

- `base_url` — default dari `APP_URL` di `.env`/`.env.example`, fallback `http://localhost:8000`.
- `token` — kosong (di-isi otomatis oleh script login, lihat bagian 3).
- Satu variable `{param}_id` per route model binding yang dipakai di collection, mis. `organization_unit_id` — isi default `"1"` kecuali ada id nyata yang lebih relevan dari seeder/factory.

```json
{
    "id": "<uuid-baru>",
    "name": "<slug> - local",
    "values": [
        { "key": "base_url", "value": "http://localhost:8000", "enabled": true },
        { "key": "token", "value": "", "enabled": true },
        { "key": "organization_unit_id", "value": "1", "enabled": true }
    ],
    "_postman_variable_scope": "environment"
}
```

## 6. Checklist verifikasi

Sebelum menyatakan selesai:
- [ ] Setiap route di routes file (grup versi yang relevan) punya 1 request di collection — tidak ada yang terlewat, dan tidak ada request basi untuk route yang sudah dihapus.
- [ ] Header `Accept`/`Content-Type` = `application/vnd.api+json`, konsisten dengan [[msd-laravel-jsonapi]].
- [ ] Route yang ada di middleware `auth:sanctum` punya header `Authorization: Bearer {{token}}`.
- [ ] Body POST/PATCH mengikuti `rules()` FormRequest TERBARU — field yang baru ditambah/dihapus di FormRequest ikut terupdate di collection.
- [ ] Route model binding terdaftar sebagai variable di environment file.
- [ ] Script auto-capture token (kalau ada) memakai path field yang diverifikasi dari Serializer asli, bukan tebakan.
- [ ] `postman/<slug>.postman_collection.json` dan `postman/<slug>.postman_environment.json` adalah JSON valid (schema v2.1) dan bisa diimport ulang tanpa error.
- [ ] Tidak ada secret asli (password/token sungguhan) tertulis di contoh body — hanya placeholder/contoh dummy.
- [ ] `response` sudah diisi dari `api-examples/{version}.json` untuk setiap request yang punya entry rekaman (bagian 4a); request tanpa entry tetap `[]`, bukan dikarang.
