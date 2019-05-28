<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests;

<<<<<<< HEAD
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;

class RouterTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Router;

class RouterTest extends TestCase
>>>>>>> dev
{
    private $router = null;

    private $loader = null;

    protected function setUp()
    {
<<<<<<< HEAD
        $this->loader = $this->getMock('Symfony\Component\Config\Loader\LoaderInterface');
=======
        $this->loader = $this->getMockBuilder('Symfony\Component\Config\Loader\LoaderInterface')->getMock();
>>>>>>> dev
        $this->router = new Router($this->loader, 'routing.yml');
    }

    public function testSetOptionsWithSupportedOptions()
    {
<<<<<<< HEAD
        $this->router->setOptions(array(
            'cache_dir' => './cache',
            'debug' => true,
            'resource_type' => 'ResourceType',
        ));
=======
        $this->router->setOptions([
            'cache_dir' => './cache',
            'debug' => true,
            'resource_type' => 'ResourceType',
        ]);
>>>>>>> dev

        $this->assertSame('./cache', $this->router->getOption('cache_dir'));
        $this->assertTrue($this->router->getOption('debug'));
        $this->assertSame('ResourceType', $this->router->getOption('resource_type'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The Router does not support the following options: "option_foo", "option_bar"
     */
    public function testSetOptionsWithUnsupportedOptions()
    {
<<<<<<< HEAD
        $this->router->setOptions(array(
=======
        $this->router->setOptions([
>>>>>>> dev
            'cache_dir' => './cache',
            'option_foo' => true,
            'option_bar' => 'baz',
            'resource_type' => 'ResourceType',
<<<<<<< HEAD
        ));
=======
        ]);
>>>>>>> dev
    }

    public function testSetOptionWithSupportedOption()
    {
        $this->router->setOption('cache_dir', './cache');

        $this->assertSame('./cache', $this->router->getOption('cache_dir'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The Router does not support the "option_foo" option
     */
    public function testSetOptionWithUnsupportedOption()
    {
        $this->router->setOption('option_foo', true);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The Router does not support the "option_foo" option
     */
    public function testGetOptionWithUnsupportedOption()
    {
        $this->router->getOption('option_foo', true);
    }

    public function testThatRouteCollectionIsLoaded()
    {
        $this->router->setOption('resource_type', 'ResourceType');

<<<<<<< HEAD
        $routeCollection = $this->getMock('Symfony\Component\Routing\RouteCollection');
=======
        $routeCollection = new RouteCollection();
>>>>>>> dev

        $this->loader->expects($this->once())
            ->method('load')->with('routing.yml', 'ResourceType')
            ->will($this->returnValue($routeCollection));

        $this->assertSame($routeCollection, $this->router->getRouteCollection());
    }

    /**
     * @dataProvider provideMatcherOptionsPreventingCaching
     */
    public function testMatcherIsCreatedIfCacheIsNotConfigured($option)
    {
        $this->router->setOption($option, null);

        $this->loader->expects($this->once())
            ->method('load')->with('routing.yml', null)
<<<<<<< HEAD
            ->will($this->returnValue($this->getMock('Symfony\Component\Routing\RouteCollection')));
=======
            ->will($this->returnValue(new RouteCollection()));
>>>>>>> dev

        $this->assertInstanceOf('Symfony\\Component\\Routing\\Matcher\\UrlMatcher', $this->router->getMatcher());
    }

    public function provideMatcherOptionsPreventingCaching()
    {
<<<<<<< HEAD
        return array(
            array('cache_dir'),
            array('matcher_cache_class'),
        );
=======
        return [
            ['cache_dir'],
            ['matcher_cache_class'],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider provideGeneratorOptionsPreventingCaching
     */
    public function testGeneratorIsCreatedIfCacheIsNotConfigured($option)
    {
        $this->router->setOption($option, null);

        $this->loader->expects($this->once())
            ->method('load')->with('routing.yml', null)
<<<<<<< HEAD
            ->will($this->returnValue($this->getMock('Symfony\Component\Routing\RouteCollection')));
=======
            ->will($this->returnValue(new RouteCollection()));
>>>>>>> dev

        $this->assertInstanceOf('Symfony\\Component\\Routing\\Generator\\UrlGenerator', $this->router->getGenerator());
    }

    public function provideGeneratorOptionsPreventingCaching()
    {
<<<<<<< HEAD
        return array(
            array('cache_dir'),
            array('generator_cache_class'),
        );
=======
        return [
            ['cache_dir'],
            ['generator_cache_class'],
        ];
>>>>>>> dev
    }

    public function testMatchRequestWithUrlMatcherInterface()
    {
<<<<<<< HEAD
        $matcher = $this->getMock('Symfony\Component\Routing\Matcher\UrlMatcherInterface');
=======
        $matcher = $this->getMockBuilder('Symfony\Component\Routing\Matcher\UrlMatcherInterface')->getMock();
>>>>>>> dev
        $matcher->expects($this->once())->method('match');

        $p = new \ReflectionProperty($this->router, 'matcher');
        $p->setAccessible(true);
        $p->setValue($this->router, $matcher);

        $this->router->matchRequest(Request::create('/'));
    }

    public function testMatchRequestWithRequestMatcherInterface()
    {
<<<<<<< HEAD
        $matcher = $this->getMock('Symfony\Component\Routing\Matcher\RequestMatcherInterface');
=======
        $matcher = $this->getMockBuilder('Symfony\Component\Routing\Matcher\RequestMatcherInterface')->getMock();
>>>>>>> dev
        $matcher->expects($this->once())->method('matchRequest');

        $p = new \ReflectionProperty($this->router, 'matcher');
        $p->setAccessible(true);
        $p->setValue($this->router, $matcher);

        $this->router->matchRequest(Request::create('/'));
    }
}
