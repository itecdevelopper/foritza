#!/usr/bin/env bash
set -e

cd /var/www/html

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

if [ "${APP_ENV:-}" = "production" ]; then
    export APP_DEBUG="false"
    export SESSION_DRIVER="${SESSION_DRIVER:-file}"
    export CACHE_STORE="${CACHE_STORE:-file}"
    export QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
    export MYSQL_ATTR_SSL_CA="${MYSQL_ATTR_SSL_CA:-/etc/ssl/certs/ca-certificates.crt}"
    export MYSQL_ATTR_SSL_VERIFY_SERVER_CERT="${MYSQL_ATTR_SSL_VERIFY_SERVER_CERT:-true}"
fi

# The Docker build runs before Render injects the service environment.  Never
# reuse cached configuration created during that phase, or Laravel will miss
# APP_KEY and the database settings at runtime.
php artisan optimize:clear >/dev/null

if [ -z "${APP_KEY:-}" ]; then
    php artisan key:generate --force >/dev/null 2>&1 || true
fi

php artisan migrate --force
php artisan storage:link >/dev/null 2>&1 || true

php artisan config:cache
php artisan route:cache
php artisan view:cache

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

exec "$@"
