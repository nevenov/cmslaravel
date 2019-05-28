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
use Symfony\Component\HttpFoundation\AcceptHeaderItem;

class AcceptHeaderItemTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\AcceptHeaderItem;

class AcceptHeaderItemTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider provideFromStringData
     */
    public function testFromString($string, $value, array $attributes)
    {
        $item = AcceptHeaderItem::fromString($string);
        $this->assertEquals($value, $item->getValue());
        $this->assertEquals($attributes, $item->getAttributes());
    }

    public function provideFromStringData()
    {
<<<<<<< HEAD
        return array(
            array(
                'text/html',
                'text/html', array(),
            ),
            array(
                '"this;should,not=matter"',
                'this;should,not=matter', array(),
            ),
            array(
                "text/plain; charset=utf-8;param=\"this;should,not=matter\";\tfootnotes=true",
                'text/plain', array('charset' => 'utf-8', 'param' => 'this;should,not=matter', 'footnotes' => 'true'),
            ),
            array(
                '"this;should,not=matter";charset=utf-8',
                'this;should,not=matter', array('charset' => 'utf-8'),
            ),
        );
=======
        return [
            [
                'text/html',
                'text/html', [],
            ],
            [
                '"this;should,not=matter"',
                'this;should,not=matter', [],
            ],
            [
                "text/plain; charset=utf-8;param=\"this;should,not=matter\";\tfootnotes=true",
                'text/plain', ['charset' => 'utf-8', 'param' => 'this;should,not=matter', 'footnotes' => 'true'],
            ],
            [
                '"this;should,not=matter";charset=utf-8',
                'this;should,not=matter', ['charset' => 'utf-8'],
            ],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider provideToStringData
     */
    public function testToString($value, array $attributes, $string)
    {
        $item = new AcceptHeaderItem($value, $attributes);
        $this->assertEquals($string, (string) $item);
    }

    public function provideToStringData()
    {
<<<<<<< HEAD
        return array(
            array(
                'text/html', array(),
                'text/html',
            ),
            array(
                'text/plain', array('charset' => 'utf-8', 'param' => 'this;should,not=matter', 'footnotes' => 'true'),
                'text/plain;charset=utf-8;param="this;should,not=matter";footnotes=true',
            ),
        );
=======
        return [
            [
                'text/html', [],
                'text/html',
            ],
            [
                'text/plain', ['charset' => 'utf-8', 'param' => 'this;should,not=matter', 'footnotes' => 'true'],
                'text/plain; charset=utf-8; param="this;should,not=matter"; footnotes=true',
            ],
        ];
>>>>>>> dev
    }

    public function testValue()
    {
<<<<<<< HEAD
        $item = new AcceptHeaderItem('value', array());
=======
        $item = new AcceptHeaderItem('value', []);
>>>>>>> dev
        $this->assertEquals('value', $item->getValue());

        $item->setValue('new value');
        $this->assertEquals('new value', $item->getValue());

        $item->setValue(1);
        $this->assertEquals('1', $item->getValue());
    }

    public function testQuality()
    {
<<<<<<< HEAD
        $item = new AcceptHeaderItem('value', array());
=======
        $item = new AcceptHeaderItem('value', []);
>>>>>>> dev
        $this->assertEquals(1.0, $item->getQuality());

        $item->setQuality(0.5);
        $this->assertEquals(0.5, $item->getQuality());

        $item->setAttribute('q', 0.75);
        $this->assertEquals(0.75, $item->getQuality());
        $this->assertFalse($item->hasAttribute('q'));
    }

    public function testAttribute()
    {
<<<<<<< HEAD
        $item = new AcceptHeaderItem('value', array());
        $this->assertEquals(array(), $item->getAttributes());
=======
        $item = new AcceptHeaderItem('value', []);
        $this->assertEquals([], $item->getAttributes());
>>>>>>> dev
        $this->assertFalse($item->hasAttribute('test'));
        $this->assertNull($item->getAttribute('test'));
        $this->assertEquals('default', $item->getAttribute('test', 'default'));

        $item->setAttribute('test', 'value');
<<<<<<< HEAD
        $this->assertEquals(array('test' => 'value'), $item->getAttributes());
=======
        $this->assertEquals(['test' => 'value'], $item->getAttributes());
>>>>>>> dev
        $this->assertTrue($item->hasAttribute('test'));
        $this->assertEquals('value', $item->getAttribute('test'));
        $this->assertEquals('value', $item->getAttribute('test', 'default'));
    }
}
