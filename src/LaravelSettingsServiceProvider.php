<?php

namespace Rgergo67\LaravelSettings;

use Illuminate\Support\ServiceProvider;

class LaravelSettingsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');

        $this->publishes([
            __DIR__.'/config/laravel-settings.php' => config_path('laravel-settings.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/public/js' => public_path('js/vendor/rgergo67/laravel-settings'),
        ], 'public');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'settings');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'settings');

        $this->app->singleton('setting', function () {
            return new \Rgergo67\LaravelSettings\App\Repositories\SettingRepository();
        });
    }
}