<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Pretends messages have been sent, but just ignores them.
 *
 * @author Fabien Potencier
 */
class Swift_Transport_NullTransport implements Swift_Transport
{
    /** The event dispatcher from the plugin API */
<<<<<<< HEAD
    private $_eventDispatcher;
=======
    private $eventDispatcher;
>>>>>>> dev

    /**
     * Constructor.
     */
    public function __construct(Swift_Events_EventDispatcher $eventDispatcher)
    {
<<<<<<< HEAD
        $this->_eventDispatcher = $eventDispatcher;
=======
        $this->eventDispatcher = $eventDispatcher;
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
     * @return int The number of sent emails
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
     * @return int The number of sent emails
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

        if ($evt) {
            $evt->setResult(Swift_Events_SendEvent::RESULT_SUCCESS);
<<<<<<< HEAD
            $this->_eventDispatcher->dispatchEvent($evt, 'sendPerformed');
=======
            $this->eventDispatcher->dispatchEvent($evt, 'sendPerformed');
>>>>>>> dev
        }

        $count = (
            count((array) $message->getTo())
            + count((array) $message->getCc())
            + count((array) $message->getBcc())
            );

        return $count;
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
