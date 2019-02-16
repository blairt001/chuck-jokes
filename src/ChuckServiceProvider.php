<?php

namespace Blairt\Chuck;

use Illuminate\Support\ServiceProvider;

class ChuckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckCommand::class,
            ]);
        }
    }

}
