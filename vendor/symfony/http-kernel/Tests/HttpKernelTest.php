<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\EventDispatcher\EventDispatcher;

class HttpKernelTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerArgumentsEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ControllerDoesNotReturnResponseException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class HttpKernelTest extends TestCase
>>>>>>> dev
{
    /**
     * @expectedException \RuntimeException
     */
    public function testHandleWhenControllerThrowsAnExceptionAndCatchIsTrue()
    {
<<<<<<< HEAD
        $kernel = new HttpKernel(new EventDispatcher(), $this->getResolver(function () { throw new \RuntimeException(); }));
=======
        $kernel = $this->getHttpKernel(new EventDispatcher(), function () { throw new \RuntimeException(); });
>>>>>>> dev

        $kernel->handle(new Request(), HttpKernelInterface::MASTER_REQUEST, true);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testHandleWhenControllerThrowsAnExceptionAndCatchIsFalseAndNoListenerIsRegistered()
    {
<<<<<<< HEAD
        $kernel = new HttpKernel(new EventDispatcher(), $this->getResolver(function () { throw new \RuntimeException(); }));
=======
        $kernel = $this->getHttpKernel(new EventDispatcher(), function () { throw new \RuntimeException(); });
>>>>>>> dev

        $kernel->handle(new Request(), HttpKernelInterface::MASTER_REQUEST, false);
    }

    public function testHandleWhenControllerThrowsAnExceptionAndCatchIsTrueWithAHandlingListener()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function ($event) {
            $event->setResponse(new Response($event->getException()->getMessage()));
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { throw new \RuntimeException('foo'); }));
=======
        $kernel = $this->getHttpKernel($dispatcher, function () { throw new \RuntimeException('foo'); });
>>>>>>> dev
        $response = $kernel->handle(new Request(), HttpKernelInterface::MASTER_REQUEST, true);

        $this->assertEquals('500', $response->getStatusCode());
        $this->assertEquals('foo', $response->getContent());
    }

    public function testHandleWhenControllerThrowsAnExceptionAndCatchIsTrueWithANonHandlingListener()
    {
        $exception = new \RuntimeException();

        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function ($event) {
            // should set a response, but does not
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () use ($exception) { throw $exception; }));
=======
        $kernel = $this->getHttpKernel($dispatcher, function () use ($exception) { throw $exception; });
>>>>>>> dev

        try {
            $kernel->handle(new Request(), HttpKernelInterface::MASTER_REQUEST, true);
            $this->fail('LogicException expected');
        } catch (\RuntimeException $e) {
            $this->assertSame($exception, $e);
        }
    }

    public function testHandleExceptionWithARedirectionResponse()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function ($event) {
            $event->setResponse(new RedirectResponse('/login', 301));
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { throw new AccessDeniedHttpException(); }));
=======
        $kernel = $this->getHttpKernel($dispatcher, function () { throw new AccessDeniedHttpException(); });
>>>>>>> dev
        $response = $kernel->handle(new Request());

        $this->assertEquals('301', $response->getStatusCode());
        $this->assertEquals('/login', $response->headers->get('Location'));
    }

    public function testHandleHttpException()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function ($event) {
            $event->setResponse(new Response($event->getException()->getMessage()));
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { throw new MethodNotAllowedHttpException(array('POST')); }));
=======
        $kernel = $this->getHttpKernel($dispatcher, function () { throw new MethodNotAllowedHttpException(['POST']); });
>>>>>>> dev
        $response = $kernel->handle(new Request());

        $this->assertEquals('405', $response->getStatusCode());
        $this->assertEquals('POST', $response->headers->get('Allow'));
    }

<<<<<<< HEAD
    /**
     * @dataProvider getStatusCodes
     */
    public function testHandleWhenAnExceptionIsHandledWithASpecificStatusCode($responseStatusCode, $expectedStatusCode)
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function ($event) use ($responseStatusCode, $expectedStatusCode) {
            $event->setResponse(new Response('', $responseStatusCode, array('X-Status-Code' => $expectedStatusCode)));
        });

        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { throw new \RuntimeException(); }));
        $response = $kernel->handle(new Request());

        $this->assertEquals($expectedStatusCode, $response->getStatusCode());
        $this->assertFalse($response->headers->has('X-Status-Code'));
    }

    public function getStatusCodes()
    {
        return array(
            array(200, 404),
            array(404, 200),
            array(301, 200),
            array(500, 200),
        );
=======
    public function getStatusCodes()
    {
        return [
            [200, 404],
            [404, 200],
            [301, 200],
            [500, 200],
        ];
    }

    /**
     * @dataProvider getSpecificStatusCodes
     */
    public function testHandleWhenAnExceptionIsHandledWithASpecificStatusCode($expectedStatusCode)
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::EXCEPTION, function (GetResponseForExceptionEvent $event) use ($expectedStatusCode) {
            $event->allowCustomResponseCode();
            $event->setResponse(new Response('', $expectedStatusCode));
        });

        $kernel = $this->getHttpKernel($dispatcher, function () { throw new \RuntimeException(); });
        $response = $kernel->handle(new Request());

        $this->assertEquals($expectedStatusCode, $response->getStatusCode());
    }

    public function getSpecificStatusCodes()
    {
        return [
            [200],
            [302],
            [403],
        ];
>>>>>>> dev
    }

    public function testHandleWhenAListenerReturnsAResponse()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::REQUEST, function ($event) {
            $event->setResponse(new Response('hello'));
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver());
=======
        $kernel = $this->getHttpKernel($dispatcher);
>>>>>>> dev

        $this->assertEquals('hello', $kernel->handle(new Request())->getContent());
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testHandleWhenNoControllerIsFound()
    {
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(false));
=======
        $kernel = $this->getHttpKernel($dispatcher, false);
>>>>>>> dev

        $kernel->handle(new Request());
    }

    public function testHandleWhenTheControllerIsAClosure()
    {
        $response = new Response('foo');
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () use ($response) { return $response; }));
=======
        $kernel = $this->getHttpKernel($dispatcher, function () use ($response) { return $response; });
>>>>>>> dev

        $this->assertSame($response, $kernel->handle(new Request()));
    }

    public function testHandleWhenTheControllerIsAnObjectWithInvoke()
    {
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(new Controller()));
=======
        $kernel = $this->getHttpKernel($dispatcher, new TestController());
>>>>>>> dev

        $this->assertResponseEquals(new Response('foo'), $kernel->handle(new Request()));
    }

    public function testHandleWhenTheControllerIsAFunction()
    {
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver('Symfony\Component\HttpKernel\Tests\controller_func'));
=======
        $kernel = $this->getHttpKernel($dispatcher, 'Symfony\Component\HttpKernel\Tests\controller_func');
>>>>>>> dev

        $this->assertResponseEquals(new Response('foo'), $kernel->handle(new Request()));
    }

    public function testHandleWhenTheControllerIsAnArray()
    {
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(array(new Controller(), 'controller')));
=======
        $kernel = $this->getHttpKernel($dispatcher, [new TestController(), 'controller']);
>>>>>>> dev

        $this->assertResponseEquals(new Response('foo'), $kernel->handle(new Request()));
    }

    public function testHandleWhenTheControllerIsAStaticArray()
    {
        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(array('Symfony\Component\HttpKernel\Tests\Controller', 'staticcontroller')));
=======
        $kernel = $this->getHttpKernel($dispatcher, ['Symfony\Component\HttpKernel\Tests\TestController', 'staticcontroller']);
>>>>>>> dev

        $this->assertResponseEquals(new Response('foo'), $kernel->handle(new Request()));
    }

<<<<<<< HEAD
    /**
     * @expectedException \LogicException
     */
    public function testHandleWhenTheControllerDoesNotReturnAResponse()
    {
        $dispatcher = new EventDispatcher();
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { return 'foo'; }));

        $kernel->handle(new Request());
=======
    public function testHandleWhenTheControllerDoesNotReturnAResponse()
    {
        $dispatcher = new EventDispatcher();
        $kernel = $this->getHttpKernel($dispatcher, function () { return 'foo'; });

        try {
            $kernel->handle(new Request());

            $this->fail('The kernel should throw an exception.');
        } catch (ControllerDoesNotReturnResponseException $e) {
        }

        $first = $e->getTrace()[0];

        // `file` index the array starting at 0, and __FILE__ starts at 1
        $line = file($first['file'])[$first['line'] - 2];
        $this->assertContains('// call controller', $line);
>>>>>>> dev
    }

    public function testHandleWhenTheControllerDoesNotReturnAResponseButAViewIsRegistered()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::VIEW, function ($event) {
            $event->setResponse(new Response($event->getControllerResult()));
        });
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(function () { return 'foo'; }));
=======

        $kernel = $this->getHttpKernel($dispatcher, function () { return 'foo'; });
>>>>>>> dev

        $this->assertEquals('foo', $kernel->handle(new Request())->getContent());
    }

    public function testHandleWithAResponseListener()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::RESPONSE, function ($event) {
            $event->setResponse(new Response('foo'));
        });
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver());
=======
        $kernel = $this->getHttpKernel($dispatcher);
>>>>>>> dev

        $this->assertEquals('foo', $kernel->handle(new Request())->getContent());
    }

<<<<<<< HEAD
    public function testTerminate()
    {
        $dispatcher = new EventDispatcher();
        $kernel = new HttpKernel($dispatcher, $this->getResolver());
=======
    public function testHandleAllowChangingControllerArguments()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::CONTROLLER_ARGUMENTS, function (FilterControllerArgumentsEvent $event) {
            $event->setArguments(['foo']);
        });

        $kernel = $this->getHttpKernel($dispatcher, function ($content) { return new Response($content); });

        $this->assertResponseEquals(new Response('foo'), $kernel->handle(new Request()));
    }

    public function testHandleAllowChangingControllerAndArguments()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::CONTROLLER_ARGUMENTS, function (FilterControllerArgumentsEvent $event) {
            $oldController = $event->getController();
            $oldArguments = $event->getArguments();

            $newController = function ($id) use ($oldController, $oldArguments) {
                $response = $oldController(...$oldArguments);

                $response->headers->set('X-Id', $id);

                return $response;
            };

            $event->setController($newController);
            $event->setArguments(['bar']);
        });

        $kernel = $this->getHttpKernel($dispatcher, function ($content) { return new Response($content); }, null, ['foo']);

        $this->assertResponseEquals(new Response('foo', 200, ['X-Id' => 'bar']), $kernel->handle(new Request()));
    }

    public function testTerminate()
    {
        $dispatcher = new EventDispatcher();
        $kernel = $this->getHttpKernel($dispatcher);
>>>>>>> dev
        $dispatcher->addListener(KernelEvents::TERMINATE, function ($event) use (&$called, &$capturedKernel, &$capturedRequest, &$capturedResponse) {
            $called = true;
            $capturedKernel = $event->getKernel();
            $capturedRequest = $event->getRequest();
            $capturedResponse = $event->getResponse();
        });

        $kernel->terminate($request = Request::create('/'), $response = new Response());
        $this->assertTrue($called);
        $this->assertEquals($kernel, $capturedKernel);
        $this->assertEquals($request, $capturedRequest);
        $this->assertEquals($response, $capturedResponse);
    }

    public function testVerifyRequestStackPushPopDuringHandle()
    {
        $request = new Request();

<<<<<<< HEAD
        $stack = $this->getMock('Symfony\Component\HttpFoundation\RequestStack', array('push', 'pop'));
=======
        $stack = $this->getMockBuilder('Symfony\Component\HttpFoundation\RequestStack')->setMethods(['push', 'pop'])->getMock();
>>>>>>> dev
        $stack->expects($this->at(0))->method('push')->with($this->equalTo($request));
        $stack->expects($this->at(1))->method('pop');

        $dispatcher = new EventDispatcher();
<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver(), $stack);
=======
        $kernel = $this->getHttpKernel($dispatcher, null, $stack);
>>>>>>> dev

        $kernel->handle($request, HttpKernelInterface::MASTER_REQUEST);
    }

    /**
<<<<<<< HEAD
     * @expectedException Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function testInconsistentClientIpsOnMasterRequests()
    {
=======
     * @expectedException \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function testInconsistentClientIpsOnMasterRequests()
    {
        $request = new Request();
        $request->setTrustedProxies(['1.1.1.1'], Request::HEADER_X_FORWARDED_FOR | Request::HEADER_FORWARDED);
        $request->server->set('REMOTE_ADDR', '1.1.1.1');
        $request->headers->set('FORWARDED', 'for=2.2.2.2');
        $request->headers->set('X_FORWARDED_FOR', '3.3.3.3');

>>>>>>> dev
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(KernelEvents::REQUEST, function ($event) {
            $event->getRequest()->getClientIp();
        });

<<<<<<< HEAD
        $kernel = new HttpKernel($dispatcher, $this->getResolver());

        $request = new Request();
        $request->setTrustedProxies(array('1.1.1.1'));
        $request->server->set('REMOTE_ADDR', '1.1.1.1');
        $request->headers->set('FORWARDED', '2.2.2.2');
        $request->headers->set('X_FORWARDED_FOR', '3.3.3.3');

        $kernel->handle($request, $kernel::MASTER_REQUEST, false);
    }

    protected function getResolver($controller = null)
=======
        $kernel = $this->getHttpKernel($dispatcher);
        $kernel->handle($request, $kernel::MASTER_REQUEST, false);

        Request::setTrustedProxies([], -1);
    }

    private function getHttpKernel(EventDispatcherInterface $eventDispatcher, $controller = null, RequestStack $requestStack = null, array $arguments = [])
>>>>>>> dev
    {
        if (null === $controller) {
            $controller = function () { return new Response('Hello'); };
        }

<<<<<<< HEAD
        $resolver = $this->getMock('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface');
        $resolver->expects($this->any())
            ->method('getController')
            ->will($this->returnValue($controller));
        $resolver->expects($this->any())
            ->method('getArguments')
            ->will($this->returnValue(array()));

        return $resolver;
    }

    protected function assertResponseEquals(Response $expected, Response $actual)
=======
        $controllerResolver = $this->getMockBuilder(ControllerResolverInterface::class)->getMock();
        $controllerResolver
            ->expects($this->any())
            ->method('getController')
            ->will($this->returnValue($controller));

        $argumentResolver = $this->getMockBuilder(ArgumentResolverInterface::class)->getMock();
        $argumentResolver
            ->expects($this->any())
            ->method('getArguments')
            ->will($this->returnValue($arguments));

        return new HttpKernel($eventDispatcher, $controllerResolver, $requestStack, $argumentResolver);
    }

    private function assertResponseEquals(Response $expected, Response $actual)
>>>>>>> dev
    {
        $expected->setDate($actual->getDate());
        $this->assertEquals($expected, $actual);
    }
}

<<<<<<< HEAD
class Controller
=======
class TestController
>>>>>>> dev
{
    public function __invoke()
    {
        return new Response('foo');
    }

    public function controller()
    {
        return new Response('foo');
    }

    public static function staticController()
    {
        return new Response('foo');
    }
}

function controller_func()
{
    return new Response('foo');
}
