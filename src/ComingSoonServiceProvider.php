<?php

namespace tauseedzaman\ComingSoon;

use Illuminate\Support\ServiceProvider;

class ComingSoonServiceProvider extends ServiceProvider
{
    public function boot()
    {

        // $this->publishes([
        //     __DIR__.'/views' => base_path('resources/views/comingsoon'),
        // ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/Comingsoon.php',
            'Comingsoon'
        );

        $this->publishes([
            __DIR__ . '/config/Comingsoon.php' => config_path('Comingsoon.php'),
        ]);

        $this->publishes([
            __DIR__ . '/assets/js' => base_path('public/js'),
        ]);

        $this->publishes([
            __DIR__ . '/assets/css' => base_path('public/css'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/views', 'comingsoon');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {
    }
}
