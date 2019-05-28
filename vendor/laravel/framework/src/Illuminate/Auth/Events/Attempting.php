<?php

namespace Illuminate\Auth\Events;

class Attempting
{
    /**
<<<<<<< HEAD
=======
     * The authentication guard name.
     *
     * @var string
     */
    public $guard;

    /**
>>>>>>> dev
     * The credentials for the user.
     *
     * @var array
     */
    public $credentials;

    /**
     * Indicates if the user should be "remembered".
     *
     * @var bool
     */
    public $remember;

    /**
<<<<<<< HEAD
     * Indicates if the user should be authenticated if successful.
     *
     * @var bool
     */
    public $login;

    /**
     * Create a new event instance.
     *
     * @param  array  $credentials
     * @param  bool  $remember
     * @param  bool  $login
     */
    public function __construct($credentials, $remember, $login)
    {
        $this->login = $login;
=======
     * Create a new event instance.
     *
     * @param  string  $guard
     * @param  array  $credentials
     * @param  bool  $remember
     * @return void
     */
    public function __construct($guard, $credentials, $remember)
    {
        $this->guard = $guard;
>>>>>>> dev
        $this->remember = $remember;
        $this->credentials = $credentials;
    }
}
