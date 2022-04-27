FROM composer:latest as composer

FROM php:7.4-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY . /app
WORKDIR /app

COPY entrypoint.sh /entrypoint.sh

EXPOSE 32400

ENTRYPOINT ["/entrypoint.sh"]