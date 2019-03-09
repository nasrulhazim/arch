#!/bin/bash

composer install
php artisan migrate
yarn install