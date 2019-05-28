<?php

namespace Illuminate\Queue\Console;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputArgument;
=======
>>>>>>> dev

class RetryCommand extends Command
{
    /**
<<<<<<< HEAD
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:retry';
=======
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:retry {id* : The ID of the failed job or "all" to retry all jobs}';
>>>>>>> dev

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retry a failed queue job';

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $ids = $this->argument('id');

        if (count($ids) === 1 && $ids[0] === 'all') {
            $ids = Arr::pluck($this->laravel['queue.failer']->all(), 'id');
        }

        foreach ($ids as $id) {
            $this->retryJob($id);
=======
    public function handle()
    {
        foreach ($this->getJobIds() as $id) {
            $job = $this->laravel['queue.failer']->find($id);

            if (is_null($job)) {
                $this->error("Unable to find failed job with ID [{$id}].");
            } else {
                $this->retryJob($job);

                $this->info("The failed job [{$id}] has been pushed back onto the queue!");

                $this->laravel['queue.failer']->forget($id);
            }
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Retry the queue job with the given ID.
     *
     * @param  string  $id
     * @return void
     */
    protected function retryJob($id)
    {
        $failed = $this->laravel['queue.failer']->find($id);

        if (! is_null($failed)) {
            $failed = (object) $failed;

            $failed->payload = $this->resetAttempts($failed->payload);

            $this->laravel['queue']->connection($failed->connection)
                                ->pushRaw($failed->payload, $failed->queue);

            $this->laravel['queue.failer']->forget($failed->id);

            $this->info("The failed job [{$id}] has been pushed back onto the queue!");
        } else {
            $this->error("No failed job matches the given ID [{$id}].");
        }
=======
     * Get the job IDs to be retried.
     *
     * @return array
     */
    protected function getJobIds()
    {
        $ids = (array) $this->argument('id');

        if (count($ids) === 1 && $ids[0] === 'all') {
            $ids = Arr::pluck($this->laravel['queue.failer']->all(), 'id');
        }

        return $ids;
    }

    /**
     * Retry the queue job.
     *
     * @param  \stdClass  $job
     * @return void
     */
    protected function retryJob($job)
    {
        $this->laravel['queue']->connection($job->connection)->pushRaw(
            $this->resetAttempts($job->payload), $job->queue
        );
>>>>>>> dev
    }

    /**
     * Reset the payload attempts.
     *
<<<<<<< HEAD
=======
     * Applicable to Redis jobs which store attempts in their payload.
     *
>>>>>>> dev
     * @param  string  $payload
     * @return string
     */
    protected function resetAttempts($payload)
    {
        $payload = json_decode($payload, true);

        if (isset($payload['attempts'])) {
<<<<<<< HEAD
            $payload['attempts'] = 1;
=======
            $payload['attempts'] = 0;
>>>>>>> dev
        }

        return json_encode($payload);
    }
<<<<<<< HEAD

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['id', InputArgument::IS_ARRAY, 'The ID of the failed job'],
        ];
    }
=======
>>>>>>> dev
}
