<?php
<<<<<<< HEAD
class Failure extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class Failure extends TestCase
>>>>>>> dev
{
    protected function runTest()
    {
        $this->fail();
    }
}
