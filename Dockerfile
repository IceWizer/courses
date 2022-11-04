FROM php:8.0

WORKDIR /app

RUN chmod -R 777 /app && \
    sed -ri -e 's!/var/www/html!/app/public!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!/app/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql

COPY ./ /app