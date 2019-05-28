<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
=======
 * @method static void queue(...$parameters)
 * @method static unqueue($name)
 * @method static array getQueuedCookies()
 *
>>>>>>> dev
 * @see \Illuminate\Cookie\CookieJar
 */
class Cookie extends Facade
{
    /**
     * Determine if a cookie exists on the request.
     *
     * @param  string  $key
     * @return bool
     */
    public static function has($key)
    {
        return ! is_null(static::$app['request']->cookie($key, null));
    }

    /**
     * Retrieve a cookie from the request.
     *
     * @param  string  $key
     * @param  mixed   $default
<<<<<<< HEAD
     * @return string
=======
     * @return string|array|null
>>>>>>> dev
     */
    public static function get($key = null, $default = null)
    {
        return static::$app['request']->cookie($key, $default);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cookie';
    }
}
