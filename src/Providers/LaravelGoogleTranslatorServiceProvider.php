<?php

namespace Ayvazyan10\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelGoogleTranslatorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
//        dd('ok');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ayvazyan10');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ayvazyan10');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
//        $this->mergeConfigFrom(__DIR__.'/../config/laravelgoogletranslator.php', 'laravelgoogletranslator');
//
//        // Register the service the package provides.
//        $this->app->singleton('laravelgoogletranslator', function ($app) {
//            return new LaravelGoogleTranslator;
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelgoogletranslator'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelgoogletranslator.php' => config_path('laravelgoogletranslator.php'),
        ], 'laravelgoogletranslator.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ayvazyan10'),
        ], 'laravelgoogletranslator.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ayvazyan10'),
        ], 'laravelgoogletranslator.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ayvazyan10'),
        ], 'laravelgoogletranslator.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
