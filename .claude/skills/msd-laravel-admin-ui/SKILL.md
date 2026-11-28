---
name: msd-laravel-admin-ui
description: Konvensi UI halaman admin Blade di proyek ini — icon FontAwesome per jenis aksi (simpan/update/edit/aktifkan/nonaktifkan/batal), toast notification pakai toastr, dan pola tabel AJAX (search server-side dengan debounce, pagination, CRUD lewat JSON:API). Gunakan SETIAP KALI membuat atau mengubah halaman Blade admin (form + tabel CRUD), menambah tombol aksi baru, atau saat user menyebut "icon", "toast", "notifikasi", "search", "pagination" di konteks halaman admin, walaupun tidak menyebut nama skill ini secara eksplisit. Referensi sumber icon dan notifikasi ada di `public/icons_*.html` dan `public/notification.html`.
---

# MSD Laravel Admin UI Convention

Skill ini mengatur **tampilan dan interaksi JS** halaman admin Blade (bukan backend API — untuk itu lihat [[msd-laravel-jsonapi]]). Contoh acuan lengkap: `resources/views/master-data/countries.blade.php`.

Bahasa: ikuti bahasa user dalam komunikasi. Label tombol dan pesan toast memakai Bahasa Indonesia (konsisten dengan halaman yang sudah ada), kecuali user eksplisit minta Inggris.

## 1. Sumber Icon

Proyek ini memakai **FontAwesome** sebagai satu-satunya icon set untuk tombol aksi dan header tabel pada halaman CRUD (jangan campur dengan Bootstrap Icons atau Material Icons di tempat yang sama — pilih satu set per konteks, konsisten dengan icon yang sudah dipakai template ini). Referensi lengkap daftar icon: `public/icons_fontawesome.html` (cari dengan `grep -i "icon-name>{keyword}"` untuk pastikan class-nya benar ada sebelum dipakai).

Untuk **sidebar menu** (bukan tombol form/tabel), icon memakai set **Pe-7s** (`pe-7s-*`, lihat `public/icons_pe.html`) atau **Linecons** (`ti-*`/`lnr-*`, lihat `public/icons_line.html`) — sesuai yang sudah dipakai di `headerIcon` tiap halaman (`resources/views/layouts/admin.blade.php` memakai prop ini). Jangan pakai FontAwesome untuk icon sidebar menu.

### 1.1 Mapping Icon per Aksi (WAJIB konsisten lintas halaman master data)

| Aksi | Icon class | Konteks |
|---|---|---|
| Simpan (create, submit baru) | `fa fa-floppy-o` | Tombol submit form saat mode tambah |
| Update (submit, mode edit) | `fa fa-check` | Tombol submit form saat mode edit |
| Batal edit | `fa fa-times` | Tombol batal yang mengembalikan form ke mode tambah |
| Edit (baris tabel) | `fa fa-edit` | Tombol aksi per-row untuk masuk mode edit |
| Aktifkan | `fa fa-check-circle` | Tombol aksi per-row, hanya tampil saat status nonaktif |
| Nonaktifkan | `fa fa-ban` | Tombol aksi per-row, hanya tampil saat status aktif |
| Tambah (judul card form, mode tambah) | `fa fa-plus-circle` | Heading `<h4>` card form |
| Cari (input search) | `fa fa-search` | `input-group-addon` di depan input search |

Tambahan icon kontekstual untuk header kolom tabel (boleh disesuaikan nama kolom, prinsip sama): ID → `fa-hashtag`, nama entitas → sesuai makna domain (misal `fa-globe` untuk negara, `fa-building` untuk organisasi), kode → `fa-tag`, status aktif/nonaktif → `fa-toggle-on`, kolom aksi → `fa-cogs`.

**Jangan tambah mapping aksi baru tanpa mengecek tabel ini dulu** — kalau aksi baru butuh icon yang belum ada di tabel, tambahkan ke tabel ini juga (update skill), supaya tetap jadi satu sumber kebenaran lintas Country/Province/City/Outlet/OrganizationUnit.

Semua perubahan teks tombol lewat JS (`resetForm()`, `editRow()`, render baris) **wajib pakai `.html()`**, bukan `.text()` — karena `.text()` menghapus elemen `<i>` icon yang sudah ditulis di HTML awal. Lihat pola di `countries.blade.php` (`$('#md-submit').html('<i class="fa fa-floppy-o m-r-5"></i>Simpan')`).

## 2. Toast Notification (toastr)

Asset sudah tersedia di `public/assets/plugins/toastr/` (`toastr.css`, `toastr.min.js`) — **belum** dimuat global di `layouts/admin.blade.php`, jadi setiap halaman yang memakainya WAJIB push sendiri:

```blade
@push('css')
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        (function ($) {
            'use strict';

            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 3000,
            };
            // ... sisa logic halaman
        })(jQuery);
    </script>
@endpush
```

`toastr.options` di atas WAJIB sama di semua halaman admin (posisi, durasi, closeButton, progressBar) — supaya pengalaman notifikasi konsisten. Kalau butuh beda (misal durasi lebih lama untuk pesan panjang), tanyakan ke user dulu sebelum menyimpang.

### 2.1 Kapan Toast Dipakai

| Kejadian | Jenis toast | Pesan contoh |
|---|---|---|
| Create sukses | `toastr.success` | `'{Entitas} berhasil disimpan.'` |
| Update sukses | `toastr.success` | `'{Entitas} berhasil diupdate.'` |
| Activate sukses | `toastr.success` | `'{Entitas} berhasil diaktifkan.'` |
| Deactivate sukses | `toastr.success` | `'{Entitas} berhasil dinonaktifkan.'` |
| Gagal load tabel (index gagal) | `toastr.error` | `'Gagal memuat data {entitas}.'` |
| Gagal toggle status | `toastr.error` | `'Gagal mengubah status {entitas}.'` |
| Gagal simpan/update (validasi atau error lain) | `toastr.error` | Pesan dari `errors[].detail`/`.title` JSON:API, sama dengan yang ditulis ke alert inline form |

**Toast TIDAK menggantikan** alert inline di form (`#md-form-alert` / elemen sejenis) untuk error validasi — keduanya tetap ditampilkan bersamaan. Alert inline memberi detail per-field yang tetap terlihat sampai user memperbaiki form; toast memberi notifikasi sekilas yang hilang otomatis. Jangan hapus salah satu untuk menggantikan yang lain.

## 3. Pola Tabel AJAX (Search, Pagination, CRUD)

Pola baku di `countries.blade.php`, dipakai ulang untuk tabel master data lain:

- **State object** (`var state = { page: 1, totalPages: 1, editingId: null, search: '' }`) menyimpan kondisi tabel saat ini — jangan baca dari DOM untuk state ini.
- **Search server-side, bukan client-side**: input search (`#md-filter`) di-debounce (300ms via `setTimeout`/`clearTimeout`) lalu memanggil ulang endpoint index dengan `filter[search]=...` (lihat [[msd-laravel-jsonapi]] bagian 5 untuk kontrak backend-nya). **Jangan** pakai filter client-side plugin tabel (misal `data-filter` footable) untuk data yang di-paginate server — itu hanya menyaring baris yang sudah termuat di halaman saat ini, bukan keseluruhan dataset.
- **`PAGE_SIZE` di JS wajib berasal dari config**, bukan angka literal — controller halaman (bukan API) pass `pageSize` dari `config('masterdata.page_size.{resource}')` (lihat [[msd-laravel-folder]] bagian 2B) ke view, lalu view render `var PAGE_SIZE = {{ (int) $pageSize }};`. Ini memastikan ukuran halaman di tampilan Blade sama persis dengan default API.
- **`apiRequest()` wrapper**: satu fungsi helper yang set header `Content-Type`/`Accept` ke `application/vnd.api+json` dan `X-CSRF-TOKEN`, mengembalikan `{ ok, data }` atau `{ ok: false, status, data }` lewat `.then()` ganda (resolve pada sukses maupun gagal) — supaya pemanggil tidak perlu `.catch()` berulang.
- **Render ulang penuh** (`renderRows()`, `renderPagination()`) setiap kali data berubah — jangan patch DOM parsial untuk tabel sederhana ini (kompleksitas tidak sepadan untuk ukuran data master).

## 4. Checklist Sebelum Menyatakan Halaman Admin Selesai

- [ ] Icon tombol/header sesuai mapping bagian 1.1 — kalau ada aksi baru, tabel mapping sudah diupdate juga
- [ ] Semua `.text()` yang berpotensi menghapus icon diganti `.html()`
- [ ] Icon class sudah diverifikasi ada di `public/icons_fontawesome.html` (atau `icons_pe.html`/`icons_line.html` untuk sidebar) sebelum dipakai — jangan menebak nama class
- [ ] Toastr CSS+JS di-push, `toastr.options` sama dengan bagian 2
- [ ] Toast dipasang untuk minimal: create, update, activate, deactivate, error index, error toggle (bagian 2.1)
- [ ] Search tabel memanggil `filter[search]` ke server (debounce 300ms), tidak memakai filter client-side plugin tabel
- [ ] `PAGE_SIZE` di JS berasal dari `{{ (int) $pageSize }}` yang dioper controller halaman dari config, sama dengan default API
- [ ] Alert inline form tetap ada untuk error validasi, toast melengkapi bukan menggantikan

## 5. Kapan Harus Bertanya ke User

- Icon aksi baru yang belum ada di tabel mapping 1.1 dan tidak jelas analoginya ke aksi yang sudah ada.
- Perlu menyimpang dari `toastr.options` standar (durasi, posisi).
- Entitas baru butuh pola tabel yang beda signifikan dari CRUD sederhana (misal nested/tree seperti OrganizationUnit) — konfirmasi dulu sebelum memaksakan pola flat ini.
