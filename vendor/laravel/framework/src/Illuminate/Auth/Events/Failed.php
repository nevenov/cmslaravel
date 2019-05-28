<?php

namespace Illuminate\Auth\Events;

class Failed
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
     * The user the attempter was trying to authenticate as.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public $user;

    /**
     * The credentials provided by the attempter.
     *
     * @var array
     */
    public $credentials;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     * @param  array  $credentials
     */
    public function __construct($user, $credentials)
    {
        $this->user = $user;
=======
     * @param  string  $guard
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     * @param  array  $credentials
     * @return void
     */
    public function __construct($guard, $user, $credentials)
    {
        $this->user = $user;
        $this->guard = $guard;
>>>>>>> dev
        $this->credentials = $credentials;
    }
}
