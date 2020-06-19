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
//         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'resources/lang');
//         $this->loadViewsFrom(__DIR__.'/../resources/views', 'resources/views');
//         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//         $this->loadRoutesFrom(__DIR__.'/../routes/intranet.php');

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
        ], 'niftypanel.install');

        // Publishing the exceptions.
        $this->publishes([
            __DIR__.'/Install/Exceptions' => base_path('app/Exceptions'),
        ], 'niftypanel.install');

        // Publishing the controllers.
        $this->publishes([
            __DIR__.'/Install/Controllers' => base_path('app/Http/Controllers'),
        ], 'niftypanel.install');

        // Publishing the middleware.
        $this->publishes([
            __DIR__.'/Install/Middleware' => base_path('app/Http/Middleware'),
        ], 'niftypanel.install');

        // Publishing the middleware.
        $this->publishes([
            __DIR__.'/Install/Providers/' => base_path('app/Providers'),
        ], 'niftypanel.install');

        // Publishing the models.
        $this->publishes([
            __DIR__.'/Install/Models' => base_path('app/Models'),
        ], 'niftypanel.install');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/Install/Views' => base_path('resources'),
        ], 'niftypanel.install');

        // Publishing the datatabase.
        $this->publishes([
            __DIR__.'/Install/Database' => base_path('database'),
        ], 'niftypanel.install');

        // Publishing the datatabase.
        $this->publishes([
            __DIR__.'/Install/Routes' => base_path('routes'),
        ], 'niftypanel.install');

        // Publishing the assets.
//        $this->publishes([
//            __DIR__.'/Install/Assets' => public_path('/'),
//        ], 'niftypanel.install');

    }
}
