
FROM php:alpine

RUN apk add --no-cache $PHPIZE_DEPS && \
    pecl uninstall xdebug && \
    pecl install xdebug && docker-php-ext-enable xdebug && \
    docker-php-ext-install pdo_mysql

VOLUME /app