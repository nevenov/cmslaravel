<?php
<<<<<<< HEAD
class NamespaceCoveragePrivateTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NamespaceCoveragePrivateTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers Foo\CoveredClass::<private>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
