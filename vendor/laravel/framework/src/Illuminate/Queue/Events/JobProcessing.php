<?php

namespace Illuminate\Queue\Events;

class JobProcessing
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
=======
>>>>>>> dev
     * Create a new event instance.
     *
     * @param  string  $connectionName
     * @param  \Illuminate\Contracts\Queue\Job  $job
<<<<<<< HEAD
     * @param  array  $data
     * @return void
     */
    public function __construct($connectionName, $job, $data)
    {
        $this->job = $job;
        $this->data = $data;
=======
     * @return void
     */
    public function __construct($connectionName, $job)
    {
        $this->job = $job;
>>>>>>> dev
        $this->connectionName = $connectionName;
    }
}
