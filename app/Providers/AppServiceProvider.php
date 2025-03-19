<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
//        //check that app is local
//        if ($this->app->isLocal()) {
//            //if local register your services you require for development
//            $this->app['request']->server->set('HTTP', true);
//        } else {
//            //else register your services you require for production
//            $this->app['request']->server->set('HTTPS', true);
//        }

//        URL::forceScheme('http');
        \Illuminate\Support\Facades\URL::forceScheme('https');
        if ($this->app->isLocal())
        {
            $this->app['request']->server->set('https', true);
        }








    }
}
