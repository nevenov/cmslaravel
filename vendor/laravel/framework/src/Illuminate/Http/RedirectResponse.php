<?php

namespace Illuminate\Http;

<<<<<<< HEAD
use BadMethodCallException;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
=======
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\Traits\ForwardsCalls;
>>>>>>> dev
use Illuminate\Session\Store as SessionStore;
use Illuminate\Contracts\Support\MessageProvider;
use Symfony\Component\HttpFoundation\File\UploadedFile as SymfonyUploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseRedirectResponse;

class RedirectResponse extends BaseRedirectResponse
{
<<<<<<< HEAD
    use ResponseTrait;
=======
    use ForwardsCalls, ResponseTrait, Macroable {
        Macroable::__call as macroCall;
    }
>>>>>>> dev

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
<<<<<<< HEAD
     * The session store implementation.
=======
     * The session store instance.
>>>>>>> dev
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Flash a piece of data to the session.
     *
     * @param  string|array  $key
     * @param  mixed  $value
<<<<<<< HEAD
     * @return \Illuminate\Http\RedirectResponse
=======
     * @return $this
>>>>>>> dev
     */
    public function with($key, $value = null)
    {
        $key = is_array($key) ? $key : [$key => $value];

        foreach ($key as $k => $v) {
            $this->session->flash($k, $v);
        }

        return $this;
    }

    /**
     * Add multiple cookies to the response.
     *
     * @param  array  $cookies
     * @return $this
     */
    public function withCookies(array $cookies)
    {
        foreach ($cookies as $cookie) {
            $this->headers->setCookie($cookie);
        }

        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
<<<<<<< HEAD
     * @param  array  $input
=======
     * @param  array|null  $input
>>>>>>> dev
     * @return $this
     */
    public function withInput(array $input = null)
    {
<<<<<<< HEAD
        $input = $input ?: $this->request->input();

        $this->session->flashInput($this->removeFilesFromInput($input));
=======
        $this->session->flashInput($this->removeFilesFromInput(
            ! is_null($input) ? $input : $this->request->input()
        ));
>>>>>>> dev

        return $this;
    }

    /**
     * Remove all uploaded files form the given input array.
     *
     * @param  array  $input
     * @return array
     */
    protected function removeFilesFromInput(array $input)
    {
        foreach ($input as $key => $value) {
            if (is_array($value)) {
                $input[$key] = $this->removeFilesFromInput($value);
            }

            if ($value instanceof SymfonyUploadedFile) {
                unset($input[$key]);
            }
        }

        return $input;
    }

    /**
     * Flash an array of input to the session.
     *
<<<<<<< HEAD
     * @param  mixed  string
=======
>>>>>>> dev
     * @return $this
     */
    public function onlyInput()
    {
        return $this->withInput($this->request->only(func_get_args()));
    }

    /**
     * Flash an array of input to the session.
     *
<<<<<<< HEAD
     * @param  mixed  string
     * @return \Illuminate\Http\RedirectResponse
=======
     * @return $this
>>>>>>> dev
     */
    public function exceptInput()
    {
        return $this->withInput($this->request->except(func_get_args()));
    }

    /**
     * Flash a container of errors to the session.
     *
     * @param  \Illuminate\Contracts\Support\MessageProvider|array|string  $provider
     * @param  string  $key
     * @return $this
     */
    public function withErrors($provider, $key = 'default')
    {
        $value = $this->parseErrors($provider);

<<<<<<< HEAD
        $this->session->flash(
            'errors', $this->session->get('errors', new ViewErrorBag)->put($key, $value)
=======
        $errors = $this->session->get('errors', new ViewErrorBag);

        if (! $errors instanceof ViewErrorBag) {
            $errors = new ViewErrorBag;
        }

        $this->session->flash(
            'errors', $errors->put($key, $value)
>>>>>>> dev
        );

        return $this;
    }

    /**
     * Parse the given errors into an appropriate value.
     *
     * @param  \Illuminate\Contracts\Support\MessageProvider|array|string  $provider
     * @return \Illuminate\Support\MessageBag
     */
    protected function parseErrors($provider)
    {
        if ($provider instanceof MessageProvider) {
            return $provider->getMessageBag();
        }

        return new MessageBag((array) $provider);
    }

    /**
<<<<<<< HEAD
=======
     * Get the original response content.
     *
     * @return null
     */
    public function getOriginalContent()
    {
        //
    }

    /**
>>>>>>> dev
     * Get the request instance.
     *
     * @return \Illuminate\Http\Request|null
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
<<<<<<< HEAD
     * Get the session store implementation.
=======
     * Get the session store instance.
>>>>>>> dev
     *
     * @return \Illuminate\Session\Store|null
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
<<<<<<< HEAD
     * Set the session store implementation.
=======
     * Set the session store instance.
>>>>>>> dev
     *
     * @param  \Illuminate\Session\Store  $session
     * @return void
     */
    public function setSession(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Dynamically bind flash data in the session.
     *
     * @param  string  $method
     * @param  array  $parameters
<<<<<<< HEAD
     * @return $this
=======
     * @return mixed
>>>>>>> dev
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
=======
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

>>>>>>> dev
        if (Str::startsWith($method, 'with')) {
            return $this->with(Str::snake(substr($method, 4)), $parameters[0]);
        }

<<<<<<< HEAD
        throw new BadMethodCallException("Method [$method] does not exist on Redirect.");
=======
        static::throwBadMethodCallException($method);
>>>>>>> dev
    }
}
