<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2011 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Stores all sent emails for further usage.
 *
 * @author Fabien Potencier
 */
class Swift_Plugins_MessageLogger implements Swift_Events_SendListener
{
    /**
<<<<<<< HEAD
     * @var Swift_Mime_Message[]
=======
     * @var Swift_Mime_SimpleMessage[]
>>>>>>> dev
     */
    private $messages;

    public function __construct()
    {
<<<<<<< HEAD
        $this->messages = array();
=======
        $this->messages = [];
>>>>>>> dev
    }

    /**
     * Get the message list.
     *
<<<<<<< HEAD
     * @return Swift_Mime_Message[]
=======
     * @return Swift_Mime_SimpleMessage[]
>>>>>>> dev
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Get the message count.
     *
     * @return int count
     */
    public function countMessages()
    {
        return count($this->messages);
    }

    /**
     * Empty the message list.
     */
    public function clear()
    {
<<<<<<< HEAD
        $this->messages = array();
=======
        $this->messages = [];
>>>>>>> dev
    }

    /**
     * Invoked immediately before the Message is sent.
<<<<<<< HEAD
     *
     * @param Swift_Events_SendEvent $evt
=======
>>>>>>> dev
     */
    public function beforeSendPerformed(Swift_Events_SendEvent $evt)
    {
        $this->messages[] = clone $evt->getMessage();
    }

    /**
     * Invoked immediately after the Message is sent.
<<<<<<< HEAD
     *
     * @param Swift_Events_SendEvent $evt
=======
>>>>>>> dev
     */
    public function sendPerformed(Swift_Events_SendEvent $evt)
    {
    }
}
