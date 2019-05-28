<?php

<<<<<<< HEAD
class Swift_KeyCache_DiskKeyCacheAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_cache;
    private $_key1;
    private $_key2;

    protected function setUp()
    {
        $this->_key1 = uniqid(microtime(true), true);
        $this->_key2 = uniqid(microtime(true), true);
        $this->_cache = new Swift_KeyCache_DiskKeyCache(new Swift_KeyCache_SimpleKeyCacheInputStream(), sys_get_temp_dir());
=======
class Swift_KeyCache_DiskKeyCacheAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $cache;
    private $key1;
    private $key2;

    protected function setUp()
    {
        $this->key1 = uniqid(microtime(true), true);
        $this->key2 = uniqid(microtime(true), true);
        $this->cache = new Swift_KeyCache_DiskKeyCache(new Swift_KeyCache_SimpleKeyCacheInputStream(), sys_get_temp_dir());
>>>>>>> dev
    }

    public function testStringDataCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testStringDataCanBeOverwritten()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->_cache->setString(
            $this->_key1, 'foo', 'whatever', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('whatever', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->cache->setString(
            $this->key1, 'foo', 'whatever', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('whatever', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testStringDataCanBeAppended()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->_cache->setString(
            $this->_key1, 'foo', 'ing', Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testing', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->cache->setString(
            $this->key1, 'foo', 'ing', Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testing', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testHasKeyReturnValue()
    {
<<<<<<< HEAD
        $this->assertFalse($this->_cache->hasKey($this->_key1, 'foo'));
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->_cache->hasKey($this->_key1, 'foo'));
=======
        $this->assertFalse($this->cache->hasKey($this->key1, 'foo'));
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->cache->hasKey($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testNsKeyIsWellPartitioned()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->_cache->setString(
            $this->_key2, 'foo', 'ing', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->_cache->getString($this->_key1, 'foo'));
        $this->assertEquals('ing', $this->_cache->getString($this->_key2, 'foo'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->cache->setString(
            $this->key2, 'foo', 'ing', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->cache->getString($this->key1, 'foo'));
        $this->assertEquals('ing', $this->cache->getString($this->key2, 'foo'));
>>>>>>> dev
    }

    public function testItemKeyIsWellPartitioned()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->_cache->setString(
            $this->_key1, 'bar', 'ing', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->_cache->getString($this->_key1, 'foo'));
        $this->assertEquals('ing', $this->_cache->getString($this->_key1, 'bar'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->cache->setString(
            $this->key1, 'bar', 'ing', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $this->cache->getString($this->key1, 'foo'));
        $this->assertEquals('ing', $this->cache->getString($this->key1, 'bar'));
>>>>>>> dev
    }

    public function testByteStreamCanBeImported()
    {
        $os = new Swift_ByteStream_ArrayByteStream();
        $os->write('abcdef');

<<<<<<< HEAD
        $this->_cache->importFromByteStream(
            $this->_key1, 'foo', $os, Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('abcdef', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->importFromByteStream(
            $this->key1, 'foo', $os, Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('abcdef', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testByteStreamCanBeAppended()
    {
        $os1 = new Swift_ByteStream_ArrayByteStream();
        $os1->write('abcdef');

        $os2 = new Swift_ByteStream_ArrayByteStream();
        $os2->write('xyzuvw');

<<<<<<< HEAD
        $this->_cache->importFromByteStream(
            $this->_key1, 'foo', $os1, Swift_KeyCache::MODE_APPEND
            );
        $this->_cache->importFromByteStream(
            $this->_key1, 'foo', $os2, Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('abcdefxyzuvw', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->importFromByteStream(
            $this->key1, 'foo', $os1, Swift_KeyCache::MODE_APPEND
            );
        $this->cache->importFromByteStream(
            $this->key1, 'foo', $os2, Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('abcdefxyzuvw', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testByteStreamAndStringCanBeAppended()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_APPEND
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_APPEND
>>>>>>> dev
            );

        $os = new Swift_ByteStream_ArrayByteStream();
        $os->write('abcdef');

<<<<<<< HEAD
        $this->_cache->importFromByteStream(
            $this->_key1, 'foo', $os, Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testabcdef', $this->_cache->getString($this->_key1, 'foo'));
=======
        $this->cache->importFromByteStream(
            $this->key1, 'foo', $os, Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testabcdef', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testDataCanBeExportedToByteStream()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
>>>>>>> dev
            );

        $is = new Swift_ByteStream_ArrayByteStream();

<<<<<<< HEAD
        $this->_cache->exportToByteStream($this->_key1, 'foo', $is);
=======
        $this->cache->exportToByteStream($this->key1, 'foo', $is);
>>>>>>> dev

        $string = '';
        while (false !== $bytes = $is->read(8192)) {
            $string .= $bytes;
        }

        $this->assertEquals('test', $string);
    }

    public function testKeyCanBeCleared()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->_cache->hasKey($this->_key1, 'foo'));
        $this->_cache->clearKey($this->_key1, 'foo');
        $this->assertFalse($this->_cache->hasKey($this->_key1, 'foo'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->cache->hasKey($this->key1, 'foo'));
        $this->cache->clearKey($this->key1, 'foo');
        $this->assertFalse($this->cache->hasKey($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testNsKeyCanBeCleared()
    {
<<<<<<< HEAD
        $this->_cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->_cache->setString(
            $this->_key1, 'bar', 'xyz', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->_cache->hasKey($this->_key1, 'foo'));
        $this->assertTrue($this->_cache->hasKey($this->_key1, 'bar'));
        $this->_cache->clearAll($this->_key1);
        $this->assertFalse($this->_cache->hasKey($this->_key1, 'foo'));
        $this->assertFalse($this->_cache->hasKey($this->_key1, 'bar'));
=======
        $this->cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->cache->setString(
            $this->key1, 'bar', 'xyz', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($this->cache->hasKey($this->key1, 'foo'));
        $this->assertTrue($this->cache->hasKey($this->key1, 'bar'));
        $this->cache->clearAll($this->key1);
        $this->assertFalse($this->cache->hasKey($this->key1, 'foo'));
        $this->assertFalse($this->cache->hasKey($this->key1, 'bar'));
>>>>>>> dev
    }

    public function testKeyCacheInputStream()
    {
<<<<<<< HEAD
        $is = $this->_cache->getInputByteStream($this->_key1, 'foo');
        $is->write('abc');
        $is->write('xyz');
        $this->assertEquals('abcxyz', $this->_cache->getString($this->_key1, 'foo'));
=======
        $is = $this->cache->getInputByteStream($this->key1, 'foo');
        $is->write('abc');
        $is->write('xyz');
        $this->assertEquals('abcxyz', $this->cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }
}
