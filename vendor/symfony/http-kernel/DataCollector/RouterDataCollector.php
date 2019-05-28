<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
=======
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> dev
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * RouterDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RouterDataCollector extends DataCollector
{
<<<<<<< HEAD
=======
    /**
     * @var \SplObjectStorage
     */
>>>>>>> dev
    protected $controllers;

    public function __construct()
    {
<<<<<<< HEAD
        $this->controllers = new \SplObjectStorage();

        $this->data = array(
            'redirect' => false,
            'url' => null,
            'route' => null,
        );
=======
        $this->reset();
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        if ($response instanceof RedirectResponse) {
            $this->data['redirect'] = true;
            $this->data['url'] = $response->getTargetUrl();

            if ($this->controllers->contains($request)) {
                $this->data['route'] = $this->guessRoute($request, $this->controllers[$request]);
            }
        }

        unset($this->controllers[$request]);
    }

<<<<<<< HEAD
=======
    public function reset()
    {
        $this->controllers = new \SplObjectStorage();

        $this->data = [
            'redirect' => false,
            'url' => null,
            'route' => null,
        ];
    }

>>>>>>> dev
    protected function guessRoute(Request $request, $controller)
    {
        return 'n/a';
    }

    /**
     * Remembers the controller associated to each request.
<<<<<<< HEAD
     *
     * @param FilterControllerEvent $event The filter controller event
=======
>>>>>>> dev
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->controllers[$event->getRequest()] = $event->getController();
    }

    /**
     * @return bool Whether this request will result in a redirect
     */
    public function getRedirect()
    {
        return $this->data['redirect'];
    }

    /**
     * @return string|null The target URL
     */
    public function getTargetUrl()
    {
        return $this->data['url'];
    }

    /**
     * @return string|null The target route
     */
    public function getTargetRoute()
    {
        return $this->data['route'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'router';
    }
}
