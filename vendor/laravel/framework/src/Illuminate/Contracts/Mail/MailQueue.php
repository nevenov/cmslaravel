<?php

namespace Illuminate\Contracts\Mail;

interface MailQueue
{
    /**
     * Queue a new e-mail message for sending.
     *
<<<<<<< HEAD
     * @param  string|array  $view
     * @param  array   $data
     * @param  \Closure|string  $callback
     * @param  string  $queue
     * @return mixed
     */
    public function queue($view, array $data, $callback, $queue = null);
=======
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
     * @param  string  $queue
     * @return mixed
     */
    public function queue($view, $queue = null);
>>>>>>> dev

    /**
     * Queue a new e-mail message for sending after (n) seconds.
     *
<<<<<<< HEAD
     * @param  int  $delay
     * @param  string|array  $view
     * @param  array  $data
     * @param  \Closure|string  $callback
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $view, array $data, $callback, $queue = null);
=======
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $view, $queue = null);
>>>>>>> dev
}
