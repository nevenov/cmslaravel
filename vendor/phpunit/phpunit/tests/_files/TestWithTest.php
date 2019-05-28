<?php
<<<<<<< HEAD
class TestWithTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class TestWithTest extends TestCase
>>>>>>> dev
{
    /**
     * @testWith [0, 0, 0]
     *           [0, 1, 1]
     *           [1, 2, 3]
     *           [20, 22, 42]
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }

    public static function providerMethod()
    {
<<<<<<< HEAD
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
          array(1, 1, 3),
          array(1, 0, 1)
        );
=======
        return [
          [0, 0, 0],
          [0, 1, 1],
          [1, 1, 3],
          [1, 0, 1]
        ];
>>>>>>> dev
    }
}
