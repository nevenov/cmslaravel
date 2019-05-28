<?php

namespace Illuminate\Foundation\Support\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Contracts\Routing\UrlGenerator;

class RouteServiceProvider extends ServiceProvider
{
=======
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * @mixin \Illuminate\Routing\Router
 */
class RouteServiceProvider extends ServiceProvider
{
    use ForwardsCalls;

>>>>>>> dev
    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace;

    /**
     * Bootstrap any application services.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->setRootControllerNamespace();

        if ($this->app->routesAreCached()) {
=======
     * @return void
     */
    public function boot()
    {
        $this->setRootControllerNamespace();

        if ($this->routesAreCached()) {
>>>>>>> dev
            $this->loadCachedRoutes();
        } else {
            $this->loadRoutes();

<<<<<<< HEAD
            $this->app->booted(function () use ($router) {
                $router->getRoutes()->refreshNameLookups();
=======
            $this->app->booted(function () {
                $this->app['router']->getRoutes()->refreshNameLookups();
                $this->app['router']->getRoutes()->refreshActionLookups();
>>>>>>> dev
            });
        }
    }

    /**
     * Set the root controller namespace for the application.
     *
     * @return void
     */
    protected function setRootControllerNamespace()
    {
<<<<<<< HEAD
        if (is_null($this->namespace)) {
            return;
        }

        $this->app[UrlGenerator::class]->setRootControllerNamespace($this->namespace);
=======
        if (! is_null($this->namespace)) {
            $this->app[UrlGenerator::class]->setRootControllerNamespace($this->namespace);
        }
    }

    /**
     * Determine if the application routes are cached.
     *
     * @return bool
     */
    protected function routesAreCached()
    {
        return $this->app->routesAreCached();
>>>>>>> dev
    }

    /**
     * Load the cached routes for the application.
     *
     * @return void
     */
    protected function loadCachedRoutes()
    {
        $this->app->booted(function () {
            require $this->app->getCachedRoutesPath();
        });
    }

    /**
     * Load the application routes.
     *
     * @return void
     */
    protected function loadRoutes()
    {
<<<<<<< HEAD
        $this->app->call([$this, 'map']);
    }

    /**
     * Load the standard routes file for the application.
     *
     * @param  string  $path
     * @return mixed
     */
    protected function loadRoutesFrom($path)
    {
        $router = $this->app->make(Router::class);

        if (is_null($this->namespace)) {
            return require $path;
        }

        $router->group(['namespace' => $this->namespace], function (Router $router) use ($path) {
            require $path;
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
=======
        if (method_exists($this, 'map')) {
            $this->app->call([$this, 'map']);
        }
>>>>>>> dev
    }

    /**
     * Pass dynamic methods onto the router instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
        return call_user_func_array([$this->app->make(Router::class), $method], $parameters);
=======
        return $this->forwardCallTo(
            $this->app->make(Router::class), $method, $parameters
        );
>>>>>>> dev
    }
}
