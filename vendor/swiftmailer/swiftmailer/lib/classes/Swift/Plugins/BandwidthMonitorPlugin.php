<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Reduces network flooding when sending large amounts of mail.
 *
 * @author Chris Corbyn
 */
class Swift_Plugins_BandwidthMonitorPlugin implements Swift_Events_SendListener, Swift_Events_CommandListener, Swift_Events_ResponseListener, Swift_InputByteStream
{
    /**
     * The outgoing traffic counter.
     *
     * @var int
     */
<<<<<<< HEAD
    private $_out = 0;
=======
    private $out = 0;
>>>>>>> dev

    /**
     * The incoming traffic counter.
     *
     * @var int
     */
<<<<<<< HEAD
    private $_in = 0;

    /** Bound byte streams */
    private $_mirrors = array();
=======
    private $in = 0;

    /** Bound byte streams */
    private $mirrors = [];
>>>>>>> dev

    /**
     * Not used.
     */
    public function beforeSendPerformed(Swift_Events_SendEvent $evt)
    {
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
        $message = $evt->getMessage();
        $message->toByteStream($this);
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
        $this->_out += strlen($command);
=======
        $this->out += strlen($command);
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
        $this->_in += strlen($response);
=======
        $this->in += strlen($response);
>>>>>>> dev
    }

    /**
     * Called when a message is sent so that the outgoing counter can be increased.
     *
     * @param string $bytes
     */
    public function write($bytes)
    {
<<<<<<< HEAD
        $this->_out += strlen($bytes);
        foreach ($this->_mirrors as $stream) {
=======
        $this->out += strlen($bytes);
        foreach ($this->mirrors as $stream) {
>>>>>>> dev
            $stream->write($bytes);
        }
    }

    /**
     * Not used.
     */
    public function commit()
    {
    }

    /**
     * Attach $is to this stream.
     *
     * The stream acts as an observer, receiving all data that is written.
     * All {@link write()} and {@link flushBuffers()} operations will be mirrored.
<<<<<<< HEAD
     *
     * @param Swift_InputByteStream $is
     */
    public function bind(Swift_InputByteStream $is)
    {
        $this->_mirrors[] = $is;
=======
     */
    public function bind(Swift_InputByteStream $is)
    {
        $this->mirrors[] = $is;
>>>>>>> dev
    }

    /**
     * Remove an already bound stream.
     *
     * If $is is not bound, no errors will be raised.
     * If the stream currently has any buffered data it will be written to $is
     * before unbinding occurs.
<<<<<<< HEAD
     *
     * @param Swift_InputByteStream $is
     */
    public function unbind(Swift_InputByteStream $is)
    {
        foreach ($this->_mirrors as $k => $stream) {
            if ($is === $stream) {
                unset($this->_mirrors[$k]);
=======
     */
    public function unbind(Swift_InputByteStream $is)
    {
        foreach ($this->mirrors as $k => $stream) {
            if ($is === $stream) {
                unset($this->mirrors[$k]);
>>>>>>> dev
            }
        }
    }

    /**
     * Not used.
     */
    public function flushBuffers()
    {
<<<<<<< HEAD
        foreach ($this->_mirrors as $stream) {
=======
        foreach ($this->mirrors as $stream) {
>>>>>>> dev
            $stream->flushBuffers();
        }
    }

    /**
     * Get the total number of bytes sent to the server.
     *
     * @return int
     */
    public function getBytesOut()
    {
<<<<<<< HEAD
        return $this->_out;
=======
        return $this->out;
>>>>>>> dev
    }

    /**
     * Get the total number of bytes received from the server.
     *
     * @return int
     */
    public function getBytesIn()
    {
<<<<<<< HEAD
        return $this->_in;
=======
        return $this->in;
>>>>>>> dev
    }

    /**
     * Reset the internal counters to zero.
     */
    public function reset()
    {
<<<<<<< HEAD
        $this->_out = 0;
        $this->_in = 0;
=======
        $this->out = 0;
        $this->in = 0;
>>>>>>> dev
    }
}
