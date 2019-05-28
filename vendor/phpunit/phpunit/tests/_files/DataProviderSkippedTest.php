<?php
<<<<<<< HEAD
class DataProviderSkippedTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class DataProviderSkippedTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider skippedTestProviderMethod
     */
    public function testSkipped($a, $b, $c)
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider providerMethod
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }

    public function skippedTestProviderMethod()
    {
        $this->markTestSkipped('skipped');

<<<<<<< HEAD
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
        );
=======
        return [
          [0, 0, 0],
          [0, 1, 1],
        ];
>>>>>>> dev
    }

    public static function providerMethod()
    {
<<<<<<< HEAD
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
        );
=======
        return [
          [0, 0, 0],
          [0, 1, 1],
        ];
>>>>>>> dev
    }
}
