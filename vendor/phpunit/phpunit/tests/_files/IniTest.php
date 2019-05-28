<?php
<<<<<<< HEAD
class IniTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class IniTest extends TestCase
>>>>>>> dev
{
    public function testIni()
    {
        $this->assertEquals('application/x-test', ini_get('default_mimetype'));
    }
}
