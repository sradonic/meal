<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MealRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\MealInterface', 'App\Services\Impl\DbMealRepository');
    }
}
