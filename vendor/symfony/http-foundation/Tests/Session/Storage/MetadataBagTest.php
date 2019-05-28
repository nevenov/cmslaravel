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
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

/**
 * Test class for MetadataBag.
 *
 * @group time-sensitive
 */
<<<<<<< HEAD
class MetadataBagTest extends \PHPUnit_Framework_TestCase
=======
class MetadataBagTest extends TestCase
>>>>>>> dev
{
    /**
     * @var MetadataBag
     */
    protected $bag;

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
        $this->bag = new MetadataBag();
<<<<<<< HEAD
        $this->array = array(MetadataBag::CREATED => 1234567, MetadataBag::UPDATED => 12345678, MetadataBag::LIFETIME => 0);
=======
        $this->array = [MetadataBag::CREATED => 1234567, MetadataBag::UPDATED => 12345678, MetadataBag::LIFETIME => 0];
>>>>>>> dev
        $this->bag->initialize($this->array);
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        $this->array = array();
=======
        $this->array = [];
>>>>>>> dev
        $this->bag = null;
        parent::tearDown();
    }

    public function testInitialize()
    {
<<<<<<< HEAD
        $sessionMetadata = array();
=======
        $sessionMetadata = [];
>>>>>>> dev

        $bag1 = new MetadataBag();
        $bag1->initialize($sessionMetadata);
        $this->assertGreaterThanOrEqual(time(), $bag1->getCreated());
        $this->assertEquals($bag1->getCreated(), $bag1->getLastUsed());

        sleep(1);
        $bag2 = new MetadataBag();
        $bag2->initialize($sessionMetadata);
        $this->assertEquals($bag1->getCreated(), $bag2->getCreated());
        $this->assertEquals($bag1->getLastUsed(), $bag2->getLastUsed());
        $this->assertEquals($bag2->getCreated(), $bag2->getLastUsed());

        sleep(1);
        $bag3 = new MetadataBag();
        $bag3->initialize($sessionMetadata);
        $this->assertEquals($bag1->getCreated(), $bag3->getCreated());
        $this->assertGreaterThan($bag2->getLastUsed(), $bag3->getLastUsed());
        $this->assertNotEquals($bag3->getCreated(), $bag3->getLastUsed());
    }

    public function testGetSetName()
    {
        $this->assertEquals('__metadata', $this->bag->getName());
        $this->bag->setName('foo');
        $this->assertEquals('foo', $this->bag->getName());
    }

    public function testGetStorageKey()
    {
        $this->assertEquals('_sf2_meta', $this->bag->getStorageKey());
    }

    public function testGetLifetime()
    {
        $bag = new MetadataBag();
<<<<<<< HEAD
        $array = array(MetadataBag::CREATED => 1234567, MetadataBag::UPDATED => 12345678, MetadataBag::LIFETIME => 1000);
=======
        $array = [MetadataBag::CREATED => 1234567, MetadataBag::UPDATED => 12345678, MetadataBag::LIFETIME => 1000];
>>>>>>> dev
        $bag->initialize($array);
        $this->assertEquals(1000, $bag->getLifetime());
    }

    public function testGetCreated()
    {
        $this->assertEquals(1234567, $this->bag->getCreated());
    }

    public function testGetLastUsed()
    {
        $this->assertLessThanOrEqual(time(), $this->bag->getLastUsed());
    }

    public function testClear()
    {
        $this->bag->clear();
<<<<<<< HEAD
=======

        // the clear method has no side effects, we just want to ensure it doesn't trigger any exceptions
        $this->addToAssertionCount(1);
>>>>>>> dev
    }

    public function testSkipLastUsedUpdate()
    {
        $bag = new MetadataBag('', 30);
        $timeStamp = time();

        $created = $timeStamp - 15;
<<<<<<< HEAD
        $sessionMetadata = array(
            MetadataBag::CREATED => $created,
            MetadataBag::UPDATED => $created,
            MetadataBag::LIFETIME => 1000,
        );
=======
        $sessionMetadata = [
            MetadataBag::CREATED => $created,
            MetadataBag::UPDATED => $created,
            MetadataBag::LIFETIME => 1000,
        ];
>>>>>>> dev
        $bag->initialize($sessionMetadata);

        $this->assertEquals($created, $sessionMetadata[MetadataBag::UPDATED]);
    }

    public function testDoesNotSkipLastUsedUpdate()
    {
        $bag = new MetadataBag('', 30);
        $timeStamp = time();

        $created = $timeStamp - 45;
<<<<<<< HEAD
        $sessionMetadata = array(
            MetadataBag::CREATED => $created,
            MetadataBag::UPDATED => $created,
            MetadataBag::LIFETIME => 1000,
        );
=======
        $sessionMetadata = [
            MetadataBag::CREATED => $created,
            MetadataBag::UPDATED => $created,
            MetadataBag::LIFETIME => 1000,
        ];
>>>>>>> dev
        $bag->initialize($sessionMetadata);

        $this->assertEquals($timeStamp, $sessionMetadata[MetadataBag::UPDATED]);
    }
}
