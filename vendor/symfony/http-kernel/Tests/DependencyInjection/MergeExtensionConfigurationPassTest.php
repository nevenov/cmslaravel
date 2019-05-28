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
use Symfony\Component\HttpKernel\DependencyInjection\MergeExtensionConfigurationPass;

class MergeExtensionConfigurationPassTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoloadMainExtension()
    {
        $container = $this->getMock(
            'Symfony\\Component\\DependencyInjection\\ContainerBuilder',
            array(
                'getExtensionConfig',
                'loadFromExtension',
                'getParameterBag',
                'getDefinitions',
                'getAliases',
                'getExtensions',
            )
        );
        $params = $this->getMock('Symfony\\Component\\DependencyInjection\\ParameterBag\\ParameterBag');

        $container->expects($this->at(0))
            ->method('getExtensionConfig')
            ->with('loaded')
            ->will($this->returnValue(array(array())));
        $container->expects($this->at(1))
            ->method('getExtensionConfig')
            ->with('notloaded')
            ->will($this->returnValue(array()));
        $container->expects($this->once())
            ->method('loadFromExtension')
            ->with('notloaded', array());

        $container->expects($this->any())
            ->method('getParameterBag')
            ->will($this->returnValue($params));
        $params->expects($this->any())
            ->method('all')
            ->will($this->returnValue(array()));
        $container->expects($this->any())
            ->method('getDefinitions')
            ->will($this->returnValue(array()));
        $container->expects($this->any())
            ->method('getAliases')
            ->will($this->returnValue(array()));
        $container->expects($this->any())
            ->method('getExtensions')
            ->will($this->returnValue(array()));

        $configPass = new MergeExtensionConfigurationPass(array('loaded', 'notloaded'));
        $configPass->process($container);
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\HttpKernel\DependencyInjection\MergeExtensionConfigurationPass;

class MergeExtensionConfigurationPassTest extends TestCase
{
    public function testAutoloadMainExtension()
    {
        $container = new ContainerBuilder();
        $container->registerExtension(new LoadedExtension());
        $container->registerExtension(new NotLoadedExtension());
        $container->loadFromExtension('loaded', []);

        $configPass = new MergeExtensionConfigurationPass(['loaded', 'not_loaded']);
        $configPass->process($container);

        $this->assertTrue($container->hasDefinition('loaded.foo'));
        $this->assertTrue($container->hasDefinition('not_loaded.bar'));
    }
}

class LoadedExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->register('loaded.foo');
    }
}

class NotLoadedExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->register('not_loaded.bar');
>>>>>>> dev
    }
}
