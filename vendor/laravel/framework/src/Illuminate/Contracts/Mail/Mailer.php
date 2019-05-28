<?php

namespace Illuminate\Contracts\Mail;

interface Mailer
{
    /**
<<<<<<< HEAD
     * Send a new message when only a raw text part.
     *
     * @param  string  $text
     * @param  \Closure|string  $callback
     * @return int
=======
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function to($users);

    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function bcc($users);

    /**
     * Send a new message with only a raw text part.
     *
     * @param  string  $text
     * @param  mixed  $callback
     * @return void
>>>>>>> dev
     */
    public function raw($text, $callback);

    /**
     * Send a new message using a view.
     *
<<<<<<< HEAD
     * @param  string|array  $view
=======
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
>>>>>>> dev
     * @param  array  $data
     * @param  \Closure|string  $callback
     * @return void
     */
<<<<<<< HEAD
    public function send($view, array $data, $callback);
=======
    public function send($view, array $data = [], $callback = null);
>>>>>>> dev

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures();
}
