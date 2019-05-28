<?php
<<<<<<< HEAD
class StackTest extends PHPUnit_Framework_TestCase
{
    public function testPush()
    {
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));
=======
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPush()
    {
        $stack = [];
        $this->assertCount(0, $stack);

        $stack[] = 'foo';
        $this->assertEquals('foo', end($stack));
        $this->assertCount(1, $stack);
>>>>>>> dev

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
<<<<<<< HEAD
        $this->assertEquals(0, count($stack));
=======
        $this->assertCount(0, $stack);
>>>>>>> dev
    }
}
