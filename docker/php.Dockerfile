# ----------------------
# The FPM base container
# ----------------------
FROM php:8.0-fpm-alpine3.15

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN apk add php8-pecl-redis

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
        && pecl install redis \
        && docker-php-ext-enable redis.so

COPY ./docker/www.conf /usr/local/etc/php-fpm.d/www.conf

WORKDIR /app

COPY ./ .

RUN chmod -R 777 /app/storage

# # ----------------------
# # Composer install step
# # ----------------------
# FROM composer:2.2.7 as build

# WORKDIR /app

# COPY composer.* ./
# COPY database/ database/

# RUN composer install \
#     --ignore-platform-reqs \
#     --no-interaction \
#     --no-plugins \
#     --no-scripts \
#     --prefer-dist

# # ----------------------
# # npm install step
# # ----------------------
# FROM node:16.14.0-alpine as node

# WORKDIR /app

# COPY *.json *.mix.js /app/
# COPY resources /app/resources

# RUN mkdir -p /app/public \
#     && npm install && npm run production

# # ----------------------
# # The FPM production container
# # ----------------------
# FROM dev

# COPY ./docker/www.conf /usr/local/etc/php-fpm.d/www.conf
# COPY . /app
# COPY --from=build /app/vendor/ /app/vendor/
# COPY --from=node /app/public/js/ /app/public/js/
# COPY --from=node /app/public/css/ /app/public/css/
# COPY --from=node /app/mix-manifest.json /app/public/mix-manifest.json

# RUN chmod -R 777 /app/storage
