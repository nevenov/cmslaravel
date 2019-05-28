<?php
<<<<<<< HEAD
class DependencyFailureTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
>>>>>>> dev
{
    public function testOne()
    {
        $this->fail();
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
<<<<<<< HEAD
    }

    /**
     * @depends testTwo
     */
    public function testThree()
    {
=======
        $this->assertTrue(true);
    }

    /**
     * @depends !clone testTwo
     */
    public function testThree()
    {
        $this->assertTrue(true);
    }

    /**
     * @depends clone testOne
     */
    public function testFour()
    {
        $this->assertTrue(true);
>>>>>>> dev
    }
}
