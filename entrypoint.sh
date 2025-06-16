#!/bin/sh
# php artisan optimize:clear
# php artisan optimize
php artisan octane:install --server=roadrunner
php artisan octane:start --server=roadrunner --port=8080 --host=0.0.0.0