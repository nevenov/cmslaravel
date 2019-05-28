<?php

namespace Illuminate\Broadcasting\Broadcasters;

use Psr\Log\LoggerInterface;
<<<<<<< HEAD
use Illuminate\Contracts\Broadcasting\Broadcaster;

class LogBroadcaster implements Broadcaster
=======

class LogBroadcaster extends Broadcaster
>>>>>>> dev
{
    /**
     * The logger implementation.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Create a new broadcaster instance.
     *
     * @param  \Psr\Log\LoggerInterface  $logger
     * @return void
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function broadcast(array $channels, $event, array $payload = [])
    {
        $channels = implode(', ', $channels);
=======
    public function auth($request)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function validAuthenticationResponse($request, $result)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        $channels = implode(', ', $this->formatChannels($channels));
>>>>>>> dev

        $payload = json_encode($payload, JSON_PRETTY_PRINT);

        $this->logger->info('Broadcasting ['.$event.'] on channels ['.$channels.'] with payload:'.PHP_EOL.$payload);
    }
}
