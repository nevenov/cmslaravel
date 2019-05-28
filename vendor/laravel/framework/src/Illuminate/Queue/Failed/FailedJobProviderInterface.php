<?php

namespace Illuminate\Queue\Failed;

interface FailedJobProviderInterface
{
    /**
     * Log a failed job into storage.
     *
     * @param  string  $connection
     * @param  string  $queue
     * @param  string  $payload
<<<<<<< HEAD
     * @return int|null
     */
    public function log($connection, $queue, $payload);
=======
     * @param  \Exception  $exception
     * @return int|null
     */
    public function log($connection, $queue, $payload, $exception);
>>>>>>> dev

    /**
     * Get a list of all of the failed jobs.
     *
     * @return array
     */
    public function all();

    /**
     * Get a single failed job.
     *
     * @param  mixed  $id
<<<<<<< HEAD
     * @return array
=======
     * @return object|null
>>>>>>> dev
     */
    public function find($id);

    /**
     * Delete a single failed job from storage.
     *
     * @param  mixed  $id
     * @return bool
     */
    public function forget($id);

    /**
     * Flush all of the failed jobs from storage.
     *
     * @return void
     */
    public function flush();
}
