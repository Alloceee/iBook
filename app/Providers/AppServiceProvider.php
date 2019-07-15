<?php

namespace App\Providers;

use App\Services\SearchEngine\XunSearchEngine;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 增加内存防止中文分词报错php artisan scout:import "App\Models\Article"
         */
        ini_set('memory_limit', "256M");
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
}
