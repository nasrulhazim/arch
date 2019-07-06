#!/bin/bash

composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan reload:cache
php artisan reload:db
php artisan passport:install
yarn install