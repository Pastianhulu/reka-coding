# AGENTS.md — rekac-dev (Laravel 11)

## Commands
- `php artisan serve`; `npm run dev` / `npm run build` are scaffolded, but no Blade uses `@vite`, so asset builds do not affect current pages.
- `php artisan test` (PHPUnit 10, no Pest); single test: `php artisan test --filter=ExampleTest`.
- `php artisan test` passes with `APP_URL=http://localhost` in `.env`; if it 404s on `/`, check `APP_URL` has a scheme.
- `php vendor/bin/pint` works but the repo is not Pint-clean; a wholesale run reformats ~30 files. Do not run it over unrelated work.
- `/rekac` clears config/cache/view/route caches (`optimize:clear` runs last).
- Never run `migrate:fresh`, `RefreshDatabase`, or `DatabaseMigrations` (see Database).

## Database — live MySQL is the only complete schema
- MySQL `dbrekac_dev`. `config/database.php` hardcodes the mysql credentials (127.0.0.1:3306, root, empty password), so `.env` `DB_HOST` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` are ignored; `.env` only selects it via `DB_CONNECTION=mysql`. `database/database.sqlite` is unused.
- Tests hit this real dev DB (`phpunit.xml` leaves the DB env commented out). Do not add destructive test traits without switching databases.
- Master/product tables exist only in MySQL, with no create migrations: `m_kategori`, `m_cara_bayar`, `m_profil`, `tbl_produk`, `tbl_produk_gambar`. The `2026_10_26_*` migrations only alter the existing `tbl_produk` / permissions and create `pembelian`; `php artisan migrate` on an empty DB still will not build the product/master schema. `m_source_code` was dropped.
- The `log_activity` migration is stale: it creates an `activity` column, but the live table has `subject/deskripsi/url/method`.
- Do **not** execute `RADME.MD` or `tbl.sql`: `RADME.MD` (sic) is a stale Navicat dump containing `DROP TABLE` statements (predates `tbl_produk` / `tbl_produk_gambar` and still has `m_pemilik`, which no longer exists); `tbl.sql` is partial scratch DDL that references a nonexistent `tbl_source_code`. Inspect the real schema with `php artisan db:show` / `php artisan db:table <table>`.
- `AppServiceProvider` shares `Profil::firstOrNew([])` with every view, so a missing `m_profil` table breaks every page.

## Routing / controllers
- `routes/web.php` is Laravel-7 style: everything is inside `Route::group(['namespace' => 'App\Http\Controllers'], ...)`, which is why string controllers (`'Dashboard\Dashboard@index'`) resolve.
- Most public pages are inline closures for `resources/views/public/*`; `/produk` and `/produk/{slug}` use `Public\ProdukController`.
- Admin routes require `auth` + `role:admin` under `/admin`; member routes require `role:member` under `/member`. Aliases are registered in `bootstrap/app.php`; Spatie `permission:*` checks sit in controller constructors (the base controller still supports `middleware()`).
- Naming is inconsistent: module classes without a suffix (`Dashboard\Dashboard`, `Blog\Blog`, `Pesanan\Pesanan`), suffixed controllers (`User\*Controller`, `Master\{Kategori,CaraBayar,Profil}Controller`, `Produk\ProdukController`, `Pembelian\PembelianController`, `Member\{Dashboard,Produk,Membership,Pembelian}Controller`). There is no `Admin` namespace.
- Unrouted legacy stubs: `Role\Role`, `User\AksiUserController` (uses nonexistent `App\User` and missing `user.password` / `user.profil` views).
- Product flow: admin CRUD in `Produk\ProdukController` uses the `DB` facade against `tbl_produk` / `tbl_produk_gambar`; thumbnails go to `public/uploads/produk/thumbnail`, galleries to `public/uploads/produk/galeri`. Admin id 1 sees/edits all products and can assign an admin-role developer; other admins only see/edit their own (`id_user`). Deletes are soft via `id_hapus`.
- Member access rules: free products redirect to `link_github` (login required); premium products require `users.membership_until >= now` OR a `pembelian` row with `status=lunas`, otherwise the member is sent to `/member/upgrade`. `pembelian` starts `pending` and is marked `lunas` by an admin at `/admin/pembelian`.
- `admin.placeholder` now exists, so `Blog` / `Pesanan` pages render; `/faq` still references the absent `public.faq`; auth verify/password views extend the absent `layouts.app`.
- Permissions are DB-managed. Live DB has 12 including `Master Produk` (renamed in-place from `Master Source Code`) and `Navigasi Produk`. `PermissionSeeder` creates the 3 base `Master *` permissions plus `Master Produk`; `RoleSeeder` syncs all existing permissions to `admin`; seeded login is `admin@gmail.com` / `admin`. Sidebar items use `@can`.
- `/home` is named `home` because `layouts/public.blade.php` calls `route('home')`.

## Views / assets
- Admin layout `layouts/backend` uses AdminLTE 3 + jQuery; `public/backend` is vendored (do not treat `public/backend/build` as app source). Public layout uses `public/publik`.
- Toastr comes from `php-flasher/flasher-toastr-laravel` (`toastr()->...` in controllers) plus vendored toastr JS; there are no `@toastr_js` / `@toastr_render` directives. SweetAlert2 is at `public/backend/sweetalert2.min.js` with a global `deleteData()` helper in the backend layout.
- Master views render `master.<entity>.*` from `resources/views/master/`; product admin views live in `resources/views/produk/`, purchase admin in `resources/views/pembelian/`; user views are under `resources/views/user/{permissions,role,user}/`. Do not create `resources/views/admin/master`.
- `setActive()` / `setOpen()` live in `app/Helpers/helper.php`, autoloaded via composer `files`.

## Gotchas
- `\LogActivity` is aliased to `App\Helpers\LogActivity` in `config/app.php` and writes the live columns. Do not use `App\Services\LogActivity`: it writes a nonexistent `activity` column.
- Base `App\Http\Controllers\Controller` has no `ValidatesRequests`; only the unrouted `AksiUserController` still calls `$this->validate`. Use `$request->validate()`.
- Uploads live under `public/uploads/produk`, not `public/produk`: a real `public/produk` directory shadows the `/produk` route under `php artisan serve` and causes a 404.
- In Blade views prefer `auth()->id()`; `Auth::` has failed in standalone view rendering. Controllers can import `Illuminate\Support\Facades\Auth`.
- `APP_KEY` is already set; do not run `key:generate`.
