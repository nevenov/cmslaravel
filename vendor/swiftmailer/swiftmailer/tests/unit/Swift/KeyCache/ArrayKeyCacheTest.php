<?php

<<<<<<< HEAD
class Swift_KeyCache_ArrayKeyCacheTest extends \PHPUnit_Framework_TestCase
{
    private $_key1 = 'key1';
    private $_key2 = 'key2';

    public function testStringDataCanBeSetAndFetched()
    {
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $cache->getString($this->_key1, 'foo'));
=======
class Swift_KeyCache_ArrayKeyCacheTest extends \PHPUnit\Framework\TestCase
{
    private $key1 = 'key1';
    private $key2 = 'key2';

    public function testStringDataCanBeSetAndFetched()
    {
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('test', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testStringDataCanBeOverwritten()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->_key1, 'foo', 'whatever', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('whatever', $cache->getString($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->key1, 'foo', 'whatever', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('whatever', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testStringDataCanBeAppended()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->_key1, 'foo', 'ing', Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('testing', $cache->getString($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->key1, 'foo', 'ing', Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('testing', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testHasKeyReturnValue()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );

        $this->assertTrue($cache->hasKey($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );

        $this->assertTrue($cache->hasKey($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testNsKeyIsWellPartitioned()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->_key2, 'foo', 'ing', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('test', $cache->getString($this->_key1, 'foo'));
        $this->assertEquals('ing', $cache->getString($this->_key2, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->key2, 'foo', 'ing', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('test', $cache->getString($this->key1, 'foo'));
        $this->assertEquals('ing', $cache->getString($this->key2, 'foo'));
>>>>>>> dev
    }

    public function testItemKeyIsWellPartitioned()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->_key1, 'bar', 'ing', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('test', $cache->getString($this->_key1, 'foo'));
        $this->assertEquals('ing', $cache->getString($this->_key1, 'bar'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->key1, 'bar', 'ing', Swift_KeyCache::MODE_WRITE
            );

        $this->assertEquals('test', $cache->getString($this->key1, 'foo'));
        $this->assertEquals('ing', $cache->getString($this->key1, 'bar'));
>>>>>>> dev
    }

    public function testByteStreamCanBeImported()
    {
<<<<<<< HEAD
        $os = $this->_createOutputStream();
=======
        $os = $this->createOutputStream();
>>>>>>> dev
        $os->expects($this->at(0))
           ->method('read')
           ->will($this->returnValue('abc'));
        $os->expects($this->at(1))
           ->method('read')
           ->will($this->returnValue('def'));
        $os->expects($this->at(2))
           ->method('read')
           ->will($this->returnValue(false));

<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);
        $cache->importFromByteStream(
            $this->_key1, 'foo', $os, Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('abcdef', $cache->getString($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);
        $cache->importFromByteStream(
            $this->key1, 'foo', $os, Swift_KeyCache::MODE_WRITE
            );
        $this->assertEquals('abcdef', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testByteStreamCanBeAppended()
    {
<<<<<<< HEAD
        $os1 = $this->_createOutputStream();
=======
        $os1 = $this->createOutputStream();
>>>>>>> dev
        $os1->expects($this->at(0))
            ->method('read')
            ->will($this->returnValue('abc'));
        $os1->expects($this->at(1))
            ->method('read')
            ->will($this->returnValue('def'));
        $os1->expects($this->at(2))
            ->method('read')
            ->will($this->returnValue(false));

<<<<<<< HEAD
        $os2 = $this->_createOutputStream();
=======
        $os2 = $this->createOutputStream();
>>>>>>> dev
        $os2->expects($this->at(0))
            ->method('read')
            ->will($this->returnValue('xyz'));
        $os2->expects($this->at(1))
            ->method('read')
            ->will($this->returnValue('uvw'));
        $os2->expects($this->at(2))
            ->method('read')
            ->will($this->returnValue(false));

<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream(true);

        $cache = $this->_createCache($is);

        $cache->importFromByteStream(
            $this->_key1, 'foo', $os1, Swift_KeyCache::MODE_APPEND
            );
        $cache->importFromByteStream(
            $this->_key1, 'foo', $os2, Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('abcdefxyzuvw', $cache->getString($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream(true);

        $cache = $this->createCache($is);

        $cache->importFromByteStream(
            $this->key1, 'foo', $os1, Swift_KeyCache::MODE_APPEND
            );
        $cache->importFromByteStream(
            $this->key1, 'foo', $os2, Swift_KeyCache::MODE_APPEND
            );

        $this->assertEquals('abcdefxyzuvw', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testByteStreamAndStringCanBeAppended()
    {
<<<<<<< HEAD
        $os = $this->_createOutputStream();
=======
        $os = $this->createOutputStream();
>>>>>>> dev
        $os->expects($this->at(0))
           ->method('read')
           ->will($this->returnValue('abc'));
        $os->expects($this->at(1))
           ->method('read')
           ->will($this->returnValue('def'));
        $os->expects($this->at(2))
           ->method('read')
           ->will($this->returnValue(false));

<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream(true);

        $cache = $this->_createCache($is);

        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_APPEND
            );
        $cache->importFromByteStream(
            $this->_key1, 'foo', $os, Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testabcdef', $cache->getString($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream(true);

        $cache = $this->createCache($is);

        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_APPEND
            );
        $cache->importFromByteStream(
            $this->key1, 'foo', $os, Swift_KeyCache::MODE_APPEND
            );
        $this->assertEquals('testabcdef', $cache->getString($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testDataCanBeExportedToByteStream()
    {
        //See acceptance test for more detail
<<<<<<< HEAD
        $is = $this->_createInputStream();
        $is->expects($this->atLeastOnce())
           ->method('write');

        $kcis = $this->_createKeyCacheInputStream(true);

        $cache = $this->_createCache($kcis);

        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );

        $cache->exportToByteStream($this->_key1, 'foo', $is);
=======
        $is = $this->createInputStream();
        $is->expects($this->atLeastOnce())
           ->method('write');

        $kcis = $this->createKeyCacheInputStream(true);

        $cache = $this->createCache($kcis);

        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );

        $cache->exportToByteStream($this->key1, 'foo', $is);
>>>>>>> dev
    }

    public function testKeyCanBeCleared()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);

        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($cache->hasKey($this->_key1, 'foo'));
        $cache->clearKey($this->_key1, 'foo');
        $this->assertFalse($cache->hasKey($this->_key1, 'foo'));
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);

        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($cache->hasKey($this->key1, 'foo'));
        $cache->clearKey($this->key1, 'foo');
        $this->assertFalse($cache->hasKey($this->key1, 'foo'));
>>>>>>> dev
    }

    public function testNsKeyCanBeCleared()
    {
<<<<<<< HEAD
        $is = $this->_createKeyCacheInputStream();
        $cache = $this->_createCache($is);

        $cache->setString(
            $this->_key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->_key1, 'bar', 'xyz', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($cache->hasKey($this->_key1, 'foo'));
        $this->assertTrue($cache->hasKey($this->_key1, 'bar'));
        $cache->clearAll($this->_key1);
        $this->assertFalse($cache->hasKey($this->_key1, 'foo'));
        $this->assertFalse($cache->hasKey($this->_key1, 'bar'));
    }

    private function _createCache($is)
=======
        $is = $this->createKeyCacheInputStream();
        $cache = $this->createCache($is);

        $cache->setString(
            $this->key1, 'foo', 'test', Swift_KeyCache::MODE_WRITE
            );
        $cache->setString(
            $this->key1, 'bar', 'xyz', Swift_KeyCache::MODE_WRITE
            );
        $this->assertTrue($cache->hasKey($this->key1, 'foo'));
        $this->assertTrue($cache->hasKey($this->key1, 'bar'));
        $cache->clearAll($this->key1);
        $this->assertFalse($cache->hasKey($this->key1, 'foo'));
        $this->assertFalse($cache->hasKey($this->key1, 'bar'));
    }

    private function createCache($is)
>>>>>>> dev
    {
        return new Swift_KeyCache_ArrayKeyCache($is);
    }

<<<<<<< HEAD
    private function _createKeyCacheInputStream()
=======
    private function createKeyCacheInputStream()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_KeyCache_KeyCacheInputStream')->getMock();
    }

<<<<<<< HEAD
    private function _createOutputStream()
=======
    private function createOutputStream()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_OutputByteStream')->getMock();
    }

<<<<<<< HEAD
    private function _createInputStream()
=======
    private function createInputStream()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_InputByteStream')->getMock();
    }
}
