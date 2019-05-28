<?php

namespace Illuminate\Auth\Events;

use Illuminate\Queue\SerializesModels;

class Login
{
    use SerializesModels;

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
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Indicates if the user should be "remembered".
     *
     * @var bool
     */
    public $remember;

    /**
     * Create a new event instance.
     *
<<<<<<< HEAD
=======
     * @param  string $guard
>>>>>>> dev
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  bool  $remember
     * @return void
     */
<<<<<<< HEAD
    public function __construct($user, $remember)
    {
        $this->user = $user;
=======
    public function __construct($guard, $user, $remember)
    {
        $this->user = $user;
        $this->guard = $guard;
>>>>>>> dev
        $this->remember = $remember;
    }
}
