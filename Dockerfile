FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip zip sqlite3 libsqlite3-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
