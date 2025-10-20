ARG PHP_VERSION=8.4
ARG COMPOSER_VERSION=2.8

FROM composer:${COMPOSER_VERSION} AS composer
FROM php:${PHP_VERSION}-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

LABEL maintainer="Portabilis <contato@portabilis.com.br>"

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_PROCESS_TIMEOUT=900 \
    COMPOSER_DISABLE_XDEBUG_WARN=1

ENV XDEBUG_IDEKEY=xdebug \
    XDEBUG_CLIENT_HOST=127.0.0.1 \
    XDEBUG_CLIENT_PORT=9003 \
    XDEBUG_MODE=off \
    XDEBUG_START_WITH_REQUEST=off

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apk add --no-cache \
    libc-dev \
    libpng-dev \
    libzip-dev \
    linux-headers \
    openjdk8 \
    postgresql17-client \
    postgresql-dev \
    ttf-dejavu \
    unzip \
    openssh \
    git \
    curl \
    bash \
 && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS make autoconf g++ gcc pkgconf \
 && docker-php-ext-install bcmath gd pcntl pdo pdo_pgsql pgsql zip \
 && pecl install redis \
 && docker-php-ext-enable redis \
 && apk del .build-deps postgresql-dev

RUN addgroup -g ${HOST_GID:-1001} ieducar 2>/dev/null || true && \
    adduser -u ${HOST_UID:-1001} -G ieducar -s /bin/sh -D ieducar 2>/dev/null || true && \
    mkdir -p /var/www/ieducar && \
    chown -R ieducar:ieducar /var/www/ieducar

USER ieducar
WORKDIR /var/www/ieducar
