<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tools\Piece;
use App\Tools\Tool;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('App\Tools\Piece',function(){
            return new Piece;
        });
        $this->app->singleton('App\Tools\tool',function(){
            return new Piece;
        });
    }
}
