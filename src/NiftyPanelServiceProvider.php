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

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/willywes'),
        ], 'niftypanel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/willywes'),
        ], 'niftypanel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/willywes'),
        ], 'niftypanel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
