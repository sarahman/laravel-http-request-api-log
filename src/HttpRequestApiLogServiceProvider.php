<?php

namespace Sarahman\HttpRequestApiLog;

use Illuminate\Support\ServiceProvider;

class HttpRequestApiLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->package('sarahman/laravel-http-request-api-log', null, __DIR__);
    }

    public function register()
    {
        // We have nothing to register here
    }
}
