<?php

namespace Illuminate\Session;

use Illuminate\Support\Manager;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NullSessionHandler;
=======
>>>>>>> dev

class SessionManager extends Manager
{
    /**
     * Call a custom driver creator.
     *
     * @param  string  $driver
     * @return mixed
     */
    protected function callCustomCreator($driver)
    {
        return $this->buildSession(parent::callCustomCreator($driver));
    }

    /**
     * Create an instance of the "array" session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createArrayDriver()
    {
        return $this->buildSession(new NullSessionHandler);
    }

    /**
     * Create an instance of the "cookie" session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createCookieDriver()
    {
<<<<<<< HEAD
        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new CookieSessionHandler($this->app['cookie'], $lifetime));
=======
        return $this->buildSession(new CookieSessionHandler(
            $this->app['cookie'], $this->app['config']['session.lifetime']
        ));
>>>>>>> dev
    }

    /**
     * Create an instance of the file session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createFileDriver()
    {
        return $this->createNativeDriver();
    }

    /**
     * Create an instance of the file session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createNativeDriver()
    {
<<<<<<< HEAD
        $path = $this->app['config']['session.files'];

        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new FileSessionHandler($this->app['files'], $path, $lifetime));
=======
        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new FileSessionHandler(
            $this->app['files'], $this->app['config']['session.files'], $lifetime
        ));
>>>>>>> dev
    }

    /**
     * Create an instance of the database session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createDatabaseDriver()
    {
<<<<<<< HEAD
        $connection = $this->getDatabaseConnection();

        $table = $this->app['config']['session.table'];

        $lifetime = $this->app['config']['session.lifetime'];

        return $this->buildSession(new DatabaseSessionHandler($connection, $table, $lifetime, $this->app));
    }

    /**
     * Create an instance of the legacy database session driver.
     *
     * @return \Illuminate\Session\Store
     *
     * @deprecated since version 5.2.
     */
    protected function createLegacyDatabaseDriver()
    {
        $connection = $this->getDatabaseConnection();

=======
>>>>>>> dev
        $table = $this->app['config']['session.table'];

        $lifetime = $this->app['config']['session.lifetime'];

<<<<<<< HEAD
        return $this->buildSession(new LegacyDatabaseSessionHandler($connection, $table, $lifetime));
=======
        return $this->buildSession(new DatabaseSessionHandler(
            $this->getDatabaseConnection(), $table, $lifetime, $this->app
        ));
>>>>>>> dev
    }

    /**
     * Get the database connection for the database driver.
     *
     * @return \Illuminate\Database\Connection
     */
    protected function getDatabaseConnection()
    {
        $connection = $this->app['config']['session.connection'];

        return $this->app['db']->connection($connection);
    }

    /**
     * Create an instance of the APC session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createApcDriver()
    {
        return $this->createCacheBased('apc');
    }

    /**
     * Create an instance of the Memcached session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createMemcachedDriver()
    {
        return $this->createCacheBased('memcached');
    }

    /**
<<<<<<< HEAD
     * Create an instance of the Wincache session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createWincacheDriver()
    {
        return $this->createCacheBased('wincache');
    }

    /**
     * Create an instance of the Redis session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createRedisDriver()
    {
        $handler = $this->createCacheHandler('redis');

        $handler->getCache()->getStore()->setConnection($this->app['config']['session.connection']);

        return $this->buildSession($handler);
=======
     * Create an instance of the Redis session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createRedisDriver()
    {
        $handler = $this->createCacheHandler('redis');

        $handler->getCache()->getStore()->setConnection(
            $this->app['config']['session.connection']
        );

        return $this->buildSession($handler);
    }

    /**
     * Create an instance of the DynamoDB session driver.
     *
     * @return \Illuminate\Session\Store
     */
    protected function createDynamodbDriver()
    {
        return $this->createCacheBased('dynamodb');
>>>>>>> dev
    }

    /**
     * Create an instance of a cache driven driver.
     *
     * @param  string  $driver
     * @return \Illuminate\Session\Store
     */
    protected function createCacheBased($driver)
    {
        return $this->buildSession($this->createCacheHandler($driver));
    }

    /**
     * Create the cache based session handler instance.
     *
     * @param  string  $driver
     * @return \Illuminate\Session\CacheBasedSessionHandler
     */
    protected function createCacheHandler($driver)
    {
<<<<<<< HEAD
        $minutes = $this->app['config']['session.lifetime'];

        return new CacheBasedSessionHandler(clone $this->app['cache']->driver($driver), $minutes);
=======
        $store = $this->app['config']->get('session.store') ?: $driver;

        return new CacheBasedSessionHandler(
            clone $this->app['cache']->store($store),
            $this->app['config']['session.lifetime']
        );
>>>>>>> dev
    }

    /**
     * Build the session instance.
     *
     * @param  \SessionHandlerInterface  $handler
     * @return \Illuminate\Session\Store
     */
    protected function buildSession($handler)
    {
<<<<<<< HEAD
        if ($this->app['config']['session.encrypt']) {
            return new EncryptedStore(
                $this->app['config']['session.cookie'], $handler, $this->app['encrypter']
            );
        } else {
            return new Store($this->app['config']['session.cookie'], $handler);
        }
=======
        return $this->app['config']['session.encrypt']
                ? $this->buildEncryptedSession($handler)
                : new Store($this->app['config']['session.cookie'], $handler);
    }

    /**
     * Build the encrypted session instance.
     *
     * @param  \SessionHandlerInterface  $handler
     * @return \Illuminate\Session\EncryptedStore
     */
    protected function buildEncryptedSession($handler)
    {
        return new EncryptedStore(
            $this->app['config']['session.cookie'], $handler, $this->app['encrypter']
        );
>>>>>>> dev
    }

    /**
     * Get the session configuration.
     *
     * @return array
     */
    public function getSessionConfig()
    {
        return $this->app['config']['session'];
    }

    /**
     * Get the default session driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['session.driver'];
    }

    /**
     * Set the default session driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']['session.driver'] = $name;
    }
}
