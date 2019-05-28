<?php
<<<<<<< HEAD
class WasRun extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class WasRun extends TestCase
>>>>>>> dev
{
    public $wasRun = false;

    protected function runTest()
    {
        $this->wasRun = true;
    }
}
