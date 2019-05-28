<?php

namespace Illuminate\Mail\Events;

class MessageSending
{
    /**
     * The Swift message instance.
     *
     * @var \Swift_Message
     */
    public $message;

    /**
<<<<<<< HEAD
     * Create a new event instance.
     *
     * @param  \Swift_Message  $message
     * @return void
     */
    public function __construct($message)
    {
=======
     * The message data.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new event instance.
     *
     * @param  \Swift_Message $message
     * @param  array  $data
     * @return void
     */
    public function __construct($message, $data = [])
    {
        $this->data = $data;
>>>>>>> dev
        $this->message = $message;
    }
}
