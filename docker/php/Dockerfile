FROM composer:1.8.0 as composer
FROM php:7.3.1-fpm-alpine

# Extensions
RUN apk add --no-cache --virtual .persistent-deps \
		git \
		icu-libs \
		libpq \
		zlib \
		libzip-dev

ENV APCU_VERSION 5.1.16
RUN set -xe \
	&& apk add --no-cache --virtual .build-deps \
		$PHPIZE_DEPS \
		icu-dev \
		zlib-dev \
	&& docker-php-ext-install \
		intl \
		pdo_mysql \
		zip \
	&& pecl install \
		apcu-${APCU_VERSION} \
	&& docker-php-ext-enable --ini-name 20-apcu.ini apcu \
	&& docker-php-ext-enable --ini-name 05-opcache.ini opcache \
	&& apk del .build-deps

# Additional .ini
COPY ./symfony.ini /usr/local/etc/php/conf.d/

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --classmap-authoritative

# Modify UID of www-data into UID of local user
# 82 is the standard uid/gid for "www-data" in Alpine
ARG AS_UID=82
RUN set -x \
	&& deluser www-data \
	&& addgroup -g ${AS_UID} -S www-data \
	&& adduser -u ${AS_UID} -D -S -G www-data www-data

WORKDIR /srv/website

RUN mkdir -p var/cache var/logs var/sessions \
	&& chown -R www-data:www-data var
