# AGENTS.md — rekac-dev (Laravel 11)

## Commands

**Frontend**
- `npm run dev` — start Vite dev server
- `npm run build` — production build

**Backend (PHP/Laravel)**
- `php artisan serve` — start dev server
- `php artisan migrate` — run migrations
- `php artisan migrate:fresh --seed` — reset DB + seed
- `php artisan test` — run PHPUnit tests
- `./vendor/bin/pint` — format code (Laravel Pint)

**Cache/Config**
- `php artisan optimize:clear` — clear all caches (config, route, view, compiled)
- `php artisan config:cache` — cache config
- `php artisan route:cache` — cache routes

## Key Facts

- **Framework**: Laravel 11, PHP 8.2+
- **Database**: SQLite (default, file at `database/database.sqlite`)
- **Frontend**: Vite + laravel-vite-plugin (`resources/css/app.css`, `resources/js/app.js`)
- **Testing**: PHPUnit (feature + unit), `tests/TestCase.php` base class
- **Code Style**: Laravel Pint (PSR-12 + Laravel preset)
- **Entry Points**: `bootstrap/app.php` (app config), `routes/web.php` (web routes), `public/index.php` (HTTP entry)
- **Env**: `.env` loaded, `APP_KEY` already set, `DB_CONNECTION=sqlite`

## Project Structure

```
app/              # Application code (Models, Controllers, Providers)
bootstrap/app.php # Application configuration
config/           # Config files
database/         # Migrations, factories, seeders, SQLite file
public/           # Public entry point, built assets
resources/        # Views, CSS, JS
routes/           # web.php, console.php
tests/            # Feature + Unit tests
vendor/           # Composer dependencies
```

## Gotchas

- SQLite file lives at `database/database.sqlite` (created on `post-create-project-cmd`)
- Route `/rekac` clears all caches — useful during development
- No separate `php artisan key:generate` needed (already in `.env`)
- Vite inputs: `resources/css/app.css`, `resources/js/app.js`