<?php
<<<<<<< HEAD
class TestSkipped extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class TestSkipped extends TestCase
>>>>>>> dev
{
    protected function runTest()
    {
        $this->markTestSkipped('Skipped test');
    }
}
