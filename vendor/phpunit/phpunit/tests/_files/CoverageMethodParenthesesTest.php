<?php
<<<<<<< HEAD
class CoverageMethodParenthesesTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageMethodParenthesesTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::publicMethod()
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
