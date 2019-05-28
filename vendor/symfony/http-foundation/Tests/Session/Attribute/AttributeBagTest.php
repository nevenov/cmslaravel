<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests\Session\Attribute;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

/**
 * Tests AttributeBag.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class AttributeBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $array;
=======
class AttributeBagTest extends TestCase
{
    private $array = [];
>>>>>>> dev

    /**
     * @var AttributeBag
     */
    private $bag;

    protected function setUp()
    {
<<<<<<< HEAD
        $this->array = array(
            'hello' => 'world',
            'always' => 'be happy',
            'user.login' => 'drak',
            'csrf.token' => array(
                'a' => '1234',
                'b' => '4321',
            ),
            'category' => array(
                'fishing' => array(
                    'first' => 'cod',
                    'second' => 'sole',
                ),
            ),
        );
        $this->bag = new AttributeBag('_sf2');
=======
        $this->array = [
            'hello' => 'world',
            'always' => 'be happy',
            'user.login' => 'drak',
            'csrf.token' => [
                'a' => '1234',
                'b' => '4321',
            ],
            'category' => [
                'fishing' => [
                    'first' => 'cod',
                    'second' => 'sole',
                ],
            ],
        ];
        $this->bag = new AttributeBag('_sf');
>>>>>>> dev
        $this->bag->initialize($this->array);
    }

    protected function tearDown()
    {
        $this->bag = null;
<<<<<<< HEAD
        $this->array = array();
=======
        $this->array = [];
>>>>>>> dev
    }

    public function testInitialize()
    {
        $bag = new AttributeBag();
        $bag->initialize($this->array);
        $this->assertEquals($this->array, $bag->all());
<<<<<<< HEAD
        $array = array('should' => 'change');
=======
        $array = ['should' => 'change'];
>>>>>>> dev
        $bag->initialize($array);
        $this->assertEquals($array, $bag->all());
    }

    public function testGetStorageKey()
    {
<<<<<<< HEAD
        $this->assertEquals('_sf2', $this->bag->getStorageKey());
=======
        $this->assertEquals('_sf', $this->bag->getStorageKey());
>>>>>>> dev
        $attributeBag = new AttributeBag('test');
        $this->assertEquals('test', $attributeBag->getStorageKey());
    }

    public function testGetSetName()
    {
        $this->assertEquals('attributes', $this->bag->getName());
        $this->bag->setName('foo');
        $this->assertEquals('foo', $this->bag->getName());
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testHas($key, $value, $exists)
    {
        $this->assertEquals($exists, $this->bag->has($key));
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testGet($key, $value, $expected)
    {
        $this->assertEquals($value, $this->bag->get($key));
    }

    public function testGetDefaults()
    {
        $this->assertNull($this->bag->get('user2.login'));
        $this->assertEquals('default', $this->bag->get('user2.login', 'default'));
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testSet($key, $value, $expected)
    {
        $this->bag->set($key, $value);
        $this->assertEquals($value, $this->bag->get($key));
    }

    public function testAll()
    {
        $this->assertEquals($this->array, $this->bag->all());

        $this->bag->set('hello', 'fabien');
        $array = $this->array;
        $array['hello'] = 'fabien';
        $this->assertEquals($array, $this->bag->all());
    }

    public function testReplace()
    {
<<<<<<< HEAD
        $array = array();
=======
        $array = [];
>>>>>>> dev
        $array['name'] = 'jack';
        $array['foo.bar'] = 'beep';
        $this->bag->replace($array);
        $this->assertEquals($array, $this->bag->all());
        $this->assertNull($this->bag->get('hello'));
        $this->assertNull($this->bag->get('always'));
        $this->assertNull($this->bag->get('user.login'));
    }

    public function testRemove()
    {
        $this->assertEquals('world', $this->bag->get('hello'));
        $this->bag->remove('hello');
        $this->assertNull($this->bag->get('hello'));

        $this->assertEquals('be happy', $this->bag->get('always'));
        $this->bag->remove('always');
        $this->assertNull($this->bag->get('always'));

        $this->assertEquals('drak', $this->bag->get('user.login'));
        $this->bag->remove('user.login');
        $this->assertNull($this->bag->get('user.login'));
    }

    public function testClear()
    {
        $this->bag->clear();
<<<<<<< HEAD
        $this->assertEquals(array(), $this->bag->all());
=======
        $this->assertEquals([], $this->bag->all());
>>>>>>> dev
    }

    public function attributesProvider()
    {
<<<<<<< HEAD
        return array(
            array('hello', 'world', true),
            array('always', 'be happy', true),
            array('user.login', 'drak', true),
            array('csrf.token', array('a' => '1234', 'b' => '4321'), true),
            array('category', array('fishing' => array('first' => 'cod', 'second' => 'sole')), true),
            array('user2.login', null, false),
            array('never', null, false),
            array('bye', null, false),
            array('bye/for/now', null, false),
        );
=======
        return [
            ['hello', 'world', true],
            ['always', 'be happy', true],
            ['user.login', 'drak', true],
            ['csrf.token', ['a' => '1234', 'b' => '4321'], true],
            ['category', ['fishing' => ['first' => 'cod', 'second' => 'sole']], true],
            ['user2.login', null, false],
            ['never', null, false],
            ['bye', null, false],
            ['bye/for/now', null, false],
        ];
>>>>>>> dev
    }

    public function testGetIterator()
    {
        $i = 0;
        foreach ($this->bag as $key => $val) {
            $this->assertEquals($this->array[$key], $val);
            ++$i;
        }

<<<<<<< HEAD
        $this->assertEquals(count($this->array), $i);
=======
        $this->assertEquals(\count($this->array), $i);
>>>>>>> dev
    }

    public function testCount()
    {
<<<<<<< HEAD
        $this->assertEquals(count($this->array), count($this->bag));
=======
        $this->assertCount(\count($this->array), $this->bag);
>>>>>>> dev
    }
}
