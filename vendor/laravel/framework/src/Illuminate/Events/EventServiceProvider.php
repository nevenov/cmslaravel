<?php

namespace Illuminate\Events;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;
>>>>>>> dev

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use ($app) {
<<<<<<< HEAD
                return $app->make('Illuminate\Contracts\Queue\Factory');
=======
                return $app->make(QueueFactoryContract::class);
>>>>>>> dev
            });
        });
    }
}
