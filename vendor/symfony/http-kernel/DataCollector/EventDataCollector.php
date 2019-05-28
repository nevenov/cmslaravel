<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcherInterface;
=======
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\ResetInterface;
>>>>>>> dev

/**
 * EventDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class EventDataCollector extends DataCollector implements LateDataCollectorInterface
{
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher = null)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
<<<<<<< HEAD
        $this->data = array(
            'called_listeners' => array(),
            'not_called_listeners' => array(),
        );
=======
        $this->data = [
            'called_listeners' => [],
            'not_called_listeners' => [],
            'orphaned_events' => [],
        ];
    }

    public function reset()
    {
        $this->data = [];

        if ($this->dispatcher instanceof ResetInterface) {
            $this->dispatcher->reset();
        }
>>>>>>> dev
    }

    public function lateCollect()
    {
        if ($this->dispatcher instanceof TraceableEventDispatcherInterface) {
            $this->setCalledListeners($this->dispatcher->getCalledListeners());
            $this->setNotCalledListeners($this->dispatcher->getNotCalledListeners());
        }
<<<<<<< HEAD
=======

        if ($this->dispatcher instanceof TraceableEventDispatcher) {
            $this->setOrphanedEvents($this->dispatcher->getOrphanedEvents());
        }

        $this->data = $this->cloneVar($this->data);
>>>>>>> dev
    }

    /**
     * Sets the called listeners.
     *
     * @param array $listeners An array of called listeners
     *
<<<<<<< HEAD
     * @see TraceableEventDispatcherInterface
=======
     * @see TraceableEventDispatcher
>>>>>>> dev
     */
    public function setCalledListeners(array $listeners)
    {
        $this->data['called_listeners'] = $listeners;
    }

    /**
     * Gets the called listeners.
     *
     * @return array An array of called listeners
     *
<<<<<<< HEAD
     * @see TraceableEventDispatcherInterface
=======
     * @see TraceableEventDispatcher
>>>>>>> dev
     */
    public function getCalledListeners()
    {
        return $this->data['called_listeners'];
    }

    /**
     * Sets the not called listeners.
     *
<<<<<<< HEAD
     * @param array $listeners An array of not called listeners
     *
     * @see TraceableEventDispatcherInterface
=======
     * @param array $listeners
     *
     * @see TraceableEventDispatcher
>>>>>>> dev
     */
    public function setNotCalledListeners(array $listeners)
    {
        $this->data['not_called_listeners'] = $listeners;
    }

    /**
     * Gets the not called listeners.
     *
<<<<<<< HEAD
     * @return array An array of not called listeners
     *
     * @see TraceableEventDispatcherInterface
=======
     * @return array
     *
     * @see TraceableEventDispatcher
>>>>>>> dev
     */
    public function getNotCalledListeners()
    {
        return $this->data['not_called_listeners'];
    }

    /**
<<<<<<< HEAD
=======
     * Sets the orphaned events.
     *
     * @param array $events An array of orphaned events
     *
     * @see TraceableEventDispatcher
     */
    public function setOrphanedEvents(array $events)
    {
        $this->data['orphaned_events'] = $events;
    }

    /**
     * Gets the orphaned events.
     *
     * @return array An array of orphaned events
     *
     * @see TraceableEventDispatcher
     */
    public function getOrphanedEvents()
    {
        return $this->data['orphaned_events'];
    }

    /**
>>>>>>> dev
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'events';
    }
}
