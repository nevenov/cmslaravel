<?php

namespace Illuminate\Auth;

use Exception;

class AuthenticationException extends Exception
{
    /**
<<<<<<< HEAD
     * The guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $guard;
=======
     * All of the guards that were checked.
     *
     * @var array
     */
    protected $guards;

    /**
     * The path the user should be redirected to.
     *
     * @var string
     */
    protected $redirectTo;
>>>>>>> dev

    /**
     * Create a new authentication exception.
     *
<<<<<<< HEAD
     * @param \Illuminate\Contracts\Auth\Guard|null  $guard
     */
    public function __construct($guard = null)
    {
        $this->guard = $guard;

        parent::__construct('Unauthenticated.');
    }

    /**
     * Get the guard instance.
     *
     * @return \Illuminate\Contracts\Auth\Guard|null
     */
    public function guard()
    {
        return $this->guard;
=======
     * @param  string  $message
     * @param  array  $guards
     * @param  string|null  $redirectTo
     * @return void
     */
    public function __construct($message = 'Unauthenticated.', array $guards = [], $redirectTo = null)
    {
        parent::__construct($message);

        $this->guards = $guards;
        $this->redirectTo = $redirectTo;
    }

    /**
     * Get the guards that were checked.
     *
     * @return array
     */
    public function guards()
    {
        return $this->guards;
    }

    /**
     * Get the path the user should be redirected to.
     *
     * @return string
     */
    public function redirectTo()
    {
        return $this->redirectTo;
>>>>>>> dev
    }
}
