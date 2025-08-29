# ========= Stage 1: Frontend build (Node) =========
FROM node:20-alpine AS frontend

# العمل داخل /app
WORKDIR /app

# انسخ manifest الحِزم أولاً لاستفادة من الـ cache
COPY package.json package-lock.json* yarn.lock* pnpm-lock.yaml* ./

# ثبّت الحزم (اختر مدير الحزم المناسب: هنا npm)
RUN npm ci

# انسخ بقية المشروع (حتى يلاقي resources/, vite.config.*, الخ)
COPY . .

# ابنِ أصول الواجهة للإنتاج (Laravel Vite يضعها في public/build)
ENV NODE_ENV=production
RUN npm run build


# ========= Stage 2: PHP (Laravel app) =========
FROM php:8.3-cli

# امتدادات PHP اللازمة (Postgres + GD + mbstring + zip)
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo gd mbstring zip \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# انسخ الكود (بدون node_modules بفضل .dockerignore)
COPY . .

# انسخ مخرجات Vite من مرحلة Node
COPY --from=frontend /app/public/build ./public/build
# لو لديك ملفات إضافية (مثل manifest في بعض المشاريع) تُنسخ تلقائيًا ضمن build

# ثبّت باكجات PHP بدون dev وبدون تشغيل سكربتات أثناء البناء
RUN composer install --no-dev --no-scripts --prefer-dist --optimize-autoloader --no-interaction

# أذونات Laravel
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

# شغّل بالسيرفر المدمج على المنفذ الذي توفره Render أو 8000 محليًا
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
