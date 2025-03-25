#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Running npm install"
npm install

echo "Running build"
npm run build

echo "Check pgsql connection"
until pg_isready -h $DB_HOST -p $DB_PORT -U $DB_USERNAME
do
  echo "Waiting for postgres..."
  sleep 2
done

echo "Clearing cache..."
php artisan config:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force