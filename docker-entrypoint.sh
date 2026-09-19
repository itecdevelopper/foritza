#!/usr/bin/env bash
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env || true
fi

php artisan key:generate --force >/dev/null 2>&1 || true
php artisan migrate --force >/dev/null 2>&1 || true
php artisan storage:link >/dev/null 2>&1 || true

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

exec "$@"
