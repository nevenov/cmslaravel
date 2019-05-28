<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Stores Messages in a queue.
 *
 * @author Fabien Potencier
 */
class Swift_Transport_SpoolTransport implements Swift_Transport
{
    /** The spool instance */
<<<<<<< HEAD
    private $_spool;

    /** The event dispatcher from the plugin API */
    private $_eventDispatcher;
=======
    private $spool;

    /** The event dispatcher from the plugin API */
    private $eventDispatcher;
>>>>>>> dev

    /**
     * Constructor.
     */
    public function __construct(Swift_Events_EventDispatcher $eventDispatcher, Swift_Spool $spool = null)
    {
<<<<<<< HEAD
        $this->_eventDispatcher = $eventDispatcher;
        $this->_spool = $spool;
=======
        $this->eventDispatcher = $eventDispatcher;
        $this->spool = $spool;
>>>>>>> dev
    }

    /**
     * Sets the spool object.
     *
<<<<<<< HEAD
     * @param Swift_Spool $spool
     *
=======
>>>>>>> dev
     * @return $this
     */
    public function setSpool(Swift_Spool $spool)
    {
<<<<<<< HEAD
        $this->_spool = $spool;
=======
        $this->spool = $spool;
>>>>>>> dev

        return $this;
    }

    /**
     * Get the spool object.
     *
     * @return Swift_Spool
     */
    public function getSpool()
    {
<<<<<<< HEAD
        return $this->_spool;
=======
        return $this->spool;
>>>>>>> dev
    }

    /**
     * Tests if this Transport mechanism has started.
     *
     * @return bool
     */
    public function isStarted()
    {
        return true;
    }

    /**
     * Starts this Transport mechanism.
     */
    public function start()
    {
    }

    /**
     * Stops this Transport mechanism.
     */
    public function stop()
    {
    }

    /**
<<<<<<< HEAD
     * Sends the given message.
     *
     * @param Swift_Mime_Message $message
     * @param string[]           $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent e-mail's
     */
    public function send(Swift_Mime_Message $message, &$failedRecipients = null)
    {
        if ($evt = $this->_eventDispatcher->createSendEvent($this, $message)) {
            $this->_eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
=======
     * {@inheritdoc}
     */
    public function ping()
    {
        return true;
    }

    /**
     * Sends the given message.
     *
     * @param string[] $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent e-mail's
     */
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        if ($evt = $this->eventDispatcher->createSendEvent($this, $message)) {
            $this->eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
>>>>>>> dev
            if ($evt->bubbleCancelled()) {
                return 0;
            }
        }

<<<<<<< HEAD
        $success = $this->_spool->queueMessage($message);

        if ($evt) {
            $evt->setResult($success ? Swift_Events_SendEvent::RESULT_SPOOLED : Swift_Events_SendEvent::RESULT_FAILED);
            $this->_eventDispatcher->dispatchEvent($evt, 'sendPerformed');
=======
        $success = $this->spool->queueMessage($message);

        if ($evt) {
            $evt->setResult($success ? Swift_Events_SendEvent::RESULT_SPOOLED : Swift_Events_SendEvent::RESULT_FAILED);
            $this->eventDispatcher->dispatchEvent($evt, 'sendPerformed');
>>>>>>> dev
        }

        return 1;
    }

    /**
     * Register a plugin.
<<<<<<< HEAD
     *
     * @param Swift_Events_EventListener $plugin
     */
    public function registerPlugin(Swift_Events_EventListener $plugin)
    {
        $this->_eventDispatcher->bindEventListener($plugin);
=======
     */
    public function registerPlugin(Swift_Events_EventListener $plugin)
    {
        $this->eventDispatcher->bindEventListener($plugin);
>>>>>>> dev
    }
}
