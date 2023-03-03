FROM php:8.0.24-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y git unzip zip curl libpq-dev libonig-dev libxml2-dev \ 
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev zlib1g-dev sqlite3 libsqlite3-dev \
    zsh fonts-powerline nano

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath pdo_sqlite

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /var/www/html

USER $user