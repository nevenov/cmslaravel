<?php
<<<<<<< HEAD
class CoverageNotPrivateTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageNotPrivateTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<!private>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
