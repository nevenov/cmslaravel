<?php
<<<<<<< HEAD
class CoverageNotPublicTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageNotPublicTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<!public>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
