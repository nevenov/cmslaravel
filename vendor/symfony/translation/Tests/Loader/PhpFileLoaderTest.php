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
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Config\Resource\FileResource;

class PhpFileLoaderTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Translation\Loader\PhpFileLoader;

class PhpFileLoaderTest extends TestCase
>>>>>>> dev
{
    public function testLoad()
    {
        $loader = new PhpFileLoader();
        $resource = __DIR__.'/../fixtures/resources.php';
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

    /**
     * @expectedException \Symfony\Component\Translation\Exception\NotFoundResourceException
     */
    public function testLoadNonExistingResource()
    {
        $loader = new PhpFileLoader();
        $resource = __DIR__.'/../fixtures/non-existing.php';
        $loader->load($resource, 'en', 'domain1');
    }

    /**
     * @expectedException \Symfony\Component\Translation\Exception\InvalidResourceException
     */
    public function testLoadThrowsAnExceptionIfFileNotLocal()
    {
        $loader = new PhpFileLoader();
        $resource = 'http://example.com/resources.php';
        $loader->load($resource, 'en', 'domain1');
    }
}
