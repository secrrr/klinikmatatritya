# Klinik Mata Tritya - Full Clone Starter (Laravel 10)
This package contains a full clone-like frontend and a Metro-style admin panel skeleton.

## Notes
- Designed for Laravel 10 running on PHP 8.1+ (you said PHP 8.2 — good).
- This is a local clone for development/testing only. Using third-party images/content in production may require permission.

## Setup
1. Create a Laravel 10 project (if you haven't):
   `composer create-project laravel/laravel klinik "^10.0"`
2. Extract this clone and copy its contents into the Laravel project's root (merge folders): `app/`, `routes/`, `resources/views/`, `database/`, etc.
3. Copy `.env.example` to `.env`, set DB credentials and `ADMIN_USERNAME` / `ADMIN_PASSWORD`.
4. Run composer install, migrate, seed, storage link:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   php artisan serve
   ```
5. Open http://127.0.0.1:8000 and admin at http://127.0.0.1:8000/admin/login

## Admin default (in .env):
ADMIN_USERNAME=admin
ADMIN_PASSWORD=secret123
