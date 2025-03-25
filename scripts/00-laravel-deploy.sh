#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html
echo "Clearing cache..."
php artisan config:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Checking if postgres is running..."
sudo systemctl status postgresql

echo "Running migrations..."
php artisan migrate --force