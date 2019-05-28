<?php

namespace Illuminate\Cache;

use Closure;
use Illuminate\Support\Arr;
use InvalidArgumentException;
<<<<<<< HEAD
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Cache\Factory as FactoryContract;

=======
use Aws\DynamoDb\DynamoDbClient;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Cache\Factory as FactoryContract;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

/**
 * @mixin \Illuminate\Contracts\Cache\Repository
 */
>>>>>>> dev
class CacheManager implements FactoryContract
{
    /**
     * The application instance.
     *
<<<<<<< HEAD
     * @var \Illuminate\Foundation\Application
=======
     * @var \Illuminate\Contracts\Foundation\Application
>>>>>>> dev
     */
    protected $app;

    /**
     * The array of resolved cache stores.
     *
     * @var array
     */
    protected $stores = [];

    /**
     * The registered custom driver creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * Create a new Cache manager instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Foundation\Application  $app
=======
     * @param  \Illuminate\Contracts\Foundation\Application  $app
>>>>>>> dev
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
<<<<<<< HEAD
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
     * @return mixed
=======
     * Get a cache store instance by name, wrapped in a repository.
     *
     * @param  string|null  $name
     * @return \Illuminate\Contracts\Cache\Repository
>>>>>>> dev
     */
    public function store($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->stores[$name] = $this->get($name);
    }

    /**
     * Get a cache driver instance.
     *
<<<<<<< HEAD
     * @param  string  $driver
     * @return mixed
=======
     * @param  string|null  $driver
     * @return \Illuminate\Contracts\Cache\Repository
>>>>>>> dev
     */
    public function driver($driver = null)
    {
        return $this->store($driver);
    }

    /**
     * Attempt to get the store from the local cache.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Cache\Repository
     */
    protected function get($name)
    {
<<<<<<< HEAD
        return isset($this->stores[$name]) ? $this->stores[$name] : $this->resolve($name);
=======
        return $this->stores[$name] ?? $this->resolve($name);
>>>>>>> dev
    }

    /**
     * Resolve the given store.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Cache\Repository
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config)) {
            throw new InvalidArgumentException("Cache store [{$name}] is not defined.");
        }

        if (isset($this->customCreators[$config['driver']])) {
            return $this->callCustomCreator($config);
        } else {
            $driverMethod = 'create'.ucfirst($config['driver']).'Driver';

            if (method_exists($this, $driverMethod)) {
                return $this->{$driverMethod}($config);
            } else {
                throw new InvalidArgumentException("Driver [{$config['driver']}] is not supported.");
            }
        }
    }

    /**
     * Call a custom driver creator.
     *
     * @param  array  $config
     * @return mixed
     */
    protected function callCustomCreator(array $config)
    {
        return $this->customCreators[$config['driver']]($this->app, $config);
    }

    /**
     * Create an instance of the APC cache driver.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \Illuminate\Cache\ApcStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createApcDriver(array $config)
    {
        $prefix = $this->getPrefix($config);

        return $this->repository(new ApcStore(new ApcWrapper, $prefix));
    }

    /**
     * Create an instance of the array cache driver.
     *
<<<<<<< HEAD
     * @return \Illuminate\Cache\ArrayStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createArrayDriver()
    {
        return $this->repository(new ArrayStore);
    }

    /**
     * Create an instance of the file cache driver.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \Illuminate\Cache\FileStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createFileDriver(array $config)
    {
        return $this->repository(new FileStore($this->app['files'], $config['path']));
    }

    /**
     * Create an instance of the Memcached cache driver.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \Illuminate\Cache\MemcachedStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createMemcachedDriver(array $config)
    {
        $prefix = $this->getPrefix($config);

<<<<<<< HEAD
        $memcached = $this->app['memcached.connector']->connect($config['servers']);
=======
        $memcached = $this->app['memcached.connector']->connect(
            $config['servers'],
            $config['persistent_id'] ?? null,
            $config['options'] ?? [],
            array_filter($config['sasl'] ?? [])
        );
>>>>>>> dev

        return $this->repository(new MemcachedStore($memcached, $prefix));
    }

    /**
     * Create an instance of the Null cache driver.
     *
<<<<<<< HEAD
     * @return \Illuminate\Cache\NullStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createNullDriver()
    {
        return $this->repository(new NullStore);
    }

    /**
     * Create an instance of the Redis cache driver.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \Illuminate\Cache\RedisStore
=======
     * @return \Illuminate\Cache\Repository
>>>>>>> dev
     */
    protected function createRedisDriver(array $config)
    {
        $redis = $this->app['redis'];

<<<<<<< HEAD
        $connection = Arr::get($config, 'connection', 'default');
=======
        $connection = $config['connection'] ?? 'default';
>>>>>>> dev

        return $this->repository(new RedisStore($redis, $this->getPrefix($config), $connection));
    }

    /**
     * Create an instance of the database cache driver.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \Illuminate\Cache\DatabaseStore
     */
    protected function createDatabaseDriver(array $config)
    {
        $connection = $this->app['db']->connection(Arr::get($config, 'connection'));

        return $this->repository(
            new DatabaseStore(
                $connection, $this->app['encrypter'], $config['table'], $this->getPrefix($config)
=======
     * @return \Illuminate\Cache\Repository
     */
    protected function createDatabaseDriver(array $config)
    {
        $connection = $this->app['db']->connection($config['connection'] ?? null);

        return $this->repository(
            new DatabaseStore(
                $connection, $config['table'], $this->getPrefix($config)
            )
        );
    }

    /**
     * Create an instance of the DynamoDB cache driver.
     *
     * @param  array  $config
     * @return \Illuminate\Cache\Repository
     */
    protected function createDynamodbDriver(array $config)
    {
        $dynamoConfig = [
            'region' => $config['region'],
            'version' => 'latest',
        ];

        if ($config['key'] && $config['secret']) {
            $dynamoConfig['credentials'] = Arr::only(
                $config, ['key', 'secret', 'token']
            );
        }

        return $this->repository(
            new DynamoDbStore(
                new DynamoDbClient($dynamoConfig),
                $config['table'],
                $config['attributes']['key'] ?? 'key',
                $config['attributes']['value'] ?? 'value',
                $config['attributes']['expiration'] ?? 'expires_at',
                $this->getPrefix($config)
>>>>>>> dev
            )
        );
    }

    /**
     * Create a new cache repository with the given implementation.
     *
     * @param  \Illuminate\Contracts\Cache\Store  $store
     * @return \Illuminate\Cache\Repository
     */
    public function repository(Store $store)
    {
        $repository = new Repository($store);

<<<<<<< HEAD
        if ($this->app->bound('Illuminate\Contracts\Events\Dispatcher')) {
            $repository->setEventDispatcher(
                $this->app['Illuminate\Contracts\Events\Dispatcher']
=======
        if ($this->app->bound(DispatcherContract::class)) {
            $repository->setEventDispatcher(
                $this->app[DispatcherContract::class]
>>>>>>> dev
            );
        }

        return $repository;
    }

    /**
     * Get the cache prefix.
     *
     * @param  array  $config
     * @return string
     */
    protected function getPrefix(array $config)
    {
<<<<<<< HEAD
        return Arr::get($config, 'prefix') ?: $this->app['config']['cache.prefix'];
=======
        return $config['prefix'] ?? $this->app['config']['cache.prefix'];
>>>>>>> dev
    }

    /**
     * Get the cache connection configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["cache.stores.{$name}"];
    }

    /**
     * Get the default cache driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['cache.default'];
    }

    /**
     * Set the default cache driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['cache.default'] = $name;
    }

    /**
<<<<<<< HEAD
     * Register a custom driver creator Closure.
     *
     * @param  string    $driver
=======
     * Unset the given driver instances.
     *
     * @param  array|string|null  $name
     * @return $this
     */
    public function forgetDriver($name = null)
    {
        $name = $name ?? $this->getDefaultDriver();

        foreach ((array) $name as $cacheName) {
            if (isset($this->stores[$cacheName])) {
                unset($this->stores[$cacheName]);
            }
        }

        return $this;
    }

    /**
     * Register a custom driver creator Closure.
     *
     * @param  string  $driver
>>>>>>> dev
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($driver, Closure $callback)
    {
<<<<<<< HEAD
        $this->customCreators[$driver] = $callback;
=======
        $this->customCreators[$driver] = $callback->bindTo($this, $this);
>>>>>>> dev

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
<<<<<<< HEAD
     * @param  array   $parameters
=======
     * @param  array  $parameters
>>>>>>> dev
     * @return mixed
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
        return call_user_func_array([$this->store(), $method], $parameters);
=======
        return $this->store()->$method(...$parameters);
>>>>>>> dev
    }
}
