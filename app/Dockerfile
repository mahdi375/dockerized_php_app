FROM php:8.0.16RC1-fpm-alpine3.15

ARG user
ARG uid

RUN adduser -G www-data -D -u $uid $user

WORKDIR /var/www

USER $user

COPY --chown=$user:www-data . .