<?php

<<<<<<< HEAD
class CoverageMethodOneLineAnnotationTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageMethodOneLineAnnotationTest extends TestCase
>>>>>>> dev
{
    /** @covers CoveredClass::publicMethod */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
