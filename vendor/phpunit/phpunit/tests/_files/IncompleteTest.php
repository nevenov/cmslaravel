<?php
<<<<<<< HEAD
class IncompleteTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class IncompleteTest extends TestCase
>>>>>>> dev
{
    public function testIncomplete()
    {
        $this->markTestIncomplete('Test incomplete');
    }
}
