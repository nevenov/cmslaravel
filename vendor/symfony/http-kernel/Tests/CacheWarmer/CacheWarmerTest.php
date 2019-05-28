<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\CacheWarmer;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmer;

class CacheWarmerTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmer;

class CacheWarmerTest extends TestCase
>>>>>>> dev
{
    protected static $cacheFile;

    public static function setUpBeforeClass()
    {
<<<<<<< HEAD
        self::$cacheFile = tempnam(sys_get_temp_dir(), 'sf2_cache_warmer_dir');
=======
        self::$cacheFile = tempnam(sys_get_temp_dir(), 'sf_cache_warmer_dir');
>>>>>>> dev
    }

    public static function tearDownAfterClass()
    {
        @unlink(self::$cacheFile);
    }

    public function testWriteCacheFileCreatesTheFile()
    {
        $warmer = new TestCacheWarmer(self::$cacheFile);
<<<<<<< HEAD
        $warmer->warmUp(dirname(self::$cacheFile));
=======
        $warmer->warmUp(\dirname(self::$cacheFile));
>>>>>>> dev

        $this->assertFileExists(self::$cacheFile);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testWriteNonWritableCacheFileThrowsARuntimeException()
    {
        $nonWritableFile = '/this/file/is/very/probably/not/writable';
        $warmer = new TestCacheWarmer($nonWritableFile);
<<<<<<< HEAD
        $warmer->warmUp(dirname($nonWritableFile));
=======
        $warmer->warmUp(\dirname($nonWritableFile));
>>>>>>> dev
    }
}

class TestCacheWarmer extends CacheWarmer
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function warmUp($cacheDir)
    {
        $this->writeCacheFile($this->file, 'content');
    }

    public function isOptional()
    {
        return false;
    }
}
