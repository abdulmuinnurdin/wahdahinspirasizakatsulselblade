---
name: "laravel-jsonapi"
description: "Format response API Laravel sesuai spec JSON:API (jsonapi.org): resource objects, relationships, errors, pagination, query params, dan status code. Pakai saat membuat atau mengubah endpoint JSON."
---

# Laravel JSON:API

Skill ini memastikan setiap output API Laravel mengikuti spesifikasi JSON:API (https://jsonapi.org/format/). Target: spec v1.1.

## Cara kerja

- Tulis asumsi secara eksplisit. Jangan mengarang nama class, kolom, route, atau middleware yang belum ditunjukkan user. Jika belum ada, tanyakan atau tandai sebagai `ASUMSI:`.
- Untuk file besar, tampilkan hanya bagian yang berubah: nama file + method/class yang diubah.
- Debugging: akar masalah → bukti → perbaikan → risiko → cara verifikasi.
- Jika pendekatan user berisiko terhadap spec (mis. breaking change), sebutkan sebelum mengimplementasi.
- Ubah endpoint yang sudah dipakai client = breaking change. Tanyakan apakah perlu versioning atau dual-format.

## 1. Header wajib

- Response: `Content-Type: application/vnd.api+json`
- Request dengan body (POST/PATCH): wajib `Content-Type: application/vnd.api+json`. Jika tidak, balas `415 Unsupported Media Type`.
- Accept dengan media type parameter selain `ext`/`profile` → `406 Not Acceptable`.

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class EnforceJsonApi
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->getContent() !== ''
            && ! str_starts_with((string) $request->header('Content-Type'), 'application/vnd.api+json')) {
            return response()->json(['errors' => [[
                'status' => '415',
                'title' => 'Unsupported Media Type',
                'detail' => 'Gunakan Content-Type: application/vnd.api+json.',
            ]]], 415, ['Content-Type' => 'application/vnd.api+json']);
        }

        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $response->headers->set('Content-Type', 'application/vnd.api+json');
        }

        return $response;
    }
}
```

Daftarkan di group `api` (Laravel 11+ di `bootstrap/app.php` melalui `$middleware`).

## 2. Top-level document

Setiap dokumen HARUS memiliki minimal satu dari `data`, `errors`, atau `meta`. Dokumen tidak boleh memiliki `data` dan `errors` bersamaan.

- `data`: resource object, array resource object, atau `null` (untuk to-one kosong).
- `errors`: array error object.
- `meta`: informasi non-standar (mis. `total`).
- `links`: `self`, `first`, `last`, `prev`, `next`, `related`.
- `included`: array resource object terkait (hanya jika `include` diminta).
- `jsonapi`: `{"version": "1.1"}` (opsional, tapi disarankan).

## 3. Resource object

Aturan:
- `type` dan `id` wajib. `id` SELALU string.
- `attributes` TIDAK boleh berisi key `id`, `type`, `relationships`, `links`, atau `meta`.
- Nama member: konsisten di seluruh project. Spec merekomendasikan kebab-case (mis. `published-at`). Catat konvensi yang dipakai di project.
- Kosong harus berbentuk objek `{}`, bukan array `[]`. Gunakan `(object)` untuk attributes, relationships, dan links kosong.

### Base resource

```php
<?php

namespace App\Http\Resources\JsonApi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class JsonApiResource extends JsonResource
{
    /** Nama type: plural, konsisten dengan segmen URL (mis. "articles"). */
    abstract protected function type(): string;

    /** @return array<string, mixed> */
    abstract protected function attributes(Request $request): array;

    /** @return array<string, array<string, mixed>> */
    protected function relationships(Request $request): array
    {
        return [];
    }

    public function toArray(Request $request): array
    {
        $requested = $this->requestedFields($request);

        $attributes = $this->attributes($request);
        $relationships = $this->relationships($request);

        if ($requested !== null) {
            $attributes = array_intersect_key($attributes, array_flip($requested));
            $relationships = array_intersect_key($relationships, array_flip($requested));
        }

        return [
            'type' => $this->type(),
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => (object) $attributes,
            'relationships' => (object) $relationships,
            'links' => (object) ['self' => url('/api/'.$this->type().'/'.$this->resource->getRouteKey())],
        ];
    }

    /** Sparse fieldsets: fields[type]=a,b */
    protected function requestedFields(Request $request): ?array
    {
        $raw = $request->input('fields.'.$this->type());

        return is_string($raw) && $raw !== '' ? explode(',', $raw) : null;
    }

    protected function includeRequested(Request $request, string $relation): bool
    {
        return in_array($relation, explode(',', (string) $request->input('include')), true);
    }
}
```

Catatan:
- Self link di atas mengasumsikan prefix `/api`. Sesuaikan jika berbeda.
- Untuk multi-tenant, URL self harus memakai konteks tenant/site yang benar.

### Contoh resource

```php
final class ArticleResource extends JsonApiResource
{
    protected function type(): string
    {
        return 'articles';
    }

    protected function attributes(Request $request): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'published-at' => $this->published_at?->toIso8601String(),
        ];
    }

    protected function relationships(Request $request): array
    {
        $relationships = [
            'author' => [
                'links' => ['related' => url("/api/articles/{$this->id}/author")],
                // Linkage dari foreign key: tanpa query, tanpa N+1.
                'data' => $this->author_id ? ['type' => 'users', 'id' => (string) $this->author_id] : null,
            ],
        ];

        if ($this->includeRequested($request, 'author') && $this->resource->relationLoaded('author')) {
            app(IncludeRegistry::class)->add((new UserResource($this->author))->resolve($request));
        }

        return $relationships;
    }
}
```

Aturan relationship:
- Relationship object minimal memiliki `links`, `data`, atau `meta`.
- `data` untuk to-one: resource identifier `{type, id}` atau `null`. Untuk to-many: array identifier.
- Gunakan FK (`author_id`) untuk linkage, bukan memuat relasi. Hindari `$this->author->id` yang memicu lazy loading.

## 4. Compound document (`included`)

Aturan:
- Hanya sertakan relasi yang ada di whitelist dan diminta di `include`.
- Setiap kombinasi `type` + `id` hanya boleh muncul sekali di `included`, dan tidak boleh duplikat dengan `data`.
- Controller eager load relasi yang diminta, bukan semua relasi.

```php
final class IncludeRegistry
{
    /** @var array<string, array<string, mixed>> */
    private array $items = [];

    /** @param array<string, mixed> $resource */
    public function add(array $resource): void
    {
        $this->items[$resource['type'].':'.$resource['id']] ??= $resource;
    }

    /** @return list<array<string, mixed>> */
    public function all(): array
    {
        return array_values($this->items);
    }
}
```

Daftarkan di `AppServiceProvider::register()` dengan `$this->app->scoped(IncludeRegistry::class);`. Gunakan `scoped`, bukan `singleton`, agar state tidak bocor antar request di Octane/Swoole.

Tambahkan di base resource:

```php
public function with(Request $request): array
{
    $included = app(IncludeRegistry::class)->all();

    return $included ? ['included' => $included] : [];
}
```

Verifikasi urutan: `included` harus terisi setelah `toArray()` berjalan. Pastikan ada test untuk ini.

## 5. Query parameters

| Param | Bentuk | Aturan |
|---|---|---|
| include | `include=author,comments` | Whitelist. Eager load di controller. |
| fields | `fields[articles]=title,body` | Sparse fieldset, sudah ditangani base resource. |
| sort | `sort=-created_at,title` | Whitelist kolom. Jangan pernah pass input mentah ke `orderBy`. |
| filter | `filter[status]=published` | Whitelist filter. Validasi nilainya. |
| page | `page[number]=2&page[size]=20` | Lihat catatan di bawah. |

Spec meminta server menolak parameter yang tidak dikenali dengan `400 Bad Request`. Implementasi di FormRequest atau middleware.

### Sorting dan filter

```php
private function applySort(Builder $query, Request $request, array $allowed): void
{
    foreach (array_filter(explode(',', (string) $request->input('sort'))) as $field) {
        $column = ltrim($field, '-');

        abort_unless(in_array($column, $allowed, true), 400, "Sort '{$column}' tidak didukung.");

        $query->orderBy($column, str_starts_with($field, '-') ? 'desc' : 'asc');
    }
}
```

### Pagination: PERINGATAN KONFLIK

Laravel `paginate()` membaca query `page` sebagai integer. Format JSON:API `page[number]` menghasilkan array, sehingga bisa rusak jika dibiarkan default. Solusi: baca `page.number` dan `page.size` secara eksplisit, lalu pass ke `paginate()`.

```php
$size = min($request->integer('page.size', 15), 100);
$page = max($request->integer('page.number', 1), 1);

$paginator = $query->paginate($size, ['*'], 'page', $page);
```

Bangun link secara manual, karena `$paginator->url()` menghasilkan `?page=N`, bukan `page[number]=N`:

```php
private function paginationLinks(LengthAwarePaginator $paginator, Request $request): array
{
    $url = fn (int $page) => $request->fullUrlWithQuery([
        'page' => ['number' => $page, 'size' => $paginator->perPage()],
    ]);

    return [
        'first' => $url(1),
        'last' => $url($paginator->lastPage()),
        'prev' => $paginator->currentPage() > 1 ? $url($paginator->currentPage() - 1) : null,
        'next' => $paginator->hasMorePages() ? $url($paginator->currentPage() + 1) : null,
    ];
}
```

Untuk tabel besar, pertimbangkan `cursorPaginate()`. Gunakan `nextPageUrl()` dan `previousPageUrl()` untuk link, dengan parameter `page[cursor]`.

### Controller collection

```php
public function index(ListArticlesRequest $request): AnonymousResourceCollection
{
    $query = Article::query()
        ->with($this->eagerLoadsFor($request)); // hanya relasi yang di-whitelist dan diminta

    $this->applySort($query, $request, ['title', 'created_at', 'published-at']);

    $size = min($request->integer('page.size', 15), 100);
    $page = max($request->integer('page.number', 1), 1);
    $paginator = $query->paginate($size, ['*'], 'page', $page);

    return ArticleResource::collection($paginator)->additional([
        'links' => $this->paginationLinks($paginator, $request),
        'meta' => ['total' => $paginator->total()],
    ]);
}
```

`ASUMSI:` kolom `published-at` di atas adalah nama API, bukan nama kolom DB. Mapping ke kolom DB harus eksplisit. Jangan biarkan nama API langsung dipakai sebagai nama kolom.

## 6. Create, update, delete, dan relationship endpoint

### FormRequest untuk JSON:API

```php
abstract class JsonApiFormRequest extends FormRequest
{
    abstract protected function resourceType(): string;

    /** Rules ditulis terhadap attributes saja, misal 'title' bukan 'data.attributes.title'. */
    protected function validationData(): array
    {
        return $this->input('data.attributes', []);
    }

    protected function prepareForValidation(): void
    {
        // Type mismatch = 409 Conflict menurut spec.
        if ($this->input('data.type') !== $this->resourceType()) {
            throw new ConflictHttpException("Type harus '{$this->resourceType()}'.");
        }
    }
}
```

FormRequest tipis: validasi saja, tanpa logic bisnis.

```php
final class StoreArticleRequest extends JsonApiFormRequest
{
    protected function resourceType(): string
    {
        return 'articles';
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ];
    }
}
```

`PATCH`: cek juga `data.id` sama dengan id di URL. Jika tidak, balas `409 Conflict`.

### Controller

```php
// POST /articles -> 201 + Location + body resource
public function store(StoreArticleRequest $request): JsonResponse
{
    $article = Article::create($request->validated());

    return ArticleResource::make($article)
        ->response()
        ->setStatusCode(201)
        ->header('Location', route('articles.show', $article));
}

// PATCH /articles/{article} -> 200 + body resource
public function update(UpdateArticleRequest $request, Article $article): ArticleResource
{
    $article->update($request->validated());

    return ArticleResource::make($article);
}

// DELETE /articles/{article} -> 204, tanpa body
public function destroy(Article $article): Response
{
    $article->delete();

    return response()->noContent();
}
```

`ASUMSI:` route name `articles.show` ada. Route model binding `Article $article` harus di-scope per tenant/site.

### Relationship endpoints

Spec mendefinisikan dua endpoint per relasi:
- `GET /articles/{id}/relationships/author` → hanya resource identifier (`{data: {type, id}}`).
- `GET /articles/{id}/author` → dokumen resource lengkap (related resource).
- `PATCH /articles/{id}/relationships/author` → ubah linkage, balas `204`.

```php
public function showAuthorRelationship(Article $article): JsonResponse
{
    return response()->json([
        'data' => $article->author_id ? ['type' => 'users', 'id' => (string) $article->author_id] : null,
    ]);
}
```

## 7. Status code

| Kondisi | Status |
|---|---|
| GET sukses | 200 |
| POST membuat resource | 201 + header `Location` + body resource |
| POST tanpa body resource | 204 |
| PATCH sukses | 200 (body resource) atau 204 |
| DELETE sukses | 204, tanpa body |
| Request tidak valid (format) | 400 |
| Body tidak ada atau salah format | 400 atau 415 (lihat header) |
| Accept tidak didukung | 406 |
| Content-Type tidak didukung | 415 |
| Tidak terautentikasi | 401 |
| Tidak berhak | 403 |
| Resource tidak ada | 404 |
| Type/id mismatch, konflik state | 409 |
| Validasi gagal | 422 |
| Server error | 500 |

## 8. Errors

Setiap error object:
- `status` harus string (`"422"`, bukan `422`).
- `code`: string stabil, untuk logika client. Jangan ubah tanpa versioning.
- `title`: ringkas, sama untuk jenis error yang sama.
- `detail`: penjelasan spesifik.
- `source.pointer` untuk field di body, mis. `/data/attributes/title`.
- `source.parameter` untuk query param, mis. `sort`.
- `meta`: opsional. Di non-production boleh berisi info debug. Jangan bocorkan stack trace di production.

### Exception handler (Laravel 11+)

```php
// bootstrap/app.php
->withExceptions(function (Exceptions $exceptions): void {
    $exceptions->render(function (Throwable $e, Request $request) {
        if (! $request->is('api/*')) {
            return null; // biarkan default handler
        }

        return JsonApiErrorResponse::from($e);
    });
})
```

```php
final class JsonApiErrorResponse
{
    public static function from(Throwable $e): JsonResponse
    {
        if ($e instanceof ValidationException) {
            $errors = [];

            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $errors[] = [
                        'status' => '422',
                        'code' => 'validation_failed',
                        'title' => 'Invalid Attribute',
                        'detail' => $message,
                        'source' => ['pointer' => '/data/attributes/'.str_replace('.', '/', $field)],
                    ];
                }
            }

            return self::json(422, $errors);
        }

        $status = match (true) {
            $e instanceof HttpExceptionInterface => $e->getStatusCode(),
            $e instanceof ModelNotFoundException => 404,
            $e instanceof AuthorizationException => 403,
            $e instanceof AuthenticationException => 401,
            default => 500,
        };

        $error = [
            'status' => (string) $status,
            'code' => Str::snake(class_basename($e)),
            'title' => SymfonyResponse::$statusTexts[$status] ?? 'Error',
            'detail' => $status === 500 && app()->isProduction()
                ? 'Terjadi kesalahan pada server.'
                : $e->getMessage(),
        ];

        if (! app()->isProduction()) {
            $error['meta'] = ['exception' => $e::class];
        }

        return self::json($status, [$error]);
    }

    /** @param list<array<string, mixed>> $errors */
    private static function json(int $status, array $errors): JsonResponse
    {
        return response()->json(['errors' => $errors], $status, [
            'Content-Type' => 'application/vnd.api+json',
        ]);
    }
}
```

Catatan:
- `code` dari `class_basename` hanya contoh. Untuk kode yang stabil, gunakan mapping eksplisit per exception.
- Header `Content-Type` harus diset eksplisit di error response.

## 9. Standar project (wajib)

- Controller tipis: validasi di FormRequest, mapping di Resource, logic di Action/Service.
- Bebas N+1: eager load dengan whitelist, dan aktifkan `Model::preventLazyLoading(! app()->isProduction())` di `AppServiceProvider::boot()`.
- Tidak ada query di dalam loop atau di dalam Resource.
- Batasi `page.size` (mis. maksimum 100). Untuk data besar, gunakan `chunk`/`cursor` atau cursor pagination.
- Octane/Swoole-safe: jangan simpan state di property static atau singleton. Gunakan `scoped`.
- Multi-tenant: scope tenant/site di query builder dan route binding, bukan hanya di Resource. Jangan bocorkan id lintas tenant/site. Koneksi DB per site harus sudah di-set sebelum query.
- Cache key per-entity, mis. `articles:{tenant}:{id}`, bukan key global.
- Hindari race condition pada update: gunakan transaksi atau optimistic locking jika relevan.

## 10. Checklist verifikasi

Sebelum menyatakan selesai, pastikan:
- [ ] `Content-Type: application/vnd.api+json` ada di response.
- [ ] Dokumen top-level punya `data`, `errors`, atau `meta`, dan tidak punya `data` + `errors` bersamaan.
- [ ] `id` berupa string.
- [ ] `attributes` tidak berisi `id`, `type`, `relationships`, `links`, atau `meta`.
- [ ] Objek kosong ditulis `{}`, bukan `[]`.
- [ ] Error `status` berupa string, dan `source.pointer` mengarah ke field yang benar.
- [ ] `include`, `sort`, dan `filter` menggunakan whitelist.
- [ ] Tidak ada duplikat di `included`.
- [ ] POST → 201 + `Location`. DELETE → 204 tanpa body.
- [ ] Pagination tidak bentrok dengan `page` bawaan Laravel.
- [ ] Tidak ada N+1 (diverifikasi dengan `preventLazyLoading`).
- [ ] Ada test: `assertHeader('Content-Type', 'application/vnd.api+json')`, `assertJsonPath('data.type', ...)`, `assertJsonMissingPath('data.attributes.id')`, dan `assertJsonStructure` untuk bentuk dokumen.
- [ ] Endpoint yang sudah dipakai client tidak berubah tanpa catatan breaking change.

## Alternatif package

Jika project boleh menambah dependency, pertimbangkan package yang sudah mengimplementasi spec, seperti `laravel-json-api/laravel`. Tulis ke user sebagai pilihan, dan jelaskan trade-off-nya (kontrol vs. kecepatan implementasi) sebelum memutuskan. Jangan memasang package tanpa persetujuan user.