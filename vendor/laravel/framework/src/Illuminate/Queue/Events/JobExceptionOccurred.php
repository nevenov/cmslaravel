<?php

namespace Illuminate\Queue\Events;

class JobExceptionOccurred
{
    /**
     * The connection name.
     *
     * @var string
     */
    public $connectionName;

    /**
     * The job instance.
     *
     * @var \Illuminate\Contracts\Queue\Job
     */
    public $job;

    /**
<<<<<<< HEAD
     * The data given to the job.
     *
     * @var array
     */
    public $data;

    /**
     * The exception instance.
     *
     * @var \Throwable
=======
     * The exception instance.
     *
     * @var \Exception
>>>>>>> dev
     */
    public $exception;

    /**
     * Create a new event instance.
     *
     * @param  string  $connectionName
     * @param  \Illuminate\Contracts\Queue\Job  $job
<<<<<<< HEAD
     * @param  array  $data
     * @param  \Throwable  $exception
     * @return void
     */
    public function __construct($connectionName, $job, $data, $exception)
    {
        $this->job = $job;
        $this->data = $data;
=======
     * @param  \Exception  $exception
     * @return void
     */
    public function __construct($connectionName, $job, $exception)
    {
        $this->job = $job;
>>>>>>> dev
        $this->exception = $exception;
        $this->connectionName = $connectionName;
    }
}
