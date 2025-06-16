# Menggunakan base image PHP 8.3 CLI dengan Alpine Linux 3.21
FROM php:8.3-cli-alpine3.21

# Argumen build-time untuk konfigurasi aplikasi
ARG DB_USERNAME
ARG DB_PASSWORD
ARG DB_DATABASE
ARG APP_NAME

# Environment variables
ENV APP_NAME=${APP_NAME} \
    DB_CONNECTION=mysql \
    DB_HOST=mariadb \
    DB_PORT=3306 \
    DB_USERNAME=${DB_USERNAME} \
    DB_PASSWORD=${DB_PASSWORD} \
    DB_DATABASE=${DB_DATABASE} \
    SESSION_DRIVER=redis \
    REDIS_HOST=redis \
    OCTANE_SERVER=0.0.0.0:8080

# Instalasi dependensi sistem operasi
RUN apk update && apk add --no-cache \
    autoconf \
    build-base \
    linux-headers \
    libzip-dev \
    zlib-dev \
    g++ \
    make \
    git \
    mysql-client \
    libmemcached-dev \
    cyrus-sasl-dev \
    zip \
    unzip \
    openssh \
    curl \
    redis icu-dev curl curl-dev
    #oniguruma-dev 

# Instalasi ekstensi PHP
RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install mysqli pdo pdo_mysql zip curl pcntl sockets
RUN docker-php-ext-install intl
RUN pecl install memcached && docker-php-ext-enable memcached

# Instalasi Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Membersihkan cache untuk mengurangi ukuran image
RUN apk del build-base linux-headers && rm -rf /var/cache/apk/*

# Verifikasi versi PHP dan ekstensi yang diinstal
RUN php -v && php -m

# Menetapkan direktori kerja
WORKDIR /app

# Salin kode aplikasi ke dalam container
COPY . /app

# Atur kepemilikan file dan instal dependensi Composer
RUN chown -R www-data:www-data /app
RUN rm -rf /app/composer.lock
RUN composer install --no-dev --optimize-autoloader
RUN composer require laravel/octane
RUN composer require spiral/roadrunner-cli
RUN /app/vendor/bin/rr get-binary
# Salin file .env.example sebagai .env
COPY ./.env.example /app/.env

# Generate key Laravel dan optimasi aplikasi
RUN php artisan key:generate

# Entrypoint untuk menjalankan aplikasi
ENTRYPOINT ["sh", "/app/entrypoint.sh"]