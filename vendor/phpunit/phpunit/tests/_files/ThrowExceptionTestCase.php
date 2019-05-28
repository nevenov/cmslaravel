<?php
<<<<<<< HEAD
class ThrowExceptionTestCase extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class ThrowExceptionTestCase extends TestCase
>>>>>>> dev
{
    public function test()
    {
        throw new RuntimeException('A runtime error occurred');
    }
}
