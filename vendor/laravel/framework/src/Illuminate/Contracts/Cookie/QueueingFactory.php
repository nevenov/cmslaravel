<?php

namespace Illuminate\Contracts\Cookie;

interface QueueingFactory extends Factory
{
    /**
     * Queue a cookie to send with the next response.
     *
<<<<<<< HEAD
     * @param  mixed
     * @return void
     */
    public function queue();
=======
     * @param  array  $parameters
     * @return void
     */
    public function queue(...$parameters);
>>>>>>> dev

    /**
     * Remove a cookie from the queue.
     *
     * @param  string  $name
     */
    public function unqueue($name);

    /**
     * Get the cookies which have been queued for the next request.
     *
     * @return array
     */
    public function getQueuedCookies();
}
