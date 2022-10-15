### laravel8-api-swagger-demo init  
  
```bash  
composer create-project laravel/laravel:^8.0 example-app  
  
composer require "darkaonline/l5-swagger:8.*"  
  
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

php artisan vendor:publish --provider="Spatie\LaravelIgnition\IgnitionServiceProvider" --tag="ignition-config"  
  
# php artisan serve

php artisan l5-swagger:generate  

## generate validate
php dev:sv 

## generate phps 
php dev:svg  
```  

[/docs](https://ls.ddev.site/api/documentation) 
[/token](https://ls.ddev.site/token) 
[/](https://ls.ddev.site/api) 
[/api/list](https://ls.ddev.site/api/list) 
[/api/read](https://ls.ddev.site/api/read) 
  
