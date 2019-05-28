<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\DependencyInjection;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Argument\ServiceClosureArgument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ServiceLocator;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\DependencyInjection\FragmentRendererPass;
use Symfony\Component\HttpKernel\Fragment\FragmentRendererInterface;

<<<<<<< HEAD
class FragmentRendererPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests that content rendering not implementing FragmentRendererInterface
     * trigger an exception.
=======
class FragmentRendererPassTest extends TestCase
{
    /**
     * Tests that content rendering not implementing FragmentRendererInterface
     * triggers an exception.
>>>>>>> dev
     *
     * @expectedException \InvalidArgumentException
     */
    public function testContentRendererWithoutInterface()
    {
<<<<<<< HEAD
        // one service, not implementing any interface
        $services = array(
            'my_content_renderer' => array(array('alias' => 'foo')),
        );

        $definition = $this->getMock('Symfony\Component\DependencyInjection\Definition');

        $builder = $this->getMock(
            'Symfony\Component\DependencyInjection\ContainerBuilder',
            array('hasDefinition', 'findTaggedServiceIds', 'getDefinition')
        );
        $builder->expects($this->any())
            ->method('hasDefinition')
            ->will($this->returnValue(true));

        // We don't test kernel.fragment_renderer here
        $builder->expects($this->atLeastOnce())
            ->method('findTaggedServiceIds')
            ->will($this->returnValue($services));

        $builder->expects($this->atLeastOnce())
            ->method('getDefinition')
            ->will($this->returnValue($definition));

        $pass = new FragmentRendererPass();
        $pass->process($builder);
=======
        $builder = new ContainerBuilder();
        $fragmentHandlerDefinition = $builder->register('fragment.handler');
        $builder->register('my_content_renderer', 'Symfony\Component\DependencyInjection\Definition')
            ->addTag('kernel.fragment_renderer', ['alias' => 'foo']);

        $pass = new FragmentRendererPass();
        $pass->process($builder);

        $this->assertEquals([['addRendererService', ['foo', 'my_content_renderer']]], $fragmentHandlerDefinition->getMethodCalls());
>>>>>>> dev
    }

    public function testValidContentRenderer()
    {
<<<<<<< HEAD
        $services = array(
            'my_content_renderer' => array(array('alias' => 'foo')),
        );

        $renderer = $this->getMock('Symfony\Component\DependencyInjection\Definition');
        $renderer
            ->expects($this->once())
            ->method('addMethodCall')
            ->with('addRendererService', array('foo', 'my_content_renderer'))
        ;

        $definition = $this->getMock('Symfony\Component\DependencyInjection\Definition');
        $definition->expects($this->atLeastOnce())
            ->method('getClass')
            ->will($this->returnValue('Symfony\Component\HttpKernel\Tests\DependencyInjection\RendererService'));
        $definition
            ->expects($this->once())
            ->method('isPublic')
            ->will($this->returnValue(true))
        ;

        $builder = $this->getMock(
            'Symfony\Component\DependencyInjection\ContainerBuilder',
            array('hasDefinition', 'findTaggedServiceIds', 'getDefinition')
        );
        $builder->expects($this->any())
            ->method('hasDefinition')
            ->will($this->returnValue(true));

        // We don't test kernel.fragment_renderer here
        $builder->expects($this->atLeastOnce())
            ->method('findTaggedServiceIds')
            ->will($this->returnValue($services));

        $builder->expects($this->atLeastOnce())
            ->method('getDefinition')
            ->will($this->onConsecutiveCalls($renderer, $definition));

        $pass = new FragmentRendererPass();
        $pass->process($builder);
=======
        $builder = new ContainerBuilder();
        $fragmentHandlerDefinition = $builder->register('fragment.handler')
            ->addArgument(null);
        $builder->register('my_content_renderer', 'Symfony\Component\HttpKernel\Tests\DependencyInjection\RendererService')
            ->addTag('kernel.fragment_renderer', ['alias' => 'foo']);

        $pass = new FragmentRendererPass();
        $pass->process($builder);

        $serviceLocatorDefinition = $builder->getDefinition((string) $fragmentHandlerDefinition->getArgument(0));
        $this->assertSame(ServiceLocator::class, $serviceLocatorDefinition->getClass());
        $this->assertEquals(['foo' => new ServiceClosureArgument(new Reference('my_content_renderer'))], $serviceLocatorDefinition->getArgument(0));
>>>>>>> dev
    }
}

class RendererService implements FragmentRendererInterface
{
<<<<<<< HEAD
    public function render($uri, Request $request = null, array $options = array())
=======
    public function render($uri, Request $request = null, array $options = [])
>>>>>>> dev
    {
    }

    public function getName()
    {
        return 'test';
    }
}
