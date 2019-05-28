<?php

<<<<<<< HEAD
class Swift_KeyCache_SimpleKeyCacheInputStreamTest extends \PHPUnit_Framework_TestCase
{
    private $_nsKey = 'ns1';
=======
class Swift_KeyCache_SimpleKeyCacheInputStreamTest extends \PHPUnit\Framework\TestCase
{
    private $nsKey = 'ns1';
>>>>>>> dev

    public function testStreamWritesToCacheInAppendMode()
    {
        $cache = $this->getMockBuilder('Swift_KeyCache')->getMock();
        $cache->expects($this->at(0))
              ->method('setString')
<<<<<<< HEAD
              ->with($this->_nsKey, 'foo', 'a', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(1))
              ->method('setString')
              ->with($this->_nsKey, 'foo', 'b', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(2))
              ->method('setString')
              ->with($this->_nsKey, 'foo', 'c', Swift_KeyCache::MODE_APPEND);

        $stream = new Swift_KeyCache_SimpleKeyCacheInputStream();
        $stream->setKeyCache($cache);
        $stream->setNsKey($this->_nsKey);
=======
              ->with($this->nsKey, 'foo', 'a', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(1))
              ->method('setString')
              ->with($this->nsKey, 'foo', 'b', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(2))
              ->method('setString')
              ->with($this->nsKey, 'foo', 'c', Swift_KeyCache::MODE_APPEND);

        $stream = new Swift_KeyCache_SimpleKeyCacheInputStream();
        $stream->setKeyCache($cache);
        $stream->setNsKey($this->nsKey);
>>>>>>> dev
        $stream->setItemKey('foo');

        $stream->write('a');
        $stream->write('b');
        $stream->write('c');
    }

    public function testFlushContentClearsKey()
    {
        $cache = $this->getMockBuilder('Swift_KeyCache')->getMock();
        $cache->expects($this->once())
              ->method('clearKey')
<<<<<<< HEAD
              ->with($this->_nsKey, 'foo');

        $stream = new Swift_KeyCache_SimpleKeyCacheInputStream();
        $stream->setKeyCache($cache);
        $stream->setNsKey($this->_nsKey);
=======
              ->with($this->nsKey, 'foo');

        $stream = new Swift_KeyCache_SimpleKeyCacheInputStream();
        $stream->setKeyCache($cache);
        $stream->setNsKey($this->nsKey);
>>>>>>> dev
        $stream->setItemKey('foo');

        $stream->flushBuffers();
    }

    public function testClonedStreamStillReferencesSameCache()
    {
        $cache = $this->getMockBuilder('Swift_KeyCache')->getMock();
        $cache->expects($this->at(0))
              ->method('setString')
<<<<<<< HEAD
              ->with($this->_nsKey, 'foo', 'a', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(1))
              ->method('setString')
              ->with($this->_nsKey, 'foo', 'b', Swift_KeyCache::MODE_APPEND);
=======
              ->with($this->nsKey, 'foo', 'a', Swift_KeyCache::MODE_APPEND);
        $cache->expects($this->at(1))
              ->method('setString')
              ->with($this->nsKey, 'foo', 'b', Swift_KeyCache::MODE_APPEND);
>>>>>>> dev
        $cache->expects($this->at(2))
              ->method('setString')
              ->with('test', 'bar', 'x', Swift_KeyCache::MODE_APPEND);

        $stream = new Swift_KeyCache_SimpleKeyCacheInputStream();
        $stream->setKeyCache($cache);
<<<<<<< HEAD
        $stream->setNsKey($this->_nsKey);
=======
        $stream->setNsKey($this->nsKey);
>>>>>>> dev
        $stream->setItemKey('foo');

        $stream->write('a');
        $stream->write('b');

        $newStream = clone $stream;
        $newStream->setKeyCache($cache);
        $newStream->setNsKey('test');
        $newStream->setItemKey('bar');

        $newStream->write('x');
    }
}
