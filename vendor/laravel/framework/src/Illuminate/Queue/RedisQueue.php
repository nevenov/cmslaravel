<?php

namespace Illuminate\Queue;

<<<<<<< HEAD
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Redis\Database;
use Illuminate\Queue\Jobs\RedisJob;
=======
use Illuminate\Support\Str;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Contracts\Redis\Factory as Redis;
>>>>>>> dev
use Illuminate\Contracts\Queue\Queue as QueueContract;

class RedisQueue extends Queue implements QueueContract
{
    /**
<<<<<<< HEAD
     * The Redis database instance.
     *
     * @var \Illuminate\Redis\Database
=======
     * The Redis factory implementation.
     *
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
     * The name of the default queue.
     *
     * @var string
     */
    protected $default;

    /**
     * The expiration time of a job.
     *
     * @var int|null
     */
<<<<<<< HEAD
    protected $expire = 60;
=======
    protected $retryAfter = 60;

    /**
     * The maximum number of seconds to block for a job.
     *
     * @var int|null
     */
    protected $blockFor = null;
>>>>>>> dev

    /**
     * Create a new Redis queue instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Redis\Database  $redis
     * @param  string  $default
     * @param  string  $connection
     * @return void
     */
    public function __construct(Database $redis, $default = 'default', $connection = null)
    {
        $this->redis = $redis;
        $this->default = $default;
        $this->connection = $connection;
=======
     * @param  \Illuminate\Contracts\Redis\Factory  $redis
     * @param  string  $default
     * @param  string  $connection
     * @param  int  $retryAfter
     * @param  int|null  $blockFor
     * @return void
     */
    public function __construct(Redis $redis, $default = 'default', $connection = null, $retryAfter = 60, $blockFor = null)
    {
        $this->redis = $redis;
        $this->default = $default;
        $this->blockFor = $blockFor;
        $this->connection = $connection;
        $this->retryAfter = $retryAfter;
    }

    /**
     * Get the size of the queue.
     *
     * @param  string  $queue
     * @return int
     */
    public function size($queue = null)
    {
        $queue = $this->getQueue($queue);

        return $this->getConnection()->eval(
            LuaScripts::size(), 3, $queue, $queue.':delayed', $queue.':reserved'
        );
>>>>>>> dev
    }

    /**
     * Push a new job onto the queue.
     *
<<<<<<< HEAD
     * @param  string  $job
=======
     * @param  object|string  $job
>>>>>>> dev
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function push($job, $data = '', $queue = null)
    {
<<<<<<< HEAD
        return $this->pushRaw($this->createPayload($job, $data), $queue);
=======
        return $this->pushRaw($this->createPayload($job, $this->getQueue($queue), $data), $queue);
>>>>>>> dev
    }

    /**
     * Push a raw payload onto the queue.
     *
     * @param  string  $payload
     * @param  string  $queue
     * @param  array   $options
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = [])
    {
<<<<<<< HEAD
        $this->getConnection()->rpush($this->getQueue($queue), $payload);

        return Arr::get(json_decode($payload, true), 'id');
=======
        $this->getConnection()->eval(
            LuaScripts::push(), 2, $this->getQueue($queue),
            $this->getQueue($queue).':notify', $payload
        );

        return json_decode($payload, true)['id'] ?? null;
>>>>>>> dev
    }

    /**
     * Push a new job onto the queue after a delay.
     *
<<<<<<< HEAD
     * @param  \DateTime|int  $delay
     * @param  string  $job
=======
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  object|string  $job
>>>>>>> dev
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
<<<<<<< HEAD
        $payload = $this->createPayload($job, $data);

        $delay = $this->getSeconds($delay);

        $this->getConnection()->zadd($this->getQueue($queue).':delayed', $this->getTime() + $delay, $payload);

        return Arr::get(json_decode($payload, true), 'id');
    }

    /**
     * Release a reserved job back onto the queue.
     *
     * @param  string  $queue
     * @param  string  $payload
     * @param  int  $delay
     * @param  int  $attempts
     * @return void
     */
    public function release($queue, $payload, $delay, $attempts)
    {
        $payload = $this->setMeta($payload, 'attempts', $attempts);

        $this->getConnection()->zadd($this->getQueue($queue).':delayed', $this->getTime() + $delay, $payload);
=======
        return $this->laterRaw($delay, $this->createPayload($job, $this->getQueue($queue), $data), $queue);
    }

    /**
     * Push a raw job onto the queue after a delay.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string  $payload
     * @param  string  $queue
     * @return mixed
     */
    protected function laterRaw($delay, $payload, $queue = null)
    {
        $this->getConnection()->zadd(
            $this->getQueue($queue).':delayed', $this->availableAt($delay), $payload
        );

        return json_decode($payload, true)['id'] ?? null;
    }

    /**
     * Create a payload string from the given job and data.
     *
     * @param  string  $job
     * @param  string   $queue
     * @param  mixed   $data
     * @return string
     */
    protected function createPayloadArray($job, $queue, $data = '')
    {
        return array_merge(parent::createPayloadArray($job, $queue, $data), [
            'id' => $this->getRandomId(),
            'attempts' => 0,
        ]);
>>>>>>> dev
    }

    /**
     * Pop the next job off of the queue.
     *
     * @param  string  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
<<<<<<< HEAD
        $original = $queue ?: $this->default;

        $queue = $this->getQueue($queue);

        if (! is_null($this->expire)) {
            $this->migrateAllExpiredJobs($queue);
        }

        $job = $this->getConnection()->lpop($queue);

        if (! is_null($job)) {
            $this->getConnection()->zadd($queue.':reserved', $this->getTime() + $this->expire, $job);

            return new RedisJob($this->container, $this, $job, $original);
=======
        $this->migrate($prefixed = $this->getQueue($queue));

        if (empty($nextJob = $this->retrieveNextJob($prefixed))) {
            return;
        }

        [$job, $reserved] = $nextJob;

        if ($reserved) {
            return new RedisJob(
                $this->container, $this, $job,
                $reserved, $this->connectionName, $queue ?: $this->default
            );
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Delete a reserved job from the queue.
     *
     * @param  string  $queue
     * @param  string  $job
     * @return void
     */
    public function deleteReserved($queue, $job)
    {
        $this->getConnection()->zrem($this->getQueue($queue).':reserved', $job);
    }

    /**
     * Migrate all of the waiting jobs in the queue.
     *
     * @param  string  $queue
     * @return void
     */
    protected function migrateAllExpiredJobs($queue)
    {
        $this->migrateExpiredJobs($queue.':delayed', $queue);

        $this->migrateExpiredJobs($queue.':reserved', $queue);
=======
     * Migrate any delayed or expired jobs onto the primary queue.
     *
     * @param  string  $queue
     * @return void
     */
    protected function migrate($queue)
    {
        $this->migrateExpiredJobs($queue.':delayed', $queue);

        if (! is_null($this->retryAfter)) {
            $this->migrateExpiredJobs($queue.':reserved', $queue);
        }
>>>>>>> dev
    }

    /**
     * Migrate the delayed jobs that are ready to the regular queue.
     *
     * @param  string  $from
     * @param  string  $to
<<<<<<< HEAD
     * @return void
     */
    public function migrateExpiredJobs($from, $to)
    {
        $options = ['cas' => true, 'watch' => $from, 'retry' => 10];

        $this->getConnection()->transaction($options, function ($transaction) use ($from, $to) {
            // First we need to get all of jobs that have expired based on the current time
            // so that we can push them onto the main queue. After we get them we simply
            // remove them from this "delay" queues. All of this within a transaction.
            $jobs = $this->getExpiredJobs(
                $transaction, $from, $time = $this->getTime()
            );

            // If we actually found any jobs, we will remove them from the old queue and we
            // will insert them onto the new (ready) "queue". This means they will stand
            // ready to be processed by the queue worker whenever their turn comes up.
            if (count($jobs) > 0) {
                $this->removeExpiredJobs($transaction, $from, $time);

                $this->pushExpiredJobsOntoNewQueue($transaction, $to, $jobs);
            }
        });
    }

    /**
     * Get the expired jobs from a given queue.
     *
     * @param  \Predis\Transaction\MultiExec  $transaction
     * @param  string  $from
     * @param  int  $time
     * @return array
     */
    protected function getExpiredJobs($transaction, $from, $time)
    {
        return $transaction->zrangebyscore($from, '-inf', $time);
    }

    /**
     * Remove the expired jobs from a given queue.
     *
     * @param  \Predis\Transaction\MultiExec  $transaction
     * @param  string  $from
     * @param  int  $time
     * @return void
     */
    protected function removeExpiredJobs($transaction, $from, $time)
    {
        $transaction->multi();

        $transaction->zremrangebyscore($from, '-inf', $time);
    }

    /**
     * Push all of the given jobs onto another queue.
     *
     * @param  \Predis\Transaction\MultiExec  $transaction
     * @param  string  $to
     * @param  array  $jobs
     * @return void
     */
    protected function pushExpiredJobsOntoNewQueue($transaction, $to, $jobs)
    {
        call_user_func_array([$transaction, 'rpush'], array_merge([$to], $jobs));
    }

    /**
     * Create a payload string from the given job and data.
     *
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return string
     */
    protected function createPayload($job, $data = '', $queue = null)
    {
        $payload = parent::createPayload($job, $data);

        $payload = $this->setMeta($payload, 'id', $this->getRandomId());

        return $this->setMeta($payload, 'attempts', 1);
=======
     * @return array
     */
    public function migrateExpiredJobs($from, $to)
    {
        return $this->getConnection()->eval(
            LuaScripts::migrateExpiredJobs(), 3, $from, $to, $to.':notify', $this->currentTime()
        );
    }

    /**
     * Retrieve the next job from the queue.
     *
     * @param  string  $queue
     * @param  bool  $block
     * @return array
     */
    protected function retrieveNextJob($queue, $block = true)
    {
        $nextJob = $this->getConnection()->eval(
            LuaScripts::pop(), 3, $queue, $queue.':reserved', $queue.':notify',
            $this->availableAt($this->retryAfter)
        );

        if (empty($nextJob)) {
            return [null, null];
        }

        [$job, $reserved] = $nextJob;

        if (! $job && ! is_null($this->blockFor) && $block &&
            $this->getConnection()->blpop([$queue.':notify'], $this->blockFor)) {
            return $this->retrieveNextJob($queue, false);
        }

        return [$job, $reserved];
    }

    /**
     * Delete a reserved job from the queue.
     *
     * @param  string  $queue
     * @param  \Illuminate\Queue\Jobs\RedisJob  $job
     * @return void
     */
    public function deleteReserved($queue, $job)
    {
        $this->getConnection()->zrem($this->getQueue($queue).':reserved', $job->getReservedJob());
    }

    /**
     * Delete a reserved job from the reserved queue and release it.
     *
     * @param  string  $queue
     * @param  \Illuminate\Queue\Jobs\RedisJob  $job
     * @param  int  $delay
     * @return void
     */
    public function deleteAndRelease($queue, $job, $delay)
    {
        $queue = $this->getQueue($queue);

        $this->getConnection()->eval(
            LuaScripts::release(), 2, $queue.':delayed', $queue.':reserved',
            $job->getReservedJob(), $this->availableAt($delay)
        );
>>>>>>> dev
    }

    /**
     * Get a random ID string.
     *
     * @return string
     */
    protected function getRandomId()
    {
        return Str::random(32);
    }

    /**
     * Get the queue or return the default.
     *
     * @param  string|null  $queue
     * @return string
     */
<<<<<<< HEAD
    protected function getQueue($queue)
=======
    public function getQueue($queue)
>>>>>>> dev
    {
        return 'queues:'.($queue ?: $this->default);
    }

    /**
     * Get the connection for the queue.
     *
<<<<<<< HEAD
     * @return \Predis\ClientInterface
=======
     * @return \Illuminate\Redis\Connections\Connection
>>>>>>> dev
     */
    protected function getConnection()
    {
        return $this->redis->connection($this->connection);
    }

    /**
     * Get the underlying Redis instance.
     *
<<<<<<< HEAD
     * @return \Illuminate\Redis\Database
=======
     * @return \Illuminate\Contracts\Redis\Factory
>>>>>>> dev
     */
    public function getRedis()
    {
        return $this->redis;
    }
<<<<<<< HEAD

    /**
     * Get the expiration time in seconds.
     *
     * @return int|null
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set the expiration time in seconds.
     *
     * @param  int|null  $seconds
     * @return void
     */
    public function setExpire($seconds)
    {
        $this->expire = $seconds;
    }
=======
>>>>>>> dev
}
