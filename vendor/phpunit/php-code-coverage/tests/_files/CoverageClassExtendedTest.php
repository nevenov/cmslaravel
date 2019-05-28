<?php
<<<<<<< HEAD
class CoverageClassExtendedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageClassExtendedTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass<extended>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
