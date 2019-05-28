<?php

namespace Illuminate\Mail\Transport;

<<<<<<< HEAD
use Swift_Mime_Message;
use Swift_Mime_MimeEntity;
use Psr\Log\LoggerInterface;
=======
use Psr\Log\LoggerInterface;
use Swift_Mime_SimpleMessage;
use Swift_Mime_SimpleMimeEntity;
>>>>>>> dev

class LogTransport extends Transport
{
    /**
     * The Logger instance.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Create a new log transport instance.
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
    public function send(Swift_Mime_Message $message, &$failedRecipients = null)
=======
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
>>>>>>> dev
    {
        $this->beforeSendPerformed($message);

        $this->logger->debug($this->getMimeEntityString($message));
<<<<<<< HEAD
=======

        $this->sendPerformed($message);

        return $this->numberOfRecipients($message);
>>>>>>> dev
    }

    /**
     * Get a loggable string out of a Swiftmailer entity.
     *
<<<<<<< HEAD
     * @param  \Swift_Mime_MimeEntity $entity
     * @return string
     */
    protected function getMimeEntityString(Swift_Mime_MimeEntity $entity)
=======
     * @param  \Swift_Mime_SimpleMimeEntity $entity
     * @return string
     */
    protected function getMimeEntityString(Swift_Mime_SimpleMimeEntity $entity)
>>>>>>> dev
    {
        $string = (string) $entity->getHeaders().PHP_EOL.$entity->getBody();

        foreach ($entity->getChildren() as $children) {
            $string .= PHP_EOL.PHP_EOL.$this->getMimeEntityString($children);
        }

        return $string;
    }
<<<<<<< HEAD
=======

    /**
     * Get the logger for the LogTransport instance.
     *
     * @return \Psr\Log\LoggerInterface
     */
    public function logger()
    {
        return $this->logger;
    }
>>>>>>> dev
}
