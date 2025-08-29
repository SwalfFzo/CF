# ========= Stage 1: Frontend build (Node) =========
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json* yarn.lock* pnpm-lock.yaml* ./
RUN npm ci
COPY . .
ENV NODE_ENV=production
RUN npm run build

# ========= Stage 2: PHP + Apache (Laravel) =========
FROM php:8.3-apache

# Extensions
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring zip pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Apache rewrite + document root = public/
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy app source
COPY . .

# Copy built assets from frontend stage
COPY --from=frontend /app/public/build ./public/build

# PHP deps (بدون dev)
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Permissions
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

#     الذي تمرره DO (عادة 8080)
RUN sed -ri 's/Listen 80/Listen 8000/g' /etc/apache2/ports.conf \
    && sed -ri 's!<VirtualHost \*:80>!<VirtualHost \*:8000>!g' /etc/apache2/sites-available/000-default.conf
EXPOSE 8000

CMD ["apache2-foreground"]
