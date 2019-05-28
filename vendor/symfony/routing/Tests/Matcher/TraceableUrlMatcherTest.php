<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests\Matcher;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\TraceableUrlMatcher;

class TraceableUrlMatcherTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\TraceableUrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class TraceableUrlMatcherTest extends TestCase
>>>>>>> dev
{
    public function test()
    {
        $coll = new RouteCollection();
<<<<<<< HEAD
        $coll->add('foo', new Route('/foo', array(), array(), array(), '', array(), array('POST')));
        $coll->add('bar', new Route('/bar/{id}', array(), array('id' => '\d+')));
        $coll->add('bar1', new Route('/bar/{name}', array(), array('id' => '\w+'), array(), '', array(), array('POST')));
        $coll->add('bar2', new Route('/foo', array(), array(), array(), 'baz'));
        $coll->add('bar3', new Route('/foo1', array(), array(), array(), 'baz'));
        $coll->add('bar4', new Route('/foo2', array(), array(), array(), 'baz', array(), array(), 'context.getMethod() == "GET"'));
=======
        $coll->add('foo', new Route('/foo', [], [], [], '', [], ['POST']));
        $coll->add('bar', new Route('/bar/{id}', [], ['id' => '\d+']));
        $coll->add('bar1', new Route('/bar/{name}', [], ['id' => '\w+'], [], '', [], ['POST']));
        $coll->add('bar2', new Route('/foo', [], [], [], 'baz'));
        $coll->add('bar3', new Route('/foo1', [], [], [], 'baz'));
        $coll->add('bar4', new Route('/foo2', [], [], [], 'baz', [], [], 'context.getMethod() == "GET"'));
>>>>>>> dev

        $context = new RequestContext();
        $context->setHost('baz');

        $matcher = new TraceableUrlMatcher($coll, $context);
        $traces = $matcher->getTraces('/babar');
<<<<<<< HEAD
        $this->assertSame(array(0, 0, 0, 0, 0, 0), $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo');
        $this->assertSame(array(1, 0, 0, 2), $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/12');
        $this->assertSame(array(0, 2), $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/dd');
        $this->assertSame(array(0, 1, 1, 0, 0, 0), $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo1');
        $this->assertSame(array(0, 0, 0, 0, 2), $this->getLevels($traces));

        $context->setMethod('POST');
        $traces = $matcher->getTraces('/foo');
        $this->assertSame(array(2), $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/dd');
        $this->assertSame(array(0, 1, 2), $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo2');
        $this->assertSame(array(0, 0, 0, 0, 0, 1), $this->getLevels($traces));
=======
        $this->assertSame([0, 0, 0, 0, 0, 0], $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo');
        $this->assertSame([1, 0, 0, 2], $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/12');
        $this->assertSame([0, 2], $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/dd');
        $this->assertSame([0, 1, 1, 0, 0, 0], $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo1');
        $this->assertSame([0, 0, 0, 0, 2], $this->getLevels($traces));

        $context->setMethod('POST');
        $traces = $matcher->getTraces('/foo');
        $this->assertSame([2], $this->getLevels($traces));

        $traces = $matcher->getTraces('/bar/dd');
        $this->assertSame([0, 1, 2], $this->getLevels($traces));

        $traces = $matcher->getTraces('/foo2');
        $this->assertSame([0, 0, 0, 0, 0, 1], $this->getLevels($traces));
>>>>>>> dev
    }

    public function testMatchRouteOnMultipleHosts()
    {
        $routes = new RouteCollection();
        $routes->add('first', new Route(
            '/mypath/',
<<<<<<< HEAD
            array('_controller' => 'MainBundle:Info:first'),
            array(),
            array(),
=======
            ['_controller' => 'MainBundle:Info:first'],
            [],
            [],
>>>>>>> dev
            'some.example.com'
        ));

        $routes->add('second', new Route(
            '/mypath/',
<<<<<<< HEAD
            array('_controller' => 'MainBundle:Info:second'),
            array(),
            array(),
=======
            ['_controller' => 'MainBundle:Info:second'],
            [],
            [],
>>>>>>> dev
            'another.example.com'
        ));

        $context = new RequestContext();
        $context->setHost('baz');

        $matcher = new TraceableUrlMatcher($routes, $context);

        $traces = $matcher->getTraces('/mypath/');
        $this->assertSame(
<<<<<<< HEAD
            array(TraceableUrlMatcher::ROUTE_ALMOST_MATCHES, TraceableUrlMatcher::ROUTE_ALMOST_MATCHES),
=======
            [TraceableUrlMatcher::ROUTE_ALMOST_MATCHES, TraceableUrlMatcher::ROUTE_ALMOST_MATCHES],
>>>>>>> dev
            $this->getLevels($traces)
        );
    }

    public function getLevels($traces)
    {
<<<<<<< HEAD
        $levels = array();
=======
        $levels = [];
>>>>>>> dev
        foreach ($traces as $trace) {
            $levels[] = $trace['level'];
        }

        return $levels;
    }

    public function testRoutesWithConditions()
    {
        $routes = new RouteCollection();
<<<<<<< HEAD
        $routes->add('foo', new Route('/foo', array(), array(), array(), 'baz', array(), array(), "request.headers.get('User-Agent') matches '/firefox/i'"));
=======
        $routes->add('foo', new Route('/foo', [], [], [], 'baz', [], [], "request.headers.get('User-Agent') matches '/firefox/i'"));
>>>>>>> dev

        $context = new RequestContext();
        $context->setHost('baz');

        $matcher = new TraceableUrlMatcher($routes, $context);

        $notMatchingRequest = Request::create('/foo', 'GET');
        $traces = $matcher->getTracesForRequest($notMatchingRequest);
        $this->assertEquals("Condition \"request.headers.get('User-Agent') matches '/firefox/i'\" does not evaluate to \"true\"", $traces[0]['log']);

<<<<<<< HEAD
        $matchingRequest = Request::create('/foo', 'GET', array(), array(), array(), array('HTTP_USER_AGENT' => 'Firefox'));
=======
        $matchingRequest = Request::create('/foo', 'GET', [], [], [], ['HTTP_USER_AGENT' => 'Firefox']);
>>>>>>> dev
        $traces = $matcher->getTracesForRequest($matchingRequest);
        $this->assertEquals('Route matches!', $traces[0]['log']);
    }
}
