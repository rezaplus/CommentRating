<?php

namespace rezaplus\cmr;

use Illuminate\Support\ServiceProvider;

class CmrServiceProvider extends ServiceProvider
{

    public function boot()
    {

        require __DIR__ . '/Http/routes.php';
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'cmr');

        $this->loadMigrationsFrom(__DIR__.'/Migrations');
    }
}
