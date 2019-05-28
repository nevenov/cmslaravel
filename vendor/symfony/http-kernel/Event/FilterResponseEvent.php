<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Event;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
>>>>>>> dev

/**
 * Allows to filter a Response object.
 *
 * You can call getResponse() to retrieve the current response. With
 * setResponse() you can set a new response that will be returned to the
 * browser.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class FilterResponseEvent extends KernelEvent
{
<<<<<<< HEAD
    /**
     * The current response object.
     *
     * @var Response
     */
    private $response;

    public function __construct(HttpKernelInterface $kernel, Request $request, $requestType, Response $response)
=======
    private $response;

    public function __construct(HttpKernelInterface $kernel, Request $request, int $requestType, Response $response)
>>>>>>> dev
    {
        parent::__construct($kernel, $request, $requestType);

        $this->setResponse($response);
    }

    /**
     * Returns the current response object.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets a new response object.
<<<<<<< HEAD
     *
     * @param Response $response
=======
>>>>>>> dev
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }
}
