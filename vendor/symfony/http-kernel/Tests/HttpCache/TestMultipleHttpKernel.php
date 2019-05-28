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

class TestMultipleHttpKernel extends HttpKernel implements ControllerResolverInterface
{
    protected $bodies = array();
    protected $statuses = array();
    protected $headers = array();
=======
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class TestMultipleHttpKernel extends HttpKernel implements ControllerResolverInterface, ArgumentResolverInterface
{
    protected $bodies = [];
    protected $statuses = [];
    protected $headers = [];
>>>>>>> dev
    protected $called = false;
    protected $backendRequest;

    public function __construct($responses)
    {
        foreach ($responses as $response) {
            $this->bodies[] = $response['body'];
            $this->statuses[] = $response['status'];
            $this->headers[] = $response['headers'];
        }

<<<<<<< HEAD
        parent::__construct(new EventDispatcher(), $this);
=======
        parent::__construct(new EventDispatcher(), $this, null, $this);
>>>>>>> dev
    }

    public function getBackendRequest()
    {
        return $this->backendRequest;
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = false)
    {
        $this->backendRequest = $request;

        return parent::handle($request, $type, $catch);
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

        $response = new Response(array_shift($this->bodies), array_shift($this->statuses), array_shift($this->headers));

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
