<?php

namespace Rayium\Lame\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Rayium\Lame\Lame;

class LameServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('Lame', function() {
            return new Lame();
        });
    }
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->_loadRoutes();
        $this->_loadViews();
        $this->_loadScripts();
        $this->_loadMigrations();
        $this->_loadController();
    }

    /**
     * For Load Routes
     *
     * @return void
     */
    private function _loadRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * For Load Views
     *
     * @return void
     */
    private function _loadViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Lame');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/')
        ],'lame-views');
    }

    private function _loadScripts(): void
    {
        $this->publishes([
            __DIR__.'/../resources/css' => public_path('/css')
        ], 'lame-styles');

        $this->publishes([
            __DIR__.'/../resources/fonts' => public_path('/fonts')
        ], 'lame-fonts');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('/js')
        ], 'lame-scripts');
    }

    private function _loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'lame-migrations');

    }

    private function _loadController(): void
    {
        $this->publishes([
            __DIR__.'/../Http/Controllers' => app_path('Http/Controllers'),
        ], 'lame-controllers');

    }
}
