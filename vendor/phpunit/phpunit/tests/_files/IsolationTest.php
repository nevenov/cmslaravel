<?php
<<<<<<< HEAD
class IsolationTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class IsolationTest extends TestCase
>>>>>>> dev
{
    public function testIsInIsolationReturnsFalse()
    {
        $this->assertFalse($this->isInIsolation());
    }

    public function testIsInIsolationReturnsTrue()
    {
        $this->assertTrue($this->isInIsolation());
    }
}
