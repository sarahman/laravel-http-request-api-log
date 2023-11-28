<?php

namespace Sarahman\HttpRequestApiLog;

use Illuminate\Foundation\Application as IlluminateApplication;
use Illuminate\Support\ServiceProvider;

class HttpRequestApiLogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Actual provider
     *
     * @var \Illuminate\Support\ServiceProvider
     */
    protected $provider;

    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->provider = $this->getProvider();
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (method_exists($this->provider, 'boot')) {
            return $this->provider->boot();
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        return $this->provider->register();
    }

    /**
     * Return ServiceProvider according to Laravel version
     *
     * @return \Illuminate\Support\ServiceProvider
     */
    private function getProvider()
    {
        if (version_compare(IlluminateApplication::VERSION, '5.0', '<')) {
            $provider = '\Sarahman\HttpRequestApiLog\ServiceProviderForLaravel4';
        } else {
            $provider = '\Sarahman\HttpRequestApiLog\ServiceProviderForLaravelRecent';
        }

        return new $provider($this->app);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['http-request-api-log'];
    }
}
