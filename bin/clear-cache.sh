#!/bin/bash

rm -fr bootstrap/cache/*.php
php artisan reload:cache