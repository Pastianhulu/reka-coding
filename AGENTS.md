# AGENTS.md — rekac-dev (Laravel 11)

## Commands

**Frontend**
- `npm run dev` — Vite dev server
- `npm run build` — production build

**Backend**
- `php artisan serve` — dev server
- `php artisan migrate` — run migrations
- `php artisan migrate:fresh --seed` — reset DB + seed
- `php artisan test` — PHPUnit (Unit + Feature suites)
- `vendor/bin/pint` — format code (Laravel Pint, default Laravel preset; no `pint.json`)

**Cache**
- `/rekac` (web route) — clears config/cache/view/route + re-runs `config:cache`. Primary way to reset caches in this app.
- `php artisan optimize:clear` — same effect from CLI

## Stack

- Laravel 11, PHP 8.2+, SQLite (`database/database.sqlite`)
- Frontend: Vite + laravel-vite-plugin, **Bootstrap 5 + Sass**. Vite inputs are `resources/sass/app.scss` and `resources/js/app.js` (note: SCSS, not CSS).
- Auth scaffolding from `laravel/ui` (`Auth::routes()`, `HomeController`), plus `spatie/laravel-permission` (permission tables migration is dated `2026_10_19`).
- `laravel/tinker` available.

## Routing / App shape

- `routes/web.php` is **Laravel 7 style**: everything is wrapped in `Route::group(['namespace' => 'App\Http\Controllers'], ...)` so string controllers (`'Dashboard\Dashboard@index'`) resolve — Laravel 11 has no default controller namespace.
- Public site pages render Blade views under `resources/views/public/*` (home, produk, blog, layanan, faq, contact, produk-detail) via inline closures — no controllers for these.
- Auth routes from `Auth::routes()`; `/home` -> `HomeController@index`.
- Route names are only set where actually used (`admin.dashboard`, `member.dashboard`); `Auth::routes()` registers login/logout/register/password.* names.
- Controllers: **no `Admin` namespace/folder**. Admin-side modules use one folder per module, class name = module name (no `Controller` suffix): `Dashboard\Dashboard`, `Produk\Produk`, `Blog\Blog`, `Pesanan\Pesanan`, `Membership\Membership`, `User\User`, `Role\Role`, `HakAkses\HakAkses`. Master data: top-level `Master\<Entity>Controller`. Member area: `Member\*` (keeps `Controller` suffix).
- `public/backend/**` holds vendored admin-template assets (plugins like daterangepicker, mapael). Do not treat as source to build.

## Conventions — master data

- Controllers: `App\Http\Controllers\Master\<Entity>Controller`; views: `resources/views/admin/master/<entity>/index.blade.php`.
- Models: `App\Models\Master\<Entity>` with `protected $table = 'm_<entity>'` (e.g. `m_kategori`). Master CRUD uses Eloquent models; produk/others often use query builder.
- **No master migrations/tables yet** — do not create DB tables until explicitly asked.

## Testing

- `phpunit.xml` defines Unit + Feature suites; base class `tests/TestCase.php`.
- Default test env uses `CACHE_STORE=array`, `QUEUE_CONNECTION=sync`, `SESSION_DRIVER=array`, `MAIL_MAILER=array`.
- SQLite `:memory:` for DB is **commented out** in `phpunit.xml`; tests run against the real SQLite file unless you uncomment/fix those lines.

## Gotchas

- Vite input is `resources/sass/app.scss` — an agent assuming `resources/css/app.css` will be wrong.
- `APP_KEY` already set in `.env`; no `key:generate` needed.
- `.env.example` uses `database` drivers for session/cache/queue (tables exist via migrations), not file/redis.
