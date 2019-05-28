<?php
<<<<<<< HEAD
class NotExistingCoveredElementTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NotExistingCoveredElementTest extends TestCase
>>>>>>> dev
{
    /**
     * @covers NotExistingClass
     */
    public function testOne()
    {
    }

    /**
     * @covers NotExistingClass::notExistingMethod
     */
    public function testTwo()
    {
    }

    /**
     * @covers NotExistingClass::<public>
     */
    public function testThree()
    {
    }
}
