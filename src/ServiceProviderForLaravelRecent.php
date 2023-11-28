<?php

namespace Sarahman\HttpRequestApiLog;

use Illuminate\Support\ServiceProvider;

class ServiceProviderForLaravelRecent extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('http-request-api-log.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // merge default config
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php',
            'http-request-api-log'
        );
    }
}
