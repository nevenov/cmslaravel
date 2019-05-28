<?php

namespace Illuminate\Queue;

use Aws\Sqs\SqsClient;
use Illuminate\Queue\Jobs\SqsJob;
use Illuminate\Contracts\Queue\Queue as QueueContract;

class SqsQueue extends Queue implements QueueContract
{
    /**
     * The Amazon SQS instance.
     *
     * @var \Aws\Sqs\SqsClient
     */
    protected $sqs;

    /**
<<<<<<< HEAD
     * The name of the default tube.
=======
     * The name of the default queue.
>>>>>>> dev
     *
     * @var string
     */
    protected $default;

    /**
<<<<<<< HEAD
     * The sqs prefix url.
=======
     * The queue URL prefix.
>>>>>>> dev
     *
     * @var string
     */
    protected $prefix;

    /**
<<<<<<< HEAD
     * The job creator callback.
     *
     * @var callable|null
     */
    protected $jobCreator;

    /**
=======
>>>>>>> dev
     * Create a new Amazon SQS queue instance.
     *
     * @param  \Aws\Sqs\SqsClient  $sqs
     * @param  string  $default
     * @param  string  $prefix
     * @return void
     */
    public function __construct(SqsClient $sqs, $default, $prefix = '')
    {
        $this->sqs = $sqs;
        $this->prefix = $prefix;
        $this->default = $default;
    }

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
        $response = $this->sqs->getQueueAttributes([
            'QueueUrl' => $this->getQueue($queue),
            'AttributeNames' => ['ApproximateNumberOfMessages'],
        ]);

        $attributes = $response->get('Attributes');

        return (int) $attributes['ApproximateNumberOfMessages'];
    }

    /**
>>>>>>> dev
     * Push a new job onto the queue.
     *
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function push($job, $data = '', $queue = null)
    {
<<<<<<< HEAD
        return $this->pushRaw($this->createPayload($job, $data), $queue);
=======
        return $this->pushRaw($this->createPayload($job, $queue ?: $this->default, $data), $queue);
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
        $response = $this->sqs->sendMessage(['QueueUrl' => $this->getQueue($queue), 'MessageBody' => $payload]);

        return $response->get('MessageId');
=======
        return $this->sqs->sendMessage([
            'QueueUrl' => $this->getQueue($queue), 'MessageBody' => $payload,
        ])->get('MessageId');
>>>>>>> dev
    }

    /**
     * Push a new job onto the queue after a delay.
     *
<<<<<<< HEAD
     * @param  \DateTime|int  $delay
=======
     * @param  \DateTimeInterface|\DateInterval|int  $delay
>>>>>>> dev
     * @param  string  $job
     * @param  mixed   $data
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
<<<<<<< HEAD
        $payload = $this->createPayload($job, $data);

        $delay = $this->getSeconds($delay);

        return $this->sqs->sendMessage([
            'QueueUrl' => $this->getQueue($queue), 'MessageBody' => $payload, 'DelaySeconds' => $delay,

=======
        return $this->sqs->sendMessage([
            'QueueUrl' => $this->getQueue($queue),
            'MessageBody' => $this->createPayload($job, $queue ?: $this->default, $data),
            'DelaySeconds' => $this->secondsUntil($delay),
>>>>>>> dev
        ])->get('MessageId');
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
        $queue = $this->getQueue($queue);

        $response = $this->sqs->receiveMessage(
            ['QueueUrl' => $queue, 'AttributeNames' => ['ApproximateReceiveCount']]
        );

        if (count($response['Messages']) > 0) {
            if ($this->jobCreator) {
                return call_user_func($this->jobCreator, $this->container, $this->sqs, $queue, $response);
            } else {
                return new SqsJob($this->container, $this->sqs, $queue, $response['Messages'][0]);
            }
=======
        $response = $this->sqs->receiveMessage([
            'QueueUrl' => $queue = $this->getQueue($queue),
            'AttributeNames' => ['ApproximateReceiveCount'],
        ]);

        if (! is_null($response['Messages']) && count($response['Messages']) > 0) {
            return new SqsJob(
                $this->container, $this->sqs, $response['Messages'][0],
                $this->connectionName, $queue
            );
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Define the job creator callback for the connection.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function createJobsUsing(callable $callback)
    {
        $this->jobCreator = $callback;

        return $this;
    }

    /**
=======
>>>>>>> dev
     * Get the queue or return the default.
     *
     * @param  string|null  $queue
     * @return string
     */
    public function getQueue($queue)
    {
        $queue = $queue ?: $this->default;

<<<<<<< HEAD
        if (filter_var($queue, FILTER_VALIDATE_URL) !== false) {
            return $queue;
        }

        return rtrim($this->prefix, '/').'/'.($queue);
=======
        return filter_var($queue, FILTER_VALIDATE_URL) === false
                        ? rtrim($this->prefix, '/').'/'.$queue : $queue;
>>>>>>> dev
    }

    /**
     * Get the underlying SQS instance.
     *
     * @return \Aws\Sqs\SqsClient
     */
    public function getSqs()
    {
        return $this->sqs;
    }
}
