<?php
<<<<<<< HEAD
class CoveragePublicTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoveragePublicTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<public>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
