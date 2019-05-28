<?php

namespace Illuminate\Routing;

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;

class ControllerDispatcher
=======
use Illuminate\Container\Container;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;

class ControllerDispatcher implements ControllerDispatcherContract
>>>>>>> dev
{
    use RouteDependencyResolverTrait;

    /**
<<<<<<< HEAD
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * The IoC container instance.
=======
     * The container instance.
>>>>>>> dev
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * Create a new controller dispatcher instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Routing\Router  $router
     * @param  \Illuminate\Container\Container  $container
     * @return void
     */
    public function __construct(Router $router,
                                Container $container = null)
    {
        $this->router = $router;
=======
     * @param  \Illuminate\Container\Container  $container
     * @return void
     */
    public function __construct(Container $container)
    {
>>>>>>> dev
        $this->container = $container;
    }

    /**
     * Dispatch a request to a given controller and method.
     *
     * @param  \Illuminate\Routing\Route  $route
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $controller
     * @param  string  $method
     * @return mixed
     */
    public function dispatch(Route $route, Request $request, $controller, $method)
    {
        $instance = $this->makeController($controller);

        return $this->callWithinStack($instance, $route, $request, $method);
    }

    /**
     * Make a controller instance via the IoC container.
     *
     * @param  string  $controller
     * @return mixed
     */
    protected function makeController($controller)
    {
        Controller::setRouter($this->router);

        return $this->container->make($controller);
    }

    /**
     * Call the given controller instance method.
     *
     * @param  \Illuminate\Routing\Controller  $instance
     * @param  \Illuminate\Routing\Route  $route
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $method
     * @return mixed
     */
    protected function callWithinStack($instance, $route, $request, $method)
    {
        $shouldSkipMiddleware = $this->container->bound('middleware.disable') &&
                                $this->container->make('middleware.disable') === true;

        $middleware = $shouldSkipMiddleware ? [] : $this->getMiddleware($instance, $method);

        // Here we will make a stack onion instance to execute this request in, which gives
        // us the ability to define middlewares on controllers. We will return the given
        // response back out so that "after" filters can be run after the middlewares.
        return (new Pipeline($this->container))
                    ->send($request)
                    ->through($middleware)
                    ->then(function ($request) use ($instance, $route, $method) {
                        return $this->router->prepareResponse(
                            $request, $this->call($instance, $route, $method)
                        );
                    });
=======
     * @param  mixed  $controller
     * @param  string  $method
     * @return mixed
     */
    public function dispatch(Route $route, $controller, $method)
    {
        $parameters = $this->resolveClassMethodDependencies(
            $route->parametersWithoutNulls(), $controller, $method
        );

        if (method_exists($controller, 'callAction')) {
            return $controller->callAction($method, $parameters);
        }

        return $controller->{$method}(...array_values($parameters));
>>>>>>> dev
    }

    /**
     * Get the middleware for the controller instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Routing\Controller  $instance
     * @param  string  $method
     * @return array
     */
    public function getMiddleware($instance, $method)
    {
        $results = new Collection;

        foreach ($instance->getMiddleware() as $name => $options) {
            if (! $this->methodExcludedByOptions($method, $options)) {
                $results[] = $this->router->resolveMiddlewareClassName($name);
            }
        }

        return $results->flatten()->all();
=======
     * @param  \Illuminate\Routing\Controller  $controller
     * @param  string  $method
     * @return array
     */
    public function getMiddleware($controller, $method)
    {
        if (! method_exists($controller, 'getMiddleware')) {
            return [];
        }

        return collect($controller->getMiddleware())->reject(function ($data) use ($method) {
            return static::methodExcludedByOptions($method, $data['options']);
        })->pluck('middleware')->all();
>>>>>>> dev
    }

    /**
     * Determine if the given options exclude a particular method.
     *
     * @param  string  $method
     * @param  array  $options
     * @return bool
     */
<<<<<<< HEAD
    public function methodExcludedByOptions($method, array $options)
=======
    protected static function methodExcludedByOptions($method, array $options)
>>>>>>> dev
    {
        return (isset($options['only']) && ! in_array($method, (array) $options['only'])) ||
            (! empty($options['except']) && in_array($method, (array) $options['except']));
    }
<<<<<<< HEAD

    /**
     * Call the given controller instance method.
     *
     * @param  \Illuminate\Routing\Controller  $instance
     * @param  \Illuminate\Routing\Route  $route
     * @param  string  $method
     * @return mixed
     */
    protected function call($instance, $route, $method)
    {
        $parameters = $this->resolveClassMethodDependencies(
            $route->parametersWithoutNulls(), $instance, $method
        );

        return $instance->callAction($method, $parameters);
    }
=======
>>>>>>> dev
}
