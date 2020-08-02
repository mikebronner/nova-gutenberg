<?php

namespace GeneaLabs\NovaGutenberg;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-gutenberg', __DIR__ . '/../dist/js/field.js');
            Nova::script("nova-gutenberg-react", "https://unpkg.com/react@16.8.6/umd/react.production.min.js");
            Nova::script("nova-gutenberg-react-dom", "https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js");
            // Nova::script("nova-gutenberg-jquery", "https://code.jquery.com/jquery-1.12.4.min.js");
            Nova::script('nova-gutenberg-laraberg', base_path("vendor/van-ons/laraberg/public/js/laraberg.js"));
            // Nova::script('nova-gutenberg-laraberg-map', base_path("vendor/van-ons/laraberg/public/js/laraberg.js.map"));

            Nova::style('nova-gutenberg', __DIR__ . '/../dist/css/field.css');
            Nova::style('nova-gutenberg-laraberg', base_path("vendor/van-ons/laraberg/public/css/laraberg.css"));
            // Nova::style('nova-gutenberg-laraberg-map', base_path("vendor/van-ons/laraberg/public/css/laraberg.css.map"));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(base_path('vendor/van-ons/laraberg/src/config/laraberg.php'), 'laraberg');
    }
}
