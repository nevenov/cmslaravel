<?php

namespace Illuminate\Contracts\Broadcasting;

interface ShouldBroadcast
{
    /**
     * Get the channels the event should broadcast on.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
>>>>>>> dev
     */
    public function broadcastOn();
}
