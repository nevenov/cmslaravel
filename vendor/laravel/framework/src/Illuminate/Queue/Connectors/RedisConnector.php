<?php

namespace Illuminate\Queue\Connectors;

<<<<<<< HEAD
use Illuminate\Support\Arr;
use Illuminate\Redis\Database;
use Illuminate\Queue\RedisQueue;
=======
use Illuminate\Queue\RedisQueue;
use Illuminate\Contracts\Redis\Factory as Redis;
>>>>>>> dev

class RedisConnector implements ConnectorInterface
{
    /**
     * The Redis database instance.
     *
<<<<<<< HEAD
     * @var \Illuminate\Redis\Database
=======
     * @var \Illuminate\Contracts\Redis\Factory
>>>>>>> dev
     */
    protected $redis;

    /**
     * The connection name.
     *
     * @var string
     */
    protected $connection;

    /**
     * Create a new Redis queue connector instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Redis\Database  $redis
     * @param  string|null  $connection
     * @return void
     */
    public function __construct(Database $redis, $connection = null)
=======
     * @param  \Illuminate\Contracts\Redis\Factory  $redis
     * @param  string|null  $connection
     * @return void
     */
    public function __construct(Redis $redis, $connection = null)
>>>>>>> dev
    {
        $this->redis = $redis;
        $this->connection = $connection;
    }

    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
<<<<<<< HEAD
        $queue = new RedisQueue(
            $this->redis, $config['queue'], Arr::get($config, 'connection', $this->connection)
        );

        $queue->setExpire(Arr::get($config, 'expire', 60));

        return $queue;
=======
        return new RedisQueue(
            $this->redis, $config['queue'],
            $config['connection'] ?? $this->connection,
            $config['retry_after'] ?? 60,
            $config['block_for'] ?? null
        );
>>>>>>> dev
    }
}
