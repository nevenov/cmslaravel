<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\DataCollector\RequestDataCollector;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\EventDispatcher\EventDispatcher;

class RequestDataCollectorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\DataCollector\RequestDataCollector;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class RequestDataCollectorTest extends TestCase
>>>>>>> dev
{
    public function testCollect()
    {
        $c = new RequestDataCollector();

<<<<<<< HEAD
        $c->collect($this->createRequest(), $this->createResponse());
=======
        $c->collect($request = $this->createRequest(), $this->createResponse());
        $c->lateCollect();
>>>>>>> dev

        $attributes = $c->getRequestAttributes();

        $this->assertSame('request', $c->getName());
<<<<<<< HEAD
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\HeaderBag', $c->getRequestHeaders());
=======
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getRequestHeaders());
>>>>>>> dev
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getRequestServer());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getRequestCookies());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $attributes);
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getRequestRequest());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getRequestQuery());
<<<<<<< HEAD
        $this->assertSame('html', $c->getFormat());
        $this->assertSame('foobar', $c->getRoute());
        $this->assertSame(array('name' => 'foo'), $c->getRouteParams());
        $this->assertSame(array(), $c->getSessionAttributes());
        $this->assertSame('en', $c->getLocale());
        $this->assertRegExp('/Resource\(stream#\d+\)/', $attributes->get('resource'));
        $this->assertSame('Object(stdClass)', $attributes->get('object'));

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\HeaderBag', $c->getResponseHeaders());
=======
        $this->assertInstanceOf(ParameterBag::class, $c->getResponseCookies());
        $this->assertSame('html', $c->getFormat());
        $this->assertEquals('foobar', $c->getRoute());
        $this->assertEquals(['name' => 'foo'], $c->getRouteParams());
        $this->assertSame([], $c->getSessionAttributes());
        $this->assertSame('en', $c->getLocale());
        $this->assertContains(__FILE__, $attributes->get('resource'));
        $this->assertSame('stdClass', $attributes->get('object')->getType());

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\ParameterBag', $c->getResponseHeaders());
>>>>>>> dev
        $this->assertSame('OK', $c->getStatusText());
        $this->assertSame(200, $c->getStatusCode());
        $this->assertSame('application/json', $c->getContentType());
    }

<<<<<<< HEAD
    /**
     * Test various types of controller callables.
     */
    public function testControllerInspection()
=======
    public function testCollectWithoutRouteParams()
    {
        $request = $this->createRequest([]);

        $c = new RequestDataCollector();
        $c->collect($request, $this->createResponse());
        $c->lateCollect();

        $this->assertEquals([], $c->getRouteParams());
    }

    /**
     * @dataProvider provideControllerCallables
     */
    public function testControllerInspection($name, $callable, $expected)
    {
        $c = new RequestDataCollector();
        $request = $this->createRequest();
        $response = $this->createResponse();
        $this->injectController($c, $callable, $request);
        $c->collect($request, $response);
        $c->lateCollect();

        $this->assertSame($expected, $c->getController()->getValue(true), sprintf('Testing: %s', $name));
    }

    public function provideControllerCallables()
>>>>>>> dev
    {
        // make sure we always match the line number
        $r1 = new \ReflectionMethod($this, 'testControllerInspection');
        $r2 = new \ReflectionMethod($this, 'staticControllerMethod');
        $r3 = new \ReflectionClass($this);
<<<<<<< HEAD
        // test name, callable, expected
        $controllerTests = array(
            array(
                '"Regular" callable',
                array($this, 'testControllerInspection'),
                array(
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'testControllerInspection',
                    'file' => __FILE__,
                    'line' => $r1->getStartLine(),
                ),
            ),

            array(
                'Closure',
                function () { return 'foo'; },
                array(
=======

        // test name, callable, expected
        return [
            [
                '"Regular" callable',
                [$this, 'testControllerInspection'],
                [
                    'class' => __NAMESPACE__.'\RequestDataCollectorTest',
                    'method' => 'testControllerInspection',
                    'file' => __FILE__,
                    'line' => $r1->getStartLine(),
                ],
            ],

            [
                'Closure',
                function () { return 'foo'; },
                [
>>>>>>> dev
                    'class' => __NAMESPACE__.'\{closure}',
                    'method' => null,
                    'file' => __FILE__,
                    'line' => __LINE__ - 5,
<<<<<<< HEAD
                ),
            ),

            array(
                'Static callback as string',
                'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest::staticControllerMethod',
                'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest::staticControllerMethod',
            ),

            array(
                'Static callable with instance',
                array($this, 'staticControllerMethod'),
                array(
=======
                ],
            ],

            [
                'Static callback as string',
                __NAMESPACE__.'\RequestDataCollectorTest::staticControllerMethod',
                [
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'staticControllerMethod',
                    'file' => __FILE__,
                    'line' => $r2->getStartLine(),
                ],
            ],

            [
                'Static callable with instance',
                [$this, 'staticControllerMethod'],
                [
>>>>>>> dev
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'staticControllerMethod',
                    'file' => __FILE__,
                    'line' => $r2->getStartLine(),
<<<<<<< HEAD
                ),
            ),

            array(
                'Static callable with class name',
                array('Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest', 'staticControllerMethod'),
                array(
=======
                ],
            ],

            [
                'Static callable with class name',
                ['Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest', 'staticControllerMethod'],
                [
>>>>>>> dev
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'staticControllerMethod',
                    'file' => __FILE__,
                    'line' => $r2->getStartLine(),
<<<<<<< HEAD
                ),
            ),

            array(
                'Callable with instance depending on __call()',
                array($this, 'magicMethod'),
                array(
=======
                ],
            ],

            [
                'Callable with instance depending on __call()',
                [$this, 'magicMethod'],
                [
>>>>>>> dev
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'magicMethod',
                    'file' => 'n/a',
                    'line' => 'n/a',
<<<<<<< HEAD
                ),
            ),

            array(
                'Callable with class name depending on __callStatic()',
                array('Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest', 'magicMethod'),
                array(
=======
                ],
            ],

            [
                'Callable with class name depending on __callStatic()',
                ['Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest', 'magicMethod'],
                [
>>>>>>> dev
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => 'magicMethod',
                    'file' => 'n/a',
                    'line' => 'n/a',
<<<<<<< HEAD
                ),
            ),

            array(
                'Invokable controller',
                $this,
                array(
=======
                ],
            ],

            [
                'Invokable controller',
                $this,
                [
>>>>>>> dev
                    'class' => 'Symfony\Component\HttpKernel\Tests\DataCollector\RequestDataCollectorTest',
                    'method' => null,
                    'file' => __FILE__,
                    'line' => $r3->getStartLine(),
<<<<<<< HEAD
                ),
            ),
        );

        $c = new RequestDataCollector();
        $request = $this->createRequest();
        $response = $this->createResponse();
        foreach ($controllerTests as $controllerTest) {
            $this->injectController($c, $controllerTest[1], $request);
            $c->collect($request, $response);
            $this->assertSame($controllerTest[2], $c->getController(), sprintf('Testing: %s', $controllerTest[0]));
        }
    }

    protected function createRequest()
=======
                ],
            ],
        ];
    }

    public function testItIgnoresInvalidCallables()
    {
        $request = $this->createRequestWithSession();
        $response = new RedirectResponse('/');

        $c = new RequestDataCollector();
        $c->collect($request, $response);

        $this->assertSame('n/a', $c->getController());
    }

    public function testItAddsRedirectedAttributesWhenRequestContainsSpecificCookie()
    {
        $request = $this->createRequest();
        $request->cookies->add([
            'sf_redirect' => '{}',
        ]);

        $kernel = $this->getMockBuilder(HttpKernelInterface::class)->getMock();

        $c = new RequestDataCollector();
        $c->onKernelResponse(new FilterResponseEvent($kernel, $request, HttpKernelInterface::MASTER_REQUEST, $this->createResponse()));

        $this->assertTrue($request->attributes->get('_redirected'));
    }

    public function testItSetsARedirectCookieIfTheResponseIsARedirection()
    {
        $c = new RequestDataCollector();

        $response = $this->createResponse();
        $response->setStatusCode(302);
        $response->headers->set('Location', '/somewhere-else');

        $c->collect($request = $this->createRequest(), $response);
        $c->lateCollect();

        $cookie = $this->getCookieByName($response, 'sf_redirect');

        $this->assertNotEmpty($cookie->getValue());
        $this->assertSame('lax', $cookie->getSameSite());
        $this->assertFalse($cookie->isSecure());
    }

    public function testItCollectsTheRedirectionAndClearTheCookie()
    {
        $c = new RequestDataCollector();

        $request = $this->createRequest();
        $request->attributes->set('_redirected', true);
        $request->cookies->add([
            'sf_redirect' => '{"method": "POST"}',
        ]);

        $c->collect($request, $response = $this->createResponse());
        $c->lateCollect();

        $this->assertEquals('POST', $c->getRedirect()['method']);

        $cookie = $this->getCookieByName($response, 'sf_redirect');
        $this->assertNull($cookie->getValue());
    }

    protected function createRequest($routeParams = ['name' => 'foo'])
>>>>>>> dev
    {
        $request = Request::create('http://test.com/foo?bar=baz');
        $request->attributes->set('foo', 'bar');
        $request->attributes->set('_route', 'foobar');
<<<<<<< HEAD
        $request->attributes->set('_route_params', array('name' => 'foo'));
=======
        $request->attributes->set('_route_params', $routeParams);
>>>>>>> dev
        $request->attributes->set('resource', fopen(__FILE__, 'r'));
        $request->attributes->set('object', new \stdClass());

        return $request;
    }

<<<<<<< HEAD
=======
    private function createRequestWithSession()
    {
        $request = $this->createRequest();
        $request->attributes->set('_controller', 'Foo::bar');
        $request->setSession(new Session(new MockArraySessionStorage()));
        $request->getSession()->start();

        return $request;
    }

>>>>>>> dev
    protected function createResponse()
    {
        $response = new Response();
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
<<<<<<< HEAD
        $response->headers->setCookie(new Cookie('foo', 'bar', 1, '/foo', 'localhost', true, true));
        $response->headers->setCookie(new Cookie('bar', 'foo', new \DateTime('@946684800')));
        $response->headers->setCookie(new Cookie('bazz', 'foo', '2000-12-12'));
=======
        $response->headers->set('X-Foo-Bar', null);
        $response->headers->setCookie(new Cookie('foo', 'bar', 1, '/foo', 'localhost', true, true, false, null));
        $response->headers->setCookie(new Cookie('bar', 'foo', new \DateTime('@946684800'), '/', null, false, true, false, null));
        $response->headers->setCookie(new Cookie('bazz', 'foo', '2000-12-12', '/', null, false, true, false, null));
>>>>>>> dev

        return $response;
    }

    /**
     * Inject the given controller callable into the data collector.
     */
    protected function injectController($collector, $controller, $request)
    {
<<<<<<< HEAD
        $resolver = $this->getMock('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface');
        $httpKernel = new HttpKernel(new EventDispatcher(), $resolver);
=======
        $resolver = $this->getMockBuilder('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface')->getMock();
        $httpKernel = new HttpKernel(new EventDispatcher(), $resolver, null, $this->getMockBuilder(ArgumentResolverInterface::class)->getMock());
>>>>>>> dev
        $event = new FilterControllerEvent($httpKernel, $controller, $request, HttpKernelInterface::MASTER_REQUEST);
        $collector->onKernelController($event);
    }

    /**
     * Dummy method used as controller callable.
     */
    public static function staticControllerMethod()
    {
        throw new \LogicException('Unexpected method call');
    }

    /**
     * Magic method to allow non existing methods to be called and delegated.
     */
    public function __call($method, $args)
    {
        throw new \LogicException('Unexpected method call');
    }

    /**
     * Magic method to allow non existing methods to be called and delegated.
     */
    public static function __callStatic($method, $args)
    {
        throw new \LogicException('Unexpected method call');
    }

    public function __invoke()
    {
        throw new \LogicException('Unexpected method call');
    }
<<<<<<< HEAD
=======

    private function getCookieByName(Response $response, $name)
    {
        foreach ($response->headers->getCookies() as $cookie) {
            if ($cookie->getName() == $name) {
                return $cookie;
            }
        }

        throw new \InvalidArgumentException(sprintf('Cookie named "%s" is not in response', $name));
    }
>>>>>>> dev
}
