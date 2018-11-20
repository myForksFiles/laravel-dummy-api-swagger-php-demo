### laravel5.6-api-swagger-demo init

```bash
composer create-project --prefer-dist laravel/laravel api "5.6.*"

composer require "darkaonline/l5-swagger:5.7.*"

php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

php artisan serve
```