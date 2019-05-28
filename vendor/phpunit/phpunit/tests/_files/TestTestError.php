<?php
<<<<<<< HEAD
class TestError extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class TestError extends TestCase
>>>>>>> dev
{
    protected function runTest()
    {
        throw new Exception;
    }
}
