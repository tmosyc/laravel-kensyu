FROM php:8.2-fpm

RUN apt update \
        && apt install -y \
              git \
              unzip \
              libzip-dev \
              libicu-dev \
              libonig-dev \
        && docker-php-ext-install intl pdo_mysql zip bcmath

RUN apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev\
    && docker-php-ext-configure gd --with-jpeg\
    && docker-php-ext-install -j$(nproc) gd

COPY ./php.ini /usr/local/etc/php/php.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 80