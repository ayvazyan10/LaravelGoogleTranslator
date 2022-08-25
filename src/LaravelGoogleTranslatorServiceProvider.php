<?php

namespace Ayvazyan10\LaravelGoogleTranslator;

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
        $this->mergeConfigFrom(__DIR__ . '/../config/laravelgoogletranslator.php', 'laravelgoogletranslator');

        // Register the service the package provides.
        $this->app->singleton('laravelgoogletranslator', function ($app) {
            return new LaravelGoogleTranslator;
        });
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
            __DIR__ . '/../config/laravelgoogletranslator.php' => config_path('laravelgoogletranslator.php'),
        ], 'laravelgoogletranslator.config');
    }
}
