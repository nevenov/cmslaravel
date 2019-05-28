<?php

namespace Illuminate\Contracts\Routing;

<<<<<<< HEAD
use Closure;

=======
>>>>>>> dev
interface Registrar
{
    /**
     * Register a new GET route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function get($uri, $action);

    /**
     * Register a new POST route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function post($uri, $action);

    /**
     * Register a new PUT route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function put($uri, $action);

    /**
     * Register a new DELETE route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function delete($uri, $action);

    /**
     * Register a new PATCH route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function patch($uri, $action);

    /**
     * Register a new OPTIONS route with the router.
     *
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function options($uri, $action);

    /**
     * Register a new route with the given verbs.
     *
     * @param  array|string  $methods
     * @param  string  $uri
<<<<<<< HEAD
     * @param  \Closure|array|string  $action
     * @return void
=======
     * @param  \Closure|array|string|callable  $action
     * @return \Illuminate\Routing\Route
>>>>>>> dev
     */
    public function match($methods, $uri, $action);

    /**
     * Route a resource to a controller.
     *
     * @param  string  $name
     * @param  string  $controller
     * @param  array   $options
<<<<<<< HEAD
     * @return void
=======
     * @return \Illuminate\Routing\PendingResourceRegistration
>>>>>>> dev
     */
    public function resource($name, $controller, array $options = []);

    /**
     * Create a route group with shared attributes.
     *
<<<<<<< HEAD
     * @param  array     $attributes
     * @param  \Closure  $callback
     * @return void
     */
    public function group(array $attributes, Closure $callback);
=======
     * @param  array  $attributes
     * @param  \Closure|string  $routes
     * @return void
     */
    public function group(array $attributes, $routes);

    /**
     * Substitute the route bindings onto the route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return \Illuminate\Routing\Route
     */
    public function substituteBindings($route);

    /**
     * Substitute the implicit Eloquent model bindings for the route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return void
     */
    public function substituteImplicitBindings($route);
>>>>>>> dev
}
