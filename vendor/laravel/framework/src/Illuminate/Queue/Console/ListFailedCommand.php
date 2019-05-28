<?php

namespace Illuminate\Queue\Console;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;

class ListFailedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:failed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all of the failed queue jobs';

    /**
     * The table headers for the command.
     *
     * @var array
     */
    protected $headers = ['ID', 'Connection', 'Queue', 'Class', 'Failed At'];

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $jobs = $this->getFailedJobs();

        if (count($jobs) == 0) {
=======
    public function handle()
    {
        if (count($jobs = $this->getFailedJobs()) === 0) {
>>>>>>> dev
            return $this->info('No failed jobs!');
        }

        $this->displayFailedJobs($jobs);
    }

    /**
     * Compile the failed jobs into a displayable format.
     *
     * @return array
     */
    protected function getFailedJobs()
    {
<<<<<<< HEAD
        $results = [];

        foreach ($this->laravel['queue.failer']->all() as $failed) {
            $results[] = $this->parseFailedJob((array) $failed);
        }

        return array_filter($results);
=======
        $failed = $this->laravel['queue.failer']->all();

        return collect($failed)->map(function ($failed) {
            return $this->parseFailedJob((array) $failed);
        })->filter()->all();
>>>>>>> dev
    }

    /**
     * Parse the failed job row.
     *
     * @param  array  $failed
     * @return array
     */
    protected function parseFailedJob(array $failed)
    {
<<<<<<< HEAD
        $row = array_values(Arr::except($failed, ['payload']));
=======
        $row = array_values(Arr::except($failed, ['payload', 'exception']));
>>>>>>> dev

        array_splice($row, 3, 0, $this->extractJobName($failed['payload']));

        return $row;
    }

    /**
     * Extract the failed job name from payload.
     *
     * @param  string  $payload
     * @return string|null
     */
    private function extractJobName($payload)
    {
        $payload = json_decode($payload, true);

        if ($payload && (! isset($payload['data']['command']))) {
<<<<<<< HEAD
            return Arr::get($payload, 'job');
        }

        if ($payload && isset($payload['data']['command'])) {
            preg_match('/"([^"]+)"/', $payload['data']['command'], $matches);

            if (isset($matches[1])) {
                return $matches[1];
            } else {
                return Arr::get($payload, 'job');
            }
        }
=======
            return $payload['job'] ?? null;
        } elseif ($payload && isset($payload['data']['command'])) {
            return $this->matchJobName($payload);
        }
    }

    /**
     * Match the job name from the payload.
     *
     * @param  array  $payload
     * @return string
     */
    protected function matchJobName($payload)
    {
        preg_match('/"([^"]+)"/', $payload['data']['command'], $matches);

        return $matches[1] ?? $payload['job'] ?? null;
>>>>>>> dev
    }

    /**
     * Display the failed jobs in the console.
     *
     * @param  array  $jobs
     * @return void
     */
    protected function displayFailedJobs(array $jobs)
    {
        $this->table($this->headers, $jobs);
    }
}
