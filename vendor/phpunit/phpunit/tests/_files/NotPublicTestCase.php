<?php
<<<<<<< HEAD
class NotPublicTestCase extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class NotPublicTestCase extends TestCase
>>>>>>> dev
{
    public function testPublic()
    {
    }

    protected function testNotPublic()
    {
    }
}
