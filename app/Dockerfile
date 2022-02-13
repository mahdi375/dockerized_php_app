FROM php:8.1.3RC1-fpm-buster

ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip


# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# RUN adduser -G www-data -D -u $uid $user                             # for php on alpine
RUN useradd -G www-data,root -u $uid -d /home/$user $user
WORKDIR /var/www

USER $user

COPY --chown=$user:www-data . .