# CV Devgenfour Company Profile

A production-ready company profile website for **CV Devgenfour**, built with **Laravel 12 (PHP 8.3)**, **Bootstrap 5**, and Spatie packages for role-based access control and SEO management. The application ships with a polished marketing site, a secure admin dashboard, and seed data so the project can be demonstrated immediately after installation.

## Features
- **Public marketing site** with home, services, portfolio, blog, page, and contact sections.
- **Dynamic content management** for services, portfolio items, team members, testimonials, pages, blog posts, and incoming messages.
- **SEO management** using a customised `spatie/laravel-seo` package (included under `packages/`), allowing route- and model-specific metadata including OpenGraph, Twitter, and custom meta tags.
- **Role & permission management** powered by `spatie/laravel-permission` with seeded roles (`super-admin`, `content-manager`, `seo-specialist`).
- **Contact workflow** that stores enquiries and queues notification emails.
- **Responsive design** using Bootstrap 5 and Bootstrap Icons, optimised for desktop and mobile visitors.

## Tech Stack
- PHP 8.3 with Laravel 12
- MySQL (tested against Laragon v6 stack)
- Bootstrap 5, Vite, and vanilla JavaScript
- Spatie packages: `laravel-permission`, `laravel-seo` (custom path repository), `laravel-sitemap`

## Local Development
1. Clone the repository and install dependencies:
   ```bash
   composer install
   npm install
   ```
2. Copy the environment example and update credentials (database, mail, etc.):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Run the migrations and seeders. This will create admin users, roles, permissions, SEO defaults, and sample content:
   ```bash
   php artisan migrate --seed
   ```
4. Build frontend assets and start the dev server:
   ```bash
   npm run dev
   php artisan serve
   ```
5. Log into the admin dashboard at `http://localhost:8000/admin` using the seeded credentials:
   - **Email:** `admin@devgenfour.com`
   - **Password:** `Password!123`

## Tests
The default PHPUnit setup is ready to use SQLite in-memory. Execute all automated tests with:
```bash
php artisan test
```

## Deployment Notes
- Configure the application on an Apache or Nginx host (VPS/shared) pointing the document root to the `public/` directory.
- Ensure the `storage/` and `bootstrap/cache/` directories are writable by the web server user.
- Run database migrations and seeders as part of the deployment pipeline.
- Use `php artisan config:cache`, `route:cache`, and `view:cache` for optimised runtime performance.
- Update the `.env` file with production database credentials, mail settings, APP_URL, and queue driver. For queued mails you may use `database` or `redis` drivers.

## Project Documentation
- Product requirements live in [`PRD.md`](PRD.md).
- Implementation details and architecture breakdown are in [`Implementasi.md`](Implementasi.md).

## License
This project is open-sourced under the [MIT license](LICENSE.md if available).
