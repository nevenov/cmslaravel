<?php

namespace Illuminate\Queue;

<<<<<<< HEAD
use Illuminate\Contracts\Queue\Job;
use Illuminate\Contracts\Bus\Dispatcher;
=======
use Exception;
use ReflectionClass;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
>>>>>>> dev

class CallQueuedHandler
{
    /**
     * The bus dispatcher implementation.
     *
     * @var \Illuminate\Contracts\Bus\Dispatcher
     */
    protected $dispatcher;

    /**
     * Create a new handler instance.
     *
     * @param  \Illuminate\Contracts\Bus\Dispatcher  $dispatcher
     * @return void
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Handle the queued job.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  array  $data
     * @return void
     */
    public function call(Job $job, array $data)
    {
<<<<<<< HEAD
        $command = $this->setJobInstanceIfNecessary(
            $job, unserialize($data['command'])
        );

        $this->dispatcher->dispatchNow($command);
=======
        try {
            $command = $this->setJobInstanceIfNecessary(
                $job, unserialize($data['command'])
            );
        } catch (ModelNotFoundException $e) {
            return $this->handleModelNotFound($job, $e);
        }

        $this->dispatcher->dispatchNow(
            $command, $this->resolveHandler($job, $command)
        );

        if (! $job->hasFailed() && ! $job->isReleased()) {
            $this->ensureNextJobInChainIsDispatched($command);
        }
>>>>>>> dev

        if (! $job->isDeletedOrReleased()) {
            $job->delete();
        }
    }

    /**
<<<<<<< HEAD
=======
     * Resolve the handler for the given command.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  mixed  $command
     * @return mixed
     */
    protected function resolveHandler($job, $command)
    {
        $handler = $this->dispatcher->getCommandHandler($command) ?: null;

        if ($handler) {
            $this->setJobInstanceIfNecessary($job, $handler);
        }

        return $handler;
    }

    /**
>>>>>>> dev
     * Set the job instance of the given class if necessary.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  mixed  $instance
     * @return mixed
     */
    protected function setJobInstanceIfNecessary(Job $job, $instance)
    {
<<<<<<< HEAD
        if (in_array('Illuminate\Queue\InteractsWithQueue', class_uses_recursive(get_class($instance)))) {
=======
        if (in_array(InteractsWithQueue::class, class_uses_recursive($instance))) {
>>>>>>> dev
            $instance->setJob($job);
        }

        return $instance;
    }

    /**
<<<<<<< HEAD
     * Call the failed method on the job instance.
     *
     * @param  array  $data
     * @return void
     */
    public function failed(array $data)
=======
     * Ensure the next job in the chain is dispatched if applicable.
     *
     * @param  mixed  $command
     * @return void
     */
    protected function ensureNextJobInChainIsDispatched($command)
    {
        if (method_exists($command, 'dispatchNextJobInChain')) {
            $command->dispatchNextJobInChain();
        }
    }

    /**
     * Handle a model not found exception.
     *
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  \Exception  $e
     * @return void
     */
    protected function handleModelNotFound(Job $job, $e)
    {
        $class = $job->resolveName();

        try {
            $shouldDelete = (new ReflectionClass($class))
                    ->getDefaultProperties()['deleteWhenMissingModels'] ?? false;
        } catch (Exception $e) {
            $shouldDelete = false;
        }

        if ($shouldDelete) {
            return $job->delete();
        }

        return $job->fail($e);
    }

    /**
     * Call the failed method on the job instance.
     *
     * The exception that caused the failure will be passed.
     *
     * @param  array  $data
     * @param  \Exception  $e
     * @return void
     */
    public function failed(array $data, $e)
>>>>>>> dev
    {
        $command = unserialize($data['command']);

        if (method_exists($command, 'failed')) {
<<<<<<< HEAD
            $command->failed();
=======
            $command->failed($e);
>>>>>>> dev
        }
    }
}
