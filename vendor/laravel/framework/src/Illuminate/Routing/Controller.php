<?php

namespace Illuminate\Routing;

use BadMethodCallException;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
=======
>>>>>>> dev

abstract class Controller
{
    /**
     * The middleware registered on the controller.
     *
     * @var array
     */
    protected $middleware = [];

    /**
<<<<<<< HEAD
     * The router instance.
     *
     * @var \Illuminate\Routing\Router
     */
    protected static $router;

    /**
     * Register middleware on the controller.
     *
     * @param  array|string  $middleware
=======
     * Register middleware on the controller.
     *
     * @param  array|string|\Closure  $middleware
>>>>>>> dev
     * @param  array   $options
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function middleware($middleware, array $options = [])
    {
<<<<<<< HEAD
        foreach ((array) $middleware as $middlewareName) {
            $this->middleware[$middlewareName] = &$options;
=======
        foreach ((array) $middleware as $m) {
            $this->middleware[] = [
                'middleware' => $m,
                'options' => &$options,
            ];
>>>>>>> dev
        }

        return new ControllerMiddlewareOptions($options);
    }

    /**
     * Get the middleware assigned to the controller.
     *
     * @return array
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
<<<<<<< HEAD
     * Get the router instance.
     *
     * @return \Illuminate\Routing\Router
     */
    public static function getRouter()
    {
        return static::$router;
    }

    /**
     * Set the router instance.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public static function setRouter(Router $router)
    {
        static::$router = $router;
    }

    /**
=======
>>>>>>> dev
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        return call_user_func_array([$this, $method], $parameters);
    }

    /**
     * Handle calls to missing methods on the controller.
     *
<<<<<<< HEAD
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function missingMethod($parameters = [])
    {
        throw new NotFoundHttpException('Controller method not found.');
    }

    /**
     * Handle calls to missing methods on the controller.
     *
=======
>>>>>>> dev
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
        throw new BadMethodCallException("Method [$method] does not exist.");
=======
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
>>>>>>> dev
    }
}
