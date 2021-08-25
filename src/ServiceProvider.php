<?php

namespace LasePeCo\UnitConverter;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/conversions.php', 'conversions'
        );

        $this->app->bind('converter',function() {
            return new Converter();
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang','conversions');

        $this->publishes([
            __DIR__ . '/../config/conversions.php' => config_path('conversions.php'),
        ]);
    }
}
