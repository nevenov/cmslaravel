<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * The EventDispatcher which handles the event dispatching layer.
 *
 * @author Chris Corbyn
 */
class Swift_Events_SimpleEventDispatcher implements Swift_Events_EventDispatcher
{
    /** A map of event types to their associated listener types */
<<<<<<< HEAD
    private $_eventMap = array();

    /** Event listeners bound to this dispatcher */
    private $_listeners = array();

    /** Listeners queued to have an Event bubbled up the stack to them */
    private $_bubbleQueue = array();
=======
    private $eventMap = [];

    /** Event listeners bound to this dispatcher */
    private $listeners = [];

    /** Listeners queued to have an Event bubbled up the stack to them */
    private $bubbleQueue = [];
>>>>>>> dev

    /**
     * Create a new EventDispatcher.
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->_eventMap = array(
=======
        $this->eventMap = [
>>>>>>> dev
            'Swift_Events_CommandEvent' => 'Swift_Events_CommandListener',
            'Swift_Events_ResponseEvent' => 'Swift_Events_ResponseListener',
            'Swift_Events_SendEvent' => 'Swift_Events_SendListener',
            'Swift_Events_TransportChangeEvent' => 'Swift_Events_TransportChangeListener',
            'Swift_Events_TransportExceptionEvent' => 'Swift_Events_TransportExceptionListener',
<<<<<<< HEAD
            );
=======
            ];
>>>>>>> dev
    }

    /**
     * Create a new SendEvent for $source and $message.
     *
<<<<<<< HEAD
     * @param Swift_Transport $source
     * @param Swift_Mime_Message
     *
     * @return Swift_Events_SendEvent
     */
    public function createSendEvent(Swift_Transport $source, Swift_Mime_Message $message)
=======
     * @return Swift_Events_SendEvent
     */
    public function createSendEvent(Swift_Transport $source, Swift_Mime_SimpleMessage $message)
>>>>>>> dev
    {
        return new Swift_Events_SendEvent($source, $message);
    }

    /**
     * Create a new CommandEvent for $source and $command.
     *
<<<<<<< HEAD
     * @param Swift_Transport $source
     * @param string          $command      That will be executed
     * @param array           $successCodes That are needed
     *
     * @return Swift_Events_CommandEvent
     */
    public function createCommandEvent(Swift_Transport $source, $command, $successCodes = array())
=======
     * @param string $command      That will be executed
     * @param array  $successCodes That are needed
     *
     * @return Swift_Events_CommandEvent
     */
    public function createCommandEvent(Swift_Transport $source, $command, $successCodes = [])
>>>>>>> dev
    {
        return new Swift_Events_CommandEvent($source, $command, $successCodes);
    }

    /**
     * Create a new ResponseEvent for $source and $response.
     *
<<<<<<< HEAD
     * @param Swift_Transport $source
     * @param string          $response
     * @param bool            $valid    If the response is valid
=======
     * @param string $response
     * @param bool   $valid    If the response is valid
>>>>>>> dev
     *
     * @return Swift_Events_ResponseEvent
     */
    public function createResponseEvent(Swift_Transport $source, $response, $valid)
    {
        return new Swift_Events_ResponseEvent($source, $response, $valid);
    }

    /**
     * Create a new TransportChangeEvent for $source.
     *
<<<<<<< HEAD
     * @param Swift_Transport $source
     *
=======
>>>>>>> dev
     * @return Swift_Events_TransportChangeEvent
     */
    public function createTransportChangeEvent(Swift_Transport $source)
    {
        return new Swift_Events_TransportChangeEvent($source);
    }

    /**
     * Create a new TransportExceptionEvent for $source.
     *
<<<<<<< HEAD
     * @param Swift_Transport          $source
     * @param Swift_TransportException $ex
     *
=======
>>>>>>> dev
     * @return Swift_Events_TransportExceptionEvent
     */
    public function createTransportExceptionEvent(Swift_Transport $source, Swift_TransportException $ex)
    {
        return new Swift_Events_TransportExceptionEvent($source, $ex);
    }

    /**
     * Bind an event listener to this dispatcher.
<<<<<<< HEAD
     *
     * @param Swift_Events_EventListener $listener
     */
    public function bindEventListener(Swift_Events_EventListener $listener)
    {
        foreach ($this->_listeners as $l) {
=======
     */
    public function bindEventListener(Swift_Events_EventListener $listener)
    {
        foreach ($this->listeners as $l) {
>>>>>>> dev
            // Already loaded
            if ($l === $listener) {
                return;
            }
        }
<<<<<<< HEAD
        $this->_listeners[] = $listener;
=======
        $this->listeners[] = $listener;
>>>>>>> dev
    }

    /**
     * Dispatch the given Event to all suitable listeners.
     *
<<<<<<< HEAD
     * @param Swift_Events_EventObject $evt
     * @param string                   $target method
     */
    public function dispatchEvent(Swift_Events_EventObject $evt, $target)
    {
        $this->_prepareBubbleQueue($evt);
        $this->_bubble($evt, $target);
    }

    /** Queue listeners on a stack ready for $evt to be bubbled up it */
    private function _prepareBubbleQueue(Swift_Events_EventObject $evt)
    {
        $this->_bubbleQueue = array();
        $evtClass = get_class($evt);
        foreach ($this->_listeners as $listener) {
            if (array_key_exists($evtClass, $this->_eventMap)
                && ($listener instanceof $this->_eventMap[$evtClass])) {
                $this->_bubbleQueue[] = $listener;
=======
     * @param string $target method
     */
    public function dispatchEvent(Swift_Events_EventObject $evt, $target)
    {
        $this->prepareBubbleQueue($evt);
        $this->bubble($evt, $target);
    }

    /** Queue listeners on a stack ready for $evt to be bubbled up it */
    private function prepareBubbleQueue(Swift_Events_EventObject $evt)
    {
        $this->bubbleQueue = [];
        $evtClass = get_class($evt);
        foreach ($this->listeners as $listener) {
            if (array_key_exists($evtClass, $this->eventMap)
                && ($listener instanceof $this->eventMap[$evtClass])) {
                $this->bubbleQueue[] = $listener;
>>>>>>> dev
            }
        }
    }

    /** Bubble $evt up the stack calling $target() on each listener */
<<<<<<< HEAD
    private function _bubble(Swift_Events_EventObject $evt, $target)
    {
        if (!$evt->bubbleCancelled() && $listener = array_shift($this->_bubbleQueue)) {
            $listener->$target($evt);
            $this->_bubble($evt, $target);
=======
    private function bubble(Swift_Events_EventObject $evt, $target)
    {
        if (!$evt->bubbleCancelled() && $listener = array_shift($this->bubbleQueue)) {
            $listener->$target($evt);
            $this->bubble($evt, $target);
>>>>>>> dev
        }
    }
}
