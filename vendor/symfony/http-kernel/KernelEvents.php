<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel;

/**
 * Contains all events thrown in the HttpKernel component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class KernelEvents
{
    /**
     * The REQUEST event occurs at the very beginning of request
     * dispatching.
     *
     * This event allows you to create a response for a request before any
<<<<<<< HEAD
     * other code in the framework is executed. The event listener method
     * receives a Symfony\Component\HttpKernel\Event\GetResponseEvent
     * instance.
     *
     * @Event
     *
     * @var string
=======
     * other code in the framework is executed.
     *
     * @Event("Symfony\Component\HttpKernel\Event\GetResponseEvent")
>>>>>>> dev
     */
    const REQUEST = 'kernel.request';

    /**
     * The EXCEPTION event occurs when an uncaught exception appears.
     *
     * This event allows you to create a response for a thrown exception or
<<<<<<< HEAD
     * to modify the thrown exception. The event listener method receives
     * a Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent
     * instance.
     *
     * @Event
     *
     * @var string
=======
     * to modify the thrown exception.
     *
     * @Event("Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent")
>>>>>>> dev
     */
    const EXCEPTION = 'kernel.exception';

    /**
     * The VIEW event occurs when the return value of a controller
     * is not a Response instance.
     *
     * This event allows you to create a response for the return value of the
<<<<<<< HEAD
     * controller. The event listener method receives a
     * Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent
     * instance.
     *
     * @Event
     *
     * @var string
=======
     * controller.
     *
     * @Event("Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent")
>>>>>>> dev
     */
    const VIEW = 'kernel.view';

    /**
     * The CONTROLLER event occurs once a controller was found for
     * handling a request.
     *
     * This event allows you to change the controller that will handle the
<<<<<<< HEAD
     * request. The event listener method receives a
     * Symfony\Component\HttpKernel\Event\FilterControllerEvent instance.
     *
     * @Event
     *
     * @var string
=======
     * request.
     *
     * @Event("Symfony\Component\HttpKernel\Event\FilterControllerEvent")
>>>>>>> dev
     */
    const CONTROLLER = 'kernel.controller';

    /**
<<<<<<< HEAD
=======
     * The CONTROLLER_ARGUMENTS event occurs once controller arguments have been resolved.
     *
     * This event allows you to change the arguments that will be passed to
     * the controller.
     *
     * @Event("Symfony\Component\HttpKernel\Event\FilterControllerArgumentsEvent")
     */
    const CONTROLLER_ARGUMENTS = 'kernel.controller_arguments';

    /**
>>>>>>> dev
     * The RESPONSE event occurs once a response was created for
     * replying to a request.
     *
     * This event allows you to modify or replace the response that will be
<<<<<<< HEAD
     * replied. The event listener method receives a
     * Symfony\Component\HttpKernel\Event\FilterResponseEvent instance.
     *
     * @Event
     *
     * @var string
=======
     * replied.
     *
     * @Event("Symfony\Component\HttpKernel\Event\FilterResponseEvent")
>>>>>>> dev
     */
    const RESPONSE = 'kernel.response';

    /**
     * The TERMINATE event occurs once a response was sent.
     *
     * This event allows you to run expensive post-response jobs.
<<<<<<< HEAD
     * The event listener method receives a
     * Symfony\Component\HttpKernel\Event\PostResponseEvent instance.
     *
     * @Event
     *
     * @var string
=======
     *
     * @Event("Symfony\Component\HttpKernel\Event\PostResponseEvent")
>>>>>>> dev
     */
    const TERMINATE = 'kernel.terminate';

    /**
     * The FINISH_REQUEST event occurs when a response was generated for a request.
     *
     * This event allows you to reset the global and environmental state of
     * the application, when it was changed during the request.
<<<<<<< HEAD
     * The event listener method receives a
     * Symfony\Component\HttpKernel\Event\FinishRequestEvent instance.
     *
     * @Event
     *
     * @var string
=======
     *
     * @Event("Symfony\Component\HttpKernel\Event\FinishRequestEvent")
>>>>>>> dev
     */
    const FINISH_REQUEST = 'kernel.finish_request';
}
