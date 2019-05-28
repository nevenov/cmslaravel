<?php
<<<<<<< HEAD
class NamespaceCoverageNotPublicTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageNotPublicTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass::<!public>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
