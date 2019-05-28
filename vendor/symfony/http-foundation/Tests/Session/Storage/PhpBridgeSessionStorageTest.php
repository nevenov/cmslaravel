<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests\Session\Storage;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;
>>>>>>> dev

/**
 * Test class for PhpSessionStorage.
 *
 * @author Drak <drak@zikula.org>
 *
 * These tests require separate processes.
 *
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
<<<<<<< HEAD
class PhpBridgeSessionStorageTest extends \PHPUnit_Framework_TestCase
=======
class PhpBridgeSessionStorageTest extends TestCase
>>>>>>> dev
{
    private $savePath;

    protected function setUp()
    {
        $this->iniSet('session.save_handler', 'files');
<<<<<<< HEAD
        $this->iniSet('session.save_path', $this->savePath = sys_get_temp_dir().'/sf2test');
=======
        $this->iniSet('session.save_path', $this->savePath = sys_get_temp_dir().'/sftest');
>>>>>>> dev
        if (!is_dir($this->savePath)) {
            mkdir($this->savePath);
        }
    }

    protected function tearDown()
    {
        session_write_close();
        array_map('unlink', glob($this->savePath.'/*'));
        if (is_dir($this->savePath)) {
            rmdir($this->savePath);
        }

        $this->savePath = null;
    }

    /**
     * @return PhpBridgeSessionStorage
     */
    protected function getStorage()
    {
        $storage = new PhpBridgeSessionStorage();
        $storage->registerBag(new AttributeBag());

        return $storage;
    }

    public function testPhpSession()
    {
        $storage = $this->getStorage();

<<<<<<< HEAD
        $this->assertFalse($storage->getSaveHandler()->isActive());
=======
        $this->assertNotSame(\PHP_SESSION_ACTIVE, session_status());
>>>>>>> dev
        $this->assertFalse($storage->isStarted());

        session_start();
        $this->assertTrue(isset($_SESSION));
<<<<<<< HEAD
        // in PHP 5.4 we can reliably detect a session started
        $this->assertTrue($storage->getSaveHandler()->isActive());
=======
        $this->assertSame(\PHP_SESSION_ACTIVE, session_status());
>>>>>>> dev
        // PHP session might have started, but the storage driver has not, so false is correct here
        $this->assertFalse($storage->isStarted());

        $key = $storage->getMetadataBag()->getStorageKey();
<<<<<<< HEAD
        $this->assertFalse(isset($_SESSION[$key]));
        $storage->start();
        $this->assertTrue(isset($_SESSION[$key]));
=======
        $this->assertArrayNotHasKey($key, $_SESSION);
        $storage->start();
        $this->assertArrayHasKey($key, $_SESSION);
>>>>>>> dev
    }

    public function testClear()
    {
        $storage = $this->getStorage();
        session_start();
        $_SESSION['drak'] = 'loves symfony';
        $storage->getBag('attributes')->set('symfony', 'greatness');
        $key = $storage->getBag('attributes')->getStorageKey();
<<<<<<< HEAD
        $this->assertEquals($_SESSION[$key], array('symfony' => 'greatness'));
        $this->assertEquals($_SESSION['drak'], 'loves symfony');
        $storage->clear();
        $this->assertEquals($_SESSION[$key], array());
=======
        $this->assertEquals($_SESSION[$key], ['symfony' => 'greatness']);
        $this->assertEquals($_SESSION['drak'], 'loves symfony');
        $storage->clear();
        $this->assertEquals($_SESSION[$key], []);
>>>>>>> dev
        $this->assertEquals($_SESSION['drak'], 'loves symfony');
    }
}
