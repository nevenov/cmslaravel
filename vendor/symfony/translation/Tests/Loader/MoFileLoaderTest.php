<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Loader;

<<<<<<< HEAD
use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Config\Resource\FileResource;

class MoFileLoaderTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Translation\Loader\MoFileLoader;

class MoFileLoaderTest extends TestCase
>>>>>>> dev
{
    public function testLoad()
    {
        $loader = new MoFileLoader();
        $resource = __DIR__.'/../fixtures/resources.mo';
        $catalogue = $loader->load($resource, 'en', 'domain1');

<<<<<<< HEAD
        $this->assertEquals(array('foo' => 'bar'), $catalogue->all('domain1'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals(array(new FileResource($resource)), $catalogue->getResources());
=======
        $this->assertEquals(['foo' => 'bar'], $catalogue->all('domain1'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals([new FileResource($resource)], $catalogue->getResources());
>>>>>>> dev
    }

    public function testLoadPlurals()
    {
        $loader = new MoFileLoader();
        $resource = __DIR__.'/../fixtures/plurals.mo';
        $catalogue = $loader->load($resource, 'en', 'domain1');

<<<<<<< HEAD
        $this->assertEquals(array('foo' => 'bar', 'foos' => '{0} bar|{1} bars'), $catalogue->all('domain1'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals(array(new FileResource($resource)), $catalogue->getResources());
=======
        $this->assertEquals(['foo' => 'bar', 'foos' => '{0} bar|{1} bars'], $catalogue->all('domain1'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals([new FileResource($resource)], $catalogue->getResources());
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Translation\Exception\NotFoundResourceException
     */
    public function testLoadNonExistingResource()
    {
        $loader = new MoFileLoader();
        $resource = __DIR__.'/../fixtures/non-existing.mo';
        $loader->load($resource, 'en', 'domain1');
    }

    /**
     * @expectedException \Symfony\Component\Translation\Exception\InvalidResourceException
     */
    public function testLoadInvalidResource()
    {
        $loader = new MoFileLoader();
        $resource = __DIR__.'/../fixtures/empty.mo';
        $loader->load($resource, 'en', 'domain1');
    }

    public function testLoadEmptyTranslation()
    {
        $loader = new MoFileLoader();
        $resource = __DIR__.'/../fixtures/empty-translation.mo';
        $catalogue = $loader->load($resource, 'en', 'message');

<<<<<<< HEAD
        $this->assertEquals(array(), $catalogue->all('message'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals(array(new FileResource($resource)), $catalogue->getResources());
=======
        $this->assertEquals([], $catalogue->all('message'));
        $this->assertEquals('en', $catalogue->getLocale());
        $this->assertEquals([new FileResource($resource)], $catalogue->getResources());
>>>>>>> dev
    }
}
