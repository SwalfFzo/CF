# PHP 8.3 CLI 
FROM php:8.3-cli

# الحزم والامتدادات المطلوبة
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo gd mbstring zip \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# نسخ الملفات
COPY . .

# تثبيت باكجات PHP (بدون dev)
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

# أذونات Laravel
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache


EXPOSE 8000

# شغّل بالسيرفر المدمج واربطه على المنفذ الذي توفره Render
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
