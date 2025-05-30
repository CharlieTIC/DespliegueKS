# Etapa 1: Build de frontend y dependencias
FROM node:18 as frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build

# Etapa 2: App PHP (Laravel)
FROM php:8.2-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev libsqlite3-dev \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia el proyecto
COPY --from=frontend /app /var/www/html

# Da permisos a Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Activa mod_rewrite para Laravel
RUN a2enmod rewrite

# Configura el virtualhost de Apache
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80