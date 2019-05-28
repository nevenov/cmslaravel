<?php
<<<<<<< HEAD
class CoverageFunctionParenthesesWhitespaceTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageFunctionParenthesesWhitespaceTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers ::globalFunction ( )
     */
    public function testSomething()
    {
        globalFunction();
    }
}
