# AGENTS.md — rekac-dev (Laravel 11)

## Commands
- `php artisan serve` — dev server; `npm run dev` / `npm run build` — Vite (scaffolded but unused by current Blade pages, see Assets).
- `php artisan test` — PHPUnit 10 (Unit + Feature). Single test: `php artisan test --filter=ExampleTest`.
- `vendor/bin/pint` — formatter; default Laravel preset, no `pint.json`.
- `php artisan migrate` — normal migration path. **Do not run `migrate:fresh`** (see Database).
- `/rekac` (public route) and `php artisan optimize:clear` clear config/cache/view/route. `/rekac` calls `optimize:clear` last, so config is not left cached.

## Database
- Active DB is MySQL `dbrekac_dev`. `config/database.php` hardcodes the mysql connection (host `127.0.0.1`, port `3306`, database `dbrekac_dev`, user `root`, empty password), so `DB_HOST` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` in `.env` do not apply. `database/database.sqlite` exists but is unused.
- `phpunit.xml` leaves DB env commented out and the mysql config is hardcoded, so tests run against the real `dbrekac_dev` DB. Do **not** add `RefreshDatabase` / `DatabaseMigrations` without switching to a separate DB — it would wipe dev data.
- Migrations are behind the live schema: live `log_activity` has `subject/deskripsi/url/method`, but `2026_10_21_005319_create_log_activity_table.php` creates `activity`. `migrate:fresh` will not reproduce the running DB.
- No master (`m_*`) tables/migrations exist; `App\Models\Master\Kategori` points at a missing `m_kategori` table. Do not create master tables unless asked.

## Routing / controllers
- `routes/web.php` is Laravel-7 style: everything is inside `Route::group(['namespace' => 'App\Http\Controllers'], ...)`, which is why string controllers (`'Dashboard\Dashboard@index'`) resolve.
- Public pages are inline closures for `resources/views/public/*`; there is no controller for them.
- Admin routes require `auth` + `role:admin`; member routes require `role:member`. The `role` / `permission` middleware aliases are registered in `bootstrap/app.php`; `permission:*` guards live in controller constructors.
- There is no `Admin` namespace/folder. Controller naming is inconsistent:
  - Module style (class = module, no `Controller` suffix): `Dashboard\Dashboard`, `Produk\Produk`, `Blog\Blog`, `Pesanan\Pesanan`, `Membership\Membership`.
  - Suffix style: `User\{Permission,Role,User}Controller` (resource routes under `/admin`), `Member\DashboardController`, `Master\<Entity>Controller`.
  - `Role\Role` and `HakAkses\HakAkses` are unrouted legacy stubs.
- `Auth::routes()` provides auth; `HomeController` and `LoginController::redirectTo()` send admins to `admin.dashboard`, members to `member.dashboard`.
- Spatie permissions are named `Master User`, `Master Permission`, `Master Role` (plus a `jenis` column). Add new permissions to `PermissionSeeder`, guard with `permission:<name>`, and gate sidebar items with `@can`. Seeders create roles `admin` / `member` and login `admin@gmail.com` / `admin`.

## Views / assets
- Admin layout `layouts/backend` uses AdminLTE 3 + jQuery + toastr + SweetAlert2 from `public/backend`; public layout `layouts/public` uses `public/publik`. `public/backend` is vendored; do not treat `public/backend/build` as app source.
- Vite inputs are `resources/sass/app.scss` (SCSS) and `resources/js/app.js`, but no Blade uses `@vite`; `npm run build` does not affect current pages.
- `yoeunes/toastr` is wired in `layouts/backend` via `@toastr_js` / `@toastr_render`; controllers use `toastr()->success(...)`. SweetAlert2 is vendored at `public/backend/sweetalert2.min.js`.
- Only `user/permissions/*` and `user/user/*` CRUD views exist. `user/role`, `user/password`, `user/profil`, `resources/views/admin/`, and `public/faq.blade.php` are missing. `Master\KategoriController` expects `admin.master.kategori.index`; non-dashboard module controllers (`Produk`, `Blog`, `Pesanan`, `Membership`) return a missing `admin.placeholder`. Auth password/confirm/verify views extend a missing `layouts.app`. Expect missing-view errors on these scaffolded routes.
- For new master views, use `resources/views/admin/master/<entity>/index.blade.php` (controller path), not the empty `resources/views/master/`.
- Global `setActive()` / `setOpen()` helpers are in `app/Helpers/helper.php`, autoloaded via composer `files`.

## Testing
- `APP_URL` must include a scheme. In this workspace `.env` has `APP_URL=localhost`, so `php artisan test` requests `/localhost` and the Feature example 404s. Setting `APP_URL=http://localhost` makes both example tests pass.
- `phpunit.xml`: `CACHE_STORE=array`, `QUEUE_CONNECTION=sync`, `SESSION_DRIVER=array`, `MAIL_MAILER=array`; PHPUnit 10, no Pest.

## Gotchas
- Controllers call `\LogActivity::addToLog(...)`, but no global `LogActivity` alias is registered (`class_exists('LogActivity')` is false outside Tinker) — those calls fail. Use `App\Helpers\LogActivity::addToLog()`.
- Three activity-log implementations exist: `App\Helpers\LogActivity` (writes live columns), `App\Services\LogActivity` (writes an `activity` column absent from the live DB), and `App\Models\LogActivity`.
- `App\Http\Controllers\Controller` extends `Illuminate\Routing\Controller` only; `$this->validate(...)` used by `User\*` controllers is not available in Laravel 11. Use `$request->validate()`.
- `APP_KEY` is already set in `.env`; do not run `key:generate`.
