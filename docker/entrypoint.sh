#!/bin/bash
set -e

echo "Running Laravel migrations..."
php artisan migrate --force

echo "Caching config, routes and views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Creating storage link..."
php artisan storage:link

# Ejecuta el comando CMD (apache2-foreground)
exec "$@"
