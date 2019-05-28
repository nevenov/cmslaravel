<?php

namespace Illuminate\Queue\Console;

use Illuminate\Queue\Listener;
use Illuminate\Console\Command;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
=======
use Illuminate\Queue\ListenerOptions;
>>>>>>> dev

class ListenCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $name = 'queue:listen';
=======
    protected $signature = 'queue:listen
                            {connection? : The name of connection}
                            {--delay=0 : The number of seconds to delay failed jobs}
                            {--force : Force the worker to run even in maintenance mode}
                            {--memory=128 : The memory limit in megabytes}
                            {--queue= : The queue to listen on}
                            {--sleep=3 : Number of seconds to sleep when no job is available}
                            {--timeout=60 : The number of seconds a child process can run}
                            {--tries=0 : Number of times to attempt a job before logging it failed}';
>>>>>>> dev

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen to a given queue';

    /**
     * The queue listener instance.
     *
     * @var \Illuminate\Queue\Listener
     */
    protected $listener;

    /**
     * Create a new queue listen command.
     *
     * @param  \Illuminate\Queue\Listener  $listener
     * @return void
     */
    public function __construct(Listener $listener)
    {
        parent::__construct();

<<<<<<< HEAD
        $this->listener = $listener;
=======
        $this->setOutputHandler($this->listener = $listener);
>>>>>>> dev
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $this->setListenerOptions();

        $delay = $this->input->getOption('delay');

        // The memory limit is the amount of memory we will allow the script to occupy
        // before killing it and letting a process manager restart it for us, which
        // is to protect us against any memory leaks that will be in the scripts.
        $memory = $this->input->getOption('memory');

        $connection = $this->input->getArgument('connection');

        $timeout = $this->input->getOption('timeout');

        // We need to get the right queue for the connection which is set in the queue
        // configuration file for the application. We will pull it based on the set
        // connection being run for the queue operation currently being executed.
        $queue = $this->getQueue($connection);

        $this->listener->listen(
            $connection, $queue, $delay, $memory, $timeout
=======
    public function handle()
    {
        // We need to get the right queue for the connection which is set in the queue
        // configuration file for the application. We will pull it based on the set
        // connection being run for the queue operation currently being executed.
        $queue = $this->getQueue(
            $connection = $this->input->getArgument('connection')
        );

        $this->listener->listen(
            $connection, $queue, $this->gatherOptions()
>>>>>>> dev
        );
    }

    /**
     * Get the name of the queue connection to listen on.
     *
     * @param  string  $connection
     * @return string
     */
    protected function getQueue($connection)
    {
<<<<<<< HEAD
        if (is_null($connection)) {
            $connection = $this->laravel['config']['queue.default'];
        }

        $queue = $this->laravel['config']->get("queue.connections.{$connection}.queue", 'default');

        return $this->input->getOption('queue') ?: $queue;
    }

    /**
     * Set the options on the queue listener.
     *
     * @return void
     */
    protected function setListenerOptions()
    {
        $this->listener->setEnvironment($this->laravel->environment());

        $this->listener->setSleep($this->option('sleep'));

        $this->listener->setMaxTries($this->option('tries'));

        $this->listener->setOutputHandler(function ($type, $line) {
            $this->output->write($line);
        });
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['connection', InputArgument::OPTIONAL, 'The name of connection'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['queue', null, InputOption::VALUE_OPTIONAL, 'The queue to listen on', null],

            ['delay', null, InputOption::VALUE_OPTIONAL, 'Amount of time to delay failed jobs', 0],

            ['memory', null, InputOption::VALUE_OPTIONAL, 'The memory limit in megabytes', 128],

            ['timeout', null, InputOption::VALUE_OPTIONAL, 'Seconds a job may run before timing out', 60],

            ['sleep', null, InputOption::VALUE_OPTIONAL, 'Seconds to wait before checking queue for jobs', 3],

            ['tries', null, InputOption::VALUE_OPTIONAL, 'Number of times to attempt a job before logging it failed', 0],
        ];
=======
        $connection = $connection ?: $this->laravel['config']['queue.default'];

        return $this->input->getOption('queue') ?: $this->laravel['config']->get(
            "queue.connections.{$connection}.queue", 'default'
        );
    }

    /**
     * Get the listener options for the command.
     *
     * @return \Illuminate\Queue\ListenerOptions
     */
    protected function gatherOptions()
    {
        return new ListenerOptions(
            $this->option('env'), $this->option('delay'),
            $this->option('memory'), $this->option('timeout'),
            $this->option('sleep'), $this->option('tries'),
            $this->option('force')
        );
    }

    /**
     * Set the options on the queue listener.
     *
     * @param  \Illuminate\Queue\Listener  $listener
     * @return void
     */
    protected function setOutputHandler(Listener $listener)
    {
        $listener->setOutputHandler(function ($type, $line) {
            $this->output->write($line);
        });
>>>>>>> dev
    }
}
