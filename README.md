<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Vehicle Monitoring System
## Requirement
- PHP : ~7.0||^8.1
- consoletvs/charts : ^6.6
- guzzlehttp/guzzle : ^7.2
- laravel/framework : ^10.10
- laravel/sanctum : ^3.2
- laravel/tinker : ^2.8
- laravelcollective/html : ^6.4
- maatwebsite/excel : ^3.1.
- spatie/laravel-permission : ^5.11

- fakerphp/faker : ^1.9.1
- laravel/pint : ^1.0
- laravel/sail : ^1.18
- laravel/ui : ^4.2
- mockery/mockery : ^1.4.4
- nunomaduro/collision : ^7.0
- phpunit/phpunit : ^10.1
- spatie/laravel-ignition : ^2.0

- db : pgsql
- db_host : 127.0.0.1
- db_port : 5432
- db_database : vehmon

## User Detail
- Admin
email : admin@gmail.com
password : 123456

- Manager (Penerima Request)
email : manager@gmail.com
password : 123456

## Cara Menggunakan
1. run "php artisan migrate"
2. run "php artisan db:seed --class=DatabaseSeeder"
3. run "npm install && npm run dev"
4. run "php artisan serve"
5. open "127.0.0.1:8000" from browser
6. log in
