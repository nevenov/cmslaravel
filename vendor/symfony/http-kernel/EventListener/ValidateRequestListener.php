<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
<<<<<<< HEAD
 * Validates that the headers and other information indicating the
 * client IP address of a request are consistent.
=======
 * Validates Requests.
>>>>>>> dev
 *
 * @author Magnus Nordlander <magnus@fervo.se>
 */
class ValidateRequestListener implements EventSubscriberInterface
{
    /**
     * Performs the validation.
<<<<<<< HEAD
     *
     * @param GetResponseEvent $event
=======
>>>>>>> dev
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }
        $request = $event->getRequest();

        if ($request::getTrustedProxies()) {
<<<<<<< HEAD
            // This will throw an exception if the headers are inconsistent.
            $request->getClientIps();
        }
=======
            $request->getClientIps();
        }

        $request->getHost();
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
<<<<<<< HEAD
        return array(
            KernelEvents::REQUEST => array(
                array('onKernelRequest', 256),
            ),
        );
=======
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 256],
            ],
        ];
>>>>>>> dev
    }
}
