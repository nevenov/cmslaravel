<?php

namespace Illuminate\Routing;

use Illuminate\Http\RedirectResponse;
<<<<<<< HEAD
=======
use Illuminate\Support\Traits\Macroable;
>>>>>>> dev
use Illuminate\Session\Store as SessionStore;

class Redirector
{
<<<<<<< HEAD
=======
    use Macroable;

>>>>>>> dev
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Routing\UrlGenerator
     */
    protected $generator;

    /**
     * The session store instance.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Create a new Redirector instance.
     *
     * @param  \Illuminate\Routing\UrlGenerator  $generator
     * @return void
     */
    public function __construct(UrlGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Create a new redirect response to the "home" route.
     *
     * @param  int  $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function home($status = 302)
    {
        return $this->to($this->generator->route('home'), $status);
    }

    /**
     * Create a new redirect response to the previous location.
     *
     * @param  int    $status
     * @param  array  $headers
<<<<<<< HEAD
     * @return \Illuminate\Http\RedirectResponse
     */
    public function back($status = 302, $headers = [])
    {
        $back = $this->generator->previous();

        return $this->createRedirect($back, $status, $headers);
=======
     * @param  mixed  $fallback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function back($status = 302, $headers = [], $fallback = false)
    {
        return $this->createRedirect($this->generator->previous($fallback), $status, $headers);
>>>>>>> dev
    }

    /**
     * Create a new redirect response to the current URI.
     *
     * @param  int    $status
     * @param  array  $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refresh($status = 302, $headers = [])
    {
        return $this->to($this->generator->getRequest()->path(), $status, $headers);
    }

    /**
     * Create a new redirect response, while putting the current URL in the session.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    public function guest($path, $status = 302, $headers = [], $secure = null)
    {
<<<<<<< HEAD
        $this->session->put('url.intended', $this->generator->full());
=======
        $request = $this->generator->getRequest();

        $intended = $request->method() === 'GET' && $request->route() && ! $request->expectsJson()
                        ? $this->generator->full()
                        : $this->generator->previous();

        if ($intended) {
            $this->setIntendedUrl($intended);
        }
>>>>>>> dev

        return $this->to($path, $status, $headers, $secure);
    }

    /**
     * Create a new redirect response to the previously intended location.
     *
     * @param  string  $default
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    public function intended($default = '/', $status = 302, $headers = [], $secure = null)
    {
        $path = $this->session->pull('url.intended', $default);

        return $this->to($path, $status, $headers, $secure);
    }

    /**
<<<<<<< HEAD
=======
     * Set the intended url.
     *
     * @param  string  $url
     * @return void
     */
    public function setIntendedUrl($url)
    {
        $this->session->put('url.intended', $url);
    }

    /**
>>>>>>> dev
     * Create a new redirect response to the given path.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    public function to($path, $status = 302, $headers = [], $secure = null)
    {
<<<<<<< HEAD
        $path = $this->generator->to($path, [], $secure);

        return $this->createRedirect($path, $status, $headers);
=======
        return $this->createRedirect($this->generator->to($path, [], $secure), $status, $headers);
>>>>>>> dev
    }

    /**
     * Create a new redirect response to an external URL (no validation).
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function away($path, $status = 302, $headers = [])
    {
        return $this->createRedirect($path, $status, $headers);
    }

    /**
     * Create a new redirect response to the given HTTPS path.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function secure($path, $status = 302, $headers = [])
    {
        return $this->to($path, $status, $headers, true);
    }

    /**
     * Create a new redirect response to a named route.
     *
     * @param  string  $route
<<<<<<< HEAD
     * @param  array   $parameters
=======
     * @param  mixed   $parameters
>>>>>>> dev
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function route($route, $parameters = [], $status = 302, $headers = [])
    {
<<<<<<< HEAD
        $path = $this->generator->route($route, $parameters);

        return $this->to($path, $status, $headers);
=======
        return $this->to($this->generator->route($route, $parameters), $status, $headers);
>>>>>>> dev
    }

    /**
     * Create a new redirect response to a controller action.
     *
<<<<<<< HEAD
     * @param  string  $action
     * @param  array   $parameters
=======
     * @param  string|array  $action
     * @param  mixed   $parameters
>>>>>>> dev
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function action($action, $parameters = [], $status = 302, $headers = [])
    {
<<<<<<< HEAD
        $path = $this->generator->action($action, $parameters);

        return $this->to($path, $status, $headers);
=======
        return $this->to($this->generator->action($action, $parameters), $status, $headers);
>>>>>>> dev
    }

    /**
     * Create a new redirect response.
     *
     * @param  string  $path
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createRedirect($path, $status, $headers)
    {
<<<<<<< HEAD
        $redirect = new RedirectResponse($path, $status, $headers);

        if (isset($this->session)) {
            $redirect->setSession($this->session);
        }

        $redirect->setRequest($this->generator->getRequest());

        return $redirect;
=======
        return tap(new RedirectResponse($path, $status, $headers), function ($redirect) {
            if (isset($this->session)) {
                $redirect->setSession($this->session);
            }

            $redirect->setRequest($this->generator->getRequest());
        });
>>>>>>> dev
    }

    /**
     * Get the URL generator instance.
     *
     * @return \Illuminate\Routing\UrlGenerator
     */
    public function getUrlGenerator()
    {
        return $this->generator;
    }

    /**
     * Set the active session store.
     *
     * @param  \Illuminate\Session\Store  $session
     * @return void
     */
    public function setSession(SessionStore $session)
    {
        $this->session = $session;
    }
}
