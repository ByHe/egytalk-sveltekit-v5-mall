FROM php:8.5.12-fpm

WORKDIR /var/www

# Installera byggverktyg och systembibliotek
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y --no-install-recommends \
    g++ \
    make \
    pkg-config \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
    mysqli \
    pdo_mysql \
    sockets \
    gd \
    zip \
    intl \
    opcache \
    bcmath \
    exif \
    && docker-php-source delete \
    && apt-get purge -y --auto-remove g++ make pkg-config \
    && apt-get clean -y \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ARG UID=1000
ARG GID=1000

# Skapa användare och grupp för Debian
RUN groupadd -g ${GID} www \
 && useradd -u ${UID} -ms /bin/bash -g www www

COPY --chown=www:www . /var/www

USER www