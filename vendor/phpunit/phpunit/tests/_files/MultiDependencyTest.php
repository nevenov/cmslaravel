<?php
<<<<<<< HEAD
class MultiDependencyTest extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
=======
use PHPUnit\Framework\TestCase;

class MultiDependencyTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);

>>>>>>> dev
        return 'foo';
    }

    public function testTwo()
    {
<<<<<<< HEAD
=======
        $this->assertTrue(true);

>>>>>>> dev
        return 'bar';
    }

    /**
     * @depends testOne
     * @depends testTwo
     */
    public function testThree($a, $b)
    {
        $this->assertEquals('foo', $a);
        $this->assertEquals('bar', $b);
    }
}
