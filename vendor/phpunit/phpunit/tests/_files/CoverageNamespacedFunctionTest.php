<?php
<<<<<<< HEAD
class CoverageNamespacedFunctionTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class CoverageNamespacedFunctionTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers foo\func()
     */
    public function testFunc()
    {
        foo\func();
    }
}
