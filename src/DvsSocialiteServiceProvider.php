<?php

namespace Chondal\DvsSocialite;

use Illuminate\Support\ServiceProvider;

class DvsSocialiteServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'DvsSocialite');

        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views/vendor/DvsSocialite'),
        ], 'dvs-socialite-views');
        $this->publishes([
            __DIR__ . '/../config/dvs-socialite.php' => base_path('config/dvs-socialite.php'),
        ], 'dvs-socialite-config');
        $this->publishes([
            __DIR__ . '/../resources/static' => public_path('vendor/dvs-socialite'),
        ], 'dvs-socialite-assets');
    }

    public function register()
    {
        $this->app->bind('dvs-socialite', function () {
            return new DvsSocialite;
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/dvs-socialite.php', 'dvs-socialite');
    }

}
