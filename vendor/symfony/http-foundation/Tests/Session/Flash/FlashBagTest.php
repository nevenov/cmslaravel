<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests\Session\Flash;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

/**
 * FlashBagTest.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class FlashBagTest extends \PHPUnit_Framework_TestCase
=======
class FlashBagTest extends TestCase
>>>>>>> dev
{
    /**
     * @var \Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface
     */
    private $bag;

<<<<<<< HEAD
    /**
     * @var array
     */
    protected $array = array();
=======
    protected $array = [];
>>>>>>> dev

    protected function setUp()
    {
        parent::setUp();
        $this->bag = new FlashBag();
<<<<<<< HEAD
        $this->array = array('notice' => array('A previous flash message'));
=======
        $this->array = ['notice' => ['A previous flash message']];
>>>>>>> dev
        $this->bag->initialize($this->array);
    }

    protected function tearDown()
    {
        $this->bag = null;
        parent::tearDown();
    }

    public function testInitialize()
    {
        $bag = new FlashBag();
        $bag->initialize($this->array);
        $this->assertEquals($this->array, $bag->peekAll());
<<<<<<< HEAD
        $array = array('should' => array('change'));
=======
        $array = ['should' => ['change']];
>>>>>>> dev
        $bag->initialize($array);
        $this->assertEquals($array, $bag->peekAll());
    }

    public function testGetStorageKey()
    {
<<<<<<< HEAD
        $this->assertEquals('_sf2_flashes', $this->bag->getStorageKey());
=======
        $this->assertEquals('_symfony_flashes', $this->bag->getStorageKey());
>>>>>>> dev
        $attributeBag = new FlashBag('test');
        $this->assertEquals('test', $attributeBag->getStorageKey());
    }

    public function testGetSetName()
    {
        $this->assertEquals('flashes', $this->bag->getName());
        $this->bag->setName('foo');
        $this->assertEquals('foo', $this->bag->getName());
    }

    public function testPeek()
    {
<<<<<<< HEAD
        $this->assertEquals(array(), $this->bag->peek('non_existing'));
        $this->assertEquals(array('default'), $this->bag->peek('not_existing', array('default')));
        $this->assertEquals(array('A previous flash message'), $this->bag->peek('notice'));
        $this->assertEquals(array('A previous flash message'), $this->bag->peek('notice'));
=======
        $this->assertEquals([], $this->bag->peek('non_existing'));
        $this->assertEquals(['default'], $this->bag->peek('not_existing', ['default']));
        $this->assertEquals(['A previous flash message'], $this->bag->peek('notice'));
        $this->assertEquals(['A previous flash message'], $this->bag->peek('notice'));
    }

    public function testAdd()
    {
        $tab = ['bar' => 'baz'];
        $this->bag->add('string_message', 'lorem');
        $this->bag->add('object_message', new \stdClass());
        $this->bag->add('array_message', $tab);

        $this->assertEquals(['lorem'], $this->bag->get('string_message'));
        $this->assertEquals([new \stdClass()], $this->bag->get('object_message'));
        $this->assertEquals([$tab], $this->bag->get('array_message'));
>>>>>>> dev
    }

    public function testGet()
    {
<<<<<<< HEAD
        $this->assertEquals(array(), $this->bag->get('non_existing'));
        $this->assertEquals(array('default'), $this->bag->get('not_existing', array('default')));
        $this->assertEquals(array('A previous flash message'), $this->bag->get('notice'));
        $this->assertEquals(array(), $this->bag->get('notice'));
=======
        $this->assertEquals([], $this->bag->get('non_existing'));
        $this->assertEquals(['default'], $this->bag->get('not_existing', ['default']));
        $this->assertEquals(['A previous flash message'], $this->bag->get('notice'));
        $this->assertEquals([], $this->bag->get('notice'));
>>>>>>> dev
    }

    public function testAll()
    {
        $this->bag->set('notice', 'Foo');
        $this->bag->set('error', 'Bar');
<<<<<<< HEAD
        $this->assertEquals(array(
            'notice' => array('Foo'),
            'error' => array('Bar'), ), $this->bag->all()
        );

        $this->assertEquals(array(), $this->bag->all());
=======
        $this->assertEquals([
            'notice' => ['Foo'],
            'error' => ['Bar'], ], $this->bag->all()
        );

        $this->assertEquals([], $this->bag->all());
>>>>>>> dev
    }

    public function testSet()
    {
        $this->bag->set('notice', 'Foo');
        $this->bag->set('notice', 'Bar');
<<<<<<< HEAD
        $this->assertEquals(array('Bar'), $this->bag->peek('notice'));
=======
        $this->assertEquals(['Bar'], $this->bag->peek('notice'));
>>>>>>> dev
    }

    public function testHas()
    {
        $this->assertFalse($this->bag->has('nothing'));
        $this->assertTrue($this->bag->has('notice'));
    }

    public function testKeys()
    {
<<<<<<< HEAD
        $this->assertEquals(array('notice'), $this->bag->keys());
=======
        $this->assertEquals(['notice'], $this->bag->keys());
    }

    public function testSetAll()
    {
        $this->bag->add('one_flash', 'Foo');
        $this->bag->add('another_flash', 'Bar');
        $this->assertTrue($this->bag->has('one_flash'));
        $this->assertTrue($this->bag->has('another_flash'));
        $this->bag->setAll(['unique_flash' => 'FooBar']);
        $this->assertFalse($this->bag->has('one_flash'));
        $this->assertFalse($this->bag->has('another_flash'));
        $this->assertSame(['unique_flash' => 'FooBar'], $this->bag->all());
        $this->assertSame([], $this->bag->all());
>>>>>>> dev
    }

    public function testPeekAll()
    {
        $this->bag->set('notice', 'Foo');
        $this->bag->set('error', 'Bar');
<<<<<<< HEAD
        $this->assertEquals(array(
            'notice' => array('Foo'),
            'error' => array('Bar'),
            ), $this->bag->peekAll()
        );
        $this->assertTrue($this->bag->has('notice'));
        $this->assertTrue($this->bag->has('error'));
        $this->assertEquals(array(
            'notice' => array('Foo'),
            'error' => array('Bar'),
            ), $this->bag->peekAll()
=======
        $this->assertEquals([
            'notice' => ['Foo'],
            'error' => ['Bar'],
            ], $this->bag->peekAll()
        );
        $this->assertTrue($this->bag->has('notice'));
        $this->assertTrue($this->bag->has('error'));
        $this->assertEquals([
            'notice' => ['Foo'],
            'error' => ['Bar'],
            ], $this->bag->peekAll()
>>>>>>> dev
        );
    }
}
