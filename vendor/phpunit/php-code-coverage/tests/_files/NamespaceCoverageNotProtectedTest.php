<?php
<<<<<<< HEAD
class NamespaceCoverageNotProtectedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageNotProtectedTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass::<!protected>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
