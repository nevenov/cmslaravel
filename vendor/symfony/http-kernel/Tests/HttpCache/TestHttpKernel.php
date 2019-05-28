<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\HttpCache;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TestHttpKernel extends HttpKernel implements ControllerResolverInterface
=======
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class TestHttpKernel extends HttpKernel implements ControllerResolverInterface, ArgumentResolverInterface
>>>>>>> dev
{
    protected $body;
    protected $status;
    protected $headers;
    protected $called = false;
    protected $customizer;
    protected $catch = false;
    protected $backendRequest;

    public function __construct($body, $status, $headers, \Closure $customizer = null)
    {
        $this->body = $body;
        $this->status = $status;
        $this->headers = $headers;
        $this->customizer = $customizer;

<<<<<<< HEAD
        parent::__construct(new EventDispatcher(), $this);
    }

    public function getBackendRequest()
    {
        return $this->backendRequest;
=======
        parent::__construct(new EventDispatcher(), $this, null, $this);
    }

    public function assert(\Closure $callback)
    {
        $trustedConfig = [Request::getTrustedProxies(), Request::getTrustedHeaderSet()];

        list($trustedProxies, $trustedHeaderSet, $backendRequest) = $this->backendRequest;
        Request::setTrustedProxies($trustedProxies, $trustedHeaderSet);

        try {
            $callback($backendRequest);
        } finally {
            list($trustedProxies, $trustedHeaderSet) = $trustedConfig;
            Request::setTrustedProxies($trustedProxies, $trustedHeaderSet);
        }
>>>>>>> dev
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = false)
    {
        $this->catch = $catch;
<<<<<<< HEAD
        $this->backendRequest = $request;
=======
        $this->backendRequest = [Request::getTrustedProxies(), Request::getTrustedHeaderSet(), $request];
>>>>>>> dev

        return parent::handle($request, $type, $catch);
    }

    public function isCatchingExceptions()
    {
        return $this->catch;
    }

    public function getController(Request $request)
    {
<<<<<<< HEAD
        return array($this, 'callController');
=======
        return [$this, 'callController'];
>>>>>>> dev
    }

    public function getArguments(Request $request, $controller)
    {
<<<<<<< HEAD
        return array($request);
=======
        return [$request];
>>>>>>> dev
    }

    public function callController(Request $request)
    {
        $this->called = true;

        $response = new Response($this->body, $this->status, $this->headers);

        if (null !== $customizer = $this->customizer) {
            $customizer($request, $response);
        }

        return $response;
    }

    public function hasBeenCalled()
    {
        return $this->called;
    }

    public function reset()
    {
        $this->called = false;
    }
}
