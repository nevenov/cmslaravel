<?php
<<<<<<< HEAD
class CoverageProtectedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageProtectedTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<protected>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
