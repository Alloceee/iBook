<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MD5Hasher;

class MD5HashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('hash', function () {
            return new MD5Hasher;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function provides()
    {
        return ['hash'];
    }
}
