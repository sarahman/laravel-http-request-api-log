<?php

namespace Sarahman\HttpRequestApiLog;

use Illuminate\Support\ServiceProvider;

class HttpRequestApiLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->package('sarahman/laravel-http-request-api-log', null, __DIR__);
    }

    public function register()
    {
        //
    }
}
