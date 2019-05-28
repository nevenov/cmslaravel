<?php

namespace Illuminate\Queue\Connectors;

<<<<<<< HEAD
use Pheanstalk\Pheanstalk;
use Illuminate\Support\Arr;
use Pheanstalk\PheanstalkInterface;
=======
use Pheanstalk\Connection;
use Pheanstalk\Pheanstalk;
>>>>>>> dev
use Illuminate\Queue\BeanstalkdQueue;

class BeanstalkdConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
<<<<<<< HEAD
        $pheanstalk = new Pheanstalk($config['host'], Arr::get($config, 'port', PheanstalkInterface::DEFAULT_PORT));

        return new BeanstalkdQueue(
            $pheanstalk, $config['queue'], Arr::get($config, 'ttr', Pheanstalk::DEFAULT_TTR)
=======
        return new BeanstalkdQueue(
            $this->pheanstalk($config),
            $config['queue'],
            $config['retry_after'] ?? Pheanstalk::DEFAULT_TTR,
            $config['block_for'] ?? 0
        );
    }

    /**
     * Create a Pheanstalk instance.
     *
     * @param  array  $config
     * @return \Pheanstalk\Pheanstalk
     */
    protected function pheanstalk(array $config)
    {
        return Pheanstalk::create(
            $config['host'],
            $config['port'] ?? Pheanstalk::DEFAULT_PORT,
            $config['timeout'] ?? Connection::DEFAULT_CONNECT_TIMEOUT
>>>>>>> dev
        );
    }
}
