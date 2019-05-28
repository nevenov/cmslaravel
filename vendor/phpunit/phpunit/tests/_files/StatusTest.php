<?php
<<<<<<< HEAD
class StatusTest extends PHPUnit_Framework_TestCase
=======
namespace vendor\project;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;

class StatusTest extends TestCase
>>>>>>> dev
{
    public function testSuccess()
    {
        $this->assertTrue(true);
    }

    public function testFailure()
    {
        $this->assertTrue(false);
    }

    public function testError()
    {
<<<<<<< HEAD
        throw new \Exception;
=======
        throw new \RuntimeException;
>>>>>>> dev
    }

    public function testIncomplete()
    {
        $this->markTestIncomplete();
    }

    public function testSkipped()
    {
        $this->markTestSkipped();
    }

    public function testRisky()
    {
    }
<<<<<<< HEAD
=======

    public function testWarning()
    {
        throw new Warning;
    }
>>>>>>> dev
}
