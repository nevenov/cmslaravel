<?php
<<<<<<< HEAD
class DataProviderFilterTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class DataProviderFilterTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider truthProvider
     */
    public function testTrue($truth)
    {
        $this->assertTrue($truth);
    }

    public static function truthProvider()
    {
<<<<<<< HEAD
        return array(
           array(true),
           array(true),
           array(true),
           array(true)
        );
=======
        return [
           [true],
           [true],
           [true],
           [true]
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider falseProvider
     */
    public function testFalse($false)
    {
        $this->assertFalse($false);
    }

    public static function falseProvider()
    {
<<<<<<< HEAD
        return array(
          'false test'       => array(false),
          'false test 2'     => array(false),
          'other false test' => array(false),
          'other false test2'=> array(false)
        );
=======
        return [
          'false test'       => [false],
          'false test 2'     => [false],
          'other false test' => [false],
          'other false test2'=> [false]
        ];
>>>>>>> dev
    }
}
