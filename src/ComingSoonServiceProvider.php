<?php

namespace tauseedzaman\ComingSoon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\AboutCommand;

class ComingSoonServiceProvider extends ServiceProvider
{
    public function boot()
    {

        AboutCommand::add('Laravel Coming Soon', fn () => ['Version' => '1.0.0']);

        $this->mergeConfigFrom(
            __DIR__ . '/config/Comingsoon.php',
            'Comingsoon'
        );

        $this->publishes([
            __DIR__ . '/config/Comingsoon.php' => config_path('Comingsoon.php'),
        ]);

        $this->publishes([
            __DIR__ . '/assets/js' => base_path('public/laravel_comming_soon/js'),
        ]);

        $this->publishes([
            __DIR__ . '/assets/admin' => base_path('public/laravel_comming_soon/admin'),
        ]);

        $this->publishes([
            __DIR__ . '/assets/css' => base_path('public/laravel_comming_soon/css'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/views', 'Comingsoon');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/laravel_coming_soon'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'laravel_coming_soon');
    }

    public function register()
    {
    }
}
