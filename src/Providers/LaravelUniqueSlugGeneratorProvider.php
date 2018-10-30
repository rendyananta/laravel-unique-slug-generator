<?php
/**
 * @author <Rendy rendy.ananta66@gmail.com>
 * Date: 06/08/17
 * Time: 6:03
 */

namespace McHavens\LaravelUniqueSlugGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use McHavens\LaravelUniqueSlugGenerator\UniqueSlugGenerator;

class LaravelUniqueSlugGeneratorProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $args = [ UniqueSlugGenerator::class ];
        $callable[1] = 'observe';
        foreach (config('slug.entities', []) as $item) {
            $callable[0] = $item;

            forward_static_call_array($callable, $args);
        }
        $this->registerConfig();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Publish config file to config directory
     *
     * @return void
     */
    public function registerConfig ()
    {
        $this->publishes([
            __DIR__.'/../config/slug.php' => config_path('slug.php'),
        ], 'slug-config');
    }
}