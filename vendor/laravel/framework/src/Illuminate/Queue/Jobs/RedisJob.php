<?php

namespace Illuminate\Queue\Jobs;

<<<<<<< HEAD
use Illuminate\Support\Arr;
=======
>>>>>>> dev
use Illuminate\Queue\RedisQueue;
use Illuminate\Container\Container;
use Illuminate\Contracts\Queue\Job as JobContract;

class RedisJob extends Job implements JobContract
{
    /**
     * The Redis queue instance.
     *
     * @var \Illuminate\Queue\RedisQueue
     */
    protected $redis;

    /**
<<<<<<< HEAD
     * The Redis job payload.
=======
     * The Redis raw job payload.
>>>>>>> dev
     *
     * @var string
     */
    protected $job;

    /**
<<<<<<< HEAD
=======
     * The JSON decoded version of "$job".
     *
     * @var array
     */
    protected $decoded;

    /**
     * The Redis job payload inside the reserved queue.
     *
     * @var string
     */
    protected $reserved;

    /**
>>>>>>> dev
     * Create a new job instance.
     *
     * @param  \Illuminate\Container\Container  $container
     * @param  \Illuminate\Queue\RedisQueue  $redis
     * @param  string  $job
<<<<<<< HEAD
     * @param  string  $queue
     * @return void
     */
    public function __construct(Container $container, RedisQueue $redis, $job, $queue)
    {
        $this->job = $job;
        $this->redis = $redis;
        $this->queue = $queue;
        $this->container = $container;
    }

    /**
     * Fire the job.
     *
     * @return void
     */
    public function fire()
    {
        $this->resolveAndFire(json_decode($this->getRawBody(), true));
=======
     * @param  string  $reserved
     * @param  string  $connectionName
     * @param  string  $queue
     * @return void
     */
    public function __construct(Container $container, RedisQueue $redis, $job, $reserved, $connectionName, $queue)
    {
        // The $job variable is the original job JSON as it existed in the ready queue while
        // the $reserved variable is the raw JSON in the reserved queue. The exact format
        // of the reserved job is required in order for us to properly delete its data.
        $this->job = $job;
        $this->redis = $redis;
        $this->queue = $queue;
        $this->reserved = $reserved;
        $this->container = $container;
        $this->connectionName = $connectionName;

        $this->decoded = $this->payload();
>>>>>>> dev
    }

    /**
     * Get the raw body string for the job.
     *
     * @return string
     */
    public function getRawBody()
    {
        return $this->job;
    }

    /**
     * Delete the job from the queue.
     *
     * @return void
     */
    public function delete()
    {
        parent::delete();

<<<<<<< HEAD
        $this->redis->deleteReserved($this->queue, $this->job);
=======
        $this->redis->deleteReserved($this->queue, $this);
>>>>>>> dev
    }

    /**
     * Release the job back into the queue.
     *
     * @param  int   $delay
     * @return void
     */
    public function release($delay = 0)
    {
        parent::release($delay);

<<<<<<< HEAD
        $this->delete();

        $this->redis->release($this->queue, $this->job, $delay, $this->attempts() + 1);
=======
        $this->redis->deleteAndRelease($this->queue, $this, $delay);
>>>>>>> dev
    }

    /**
     * Get the number of times the job has been attempted.
     *
     * @return int
     */
    public function attempts()
    {
<<<<<<< HEAD
        return Arr::get(json_decode($this->job, true), 'attempts');
=======
        return ($this->decoded['attempts'] ?? null) + 1;
>>>>>>> dev
    }

    /**
     * Get the job identifier.
     *
     * @return string
     */
    public function getJobId()
    {
<<<<<<< HEAD
        return Arr::get(json_decode($this->job, true), 'id');
    }

    /**
     * Get the IoC container instance.
     *
     * @return \Illuminate\Container\Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Get the underlying queue driver instance.
     *
     * @return \Illuminate\Redis\Database
=======
        return $this->decoded['id'] ?? null;
    }

    /**
     * Get the underlying Redis factory implementation.
     *
     * @return \Illuminate\Queue\RedisQueue
>>>>>>> dev
     */
    public function getRedisQueue()
    {
        return $this->redis;
    }

    /**
<<<<<<< HEAD
     * Get the underlying Redis job.
     *
     * @return string
     */
    public function getRedisJob()
    {
        return $this->job;
=======
     * Get the underlying reserved Redis job.
     *
     * @return string
     */
    public function getReservedJob()
    {
        return $this->reserved;
>>>>>>> dev
    }
}
