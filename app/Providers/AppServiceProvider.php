<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        'App\Contracts\OurHotelsServiceInterface' => 'App\Services\OurHotelsService',
        'App\Contracts\HotelsProvidersFactoryInterface' => 'App\Factories\HotelsProvidersFactory',
        'App\Contracts\BestHotelsDataMapperInterface' => 'App\DataMappers\BestHotelsDataDataMapper',
        'App\Contracts\TopHotelsDataMapperInterface' => 'App\DataMappers\TopHotelsDataDataMapper',
    ];

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
