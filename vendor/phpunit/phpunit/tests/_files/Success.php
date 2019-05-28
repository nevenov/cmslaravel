<?php
<<<<<<< HEAD
class Success extends PHPUnit_Framework_TestCase
{
    protected function runTest()
    {
=======
use PHPUnit\Framework\TestCase;

class Success extends TestCase
{
    protected function runTest()
    {
        $this->assertTrue(true);
>>>>>>> dev
    }
}
