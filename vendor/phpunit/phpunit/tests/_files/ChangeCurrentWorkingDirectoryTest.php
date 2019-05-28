<?php
<<<<<<< HEAD
class ChangeCurrentWorkingDirectoryTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class ChangeCurrentWorkingDirectoryTest extends TestCase
>>>>>>> dev
{
    public function testSomethingThatChangesTheCwd()
    {
        chdir('../');
        $this->assertTrue(true);
    }
}
