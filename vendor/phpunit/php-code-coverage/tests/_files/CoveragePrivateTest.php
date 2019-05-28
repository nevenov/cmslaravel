<?php
<<<<<<< HEAD
class CoveragePrivateTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoveragePrivateTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::<private>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
