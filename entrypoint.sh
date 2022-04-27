#!/usr/bin/env sh

apk add git zip

cd /app
composer install
composer dump-autoload

ls -al
ls -al app
ls -al vendor
ls -al vendor/psr

php ./app.php