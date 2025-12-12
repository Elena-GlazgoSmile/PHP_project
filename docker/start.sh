#!/bin/sh

php-fpm -D

sleep 2

php artisan migrate --force

tail -f /dev/null
