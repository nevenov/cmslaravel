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
use Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigDataCollectorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector;
use Symfony\Component\HttpKernel\Kernel;

class ConfigDataCollectorTest extends TestCase
>>>>>>> dev
{
    public function testCollect()
    {
        $kernel = new KernelForTest('test', true);
        $c = new ConfigDataCollector();
<<<<<<< HEAD
        $c->setCacheVersionInfo(false);
=======
>>>>>>> dev
        $c->setKernel($kernel);
        $c->collect(new Request(), new Response());

        $this->assertSame('test', $c->getEnv());
        $this->assertTrue($c->isDebug());
        $this->assertSame('config', $c->getName());
<<<<<<< HEAD
        $this->assertSame('testkernel', $c->getAppName());
        $this->assertSame(PHP_VERSION, $c->getPhpVersion());
        $this->assertSame(Kernel::VERSION, $c->getSymfonyVersion());
        $this->assertNull($c->getToken());

        // if else clause because we don't know it
        if (extension_loaded('xdebug')) {
            $this->assertTrue($c->hasXDebug());
        } else {
            $this->assertFalse($c->hasXDebug());
        }

        // if else clause because we don't know it
        if (((extension_loaded('eaccelerator') && ini_get('eaccelerator.enable'))
                ||
                (extension_loaded('apc') && ini_get('apc.enabled'))
                ||
                (extension_loaded('Zend OPcache') && ini_get('opcache.enable'))
                ||
                (extension_loaded('xcache') && ini_get('xcache.cacher'))
                ||
                (extension_loaded('wincache') && ini_get('wincache.ocenabled')))) {
            $this->assertTrue($c->hasAccelerator());
        } else {
            $this->assertFalse($c->hasAccelerator());
        }
=======
        $this->assertRegExp('~^'.preg_quote($c->getPhpVersion(), '~').'~', PHP_VERSION);
        $this->assertRegExp('~'.preg_quote((string) $c->getPhpVersionExtra(), '~').'$~', PHP_VERSION);
        $this->assertSame(PHP_INT_SIZE * 8, $c->getPhpArchitecture());
        $this->assertSame(class_exists('Locale', false) && \Locale::getDefault() ? \Locale::getDefault() : 'n/a', $c->getPhpIntlLocale());
        $this->assertSame(date_default_timezone_get(), $c->getPhpTimezone());
        $this->assertSame(Kernel::VERSION, $c->getSymfonyVersion());
        $this->assertNull($c->getToken());
        $this->assertSame(\extension_loaded('xdebug'), $c->hasXDebug());
        $this->assertSame(\extension_loaded('Zend OPcache') && filter_var(ini_get('opcache.enable'), FILTER_VALIDATE_BOOLEAN), $c->hasZendOpcache());
        $this->assertSame(\extension_loaded('apcu') && filter_var(ini_get('apc.enabled'), FILTER_VALIDATE_BOOLEAN), $c->hasApcu());
    }

    /**
     * @group legacy
     * @expectedDeprecation The "$name" argument in method "Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector::__construct()" is deprecated since Symfony 4.2.
     * @expectedDeprecation The "$version" argument in method "Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector::__construct()" is deprecated since Symfony 4.2.
     * @expectedDeprecation The method "Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector::getApplicationName()" is deprecated since Symfony 4.2.
     * @expectedDeprecation The method "Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector::getApplicationVersion()" is deprecated since Symfony 4.2.
     */
    public function testLegacy()
    {
        $c = new ConfigDataCollector('name', null);
        $c->collect(new Request(), new Response());

        $this->assertSame('name', $c->getApplicationName());
        $this->assertNull($c->getApplicationVersion());
>>>>>>> dev
    }
}

class KernelForTest extends Kernel
{
<<<<<<< HEAD
    public function getName()
    {
        return 'testkernel';
    }

=======
>>>>>>> dev
    public function registerBundles()
    {
    }

    public function getBundles()
    {
<<<<<<< HEAD
        return array();
=======
        return [];
>>>>>>> dev
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }
}
