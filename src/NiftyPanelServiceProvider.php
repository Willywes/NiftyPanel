<?php

namespace Willywes\NiftyPanel;

use Illuminate\Support\ServiceProvider;

class NiftyPanelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'willywes');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'willywes');
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
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/niftypanel.php', 'niftypanel');

        // Register the service the package provides.
        $this->app->singleton('niftypanel', function ($app) {
            return new NiftyPanel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['niftypanel'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/niftypanel.php' => config_path('niftypanel.php'),
        ], 'niftypanel.config');

        // Publishing the controllers.
        $this->publishes([
            __DIR__.'/Controllers' => base_path('app/Http/Controllers'),
        ], 'niftypanel.controllers');

        // Publishing the middleware.
        $this->publishes([
            __DIR__.'/Controllers' => base_path('app/Http/Middleware'),
        ], 'niftypanel.middleware');

        // Publishing the models.
        $this->publishes([
            __DIR__.'/Models' => base_path('app/Models'),
        ], 'niftypanel.models');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views/intranet' => base_path('resources/views/intranet'),
        ], 'niftypanel.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('/'),
        ], 'niftypanel.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('resources/'),
        ], 'niftypanel.views');

        // Registering package commands.
        // $this->commands([]);
    }
}
