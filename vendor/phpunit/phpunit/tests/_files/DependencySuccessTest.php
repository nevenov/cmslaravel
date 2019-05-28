<?php
<<<<<<< HEAD
class DependencySuccessTest extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
=======
use PHPUnit\Framework\TestCase;

class DependencySuccessTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
>>>>>>> dev
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
<<<<<<< HEAD
=======
        $this->assertTrue(true);
>>>>>>> dev
    }

    /**
     * @depends DependencySuccessTest::testTwo
     */
    public function testThree()
    {
<<<<<<< HEAD
=======
        $this->assertTrue(true);
>>>>>>> dev
    }
}
