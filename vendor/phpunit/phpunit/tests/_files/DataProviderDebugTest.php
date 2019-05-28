<?php
<<<<<<< HEAD
class DataProviderDebugTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class DataProviderDebugTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider provider
     */
    public function testProvider()
    {
        $this->assertTrue(true);
    }

    public static function provider()
    {
        $obj2      = new \stdClass();
        $obj2->foo = 'bar';

<<<<<<< HEAD
        $obj3 = (object) array(1,2,"Test\r\n",4,5,6,7,8);
=======
        $obj3 = (object) [1,2,"Test\r\n",4,5,6,7,8];
>>>>>>> dev

        $obj = new \stdClass();
        //@codingStandardsIgnoreStart
        $obj->null = null;
        //@codingStandardsIgnoreEnd
        $obj->boolean     = true;
        $obj->integer     = 1;
        $obj->double      = 1.2;
        $obj->string      = '1';
        $obj->text        = "this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext";
        $obj->object      = $obj2;
        $obj->objectagain = $obj2;
<<<<<<< HEAD
        $obj->array       = array('foo' => 'bar');
=======
        $obj->array       = ['foo' => 'bar'];
>>>>>>> dev
        $obj->self        = $obj;

        $storage = new \SplObjectStorage();
        $storage->attach($obj2);
        $storage->foo = $obj2;

<<<<<<< HEAD
        return array(
            array(null, true, 1, 1.0),
            array(1.2, fopen('php://memory', 'r'), '1'),
            array(array(array(1,2,3), array(3,4,5))),
            // \n\r and \r is converted to \n
            array("this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext"),
            array(new \stdClass(), $obj, array(), $storage, $obj3),
            array(chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5), implode('', array_map('chr', range(0x0e, 0x1f)))),
            array(chr(0x00) . chr(0x09))
        );
=======
        return [
            [null, true, 1, 1.0],
            [1.2, fopen('php://memory', 'r'), '1'],
            [[[1,2,3], [3,4,5]]],
            // \n\r and \r is converted to \n
            ["this\nis\na\nvery\nvery\nvery\nvery\nvery\nvery\rlong\n\rtext"],
            [new \stdClass(), $obj, [], $storage, $obj3],
            [chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5), implode('', array_map('chr', range(0x0e, 0x1f)))],
            [chr(0x00) . chr(0x09)]
        ];
>>>>>>> dev
    }
}
