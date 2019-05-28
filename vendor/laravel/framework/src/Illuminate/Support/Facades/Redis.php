<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
 * @see \Illuminate\Redis\Database
=======
 * @method static \Illuminate\Redis\Connections\Connection connection(string $name = null)
 *
 * @see \Illuminate\Redis\RedisManager
 * @see \Illuminate\Contracts\Redis\Factory
>>>>>>> dev
 */
class Redis extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'redis';
    }
}
