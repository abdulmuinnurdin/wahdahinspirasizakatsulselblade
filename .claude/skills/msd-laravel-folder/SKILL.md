---
name: msd-laravel-folder
description: Konvensi penempatan folder/file untuk aplikasi Laravel di proyek ini, termasuk Mail, Notifications, Listeners, Exceptions, View, Exports, dan controller halaman per menu sidebar. Gunakan SETIAP KALI membuat FormRequest, Service, Repository, Action, DTO, Mail, Notification, Listener, Exception, Export, Trait, Contract, Helper, Controller halaman/view baru, atau file baru di dalam `app/`, dan saat memutuskan folder mana yang tepat. Juga gunakan saat user menyebut "folder structure", "taruh di mana", "bikin request", "bikin service", "repository pattern", "menu sidebar", "controller untuk view", atau sejenisnya.
---

# MSD Laravel Folder Convention

Skill ini mengatur **di folder mana** sebuah class baru ditempatkan pada proyek Laravel ini. Tujuannya: konsistensi struktur antar fitur, dan tidak ada keputusan "taruh di mana" yang diambil ulang setiap kali membuat file baru.

Bahasa: ikuti bahasa user dalam komunikasi. Nama folder dan class tetap PascalCase/camelCase sesuai konvensi PHP/Laravel.

## 1. Aturan Wajib

1. **Semua FormRequest dan validasi masuk ke `app/Http/Requests/`.**
   Tidak ada validasi inline berlebihan di controller untuk request yang punya lebih dari 1-2 rule sederhana. Buat FormRequest-nya. Nama class diakhiri `Request` (contoh: `StoreArticleRequest`, `UpdateUserRequest`).

2. **Semua Bisnis Logic, orkestrasi use case, transaksi, dan aturan bisnis masuk ke `app/Http/Services/`.**

3. **Semua CRUD dasar memakai Model Eloquent yang harus ada di `app/Models/` dengan struktur folder.**
   Contoh:
   - Ada 2 table `users` dan `roles`, maka harus ada folder `app/Models/User` dan `app/Models/Role`.
   - Jika tablenya `users` dan `users_authentications`, maka harus ada folder `app/Models/User/Users` dan `app/Models/User/UsersAuthentication`. Buat folder mengelompokkan nama table yang sama.

   Untuk akses data:
   - Query kompleks dan persistence → `app/Repositories/`
   - Interface repository → `app/Repositories/Contracts/` (abstraksi untuk binding dan testing)

4. **Semua eksekusi di luar HTTP dan Service masuk ke folder khususnya:**
   - Email → `app/Mail/`
   - Notifikasi (mail, database, sms, broadcast) → `app/Notifications/`
   - Reaksi terhadap event → `app/Listeners/` (event itu sendiri di `app/Events/`)
   - Exception domain dan mapping error → `app/Exceptions/`
   - Blade component class → `app/View/Components/`
   - Export Excel/CSV → `app/Exports/`

   Detail tiap folder ada di bagian 2A.

5. **Controller halaman Blade (bukan API) dikelompokkan per menu sidebar**, dan view-nya ikut dikelompokkan dengan nama folder yang sama. Lihat bagian 6 untuk detail dan contoh.

## 2. Layer Tambahan (Konvensi, Bukan Bawaan Laravel)

Folder-folder ini **tidak otomatis dipakai untuk setiap fitur**. Gunakan hanya ketika ada kebutuhan nyata yang sesuai tanggung jawabnya:

| Folder | Isi | Tanggung Jawab |
|---|---|---|
| `app/Actions/` | Single-purpose action (`CreateSiteAction`) | Satu use case = satu class, method `__invoke()` atau `execute()` |
| `app/DTOs/` | Data Transfer Object | Membawa data terstruktur antar layer, menggantikan array mentah |
| `app/Contracts/` | Interface umum | Kontrak untuk service eksternal (payment, SSH, storage) |
| `app/Support/` | Helper non-framework | Utility class |
| `app/Queries/` atau `app/Filters/` | Query builder object | Filter kompleks (misal query filter JSON:API) |
| `app/Pipelines/` | Pipeline processing | Tahapan transformasi berurutan |
| `app/Helpers/` | Fungsi global | Dihindari jika bisa, lebih baik class di `app/Support/` |
| `app/Facades/` | Custom facade | Jarang, hanya jika benar-benar perlu |

Nama folder di atas bebas sesuai kesepakatan tim, tetapi di proyek ini **gunakan nama-nama persis seperti tabel** supaya konsisten lintas fitur.

## 2A. Folder Bawaan Laravel yang Dipakai

Folder berikut sudah dikenal Laravel. Yang membedakan hanya **kapan dipakai** dan **aturan penamaannya** di proyek ini. Sebagian besar dibuat lewat `php artisan make:*` dan tidak ada di struktur awal project.

| Folder | Dibuat dengan | Penamaan | Tanggung Jawab |
|---|---|---|---|
| `app/Mail/` | `make:mail` | `*Mail` | Hanya menyusun envelope dan content email. Pengiriman dipicu dari Service. Implement `ShouldQueue` jika kirim async. |
| `app/Notifications/` | `make:notification` | `*Notification` | Payload dan channel notifikasi. Channel dipilih di method `via()`. |
| `app/Listeners/` | `make:listener --event=...` | `*Listener` | Bereaksi terhadap event dari `app/Events/`. Logic berat didelegasikan ke Service atau Action, tidak ditulis langsung di listener. |
| `app/Exceptions/` | `make:exception` | `*Exception` | Exception domain, contoh `SiteNotFoundException`. Mapping ke response dilakukan di `bootstrap/app.php` (`withExceptions`). Laravel 11+ tidak menyediakan `Handler.php` secara default. |
| `app/View/Components/` | `make:view-component` | PascalCase, sesuai nama komponen | Class Blade component. Template Blade tetap di `resources/views/components/`. |
| `app/View/Composers/` | Manual | `*Composer` | Hanya dibuat jika view composer dipakai. Isinya logic data untuk view, bukan HTML. |
| `app/Exports/` | Manual, butuh paket `maatwebsite/excel` | `*Export` | Hanya mendefinisikan format dan sumber data file. Data diambil dari Service atau Repository, bukan query langsung di class Export. |

Catatan:
- `app/View/` **bukan** tempat template Blade. Template tetap di `resources/views/`.
- `app/Exports/` hanya dipakai jika paket `maatwebsite/excel` sudah ada di `composer.json`. Jika belum, jangan menambah paket tanpa persetujuan user.
- Aturan di atas disusun dari pengetahuan umum Laravel 11 ke atas. Belum diverifikasi ke dokumentasi Laravel 13. Jika ada perbedaan perilaku di versi 13, ikuti dokumentasi resmi.

## 2B. Config Per Fitur (`config/{nama-fitur}.php`)

Project ini sudah punya beberapa file config khusus fitur, bukan config bawaan Laravel: `config/rate-limit.php`, `config/idempotency.php`, `config/db-transaction.php`, `config/queue-uniqueness.php`, `config/masterdata.php`.

Buat `config/{nama-fitur}.php` baru kalau nilainya:
- Dipakai lebih dari satu class/layer (misal controller API **dan** controller halaman Blade butuh angka yang sama — contoh: `page_size` di `config/masterdata.php` dipakai `CountryController` API maupun `CountryController` halaman supaya pagination API dan tampilan Blade selalu sinkron).
- Perlu diubah lewat `.env` tanpa deploy ulang kode (limit, ukuran chunk, retensi, dsb).
- Bukan rahasia/kredensial (itu cukup `env()` langsung di tempat dipakai atau `config/services.php`).

Jangan buat config file baru untuk nilai yang hanya dipakai di satu tempat dan tidak perlu di-tune lewat env — taruh sebagai konstanta/default parameter di class itu saja (hindari config file kosong/premature).

Konvensi isi file:
- Key env mengikuti pola `{NAMA_FITUR}_{NAMA_NILAI}`, contoh `MASTERDATA_COUNTRY_PAGE_SIZE`, `RATE_LIMIT_API_WRITE_MAX`.
- Setiap key wajib ada default value di `env('KEY', default)`, bukan `env('KEY')` tanpa fallback.
- Tambahkan entri env baru ke `.env.example` di saat yang sama dengan menambah config file (jangan biarkan `.env.example` tertinggal).
- Dokumentasikan tujuan tiap key lewat comment block di atas array, seperti pola di `config/rate-limit.php`.

## 3. Aturan Khusus Repository: Jangan Buat Lapisan Kosong

Repository di atas Eloquent sering jadi lapisan kosong tanpa nilai. **Jangan buat repository** kalau isinya hanya membungkus `Model::find()` atau `Model::create()`. Itu duplikasi tanpa manfaat. Cukup pakai Eloquent langsung di Service, Action, atau Controller.

Repository **baru layak dibuat** kalau ia menyembunyikan sesuatu yang nyata, misalnya:
- Scoping multi-tenant (contoh: `main_{siteId}` vs `site_{siteId}`)
- Batch upsert
- Query kompleks yang dipakai berulang di banyak tempat

Sebelum membuat file di `app/Repositories/`, tanyakan: "Apa yang disembunyikan class ini selain CRUD generik?" Jika jawabannya tidak ada, jangan buat repository. Taruh logikanya di `app/Services/` atau langsung di Eloquent model/query.

## 4. Cara Memutuskan Penempatan File Baru

1. Request dan validasi HTTP → `app/Http/Requests/`. Selalu, tanpa terkecuali (aturan wajib #1).
2. Logika bisnis dan orkestrasi use case yang melibatkan beberapa model atau transaksi → `app/Http/Services/`.
3. Satu use case spesifik dan terisolasi, bukan bagian dari service besar → `app/Actions/`.
4. Membawa data terstruktur antar layer (bukan array asosiatif) → `app/DTOs/`.
5. Query atau persistence yang menyembunyikan sesuatu yang nyata (lihat bagian 3) → `app/Repositories/` + interface di `app/Repositories/Contracts/`. Jika tidak, jangan buat.
6. Perilaku kecil yang dipakai ulang di banyak model atau class → `app/Traits/` atau `app/Concerns/`.
7. Kontrak untuk service eksternal (payment gateway, SSH, storage, dll) → `app/Contracts/`.
8. Utility murni tanpa dependensi framework → `app/Support/`.
9. Filter atau query builder kompleks untuk listing dan report → `app/Queries/` atau `app/Filters/`.
10. Transformasi data berurutan (step-by-step pipeline) → `app/Pipelines/`.
11. Email → `app/Mail/`. Dikirim dari Service, bukan dari controller.
12. Notifikasi ke user (selain email biasa) → `app/Notifications/`.
13. Reaksi terhadap event → `app/Listeners/`. Event dipicu dari Service, didefinisikan di `app/Events/`.
14. Exception domain → `app/Exceptions/`. Mapping ke HTTP response di `bootstrap/app.php`.
15. Blade component class → `app/View/Components/`. Template tetap di `resources/views/`.
16. Export Excel atau CSV → `app/Exports/`, jika paket tersedia.

Jika tidak ada kebutuhan khusus yang sesuai poin 2 sampai 16, jangan tambah layer. Tulis langsung di controller atau model sesuai konvensi Laravel standar. Jangan membuat abstraksi untuk kebutuhan yang belum ada (no premature abstraction).

## 6. Controller & View Halaman Dikelompokkan per Menu Sidebar

Berlaku untuk **controller halaman** (yang hanya me-return Blade view untuk ditampilkan di menu sidebar admin), **bukan** controller API. Dua jenis controller ini sengaja dipisah:

| Jenis | Lokasi | Contoh |
|---|---|---|
| Controller API (JSON:API, dipanggil dari JS) | `app/Http/Controllers/Api/V{versi}/{NamaGrupSidebar}/` — **dikelompokkan per sidebar** | `app/Http/Controllers/Api/V1/MasterData/OrganizationUnitController.php` |
| Controller halaman (render Blade, 1 per menu/submenu sidebar) | `app/Http/Controllers/{NamaGrupSidebar}/{Nama}Controller.php` | `app/Http/Controllers/MasterData/OrganizationUnitController.php` |

`{NamaGrupSidebar}` adalah nama grup menu sidebar dalam PascalCase (menu "Master Data" → folder `MasterData`), **bukan** literal kata "Sidebar". Satu controller halaman biasanya hanya punya method `index()` yang `return view(...)` — logic CRUD/data tetap lewat controller API yang dipanggil dari JavaScript di view tersebut, sesuai pemisahan di tabel atas.

View-nya ikut folder yang sama (slug kebab-case dari nama grup sidebar), di bawah folder admin yang berlaku di proyek ini (`resources/views/`):

```
resources/views/{slug-grup-sidebar}/{nama-halaman}.blade.php
```

Contoh lengkap satu menu "Master Data" dengan submenu "Organization Unit":

```
app/Http/Controllers/MasterData/OrganizationUnitController.php   -> return view('master-data.organization-units')
resources/views/master-data/organization-units.blade.php
```

Route tetap didaftarkan manual di `routes/web.php` (tidak otomatis dari struktur folder), memanggil controller halaman tersebut, bukan `Route::view(...)` langsung, begitu controller sudah dibuat:

```php
Route::group(['prefix' => 'master-data', 'as' => 'master-data.'], function () {
Route::get('/organization-units', [App\Http\Controllers\MasterData\OrganizationUnitController::class, 'index'])
    ->name('organization-units');
});
```

Catatan:
- Halaman demo template yang belum punya controller (hasil konversi `public/*.html`) boleh tetap pakai `Route::view(...)` langsung tanpa folder grup — aturan ini berlaku untuk halaman **fitur nyata** yang mulai dibangun, bukan retrofit massal ke seluruh halaman demo.
- Satu grup sidebar bisa menaungi beberapa controller/view kalau submenu-nya lebih dari satu (misal `MasterData/PositionController.php`, `MasterData/AccessLevelController.php` di masa depan untuk submenu Master Data lain).

## 7. Checklist Sebelum Membuat File Baru

- [ ] Kalau ini FormRequest atau validasi, sudah pasti di `app/Http/Requests/`
- [ ] Kalau ini Repository, sudah dipastikan menyembunyikan logika nyata (bukan CRUD generik)
- [ ] Kalau ini Mail, Notification, Listener, Exception, View Component, atau Export, sudah di folder yang sesuai bagian 2A
- [ ] Nama class mengikuti suffix di bagian 2A (`*Mail`, `*Notification`, `*Listener`, `*Exception`, `*Export`)
- [ ] Nama folder memakai nama persis dari tabel bagian 2 (konsistensi lintas fitur)
- [ ] Kalau ini controller halaman (bukan API), sudah dikelompokkan per grup sidebar sesuai bagian 6, dan view-nya ikut folder yang sama
- [ ] Kalau butuh config file baru, sudah sesuai kriteria bagian 2B dan key env-nya ditambahkan ke `.env.example`
- [ ] Tidak menambah layer yang tidak diminta atau tidak dibutuhkan use case saat ini