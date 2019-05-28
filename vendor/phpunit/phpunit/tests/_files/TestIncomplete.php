<?php
<<<<<<< HEAD
class TestIncomplete extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class TestIncomplete extends TestCase
>>>>>>> dev
{
    protected function runTest()
    {
        $this->markTestIncomplete('Incomplete test');
    }
}
