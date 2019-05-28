<?php

namespace Illuminate\Broadcasting;

use ReflectionClass;
use ReflectionProperty;
<<<<<<< HEAD
use Illuminate\Contracts\Queue\Job;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Broadcasting\Broadcaster;

class BroadcastEvent
{
    /**
     * The broadcaster implementation.
     *
     * @var \Illuminate\Contracts\Broadcasting\Broadcaster
     */
    protected $broadcaster;
=======
use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Broadcasting\Broadcaster;

class BroadcastEvent implements ShouldQueue
{
    use Queueable;

    /**
     * The event instance.
     *
     * @var mixed
     */
    public $event;
>>>>>>> dev

    /**
     * Create a new job handler instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Broadcasting\Broadcaster  $broadcaster
     * @return void
     */
    public function __construct(Broadcaster $broadcaster)
    {
        $this->broadcaster = $broadcaster;
=======
     * @param  mixed  $event
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
>>>>>>> dev
    }

    /**
     * Handle the queued job.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Queue\Job  $job
     * @param  array  $data
     * @return void
     */
    public function fire(Job $job, array $data)
    {
        $event = unserialize($data['event']);

        $name = method_exists($event, 'broadcastAs')
                ? $event->broadcastAs() : get_class($event);

        $this->broadcaster->broadcast(
            $event->broadcastOn(), $name, $this->getPayloadFromEvent($event)
        );

        $job->delete();
=======
     * @param  \Illuminate\Contracts\Broadcasting\Broadcaster  $broadcaster
     * @return void
     */
    public function handle(Broadcaster $broadcaster)
    {
        $name = method_exists($this->event, 'broadcastAs')
                ? $this->event->broadcastAs() : get_class($this->event);

        $broadcaster->broadcast(
            Arr::wrap($this->event->broadcastOn()), $name,
            $this->getPayloadFromEvent($this->event)
        );
>>>>>>> dev
    }

    /**
     * Get the payload for the given event.
     *
     * @param  mixed  $event
     * @return array
     */
    protected function getPayloadFromEvent($event)
    {
        if (method_exists($event, 'broadcastWith')) {
<<<<<<< HEAD
            return $event->broadcastWith();
=======
            return array_merge(
                $event->broadcastWith(), ['socket' => data_get($event, 'socket')]
            );
>>>>>>> dev
        }

        $payload = [];

        foreach ((new ReflectionClass($event))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $payload[$property->getName()] = $this->formatProperty($property->getValue($event));
        }

<<<<<<< HEAD
=======
        unset($payload['broadcastQueue']);

>>>>>>> dev
        return $payload;
    }

    /**
     * Format the given value for a property.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function formatProperty($value)
    {
        if ($value instanceof Arrayable) {
            return $value->toArray();
        }

        return $value;
    }
<<<<<<< HEAD
=======

    /**
     * Get the display name for the queued job.
     *
     * @return string
     */
    public function displayName()
    {
        return get_class($this->event);
    }

    /**
     * Prepare the instance for cloning.
     *
     * @return void
     */
    public function __clone()
    {
        $this->event = clone $this->event;
    }
>>>>>>> dev
}
