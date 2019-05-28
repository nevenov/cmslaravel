<?php

namespace Illuminate\Broadcasting;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

class BroadcastServiceProvider extends ServiceProvider
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
use Illuminate\Contracts\Broadcasting\Factory as BroadcastingFactory;
use Illuminate\Contracts\Broadcasting\Broadcaster as BroadcasterContract;

class BroadcastServiceProvider extends ServiceProvider implements DeferrableProvider
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
        $this->app->singleton('Illuminate\Broadcasting\BroadcastManager', function ($app) {
            return new BroadcastManager($app);
        });

        $this->app->singleton('Illuminate\Contracts\Broadcasting\Broadcaster', function ($app) {
            return $app->make('Illuminate\Broadcasting\BroadcastManager')->connection();
        });

        $this->app->alias(
            'Illuminate\Broadcasting\BroadcastManager', 'Illuminate\Contracts\Broadcasting\Factory'
=======
        $this->app->singleton(BroadcastManager::class, function ($app) {
            return new BroadcastManager($app);
        });

        $this->app->singleton(BroadcasterContract::class, function ($app) {
            return $app->make(BroadcastManager::class)->connection();
        });

        $this->app->alias(
            BroadcastManager::class, BroadcastingFactory::class
>>>>>>> dev
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
<<<<<<< HEAD
            'Illuminate\Broadcasting\BroadcastManager',
            'Illuminate\Contracts\Broadcasting\Factory',
            'Illuminate\Contracts\Broadcasting\Broadcaster',
=======
            BroadcastManager::class,
            BroadcastingFactory::class,
            BroadcasterContract::class,
>>>>>>> dev
        ];
    }
}
