<?php
<<<<<<< HEAD
class DataProviderIncompleteTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class DataProviderIncompleteTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider incompleteTestProviderMethod
     */
    public function testIncomplete($a, $b, $c)
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

    public function incompleteTestProviderMethod()
    {
        $this->markTestIncomplete('incomplete');

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
