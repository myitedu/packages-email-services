<?php

namespace Myitedu\EmailServices;

use Illuminate\Support\ServiceProvider;

class EmailServicesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Publish configuration files
        $this->publishes([
            __DIR__.'/../config/emailservices.php' => config_path('emailservices.php'),
        ], 'config');

        // Publish migration files
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'migrations');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'emailservices');

        // Load routes if necessary
        if (file_exists(__DIR__.'/../routes/web.php')) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register any bindings
        $this->app->bind('emailservice', function($app) {
            return new EmailService(); // Ensure you have an EmailService class or similar
        });

        // Merge your own package config with the existing configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/emailservices.php', 'emailservices'
        );
    }
}
