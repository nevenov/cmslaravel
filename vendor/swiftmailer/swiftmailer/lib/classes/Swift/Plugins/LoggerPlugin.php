<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Does real time logging of Transport level information.
 *
<<<<<<< HEAD
 * @author Chris Corbyn
=======
 * @author     Chris Corbyn
>>>>>>> dev
 */
class Swift_Plugins_LoggerPlugin implements Swift_Events_CommandListener, Swift_Events_ResponseListener, Swift_Events_TransportChangeListener, Swift_Events_TransportExceptionListener, Swift_Plugins_Logger
{
    /** The logger which is delegated to */
<<<<<<< HEAD
    private $_logger;

    /**
     * Create a new LoggerPlugin using $logger.
     *
     * @param Swift_Plugins_Logger $logger
     */
    public function __construct(Swift_Plugins_Logger $logger)
    {
        $this->_logger = $logger;
=======
    private $logger;

    /**
     * Create a new LoggerPlugin using $logger.
     */
    public function __construct(Swift_Plugins_Logger $logger)
    {
        $this->logger = $logger;
>>>>>>> dev
    }

    /**
     * Add a log entry.
     *
     * @param string $entry
     */
    public function add($entry)
    {
<<<<<<< HEAD
        $this->_logger->add($entry);
=======
        $this->logger->add($entry);
>>>>>>> dev
    }

    /**
     * Clear the log contents.
     */
    public function clear()
    {
<<<<<<< HEAD
        $this->_logger->clear();
=======
        $this->logger->clear();
>>>>>>> dev
    }

    /**
     * Get this log as a string.
     *
     * @return string
     */
    public function dump()
    {
<<<<<<< HEAD
        return $this->_logger->dump();
=======
        return $this->logger->dump();
>>>>>>> dev
    }

    /**
     * Invoked immediately following a command being sent.
<<<<<<< HEAD
     *
     * @param Swift_Events_CommandEvent $evt
=======
>>>>>>> dev
     */
    public function commandSent(Swift_Events_CommandEvent $evt)
    {
        $command = $evt->getCommand();
<<<<<<< HEAD
        $this->_logger->add(sprintf('>> %s', $command));
=======
        $this->logger->add(sprintf('>> %s', $command));
>>>>>>> dev
    }

    /**
     * Invoked immediately following a response coming back.
<<<<<<< HEAD
     *
     * @param Swift_Events_ResponseEvent $evt
=======
>>>>>>> dev
     */
    public function responseReceived(Swift_Events_ResponseEvent $evt)
    {
        $response = $evt->getResponse();
<<<<<<< HEAD
        $this->_logger->add(sprintf('<< %s', $response));
=======
        $this->logger->add(sprintf('<< %s', $response));
>>>>>>> dev
    }

    /**
     * Invoked just before a Transport is started.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportChangeEvent $evt
=======
>>>>>>> dev
     */
    public function beforeTransportStarted(Swift_Events_TransportChangeEvent $evt)
    {
        $transportName = get_class($evt->getSource());
<<<<<<< HEAD
        $this->_logger->add(sprintf('++ Starting %s', $transportName));
=======
        $this->logger->add(sprintf('++ Starting %s', $transportName));
>>>>>>> dev
    }

    /**
     * Invoked immediately after the Transport is started.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportChangeEvent $evt
=======
>>>>>>> dev
     */
    public function transportStarted(Swift_Events_TransportChangeEvent $evt)
    {
        $transportName = get_class($evt->getSource());
<<<<<<< HEAD
        $this->_logger->add(sprintf('++ %s started', $transportName));
=======
        $this->logger->add(sprintf('++ %s started', $transportName));
>>>>>>> dev
    }

    /**
     * Invoked just before a Transport is stopped.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportChangeEvent $evt
=======
>>>>>>> dev
     */
    public function beforeTransportStopped(Swift_Events_TransportChangeEvent $evt)
    {
        $transportName = get_class($evt->getSource());
<<<<<<< HEAD
        $this->_logger->add(sprintf('++ Stopping %s', $transportName));
=======
        $this->logger->add(sprintf('++ Stopping %s', $transportName));
>>>>>>> dev
    }

    /**
     * Invoked immediately after the Transport is stopped.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportChangeEvent $evt
=======
>>>>>>> dev
     */
    public function transportStopped(Swift_Events_TransportChangeEvent $evt)
    {
        $transportName = get_class($evt->getSource());
<<<<<<< HEAD
        $this->_logger->add(sprintf('++ %s stopped', $transportName));
=======
        $this->logger->add(sprintf('++ %s stopped', $transportName));
>>>>>>> dev
    }

    /**
     * Invoked as a TransportException is thrown in the Transport system.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportExceptionEvent $evt
=======
>>>>>>> dev
     */
    public function exceptionThrown(Swift_Events_TransportExceptionEvent $evt)
    {
        $e = $evt->getException();
        $message = $e->getMessage();
        $code = $e->getCode();
<<<<<<< HEAD
        $this->_logger->add(sprintf('!! %s (code: %s)', $message, $code));
        $message .= PHP_EOL;
        $message .= 'Log data:'.PHP_EOL;
        $message .= $this->_logger->dump();
=======
        $this->logger->add(sprintf('!! %s (code: %s)', $message, $code));
        $message .= PHP_EOL;
        $message .= 'Log data:'.PHP_EOL;
        $message .= $this->logger->dump();
>>>>>>> dev
        $evt->cancelBubble();
        throw new Swift_TransportException($message, $code, $e->getPrevious());
    }
}
