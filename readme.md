# Laravel Unique Slug Generator

## Installation
### Laravel 5.5
1. run `composer require rendyyangasli/laravel-unique-sluggable` on your projects
2. run `php artisan package:discover`
3. generate config fil using command `php artisan vendor:publish --tag=slug-config`

## Usage
1. Implement method `LaravelUniqueSlugGeneratorContract` on your Eloquent model
2. Add your model class name to config/slug.php