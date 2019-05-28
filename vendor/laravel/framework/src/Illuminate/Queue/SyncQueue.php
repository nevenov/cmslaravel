<?php

namespace Illuminate\Queue;

use Exception;
use Throwable;
use Illuminate\Queue\Jobs\SyncJob;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Contracts\Queue\Queue as QueueContract;
<<<<<<< HEAD
=======
use Symfony\Component\Debug\Exception\FatalThrowableError;
>>>>>>> dev

class SyncQueue extends Queue implements QueueContract
{
    /**
<<<<<<< HEAD
=======
     * Get the size of the queue.
     *
     * @param  string  $queue
     * @return int
     */
    public function size($queue = null)
    {
        return 0;
    }

    /**
>>>>>>> dev
     * Push a new job onto the queue.
     *
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     *
     * @throws \Exception|\Throwable
     */
    public function push($job, $data = '', $queue = null)
    {
<<<<<<< HEAD
        $queueJob = $this->resolveJob($this->createPayload($job, $data, $queue));
=======
        $queueJob = $this->resolveJob($this->createPayload($job, $queue, $data), $queue);
>>>>>>> dev

        try {
            $this->raiseBeforeJobEvent($queueJob);

            $queueJob->fire();

            $this->raiseAfterJobEvent($queueJob);
        } catch (Exception $e) {
<<<<<<< HEAD
            $this->raiseExceptionOccurredJobEvent($queueJob, $e);

            $this->handleFailedJob($queueJob);

            throw $e;
        } catch (Throwable $e) {
            $this->raiseExceptionOccurredJobEvent($queueJob, $e);

            $this->handleFailedJob($queueJob);

            throw $e;
=======
            $this->handleException($queueJob, $e);
        } catch (Throwable $e) {
            $this->handleException($queueJob, new FatalThrowableError($e));
>>>>>>> dev
        }

        return 0;
    }

    /**
<<<<<<< HEAD
     * Push a raw payload onto the queue.
     *
     * @param  string  $payload
     * @param  string  $queue
     * @param  array   $options
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = [])
    {
        //
    }

    /**
     * Push a new job onto the queue after a delay.
     *
     * @param  \DateTime|int  $delay
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
        return $this->push($job, $data, $queue);
    }

    /**
     * Pop the next job off of the queue.
     *
     * @param  string  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
        //
    }

    /**
     * Resolve a Sync job instance.
     *
     * @param  string  $payload
     * @return \Illuminate\Queue\Jobs\SyncJob
     */
    protected function resolveJob($payload)
    {
        return new SyncJob($this->container, $payload);
=======
     * Resolve a Sync job instance.
     *
     * @param  string  $payload
     * @param  string  $queue
     * @return \Illuminate\Queue\Jobs\SyncJob
     */
    protected function resolveJob($payload, $queue)
    {
        return new SyncJob($this->container, $payload, $this->connectionName, $queue);
>>>>>>> dev
    }

    /**
     * Raise the before queue job event.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @return void
     */
    protected function raiseBeforeJobEvent(Job $job)
    {
<<<<<<< HEAD
        $data = json_decode($job->getRawBody(), true);

        if ($this->container->bound('events')) {
            $this->container['events']->fire(new Events\JobProcessing('sync', $job, $data));
=======
        if ($this->container->bound('events')) {
            $this->container['events']->dispatch(new Events\JobProcessing($this->connectionName, $job));
>>>>>>> dev
        }
    }

    /**
     * Raise the after queue job event.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @return void
     */
    protected function raiseAfterJobEvent(Job $job)
    {
<<<<<<< HEAD
        $data = json_decode($job->getRawBody(), true);

        if ($this->container->bound('events')) {
            $this->container['events']->fire(new Events\JobProcessed('sync', $job, $data));
=======
        if ($this->container->bound('events')) {
            $this->container['events']->dispatch(new Events\JobProcessed($this->connectionName, $job));
>>>>>>> dev
        }
    }

    /**
     * Raise the exception occurred queue job event.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
<<<<<<< HEAD
     * @param  \Throwable  $exception
     * @return void
     */
    protected function raiseExceptionOccurredJobEvent(Job $job, $exception)
    {
        $data = json_decode($job->getRawBody(), true);

        if ($this->container->bound('events')) {
            $this->container['events']->fire(new Events\JobExceptionOccurred('sync', $job, $data, $exception));
=======
     * @param  \Exception  $e
     * @return void
     */
    protected function raiseExceptionOccurredJobEvent(Job $job, $e)
    {
        if ($this->container->bound('events')) {
            $this->container['events']->dispatch(new Events\JobExceptionOccurred($this->connectionName, $job, $e));
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Handle the failed job.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @return array
     */
    protected function handleFailedJob(Job $job)
    {
        $job->failed();

        $this->raiseFailedJobEvent($job);
    }

    /**
     * Raise the failed queue job event.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @return void
     */
    protected function raiseFailedJobEvent(Job $job)
    {
        $data = json_decode($job->getRawBody(), true);

        if ($this->container->bound('events')) {
            $this->container['events']->fire(new Events\JobFailed('sync', $job, $data));
        }
=======
     * Handle an exception that occurred while processing a job.
     *
     * @param  \Illuminate\Queue\Jobs\Job  $queueJob
     * @param  \Exception  $e
     * @return void
     *
     * @throws \Exception
     */
    protected function handleException($queueJob, $e)
    {
        $this->raiseExceptionOccurredJobEvent($queueJob, $e);

        $queueJob->fail($e);

        throw $e;
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
        //
    }

    /**
     * Push a new job onto the queue after a delay.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
        return $this->push($job, $data, $queue);
    }

    /**
     * Pop the next job off of the queue.
     *
     * @param  string  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
        //
>>>>>>> dev
    }
}
