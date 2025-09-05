## NGO Site – Laravel 12 (Bilingual: العربية / English)

هذا المستودع يحوي موقع جمعية/منظمة (NGO) مبني على Laravel 12 مع واجهة باستخدام Vite وTailwind/Bootstrap، ونظام أدوار وصلاحيات، وإدارة أخبار، ونظام تذاكر تواصل، وتكامل إرسال بريد عبر Microsoft Graph.

This repository contains an NGO website built with Laravel 12 using Vite + Tailwind/Bootstrap, role/permission management, News management, a Contact/Ticketing system, and Microsoft Graph mail integration.

---

### Tech Stack
- PHP 8.2+ / Laravel 12
- Vite 7, TailwindCSS 3, Alpine.js, Bootstrap 5
- Spatie Laravel-Permission (roles/permissions)
- Microsoft Graph (client credentials / delegated), Guzzle
- SQLite (dev default) or Postgres (Docker compose)

### Features (الميزات)
- **صفحة رئيسية مخصصة**: تصميم احترافي مع خلفية MBG.png وشعار MainLogo.png وعناصر SMBG.png
- **نظام تسجيل متقدم**: تسجيل بالبريد الإلكتروني أو عبر Google/Microsoft/Apple/GitHub
- **صفحة تسجيل دخول محسنة**: مع وظيفة "تذكرني" ونصوص عربية
- **لوحة متدرب بتصميم Tabler**: مع تبويبات للدورات، الحضور، الشهادات، والملف الشخصي
- **إدارة الأخبار**: مع تصنيفات، حالة النشر، وصورة رئيسية
- **نظام أدوار متقدم**: `admin`, `event_manager`, `content_editor`, `trainer`, `trainee`
- **لوحات متخصصة**: إدارة، مدرّب، متدرّب
- **نظام تذاكر**: نموذج اتصل بنا مع مراسلات بريدية تلقائية
- **تكامل Microsoft Graph**: إعدادات بريد وإرسال تلقائي

---

## Latest Updates (التحديثات الأخيرة)

### ✨ New Features Added
- **Custom Homepage Design**: Professional hero section with MBG.png background, MainLogo.png logo, and SMBG.png overlay elements
- **Enhanced Registration**: Multiple authentication options (Google, Microsoft, Apple, GitHub) with Arabic interface
- **Improved Login**: "Remember me" functionality with Arabic text and enhanced styling
- **Tabler Dashboard**: Comprehensive trainee dashboard with tabs for courses, attendance, certificates, and profile
- **Phone Field**: Added phone number field to user registration with Saudi format validation
- **Auto Role Assignment**: New users automatically get trainee role
- **Custom CSS**: Separate hero-custom.css file for better organization

### 🎨 Design Improvements
- **Hero Section**: Purple/dark blue gradient overlay with geometric animations
- **Navigation**: Transparent navbar with hover effects and Arabic menu items
- **Typography**: Cairo font for Arabic text, Roboto for English
- **Responsive Design**: Mobile-optimized layout with proper breakpoints
- **Accessibility**: High contrast mode and reduced motion support

---

## Getting Started (التشغيل محليًا)

### 1) Clone & Install
```bash
git clone <repo>
cd ngo-site
composer install
npm ci
cp .env.example .env
php artisan key:generate
```

For SQLite (default in repo): ensure `database/database.sqlite` exists. For Postgres (Docker), see Docker section.

### 2) Migrate & Seed
```bash
php artisan migrate --seed
```
Seeds add roles and sample users:
- Admin: admin@example.com / Admin@123
- Trainer: trainer@example.com / 123@123
- Trainee: trainee@example.com / 123@123

### 3) Dev Servers
```bash
php artisan serve
npm run dev
```
Visit: http://localhost:8000

---

## Docker
Dockerfile builds frontend then PHP-Apache image on port 8000. `docker-compose.yml` provides services: app (Laravel), vite (hot reload), db (Postgres 16 on host 5433).

Run:
```bash
docker compose up --build
```
App: http://localhost:8000, Vite: http://localhost:5173, Postgres: localhost:5433.

Environment examples (compose):
- DB: `pgsql`, host `db`, user `ngo_user`, pass `secret123`, db `ngo_local`.
- Cache/session: file; Queue: sync (dev).

---

## Custom Assets (الأصول المخصصة)

### Homepage Images
The homepage uses custom images from `public/sfc/images/R/`:
- **MBG.png**: Main background image for hero section
- **MainLogo.png**: Organization logo displayed in navigation
- **SMBG.png**: Overlay elements and decorative graphics

### Image Requirements
- **MBG.png**: Should be high-resolution (1920x1080+) with purple/dark blue theme
- **MainLogo.png**: Transparent PNG with white/light colored logo
- **SMBG.png**: Overlay graphics with geometric shapes and transparency

### Customization
To update the homepage design:
1. Replace images in `public/sfc/images/R/` directory
2. Modify styles in `resources/css/hero-custom.css`
3. Update text content in `resources/views/welcome.blade.php`

---

## Configuration

### Mail / Microsoft Graph
Model: `App\Models\MailSetting` with fields:
- `ms_tenant`, `ms_client_id`, `ms_client_secret`, `ms_redirect_uri`, `graph_from`.

Services:
- `App\Services\GraphTokenService`: client credentials token retrieval.
- `App\Services\GraphMailer`: sends via `/users/{graph_from}/sendMail`.
- `App\Services\GraphMailService`: delegated flow using stored tokens (table `ms_tokens`).

Admin routes to edit/test mail settings:
```text
GET  /admin/mail-settings           (name: admin.mail.edit)
PUT  /admin/mail-settings           (name: admin.mail.update)
POST /admin/mail-settings/test      (name: admin.mail.test)
```

Optional PoC routes:
```text
GET /oauth/ms/redirect
GET /oauth/ms/callback
GET /graph-mail/test
```

Set standard Laravel mail `MAIL_MAILER`, `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME` in `.env` for ticket emails.

---

## Routes Overview (ملخص المسارات)

Public:
```text
GET /                    → welcome (latest 3 news)
GET /news                → news.index
GET /news/{news:slug}    → PublicNewsController@show (name: news.show)
GET /news-id/{news}      → PublicNewsController@showById (name: news.show.id)
POST /contact            → TicketController@store (name: contact.send)
```

Admin (auth + roles):
```text
GET  /admin/             → Admin\DashboardController@index (name: admin.dashboard)
CRUD /admin/news         → Admin\NewsCrudController (content_editor|admin)
```

Trainer/Trainee:
```text
GET /trainer/            → Trainer\DashboardController@index
GET /trainee/            → Trainee\DashboardController@index
```

Profile:
```text
GET   /profile           → ProfileController@edit
PATCH /profile           → ProfileController@update
DELETE /profile          → ProfileController@destroy
```

Auth: Breeze scaffolding under `routes/auth.php`.

---

## News Module (وحدة الأخبار)
- Model: `App\Models\News` with scopes `published()` and `draft()` and many-to-many `categories()` via `news_category_map`.
- `App\Models\NewsCategory` with relation `news()`.
- Public views under `resources/views/news/` (e.g., `show.blade.php`).
- Admin CRUD controller: `App\Http\Controllers\Admin\NewsCrudController`.

---

## Tickets (التذاكر / اتصل بنا)
- `POST /contact` validates name, email, KSA phone formats, subject, message.
- Persists `App\Models\Ticket` and first `TicketMessage`.
- Sends notification emails: `NewTicketSubmitted`, `TicketConfirmation`, `AdminTicketReply`, `TicketClosed`.

---

## Development Notes
- PHP deps in `composer.json`; JS deps in `package.json`.
- Vite entrypoints: `resources/js/app.js`, `resources/css/app.css`.
- Built assets output to `public/build` via Vite.
- Policies for News/Survey located in `app/Policies`.
- Use roles from seeder or create via Spatie methods.

---

## Testing
```bash
php artisan test
```

---

## Deployment (النشر)
1) Build frontend: `npm run build`.
2) Deploy PHP (Apache/Nginx) with document root pointing to `public/`.
3) Run `composer install --no-dev --optimize-autoloader` and `php artisan migrate --force`.
4) Configure environment (APP_KEY, DB, MAIL, Graph settings).
5) Ensure `storage/` and `bootstrap/cache/` are writable.

Dockerfile provided for containerized deploy on port 8000.

---

## Credentials & Defaults
- Default admin user from seeder: `admin@example.com` / `Admin@123`.
- Change all sample passwords and set a real `APP_KEY` in production.

---

## License
MIT (for this application’s code). Laravel framework is © Laravel LLC under MIT.
