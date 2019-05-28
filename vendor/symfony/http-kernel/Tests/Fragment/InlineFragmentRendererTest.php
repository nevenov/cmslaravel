<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\Fragment;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;

class InlineFragmentRendererTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;

class InlineFragmentRendererTest extends TestCase
>>>>>>> dev
{
    public function testRender()
    {
        $strategy = new InlineFragmentRenderer($this->getKernel($this->returnValue(new Response('foo'))));

        $this->assertEquals('foo', $strategy->render('/', Request::create('/'))->getContent());
    }

    public function testRenderWithControllerReference()
    {
        $strategy = new InlineFragmentRenderer($this->getKernel($this->returnValue(new Response('foo'))));

<<<<<<< HEAD
        $this->assertEquals('foo', $strategy->render(new ControllerReference('main_controller', array(), array()), Request::create('/'))->getContent());
=======
        $this->assertEquals('foo', $strategy->render(new ControllerReference('main_controller', [], []), Request::create('/'))->getContent());
>>>>>>> dev
    }

    public function testRenderWithObjectsAsAttributes()
    {
        $object = new \stdClass();

        $subRequest = Request::create('/_fragment?_path=_format%3Dhtml%26_locale%3Den%26_controller%3Dmain_controller');
<<<<<<< HEAD
        $subRequest->attributes->replace(array('object' => $object, '_format' => 'html', '_controller' => 'main_controller', '_locale' => 'en'));
        $subRequest->headers->set('x-forwarded-for', array('127.0.0.1'));
        $subRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($subRequest));

        $strategy->render(new ControllerReference('main_controller', array('object' => $object), array()), Request::create('/'));
    }

    public function testRenderWithObjectsAsAttributesPassedAsObjectsInTheController()
    {
        $resolver = $this->getMock('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolver', array('getController'));
        $resolver
            ->expects($this->once())
            ->method('getController')
            ->will($this->returnValue(function (\stdClass $object, Bar $object1) {
                return new Response($object1->getBar());
            }))
        ;

        $kernel = new HttpKernel(new EventDispatcher(), $resolver);
        $renderer = new InlineFragmentRenderer($kernel);

        $response = $renderer->render(new ControllerReference('main_controller', array('object' => new \stdClass(), 'object1' => new Bar()), array()), Request::create('/'));
        $this->assertEquals('bar', $response->getContent());
=======
        $subRequest->attributes->replace(['object' => $object, '_format' => 'html', '_controller' => 'main_controller', '_locale' => 'en']);
        $subRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
        $subRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $subRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        $subRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($subRequest));

        $this->assertSame('foo', $strategy->render(new ControllerReference('main_controller', ['object' => $object], []), Request::create('/'))->getContent());
>>>>>>> dev
    }

    public function testRenderWithTrustedHeaderDisabled()
    {
<<<<<<< HEAD
        $trustedHeaderName = Request::getTrustedHeaderName(Request::HEADER_CLIENT_IP);

        Request::setTrustedHeaderName(Request::HEADER_CLIENT_IP, '');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest(Request::create('/')));
        $strategy->render('/', Request::create('/'));

        Request::setTrustedHeaderName(Request::HEADER_CLIENT_IP, $trustedHeaderName);
=======
        Request::setTrustedProxies([], 0);

        $expectedSubRequest = Request::create('/');
        $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
        $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));
        $this->assertSame('foo', $strategy->render('/', Request::create('/'))->getContent());

        Request::setTrustedProxies([], -1);
>>>>>>> dev
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testRenderExceptionNoIgnoreErrors()
    {
<<<<<<< HEAD
        $dispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');
=======
        $dispatcher = $this->getMockBuilder('Symfony\Component\EventDispatcher\EventDispatcherInterface')->getMock();
>>>>>>> dev
        $dispatcher->expects($this->never())->method('dispatch');

        $strategy = new InlineFragmentRenderer($this->getKernel($this->throwException(new \RuntimeException('foo'))), $dispatcher);

        $this->assertEquals('foo', $strategy->render('/', Request::create('/'))->getContent());
    }

    public function testRenderExceptionIgnoreErrors()
    {
<<<<<<< HEAD
        $dispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');
=======
        $dispatcher = $this->getMockBuilder('Symfony\Component\EventDispatcher\EventDispatcherInterface')->getMock();
>>>>>>> dev
        $dispatcher->expects($this->once())->method('dispatch')->with(KernelEvents::EXCEPTION);

        $strategy = new InlineFragmentRenderer($this->getKernel($this->throwException(new \RuntimeException('foo'))), $dispatcher);

<<<<<<< HEAD
        $this->assertEmpty($strategy->render('/', Request::create('/'), array('ignore_errors' => true))->getContent());
=======
        $this->assertEmpty($strategy->render('/', Request::create('/'), ['ignore_errors' => true])->getContent());
>>>>>>> dev
    }

    public function testRenderExceptionIgnoreErrorsWithAlt()
    {
        $strategy = new InlineFragmentRenderer($this->getKernel($this->onConsecutiveCalls(
            $this->throwException(new \RuntimeException('foo')),
            $this->returnValue(new Response('bar'))
        )));

<<<<<<< HEAD
        $this->assertEquals('bar', $strategy->render('/', Request::create('/'), array('ignore_errors' => true, 'alt' => '/foo'))->getContent());
=======
        $this->assertEquals('bar', $strategy->render('/', Request::create('/'), ['ignore_errors' => true, 'alt' => '/foo'])->getContent());
>>>>>>> dev
    }

    private function getKernel($returnValue)
    {
<<<<<<< HEAD
        $kernel = $this->getMock('Symfony\Component\HttpKernel\HttpKernelInterface');
=======
        $kernel = $this->getMockBuilder('Symfony\Component\HttpKernel\HttpKernelInterface')->getMock();
>>>>>>> dev
        $kernel
            ->expects($this->any())
            ->method('handle')
            ->will($returnValue)
        ;

        return $kernel;
    }

<<<<<<< HEAD
    /**
     * Creates a Kernel expecting a request equals to $request
     * Allows delta in comparison in case REQUEST_TIME changed by 1 second.
     */
    private function getKernelExpectingRequest(Request $request)
    {
        $kernel = $this->getMock('Symfony\Component\HttpKernel\HttpKernelInterface');
        $kernel
            ->expects($this->any())
            ->method('handle')
            ->with($this->equalTo($request, 1))
        ;

        return $kernel;
    }

    public function testExceptionInSubRequestsDoesNotMangleOutputBuffers()
    {
        $resolver = $this->getMock('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface');
        $resolver
=======
    public function testExceptionInSubRequestsDoesNotMangleOutputBuffers()
    {
        $controllerResolver = $this->getMockBuilder('Symfony\\Component\\HttpKernel\\Controller\\ControllerResolverInterface')->getMock();
        $controllerResolver
>>>>>>> dev
            ->expects($this->once())
            ->method('getController')
            ->will($this->returnValue(function () {
                ob_start();
                echo 'bar';
                throw new \RuntimeException();
            }))
        ;
<<<<<<< HEAD
        $resolver
            ->expects($this->once())
            ->method('getArguments')
            ->will($this->returnValue(array()))
        ;

        $kernel = new HttpKernel(new EventDispatcher(), $resolver);
=======

        $argumentResolver = $this->getMockBuilder('Symfony\\Component\\HttpKernel\\Controller\\ArgumentResolverInterface')->getMock();
        $argumentResolver
            ->expects($this->once())
            ->method('getArguments')
            ->will($this->returnValue([]))
        ;

        $kernel = new HttpKernel(new EventDispatcher(), $controllerResolver, new RequestStack(), $argumentResolver);
>>>>>>> dev
        $renderer = new InlineFragmentRenderer($kernel);

        // simulate a main request with output buffering
        ob_start();
        echo 'Foo';

        // simulate a sub-request with output buffering and an exception
<<<<<<< HEAD
        $renderer->render('/', Request::create('/'), array('ignore_errors' => true));
=======
        $renderer->render('/', Request::create('/'), ['ignore_errors' => true]);
>>>>>>> dev

        $this->assertEquals('Foo', ob_get_clean());
    }

<<<<<<< HEAD
=======
    public function testLocaleAndFormatAreIsKeptInSubrequest()
    {
        $expectedSubRequest = Request::create('/');
        $expectedSubRequest->attributes->set('_format', 'foo');
        $expectedSubRequest->setLocale('fr');
        if (Request::HEADER_X_FORWARDED_FOR & Request::getTrustedHeaderSet()) {
            $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
            $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        }
        $expectedSubRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $expectedSubRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));

        $request = Request::create('/');
        $request->attributes->set('_format', 'foo');
        $request->setLocale('fr');
        $strategy->render('/', $request);
    }

>>>>>>> dev
    public function testESIHeaderIsKeptInSubrequest()
    {
        $expectedSubRequest = Request::create('/');
        $expectedSubRequest->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');

<<<<<<< HEAD
        if (Request::getTrustedHeaderName(Request::HEADER_CLIENT_IP)) {
            $expectedSubRequest->headers->set('x-forwarded-for', array('127.0.0.1'));
            $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        }
=======
        if (Request::HEADER_X_FORWARDED_FOR & Request::getTrustedHeaderSet()) {
            $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
            $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        }
        $expectedSubRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $expectedSubRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');
>>>>>>> dev

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));

        $request = Request::create('/');
        $request->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');
        $strategy->render('/', $request);
    }

    public function testESIHeaderIsKeptInSubrequestWithTrustedHeaderDisabled()
    {
<<<<<<< HEAD
        $trustedHeaderName = Request::getTrustedHeaderName(Request::HEADER_CLIENT_IP);
        Request::setTrustedHeaderName(Request::HEADER_CLIENT_IP, '');

        $this->testESIHeaderIsKeptInSubrequest();

        Request::setTrustedHeaderName(Request::HEADER_CLIENT_IP, $trustedHeaderName);
=======
        Request::setTrustedProxies([], Request::HEADER_FORWARDED);

        $this->testESIHeaderIsKeptInSubrequest();

        Request::setTrustedProxies([], -1);
>>>>>>> dev
    }

    public function testHeadersPossiblyResultingIn304AreNotAssignedToSubrequest()
    {
        $expectedSubRequest = Request::create('/');
<<<<<<< HEAD
        if (Request::getTrustedHeaderName(Request::HEADER_CLIENT_IP)) {
            $expectedSubRequest->headers->set('x-forwarded-for', array('127.0.0.1'));
            $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        }

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));
        $request = Request::create('/', 'GET', array(), array(), array(), array('HTTP_IF_MODIFIED_SINCE' => 'Fri, 01 Jan 2016 00:00:00 GMT', 'HTTP_IF_NONE_MATCH' => '*'));
        $strategy->render('/', $request);
=======
        $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
        $expectedSubRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        $expectedSubRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));
        $request = Request::create('/', 'GET', [], [], [], ['HTTP_IF_MODIFIED_SINCE' => 'Fri, 01 Jan 2016 00:00:00 GMT', 'HTTP_IF_NONE_MATCH' => '*']);
        $strategy->render('/', $request);
    }

    public function testFirstTrustedProxyIsSetAsRemote()
    {
        Request::setTrustedProxies(['1.1.1.1'], -1);

        $expectedSubRequest = Request::create('/');
        $expectedSubRequest->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');
        $expectedSubRequest->server->set('REMOTE_ADDR', '127.0.0.1');
        $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
        $expectedSubRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        $expectedSubRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));

        $request = Request::create('/');
        $request->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');
        $strategy->render('/', $request);

        Request::setTrustedProxies([], -1);
    }

    public function testIpAddressOfRangedTrustedProxyIsSetAsRemote()
    {
        $expectedSubRequest = Request::create('/');
        $expectedSubRequest->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');
        $expectedSubRequest->server->set('REMOTE_ADDR', '127.0.0.1');
        $expectedSubRequest->headers->set('x-forwarded-for', ['127.0.0.1']);
        $expectedSubRequest->headers->set('forwarded', ['for="127.0.0.1";host="localhost";proto=http']);
        $expectedSubRequest->server->set('HTTP_X_FORWARDED_FOR', '127.0.0.1');
        $expectedSubRequest->server->set('HTTP_FORWARDED', 'for="127.0.0.1";host="localhost";proto=http');

        Request::setTrustedProxies(['1.1.1.1/24'], -1);

        $strategy = new InlineFragmentRenderer($this->getKernelExpectingRequest($expectedSubRequest));

        $request = Request::create('/');
        $request->headers->set('Surrogate-Capability', 'abc="ESI/1.0"');
        $strategy->render('/', $request);

        Request::setTrustedProxies([], -1);
    }

    /**
     * Creates a Kernel expecting a request equals to $request
     * Allows delta in comparison in case REQUEST_TIME changed by 1 second.
     */
    private function getKernelExpectingRequest(Request $request, $strict = false)
    {
        $kernel = $this->getMockBuilder('Symfony\Component\HttpKernel\HttpKernelInterface')->getMock();
        $kernel
            ->expects($this->once())
            ->method('handle')
            ->with($this->equalTo($request, 1))
            ->willReturn(new Response('foo'));

        return $kernel;
>>>>>>> dev
    }
}

class Bar
{
    public $bar = 'bar';

    public function getBar()
    {
        return $this->bar;
    }
}
