FROM php:8.2-fpm

RUN apt update \
        && apt install -y \
              git \
              unzip \
              libzip-dev \
              libicu-dev \
              libonig-dev \
        && docker-php-ext-install intl pdo_mysql zip bcmath

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 80