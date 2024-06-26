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
    public function boot()
    {
        //
    }
}