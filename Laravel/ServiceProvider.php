<?php

namespace Connectkushal\Furl;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('furl', function()
        {
            return new \Connectkushal\Furl\Furl;
        });
    }
}
