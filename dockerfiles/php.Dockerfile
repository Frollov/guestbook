FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql pcntl

RUN docker-php-ext-enable pcntl

RUN apk add autoconf