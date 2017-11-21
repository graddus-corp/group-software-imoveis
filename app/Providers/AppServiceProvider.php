<?php

namespace GroupSoftware\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'GroupSoftware\Repositories\Interfaces\PropertiesRepository',
            'GroupSoftware\Repositories\PropertiesRepositoryImpl'
        );

        $this->app->bind(
            'GroupSoftware\Services\Interfaces\PropertiesService',
            'GroupSoftware\Services\PropertiesServiceImpl'
        );

        $this->app->bind(
            'GroupSoftware\Services\Interfaces\ImportService',
            'GroupSoftware\Services\ImportServiceImpl'
        );
    }
}
