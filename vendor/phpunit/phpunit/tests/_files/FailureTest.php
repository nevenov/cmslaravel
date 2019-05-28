<?php
<<<<<<< HEAD
class FailureTest extends PHPUnit_Framework_TestCase
{
    public function testAssertArrayEqualsArray()
    {
        $this->assertEquals(array(1), array(2), 'message');
=======
use PHPUnit\Framework\TestCase;

class FailureTest extends TestCase
{
    public function testAssertArrayEqualsArray()
    {
        $this->assertEquals([1], [2], 'message');
>>>>>>> dev
    }

    public function testAssertIntegerEqualsInteger()
    {
        $this->assertEquals(1, 2, 'message');
    }

    public function testAssertObjectEqualsObject()
    {
<<<<<<< HEAD
        $a      = new StdClass;
        $a->foo = 'bar';

        $b      = new StdClass;
=======
        $a      = new stdClass;
        $a->foo = 'bar';

        $b      = new stdClass;
>>>>>>> dev
        $b->bar = 'foo';

        $this->assertEquals($a, $b, 'message');
    }

    public function testAssertNullEqualsString()
    {
        $this->assertEquals(null, 'bar', 'message');
    }

    public function testAssertStringEqualsString()
    {
        $this->assertEquals('foo', 'bar', 'message');
    }

    public function testAssertTextEqualsText()
    {
        $this->assertEquals("foo\nbar\n", "foo\nbaz\n", 'message');
    }

    public function testAssertStringMatchesFormat()
    {
        $this->assertStringMatchesFormat('*%s*', '**', 'message');
    }

    public function testAssertNumericEqualsNumeric()
    {
        $this->assertEquals(1, 2, 'message');
    }

    public function testAssertTextSameText()
    {
        $this->assertSame('foo', 'bar', 'message');
    }

    public function testAssertObjectSameObject()
    {
<<<<<<< HEAD
        $this->assertSame(new StdClass, new StdClass, 'message');
=======
        $this->assertSame(new stdClass, new stdClass, 'message');
>>>>>>> dev
    }

    public function testAssertObjectSameNull()
    {
<<<<<<< HEAD
        $this->assertSame(new StdClass, null, 'message');
=======
        $this->assertSame(new stdClass, null, 'message');
>>>>>>> dev
    }

    public function testAssertFloatSameFloat()
    {
        $this->assertSame(1.0, 1.5, 'message');
    }

    // Note that due to the implementation of this assertion it counts as 2 asserts
    public function testAssertStringMatchesFormatFile()
    {
        $this->assertStringMatchesFormatFile(__DIR__ . '/expectedFileFormat.txt', '...BAR...');
    }
}
