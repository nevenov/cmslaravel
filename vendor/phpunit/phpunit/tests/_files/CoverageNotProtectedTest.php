<?php
<<<<<<< HEAD
class CoverageNotProtectedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageNotProtectedTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<!protected>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
