<?php

<<<<<<< HEAD
class FatalTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class FatalTest extends TestCase
>>>>>>> dev
{
    public function testFatalError()
    {
        if (extension_loaded('xdebug')) {
            xdebug_disable();
        }

        eval('class FatalTest {}');
    }
}
