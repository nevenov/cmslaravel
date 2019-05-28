<?php
<<<<<<< HEAD
class CoverageFunctionTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageFunctionTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers ::globalFunction
     */
    public function testSomething()
    {
        globalFunction();
    }
}
