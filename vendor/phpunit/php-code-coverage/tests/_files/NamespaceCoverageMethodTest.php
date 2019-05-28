<?php
<<<<<<< HEAD
class NamespaceCoverageMethodTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageMethodTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass::publicMethod
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
