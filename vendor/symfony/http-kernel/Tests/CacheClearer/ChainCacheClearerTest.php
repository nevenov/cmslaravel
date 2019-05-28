<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\CacheClearer;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer;

class ChainCacheClearerTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer;

class ChainCacheClearerTest extends TestCase
>>>>>>> dev
{
    protected static $cacheDir;

    public static function setUpBeforeClass()
    {
<<<<<<< HEAD
        self::$cacheDir = tempnam(sys_get_temp_dir(), 'sf2_cache_clearer_dir');
=======
        self::$cacheDir = tempnam(sys_get_temp_dir(), 'sf_cache_clearer_dir');
>>>>>>> dev
    }

    public static function tearDownAfterClass()
    {
        @unlink(self::$cacheDir);
    }

    public function testInjectClearersInConstructor()
    {
        $clearer = $this->getMockClearer();
        $clearer
            ->expects($this->once())
            ->method('clear');

<<<<<<< HEAD
        $chainClearer = new ChainCacheClearer(array($clearer));
        $chainClearer->clear(self::$cacheDir);
    }

    public function testInjectClearerUsingAdd()
    {
        $clearer = $this->getMockClearer();
        $clearer
            ->expects($this->once())
            ->method('clear');

        $chainClearer = new ChainCacheClearer();
        $chainClearer->add($clearer);
=======
        $chainClearer = new ChainCacheClearer([$clearer]);
>>>>>>> dev
        $chainClearer->clear(self::$cacheDir);
    }

    protected function getMockClearer()
    {
<<<<<<< HEAD
        return $this->getMock('Symfony\Component\HttpKernel\CacheClearer\CacheClearerInterface');
=======
        return $this->getMockBuilder('Symfony\Component\HttpKernel\CacheClearer\CacheClearerInterface')->getMock();
>>>>>>> dev
    }
}
