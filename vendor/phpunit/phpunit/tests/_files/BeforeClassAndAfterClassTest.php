<?php
<<<<<<< HEAD
class BeforeClassAndAfterClassTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class BeforeClassAndAfterClassTest extends TestCase
>>>>>>> dev
{
    public static $beforeClassWasRun = 0;
    public static $afterClassWasRun  = 0;

    public static function resetProperties()
    {
        self::$beforeClassWasRun = 0;
        self::$afterClassWasRun  = 0;
    }

    /**
     * @beforeClass
     */
    public static function initialClassSetup()
    {
        self::$beforeClassWasRun++;
    }

    /**
     * @afterClass
     */
    public static function finalClassTeardown()
    {
        self::$afterClassWasRun++;
    }

    public function test1()
    {
    }
    public function test2()
    {
    }
}
