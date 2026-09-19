FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

ARG APP_ENV=production
ENV APP_ENV=${APP_ENV}
ENV PHP_FPM_LISTEN=/var/run/php/php-fpm.sock

RUN apk add --no-cache \
    nginx \
    supervisor \
    bash \
    curl \
    git \
    nodejs \
    npm \
    sqlite \
    sqlite-dev \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    ca-certificates \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_sqlite zip intl opcache \
    && rm -rf /var/cache/apk/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/html
COPY certs/isrgrootx1.pem /usr/local/share/ca-certificates/foritza-ca.pem
RUN update-ca-certificates

RUN composer install --no-interaction --prefer-dist --no-progress --no-dev --optimize-autoloader \
    && npm install --include=dev \
    && npm run build \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link \
    && mkdir -p /run/nginx /var/log/supervisord /var/run/php /var/www/html/storage/framework/sessions \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY nginx.conf /etc/nginx/http.d/default.conf
COPY supervisord.conf /etc/supervisord.conf
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["supervisord", "-n", "-c", "/etc/supervisord.conf"]
