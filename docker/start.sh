#!/bin/bash

php artisan key:generate

php artisan migrate --force

php-fpm -D

nginx -g 'daemon off;'