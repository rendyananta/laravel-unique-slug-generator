# Laravel Unique Slug Generator

## Installation
### Laravel >= 5.5 
1. run `composer require mchavens/laravel-unique-sluggable` on your projects
2. run `php artisan package:discover`
3. generate config fil using command `php artisan vendor:publish --tag=slug-config`

## How to use
#### Using model observers
1. Implement method `LaravelUniqueSlugGeneratorContract` on your Eloquent model
2. Add your model class name to config/slug.php
```php
    return [
    
        /*---------------------------------------
        | Fill with our model class namespace   |
        ----------------------------------------*/
        'entities' => [
            App\Entities\Post::class
        ]
    ];
```
#### Using model trait
```php
use McHavens\LaravelUniqueSlugGenerator\UniqueSlugTrait;

class Post extends Model {
    use UniqueSlugTrait;
}
```
