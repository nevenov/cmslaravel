<?php
<<<<<<< HEAD
class NamespaceCoverageClassExtendedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageClassExtendedTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass<extended>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
