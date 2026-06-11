FROM php:8.3-cli

WORKDIR /app

COPY . .

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}