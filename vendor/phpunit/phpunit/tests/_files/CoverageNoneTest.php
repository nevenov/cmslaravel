<?php
<<<<<<< HEAD
class CoverageNoneTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageNoneTest extends TestCase
>>>>>>> dev
{
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
