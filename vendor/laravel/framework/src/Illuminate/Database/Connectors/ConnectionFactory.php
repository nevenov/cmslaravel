<?php

namespace Illuminate\Database\Connectors;

<<<<<<< HEAD
use PDO;
use Illuminate\Support\Arr;
use InvalidArgumentException;
=======
use PDOException;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use Illuminate\Database\Connection;
>>>>>>> dev
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\SqlServerConnection;
use Illuminate\Contracts\Container\Container;

class ConnectionFactory
{
    /**
     * The IoC container instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;

    /**
     * Create a new connection factory instance.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Establish a PDO connection based on the configuration.
     *
     * @param  array   $config
     * @param  string  $name
     * @return \Illuminate\Database\Connection
     */
    public function make(array $config, $name = null)
    {
        $config = $this->parseConfig($config, $name);

        if (isset($config['read'])) {
            return $this->createReadWriteConnection($config);
        }

        return $this->createSingleConnection($config);
    }

    /**
<<<<<<< HEAD
=======
     * Parse and prepare the database configuration.
     *
     * @param  array   $config
     * @param  string  $name
     * @return array
     */
    protected function parseConfig(array $config, $name)
    {
        return Arr::add(Arr::add($config, 'prefix', ''), 'name', $name);
    }

    /**
>>>>>>> dev
     * Create a single database connection instance.
     *
     * @param  array  $config
     * @return \Illuminate\Database\Connection
     */
    protected function createSingleConnection(array $config)
    {
<<<<<<< HEAD
        $pdo = function () use ($config) {
            return $this->createConnector($config)->connect($config);
        };

        return $this->createConnection($config['driver'], $pdo, $config['database'], $config['prefix'], $config);
=======
        $pdo = $this->createPdoResolver($config);

        return $this->createConnection(
            $config['driver'], $pdo, $config['database'], $config['prefix'], $config
        );
>>>>>>> dev
    }

    /**
     * Create a single database connection instance.
     *
     * @param  array  $config
     * @return \Illuminate\Database\Connection
     */
    protected function createReadWriteConnection(array $config)
    {
        $connection = $this->createSingleConnection($this->getWriteConfig($config));

        return $connection->setReadPdo($this->createReadPdo($config));
    }

    /**
     * Create a new PDO instance for reading.
     *
     * @param  array  $config
<<<<<<< HEAD
     * @return \PDO
     */
    protected function createReadPdo(array $config)
    {
        $readConfig = $this->getReadConfig($config);

        return $this->createConnector($readConfig)->connect($readConfig);
=======
     * @return \Closure
     */
    protected function createReadPdo(array $config)
    {
        return $this->createPdoResolver($this->getReadConfig($config));
>>>>>>> dev
    }

    /**
     * Get the read configuration for a read / write connection.
     *
     * @param  array  $config
     * @return array
     */
    protected function getReadConfig(array $config)
    {
<<<<<<< HEAD
        $readConfig = $this->getReadWriteConfig($config, 'read');

        if (isset($readConfig['host']) && is_array($readConfig['host'])) {
            $readConfig['host'] = count($readConfig['host']) > 1
                ? $readConfig['host'][array_rand($readConfig['host'])]
                : $readConfig['host'][0];
        }

        return $this->mergeReadWriteConfig($config, $readConfig);
=======
        return $this->mergeReadWriteConfig(
            $config, $this->getReadWriteConfig($config, 'read')
        );
>>>>>>> dev
    }

    /**
     * Get the read configuration for a read / write connection.
     *
     * @param  array  $config
     * @return array
     */
    protected function getWriteConfig(array $config)
    {
<<<<<<< HEAD
        $writeConfig = $this->getReadWriteConfig($config, 'write');

        return $this->mergeReadWriteConfig($config, $writeConfig);
=======
        return $this->mergeReadWriteConfig(
            $config, $this->getReadWriteConfig($config, 'write')
        );
>>>>>>> dev
    }

    /**
     * Get a read / write level configuration.
     *
     * @param  array   $config
     * @param  string  $type
     * @return array
     */
    protected function getReadWriteConfig(array $config, $type)
    {
<<<<<<< HEAD
        if (isset($config[$type][0])) {
            return $config[$type][array_rand($config[$type])];
        }

        return $config[$type];
=======
        return isset($config[$type][0])
                        ? Arr::random($config[$type])
                        : $config[$type];
>>>>>>> dev
    }

    /**
     * Merge a configuration for a read / write connection.
     *
     * @param  array  $config
     * @param  array  $merge
     * @return array
     */
    protected function mergeReadWriteConfig(array $config, array $merge)
    {
        return Arr::except(array_merge($config, $merge), ['read', 'write']);
    }

    /**
<<<<<<< HEAD
     * Parse and prepare the database configuration.
     *
     * @param  array   $config
     * @param  string  $name
     * @return array
     */
    protected function parseConfig(array $config, $name)
    {
        return Arr::add(Arr::add($config, 'prefix', ''), 'name', $name);
=======
     * Create a new Closure that resolves to a PDO instance.
     *
     * @param  array  $config
     * @return \Closure
     */
    protected function createPdoResolver(array $config)
    {
        return array_key_exists('host', $config)
                            ? $this->createPdoResolverWithHosts($config)
                            : $this->createPdoResolverWithoutHosts($config);
    }

    /**
     * Create a new Closure that resolves to a PDO instance with a specific host or an array of hosts.
     *
     * @param  array  $config
     * @return \Closure
     */
    protected function createPdoResolverWithHosts(array $config)
    {
        return function () use ($config) {
            foreach (Arr::shuffle($hosts = $this->parseHosts($config)) as $key => $host) {
                $config['host'] = $host;

                try {
                    return $this->createConnector($config)->connect($config);
                } catch (PDOException $e) {
                    continue;
                }
            }

            throw $e;
        };
    }

    /**
     * Parse the hosts configuration item into an array.
     *
     * @param  array  $config
     * @return array
     */
    protected function parseHosts(array $config)
    {
        $hosts = Arr::wrap($config['host']);

        if (empty($hosts)) {
            throw new InvalidArgumentException('Database hosts array is empty.');
        }

        return $hosts;
    }

    /**
     * Create a new Closure that resolves to a PDO instance where there is no configured host.
     *
     * @param  array  $config
     * @return \Closure
     */
    protected function createPdoResolverWithoutHosts(array $config)
    {
        return function () use ($config) {
            return $this->createConnector($config)->connect($config);
        };
>>>>>>> dev
    }

    /**
     * Create a connector instance based on the configuration.
     *
     * @param  array  $config
     * @return \Illuminate\Database\Connectors\ConnectorInterface
     *
     * @throws \InvalidArgumentException
     */
    public function createConnector(array $config)
    {
        if (! isset($config['driver'])) {
            throw new InvalidArgumentException('A driver must be specified.');
        }

        if ($this->container->bound($key = "db.connector.{$config['driver']}")) {
            return $this->container->make($key);
        }

        switch ($config['driver']) {
            case 'mysql':
                return new MySqlConnector;
            case 'pgsql':
                return new PostgresConnector;
            case 'sqlite':
                return new SQLiteConnector;
            case 'sqlsrv':
                return new SqlServerConnector;
        }

        throw new InvalidArgumentException("Unsupported driver [{$config['driver']}]");
    }

    /**
     * Create a new connection instance.
     *
     * @param  string   $driver
     * @param  \PDO|\Closure     $connection
     * @param  string   $database
     * @param  string   $prefix
     * @param  array    $config
     * @return \Illuminate\Database\Connection
     *
     * @throws \InvalidArgumentException
     */
    protected function createConnection($driver, $connection, $database, $prefix = '', array $config = [])
    {
<<<<<<< HEAD
        if ($this->container->bound($key = "db.connection.{$driver}")) {
            return $this->container->make($key, [$connection, $database, $prefix, $config]);
=======
        if ($resolver = Connection::getResolver($driver)) {
            return $resolver($connection, $database, $prefix, $config);
>>>>>>> dev
        }

        switch ($driver) {
            case 'mysql':
                return new MySqlConnection($connection, $database, $prefix, $config);
            case 'pgsql':
                return new PostgresConnection($connection, $database, $prefix, $config);
            case 'sqlite':
                return new SQLiteConnection($connection, $database, $prefix, $config);
            case 'sqlsrv':
                return new SqlServerConnection($connection, $database, $prefix, $config);
        }

<<<<<<< HEAD
        throw new InvalidArgumentException("Unsupported driver [$driver]");
=======
        throw new InvalidArgumentException("Unsupported driver [{$driver}]");
>>>>>>> dev
    }
}
