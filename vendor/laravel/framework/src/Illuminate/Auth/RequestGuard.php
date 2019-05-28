<?php

namespace Illuminate\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
<<<<<<< HEAD

class RequestGuard implements Guard
{
    use GuardHelpers;
=======
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Auth\UserProvider;

class RequestGuard implements Guard
{
    use GuardHelpers, Macroable;
>>>>>>> dev

    /**
     * The guard callback.
     *
     * @var callable
     */
    protected $callback;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new authentication guard.
     *
     * @param  callable  $callback
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @return void
     */
    public function __construct(callable $callback, Request $request)
    {
        $this->request = $request;
        $this->callback = $callback;
=======
     * @param  \Illuminate\Contracts\Auth\UserProvider|null $provider
     * @return void
     */
    public function __construct(callable $callback, Request $request, UserProvider $provider = null)
    {
        $this->request = $request;
        $this->callback = $callback;
        $this->provider = $provider;
>>>>>>> dev
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        if (! is_null($this->user)) {
            return $this->user;
        }

<<<<<<< HEAD
        return $this->user = call_user_func($this->callback, $this->request);
=======
        return $this->user = call_user_func(
            $this->callback, $this->request, $this->getProvider()
        );
>>>>>>> dev
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return ! is_null((new static(
<<<<<<< HEAD
            $this->callback, $credentials['request']
=======
            $this->callback, $credentials['request'], $this->getProvider()
>>>>>>> dev
        ))->user());
    }

    /**
     * Set the current request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
