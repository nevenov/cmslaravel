<?php
<<<<<<< HEAD
class CoverageMethodParenthesesWhitespaceTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageMethodParenthesesWhitespaceTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers CoveredClass::publicMethod ( )
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
