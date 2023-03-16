#!/bin/bash

/usr/local/bin/composer install -n --prefer-dist -d /code

npm install
npm run build

php bin/console doctrine:migrations:migrate

php-fpm
