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
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

/**
 * Tests NamespacedAttributeBag.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class NamespacedAttributeBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $array;
=======
class NamespacedAttributeBagTest extends TestCase
{
    private $array = [];
>>>>>>> dev

    /**
     * @var NamespacedAttributeBag
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
>>>>>>> dev
        $this->bag = new NamespacedAttributeBag('_sf2', '/');
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
        $bag = new NamespacedAttributeBag();
        $bag->initialize($this->array);
        $this->assertEquals($this->array, $this->bag->all());
<<<<<<< HEAD
        $array = array('should' => 'not stick');
=======
        $array = ['should' => 'not stick'];
>>>>>>> dev
        $bag->initialize($array);

        // should have remained the same
        $this->assertEquals($this->array, $this->bag->all());
    }

    public function testGetStorageKey()
    {
        $this->assertEquals('_sf2', $this->bag->getStorageKey());
        $attributeBag = new NamespacedAttributeBag('test');
        $this->assertEquals('test', $attributeBag->getStorageKey());
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
<<<<<<< HEAD
=======
    public function testHasNoSideEffect($key, $value, $expected)
    {
        $expected = json_encode($this->bag->all());
        $this->bag->has($key);

        $this->assertEquals($expected, json_encode($this->bag->all()));
    }

    /**
     * @dataProvider attributesProvider
     */
>>>>>>> dev
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
<<<<<<< HEAD
=======
    public function testGetNoSideEffect($key, $value, $expected)
    {
        $expected = json_encode($this->bag->all());
        $this->bag->get($key);

        $this->assertEquals($expected, json_encode($this->bag->all()));
    }

    /**
     * @dataProvider attributesProvider
     */
>>>>>>> dev
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

    public function testRemoveExistingNamespacedAttribute()
    {
        $this->assertSame('cod', $this->bag->remove('category/fishing/first'));
    }

    public function testRemoveNonexistingNamespacedAttribute()
    {
        $this->assertNull($this->bag->remove('foo/bar/baz'));
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
            array('csrf.token/a', '1234', true),
            array('csrf.token/b', '4321', true),
            array('category', array('fishing' => array('first' => 'cod', 'second' => 'sole')), true),
            array('category/fishing', array('first' => 'cod', 'second' => 'sole'), true),
            array('category/fishing/missing/first', null, false),
            array('category/fishing/first', 'cod', true),
            array('category/fishing/second', 'sole', true),
            array('category/fishing/missing/second', null, false),
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
            ['csrf.token/a', '1234', true],
            ['csrf.token/b', '4321', true],
            ['category', ['fishing' => ['first' => 'cod', 'second' => 'sole']], true],
            ['category/fishing', ['first' => 'cod', 'second' => 'sole'], true],
            ['category/fishing/missing/first', null, false],
            ['category/fishing/first', 'cod', true],
            ['category/fishing/second', 'sole', true],
            ['category/fishing/missing/second', null, false],
            ['user2.login', null, false],
            ['never', null, false],
            ['bye', null, false],
            ['bye/for/now', null, false],
        ];
>>>>>>> dev
    }
}
