<?php
<<<<<<< HEAD
abstract class AbstractTest extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
=======
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
>>>>>>> dev
    }
}
