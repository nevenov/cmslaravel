<?php

namespace Illuminate\Hashing;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

class HashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
=======
use Illuminate\Contracts\Support\DeferrableProvider;

class HashServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
>>>>>>> dev
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        $this->app->singleton('hash', function () {
            return new BcryptHasher;
=======
        $this->app->singleton('hash', function ($app) {
            return new HashManager($app);
        });

        $this->app->singleton('hash.driver', function ($app) {
            return $app['hash']->driver();
>>>>>>> dev
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
<<<<<<< HEAD
        return ['hash'];
=======
        return ['hash', 'hash.driver'];
>>>>>>> dev
    }
}
