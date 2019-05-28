<?php
<<<<<<< HEAD
class NamespaceCoverageClassTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageClassTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
