<?php
<<<<<<< HEAD
class NamespaceCoverageNotPrivateTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoverageNotPrivateTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass::<!private>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
