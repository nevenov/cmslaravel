<?php

namespace Illuminate\Session;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Session\Middleware\StartSession;
>>>>>>> dev

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSessionManager();

        $this->registerSessionDriver();

<<<<<<< HEAD
        $this->app->singleton('Illuminate\Session\Middleware\StartSession');
=======
        $this->app->singleton(StartSession::class);
>>>>>>> dev
    }

    /**
     * Register the session manager instance.
     *
     * @return void
     */
    protected function registerSessionManager()
    {
        $this->app->singleton('session', function ($app) {
            return new SessionManager($app);
        });
    }

    /**
     * Register the session driver instance.
     *
     * @return void
     */
    protected function registerSessionDriver()
    {
        $this->app->singleton('session.store', function ($app) {
            // First, we will create the session manager which is responsible for the
            // creation of the various session drivers when they are needed by the
            // application instance, and will resolve them on a lazy load basis.
<<<<<<< HEAD
            $manager = $app['session'];

            return $manager->driver();
=======
            return $app->make('session')->driver();
>>>>>>> dev
        });
    }
}
