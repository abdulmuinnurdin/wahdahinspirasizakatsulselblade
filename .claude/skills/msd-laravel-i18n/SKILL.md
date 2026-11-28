---
name: msd-laravel-i18n
description: Standar multi-bahasa (i18n) untuk tampilan Blade di proyek ini — resources/lang/id sebagai bahasa utama/default dan resources/lang/en sebagai bahasa kedua, preferensi bahasa disimpan di kolom users.language, dimuat otomatis lewat event Login saat login berhasil, dan language switcher yang menyimpan pilihan ke session + user. Gunakan SETIAP KALI membuat atau mengubah halaman Blade (view, layout, partial, component), menambah teks/label/pesan/placeholder baru yang tampil ke user, membuat FormRequest dengan custom message/attributes, atau saat user menyebut "multi bahasa", "i18n", "translasi", "language switcher", "bahasa indonesia", walaupun tidak menyebut nama skill ini secara eksplisit. TIDAK berlaku untuk response API (JSON:API) — itu tetap ikut msd-laravel-jsonapi, bahasa Inggris/kode statis seperti existing.
---

# MSD Laravel I18n (Multi-Bahasa) Standard

Skill ini mengatur multi-bahasa untuk **tampilan Blade** (admin panel & halaman publik) di proyek ini: struktur `resources/lang`, cara load locale per user, dan language switcher. Scope-nya **hanya web/Blade** — response API (JSON:API lewat `msd-laravel-jsonapi`) tidak disentuh skill ini dan tetap seperti sekarang.

Bahasa: ikuti bahasa user dalam komunikasi. Nama variable/method/kolom tetap bahasa Inggris sesuai konvensi existing di proyek.

## 1. Bahasa yang Didukung & Default

- `id` (Bahasa Indonesia) = bahasa **utama/default**, juga jadi `fallback_locale`.
- `en` (English) = bahasa kedua.
- `config/app.php`:
  ```php
  'locale' => env('APP_LOCALE', 'id'),
  'fallback_locale' => env('APP_FALLBACK_LOCALE', 'id'),
  ```
- Daftar bahasa yang diizinkan **wajib dari config**, bukan hardcode di controller/middleware (konsisten dengan pola hindari-hardcode di `msd-laravel-rate-limiting`). Tambah `config/locale.php`:
  ```php
  <?php

  return [
      'default' => 'id',

      'available' => [
          'id' => ['native' => 'Bahasa Indonesia'],
          'en' => ['native' => 'English'],
      ],
  ];
  ```
  Menambah bahasa baru di masa depan = tambah satu entry di `available` + satu folder `resources/lang/{locale}/`. Tidak ada tempat lain yang perlu diubah untuk daftar bahasa.

## 2. Struktur `resources/lang`

Format **PHP array per-domain**, bukan satu file JSON raksasa (lebih mudah di-diff per modul dan konsisten dengan gaya config lain di proyek ini):

```
resources/lang/
  id/
    common.php        # tombol/label lintas modul: simpan, batal, hapus, aktif, nonaktif, ...
    auth.php           # halaman login/register/forgot-password
    validation.php      # override pesan validasi Laravel ke Indonesia
    master-data.php     # dikelompokkan per sub-array: countries, provinces, cities, outlets, organization-units
  en/
    common.php
    auth.php
    validation.php
    master-data.php
```

Aturan wajib:
- Key di `id/*.php` dan `en/*.php` harus **1:1 sama** — tidak boleh ada key yang ada di satu bahasa tapi hilang di bahasa lain. Kalau belum ada terjemahan final, isi dulu dengan padanan Inggris apa adanya, jangan dibiarkan kosong/missing key.
- Setiap modul/menu baru (lihat `msd-laravel-folder` bagian 6 — controller halaman dikelompokkan per menu sidebar) **wajib** punya file lang baru dengan nama yang sama di kedua bahasa, contoh: menu baru `outlets` → key-nya masuk ke sub-array `master-data.php` (`'outlets' => [...]`) atau file sendiri `outlets.php` kalau sudah besar.

## 3. Wajib Pakai Helper Translasi — Tidak Ada Hardcode Teks di Blade

Semua teks yang tampil ke user (heading, label, button, placeholder, empty-state, pesan flash/toast sesuai `msd-laravel-admin-ui`) **wajib** pakai `__('file.key')` atau `@lang('file.key')`. Tidak ada string literal bahasa manusia langsung di `.blade.php`.

```blade
{{-- Salah --}}
<h1>Daftar Negara</h1>
<button>Simpan</button>

{{-- Benar --}}
<h1>{{ __('master-data.countries.title') }}</h1>
<button>{{ __('common.save') }}</button>
```

FormRequest juga ikut: custom `messages()` dan `attributes()` wajib pakai `__()` supaya ikut locale aktif, bukan string literal.

```php
public function attributes(): array
{
    return [
        'name' => __('master-data.countries.fields.name'),
    ];
}
```

## 4. Kolom Preferensi Bahasa di `users`

- Migration baru menambah kolom `language` di tabel `users`: `string('language', 5)->default('id')`. **Tidak nullable** — default `'id'` sudah cukup, supaya tidak perlu null-check berulang di tempat lain.
- `App\Models\User`: tambah `language` ke `$fillable`.
- Validitas nilai kolom ini (harus salah satu key di `config('locale.available')`) divalidasi di FormRequest switcher (bagian 7), **bukan** di model.

## 5. Middleware `SetLocale` — Resolve Locale Setiap Request

- File: `app/Http/Middleware/SetLocale.php`.
- Didaftarkan di `bootstrap/app.php` lewat `$middleware->web(append: [...])` — **bukan** `$middleware->append()` global, karena grup `api` tidak ikut skill ini (lihat `$middleware->statefulApi()` dan `AssignTraceId` yang sudah global di file itu sekarang).
- Urutan resolve locale per request:
  1. User login → `App::setLocale($user->language)`.
  2. Guest → `App::setLocale(session('locale', config('locale.default')))`.
- Middleware ini hanya **membaca & menerapkan** locale yang sudah tersimpan di session/user; yang **menulis** session saat login adalah listener di bagian 6, dan yang menulis saat user ganti pilihan adalah switcher di bagian 7.

## 6. Load Locale Saat Login Berhasil — Event Listener, Bukan di Controller

Jangan taruh logic set-locale langsung di `LoginController`. Pakai Listener pada event bawaan `Illuminate\Auth\Events\Login` (otomatis di-dispatch oleh `Auth::attempt()`/`Auth::login()`, termasuk alur "remember me"), sesuai konvensi `app/Listeners` di `msd-laravel-folder`.

```php
// app/Listeners/SetUserLocaleOnLogin.php
class SetUserLocaleOnLogin
{
    public function handle(Login $event): void
    {
        $locale = $event->user->language ?? config('locale.default');

        Session::put('locale', $locale);
        App::setLocale($locale);
    }
}
```

Laravel 13 auto-discovery mendaftarkan listener ini otomatis dari tipe parameter `handle(Login $event)` — cek `AppServiceProvider`/`EventServiceProvider` existing sebelum menambah registrasi manual.

## 7. Language Switcher — User Pilih Bahasa

- Controller: `app/Http/Controllers/LocaleController.php`. Ini **bukan** controller "halaman per menu sidebar" (beda dari konvensi `MasterData\*Controller` di `msd-laravel-folder` bagian 6), jadi tidak perlu folder per-menu — taruh langsung di `app/Http/Controllers/`.
- Route: `POST /locale/{locale}` (web, ikut CSRF default), handler `LocaleController@switch`.
- Validasi `$locale` harus ada di `config('locale.available')`. Kalau tidak valid → `abort(422)` atau redirect back dengan error flash, **jangan silent fallback** ke default.
- Efek switch:
  - Simpan `session(['locale' => $locale])` → langsung berlaku di request yang sama tanpa reload dobel.
  - Kalau user login: update `users.language` juga lewat Service (`app/Http/Services/`, sesuai `msd-laravel-folder`), bukan query langsung di controller — supaya persist ke sesi berikutnya/device lain.
  - Kalau guest: hanya session (tidak ada user untuk disimpan).
- `return back();` setelah switch supaya halaman re-render dengan bahasa baru.

## 8. Testing

Sesuai `msd-laravel-testing`, Feature test wajib cover:
- Switch locale sebagai guest → `session('locale')` berubah, response berikutnya pakai teks bahasa baru.
- Switch locale sebagai user login → kolom `users.language` ikut ter-update di DB.
- Login dengan user yang `language = 'en'` → locale aktif langsung `'en'` tanpa switch manual (test lewat assert teks di halaman setelah login, bukan hanya assert kolom DB).
- Switch ke locale yang tidak ada di `config('locale.available')` → ditolak (422/redirect dengan error), bukan fallback diam-diam.

## 9. Checklist Setiap Fitur Blade Baru

- [ ] Semua teks baru pakai `__()`/`@lang()`, tidak ada hardcode string di `.blade.php`.
- [ ] Key translasi ditambahkan di `resources/lang/id/*.php` **dan** `resources/lang/en/*.php`, 1:1 sama.
- [ ] Kalau ada validasi custom, pesan & attribute-nya di-override di `validation.php` kedua bahasa.
- [ ] Tidak menyentuh response/error API — itu luar scope skill ini.
