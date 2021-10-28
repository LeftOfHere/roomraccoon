FROM php:7-fpm-alpine

RUN apk add --no-cache $PHPIZE_DEPS oniguruma-dev libzip-dev curl-dev \
    && docker-php-ext-install pdo_mysql mbstring zip curl 
RUN mkdir /app
VOLUME /app
WORKDIR /app

EXPOSE 8080
# CMD php S localhost:8000 -t public