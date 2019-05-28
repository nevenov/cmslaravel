<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\HeaderBag;

class HeaderBagTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $bag = new HeaderBag(array('foo' => 'bar'));
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\HeaderBag;

class HeaderBagTest extends TestCase
{
    public function testConstructor()
    {
        $bag = new HeaderBag(['foo' => 'bar']);
>>>>>>> dev
        $this->assertTrue($bag->has('foo'));
    }

    public function testToStringNull()
    {
        $bag = new HeaderBag();
        $this->assertEquals('', $bag->__toString());
    }

    public function testToStringNotNull()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar'));
=======
        $bag = new HeaderBag(['foo' => 'bar']);
>>>>>>> dev
        $this->assertEquals("Foo: bar\r\n", $bag->__toString());
    }

    public function testKeys()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar'));
=======
        $bag = new HeaderBag(['foo' => 'bar']);
>>>>>>> dev
        $keys = $bag->keys();
        $this->assertEquals('foo', $keys[0]);
    }

    public function testGetDate()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'Tue, 4 Sep 2012 20:00:00 +0200'));
=======
        $bag = new HeaderBag(['foo' => 'Tue, 4 Sep 2012 20:00:00 +0200']);
>>>>>>> dev
        $headerDate = $bag->getDate('foo');
        $this->assertInstanceOf('DateTime', $headerDate);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetDateException()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'Tue'));
=======
        $bag = new HeaderBag(['foo' => 'Tue']);
>>>>>>> dev
        $headerDate = $bag->getDate('foo');
    }

    public function testGetCacheControlHeader()
    {
        $bag = new HeaderBag();
        $bag->addCacheControlDirective('public', '#a');
        $this->assertTrue($bag->hasCacheControlDirective('public'));
        $this->assertEquals('#a', $bag->getCacheControlDirective('public'));
    }

    public function testAll()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar'));
        $this->assertEquals(array('foo' => array('bar')), $bag->all(), '->all() gets all the input');

        $bag = new HeaderBag(array('FOO' => 'BAR'));
        $this->assertEquals(array('foo' => array('BAR')), $bag->all(), '->all() gets all the input key are lower case');
=======
        $bag = new HeaderBag(['foo' => 'bar']);
        $this->assertEquals(['foo' => ['bar']], $bag->all(), '->all() gets all the input');

        $bag = new HeaderBag(['FOO' => 'BAR']);
        $this->assertEquals(['foo' => ['BAR']], $bag->all(), '->all() gets all the input key are lower case');
>>>>>>> dev
    }

    public function testReplace()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar'));

        $bag->replace(array('NOPE' => 'BAR'));
        $this->assertEquals(array('nope' => array('BAR')), $bag->all(), '->replace() replaces the input with the argument');
=======
        $bag = new HeaderBag(['foo' => 'bar']);

        $bag->replace(['NOPE' => 'BAR']);
        $this->assertEquals(['nope' => ['BAR']], $bag->all(), '->replace() replaces the input with the argument');
>>>>>>> dev
        $this->assertFalse($bag->has('foo'), '->replace() overrides previously set the input');
    }

    public function testGet()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar', 'fuzz' => 'bizz'));
        $this->assertEquals('bar', $bag->get('foo'), '->get return current value');
        $this->assertEquals('bar', $bag->get('FoO'), '->get key in case insensitive');
        $this->assertEquals(array('bar'), $bag->get('foo', 'nope', false), '->get return the value as array');
=======
        $bag = new HeaderBag(['foo' => 'bar', 'fuzz' => 'bizz']);
        $this->assertEquals('bar', $bag->get('foo'), '->get return current value');
        $this->assertEquals('bar', $bag->get('FoO'), '->get key in case insensitive');
        $this->assertEquals(['bar'], $bag->get('foo', 'nope', false), '->get return the value as array');
>>>>>>> dev

        // defaults
        $this->assertNull($bag->get('none'), '->get unknown values returns null');
        $this->assertEquals('default', $bag->get('none', 'default'), '->get unknown values returns default');
<<<<<<< HEAD
        $this->assertEquals(array('default'), $bag->get('none', 'default', false), '->get unknown values returns default as array');

        $bag->set('foo', 'bor', false);
        $this->assertEquals('bar', $bag->get('foo'), '->get return first value');
        $this->assertEquals(array('bar', 'bor'), $bag->get('foo', 'nope', false), '->get return all values as array');
=======
        $this->assertEquals(['default'], $bag->get('none', 'default', false), '->get unknown values returns default as array');

        $bag->set('foo', 'bor', false);
        $this->assertEquals('bar', $bag->get('foo'), '->get return first value');
        $this->assertEquals(['bar', 'bor'], $bag->get('foo', 'nope', false), '->get return all values as array');
>>>>>>> dev
    }

    public function testSetAssociativeArray()
    {
        $bag = new HeaderBag();
<<<<<<< HEAD
        $bag->set('foo', array('bad-assoc-index' => 'value'));
        $this->assertSame('value', $bag->get('foo'));
        $this->assertEquals(array('value'), $bag->get('foo', 'nope', false), 'assoc indices of multi-valued headers are ignored');
=======
        $bag->set('foo', ['bad-assoc-index' => 'value']);
        $this->assertSame('value', $bag->get('foo'));
        $this->assertEquals(['value'], $bag->get('foo', 'nope', false), 'assoc indices of multi-valued headers are ignored');
>>>>>>> dev
    }

    public function testContains()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('foo' => 'bar', 'fuzz' => 'bizz'));
=======
        $bag = new HeaderBag(['foo' => 'bar', 'fuzz' => 'bizz']);
>>>>>>> dev
        $this->assertTrue($bag->contains('foo', 'bar'), '->contains first value');
        $this->assertTrue($bag->contains('fuzz', 'bizz'), '->contains second value');
        $this->assertFalse($bag->contains('nope', 'nope'), '->contains unknown value');
        $this->assertFalse($bag->contains('foo', 'nope'), '->contains unknown value');

        // Multiple values
        $bag->set('foo', 'bor', false);
        $this->assertTrue($bag->contains('foo', 'bar'), '->contains first value');
        $this->assertTrue($bag->contains('foo', 'bor'), '->contains second value');
        $this->assertFalse($bag->contains('foo', 'nope'), '->contains unknown value');
    }

    public function testCacheControlDirectiveAccessors()
    {
        $bag = new HeaderBag();
        $bag->addCacheControlDirective('public');

        $this->assertTrue($bag->hasCacheControlDirective('public'));
        $this->assertTrue($bag->getCacheControlDirective('public'));
        $this->assertEquals('public', $bag->get('cache-control'));

        $bag->addCacheControlDirective('max-age', 10);
        $this->assertTrue($bag->hasCacheControlDirective('max-age'));
        $this->assertEquals(10, $bag->getCacheControlDirective('max-age'));
        $this->assertEquals('max-age=10, public', $bag->get('cache-control'));

        $bag->removeCacheControlDirective('max-age');
        $this->assertFalse($bag->hasCacheControlDirective('max-age'));
    }

    public function testCacheControlDirectiveParsing()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('cache-control' => 'public, max-age=10'));
=======
        $bag = new HeaderBag(['cache-control' => 'public, max-age=10']);
>>>>>>> dev
        $this->assertTrue($bag->hasCacheControlDirective('public'));
        $this->assertTrue($bag->getCacheControlDirective('public'));

        $this->assertTrue($bag->hasCacheControlDirective('max-age'));
        $this->assertEquals(10, $bag->getCacheControlDirective('max-age'));

        $bag->addCacheControlDirective('s-maxage', 100);
        $this->assertEquals('max-age=10, public, s-maxage=100', $bag->get('cache-control'));
    }

    public function testCacheControlDirectiveParsingQuotedZero()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('cache-control' => 'max-age="0"'));
=======
        $bag = new HeaderBag(['cache-control' => 'max-age="0"']);
>>>>>>> dev
        $this->assertTrue($bag->hasCacheControlDirective('max-age'));
        $this->assertEquals(0, $bag->getCacheControlDirective('max-age'));
    }

    public function testCacheControlDirectiveOverrideWithReplace()
    {
<<<<<<< HEAD
        $bag = new HeaderBag(array('cache-control' => 'private, max-age=100'));
        $bag->replace(array('cache-control' => 'public, max-age=10'));
=======
        $bag = new HeaderBag(['cache-control' => 'private, max-age=100']);
        $bag->replace(['cache-control' => 'public, max-age=10']);
>>>>>>> dev
        $this->assertTrue($bag->hasCacheControlDirective('public'));
        $this->assertTrue($bag->getCacheControlDirective('public'));

        $this->assertTrue($bag->hasCacheControlDirective('max-age'));
        $this->assertEquals(10, $bag->getCacheControlDirective('max-age'));
    }

<<<<<<< HEAD
    public function testGetIterator()
    {
        $headers = array('foo' => 'bar', 'hello' => 'world', 'third' => 'charm');
=======
    public function testCacheControlClone()
    {
        $headers = ['foo' => 'bar'];
        $bag1 = new HeaderBag($headers);
        $bag2 = new HeaderBag($bag1->all());

        $this->assertEquals($bag1->all(), $bag2->all());
    }

    public function testGetIterator()
    {
        $headers = ['foo' => 'bar', 'hello' => 'world', 'third' => 'charm'];
>>>>>>> dev
        $headerBag = new HeaderBag($headers);

        $i = 0;
        foreach ($headerBag as $key => $val) {
            ++$i;
<<<<<<< HEAD
            $this->assertEquals(array($headers[$key]), $val);
        }

        $this->assertEquals(count($headers), $i);
=======
            $this->assertEquals([$headers[$key]], $val);
        }

        $this->assertEquals(\count($headers), $i);
>>>>>>> dev
    }

    public function testCount()
    {
<<<<<<< HEAD
        $headers = array('foo' => 'bar', 'HELLO' => 'WORLD');
        $headerBag = new HeaderBag($headers);

        $this->assertEquals(count($headers), count($headerBag));
=======
        $headers = ['foo' => 'bar', 'HELLO' => 'WORLD'];
        $headerBag = new HeaderBag($headers);

        $this->assertCount(\count($headers), $headerBag);
>>>>>>> dev
    }
}
