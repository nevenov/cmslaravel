<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process\Tests;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\Process\ExecutableFinder;

/**
 * @author Chris Smith <chris@cs278.org>
 */
<<<<<<< HEAD
class ExecutableFinderTest extends \PHPUnit_Framework_TestCase
=======
class ExecutableFinderTest extends TestCase
>>>>>>> dev
{
    private $path;

    protected function tearDown()
    {
        if ($this->path) {
            // Restore path if it was changed.
            putenv('PATH='.$this->path);
        }
    }

    private function setPath($path)
    {
        $this->path = getenv('PATH');
        putenv('PATH='.$path);
    }

    public function testFind()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }

<<<<<<< HEAD
        $this->setPath(dirname(PHP_BINARY));
=======
        $this->setPath(\dirname(PHP_BINARY));
>>>>>>> dev

        $finder = new ExecutableFinder();
        $result = $finder->find($this->getPhpBinaryName());

        $this->assertSamePath(PHP_BINARY, $result);
    }

    public function testFindWithDefault()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }

        $expected = 'defaultValue';

        $this->setPath('');

        $finder = new ExecutableFinder();
        $result = $finder->find('foo', $expected);

        $this->assertEquals($expected, $result);
    }

<<<<<<< HEAD
=======
    public function testFindWithNullAsDefault()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }

        $this->setPath('');

        $finder = new ExecutableFinder();

        $result = $finder->find('foo');

        $this->assertNull($result);
    }

>>>>>>> dev
    public function testFindWithExtraDirs()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }

        $this->setPath('');

<<<<<<< HEAD
        $extraDirs = array(dirname(PHP_BINARY));
=======
        $extraDirs = [\dirname(PHP_BINARY)];
>>>>>>> dev

        $finder = new ExecutableFinder();
        $result = $finder->find($this->getPhpBinaryName(), null, $extraDirs);

        $this->assertSamePath(PHP_BINARY, $result);
    }

    public function testFindWithOpenBaseDir()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
>>>>>>> dev
            $this->markTestSkipped('Cannot run test on windows');
        }

        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }

<<<<<<< HEAD
        $this->iniSet('open_basedir', dirname(PHP_BINARY).(!defined('HHVM_VERSION') || HHVM_VERSION_ID >= 30800 ? PATH_SEPARATOR.'/' : ''));
=======
        $this->iniSet('open_basedir', \dirname(PHP_BINARY).PATH_SEPARATOR.'/');
>>>>>>> dev

        $finder = new ExecutableFinder();
        $result = $finder->find($this->getPhpBinaryName());

        $this->assertSamePath(PHP_BINARY, $result);
    }

    public function testFindProcessInOpenBasedir()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
>>>>>>> dev
            $this->markTestSkipped('Cannot run test on windows');
        }

        $this->setPath('');
<<<<<<< HEAD
        $this->iniSet('open_basedir', PHP_BINARY.(!defined('HHVM_VERSION') || HHVM_VERSION_ID >= 30800 ? PATH_SEPARATOR.'/' : ''));
=======
        $this->iniSet('open_basedir', PHP_BINARY.PATH_SEPARATOR.'/');
>>>>>>> dev

        $finder = new ExecutableFinder();
        $result = $finder->find($this->getPhpBinaryName(), false);

        $this->assertSamePath(PHP_BINARY, $result);
    }

<<<<<<< HEAD
    private function assertSamePath($expected, $tested)
    {
        if ('\\' === DIRECTORY_SEPARATOR) {
=======
    /**
     * @requires PHP 5.4
     */
    public function testFindBatchExecutableOnWindows()
    {
        if (ini_get('open_basedir')) {
            $this->markTestSkipped('Cannot test when open_basedir is set');
        }
        if ('\\' !== \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Can be only tested on windows');
        }

        $target = tempnam(sys_get_temp_dir(), 'example-windows-executable');

        touch($target);
        touch($target.'.BAT');

        $this->assertFalse(is_executable($target));

        $this->setPath(sys_get_temp_dir());

        $finder = new ExecutableFinder();
        $result = $finder->find(basename($target), false);

        unlink($target);
        unlink($target.'.BAT');

        $this->assertSamePath($target.'.BAT', $result);
    }

    private function assertSamePath($expected, $tested)
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
>>>>>>> dev
            $this->assertEquals(strtolower($expected), strtolower($tested));
        } else {
            $this->assertEquals($expected, $tested);
        }
    }

    private function getPhpBinaryName()
    {
<<<<<<< HEAD
        return basename(PHP_BINARY, '\\' === DIRECTORY_SEPARATOR ? '.exe' : '');
=======
        return basename(PHP_BINARY, '\\' === \DIRECTORY_SEPARATOR ? '.exe' : '');
>>>>>>> dev
    }
}
