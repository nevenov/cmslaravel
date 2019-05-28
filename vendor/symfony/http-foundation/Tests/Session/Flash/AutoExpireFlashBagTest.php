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
use Symfony\Component\HttpFoundation\Session\Flash\AutoExpireFlashBag as FlashBag;

/**
 * AutoExpireFlashBagTest.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class AutoExpireFlashBagTest extends \PHPUnit_Framework_TestCase
=======
class AutoExpireFlashBagTest extends TestCase
>>>>>>> dev
{
    /**
     * @var \Symfony\Component\HttpFoundation\Session\Flash\AutoExpireFlashBag
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
        $this->array = array('new' => array('notice' => array('A previous flash message')));
=======
        $this->array = ['new' => ['notice' => ['A previous flash message']]];
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
<<<<<<< HEAD
        $array = array('new' => array('notice' => array('A previous flash message')));
        $bag->initialize($array);
        $this->assertEquals(array('A previous flash message'), $bag->peek('notice'));
        $array = array('new' => array(
                'notice' => array('Something else'),
                'error' => array('a'),
            ));
        $bag->initialize($array);
        $this->assertEquals(array('Something else'), $bag->peek('notice'));
        $this->assertEquals(array('a'), $bag->peek('error'));
=======
        $array = ['new' => ['notice' => ['A previous flash message']]];
        $bag->initialize($array);
        $this->assertEquals(['A previous flash message'], $bag->peek('notice'));
        $array = ['new' => [
                'notice' => ['Something else'],
                'error' => ['a'],
            ]];
        $bag->initialize($array);
        $this->assertEquals(['Something else'], $bag->peek('notice'));
        $this->assertEquals(['a'], $bag->peek('error'));
>>>>>>> dev
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
        $this->assertEquals(array('default'), $this->bag->peek('non_existing', array('default')));
        $this->assertEquals(array('A previous flash message'), $this->bag->peek('notice'));
        $this->assertEquals(array('A previous flash message'), $this->bag->peek('notice'));
=======
        $this->assertEquals([], $this->bag->peek('non_existing'));
        $this->assertEquals(['default'], $this->bag->peek('non_existing', ['default']));
        $this->assertEquals(['A previous flash message'], $this->bag->peek('notice'));
        $this->assertEquals(['A previous flash message'], $this->bag->peek('notice'));
>>>>>>> dev
    }

    public function testSet()
    {
        $this->bag->set('notice', 'Foo');
<<<<<<< HEAD
        $this->assertEquals(array('A previous flash message'), $this->bag->peek('notice'));
=======
        $this->assertEquals(['A previous flash message'], $this->bag->peek('notice'));
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
>>>>>>> dev
    }

    public function testPeekAll()
    {
<<<<<<< HEAD
        $array = array(
            'new' => array(
                'notice' => 'Foo',
                'error' => 'Bar',
            ),
        );

        $this->bag->initialize($array);
        $this->assertEquals(array(
            'notice' => 'Foo',
            'error' => 'Bar',
            ), $this->bag->peekAll()
        );

        $this->assertEquals(array(
            'notice' => 'Foo',
            'error' => 'Bar',
            ), $this->bag->peekAll()
=======
        $array = [
            'new' => [
                'notice' => 'Foo',
                'error' => 'Bar',
            ],
        ];

        $this->bag->initialize($array);
        $this->assertEquals([
            'notice' => 'Foo',
            'error' => 'Bar',
            ], $this->bag->peekAll()
        );

        $this->assertEquals([
            'notice' => 'Foo',
            'error' => 'Bar',
            ], $this->bag->peekAll()
>>>>>>> dev
        );
    }

    public function testGet()
    {
<<<<<<< HEAD
        $this->assertEquals(array(), $this->bag->get('non_existing'));
        $this->assertEquals(array('default'), $this->bag->get('non_existing', array('default')));
        $this->assertEquals(array('A previous flash message'), $this->bag->get('notice'));
        $this->assertEquals(array(), $this->bag->get('notice'));
=======
        $this->assertEquals([], $this->bag->get('non_existing'));
        $this->assertEquals(['default'], $this->bag->get('non_existing', ['default']));
        $this->assertEquals(['A previous flash message'], $this->bag->get('notice'));
        $this->assertEquals([], $this->bag->get('notice'));
>>>>>>> dev
    }

    public function testSetAll()
    {
<<<<<<< HEAD
        $this->bag->setAll(array('a' => 'first', 'b' => 'second'));
=======
        $this->bag->setAll(['a' => 'first', 'b' => 'second']);
>>>>>>> dev
        $this->assertFalse($this->bag->has('a'));
        $this->assertFalse($this->bag->has('b'));
    }

    public function testAll()
    {
        $this->bag->set('notice', 'Foo');
        $this->bag->set('error', 'Bar');
<<<<<<< HEAD
        $this->assertEquals(array(
            'notice' => array('A previous flash message'),
            ), $this->bag->all()
        );

        $this->assertEquals(array(), $this->bag->all());
=======
        $this->assertEquals([
            'notice' => ['A previous flash message'],
            ], $this->bag->all()
        );

        $this->assertEquals([], $this->bag->all());
>>>>>>> dev
    }

    public function testClear()
    {
<<<<<<< HEAD
        $this->assertEquals(array('notice' => array('A previous flash message')), $this->bag->clear());
=======
        $this->assertEquals(['notice' => ['A previous flash message']], $this->bag->clear());
    }

    public function testDoNotRemoveTheNewFlashesWhenDisplayingTheExistingOnes()
    {
        $this->bag->add('success', 'Something');
        $this->bag->all();

        $this->assertEquals(['new' => ['success' => ['Something']], 'display' => []], $this->array);
>>>>>>> dev
    }
}
