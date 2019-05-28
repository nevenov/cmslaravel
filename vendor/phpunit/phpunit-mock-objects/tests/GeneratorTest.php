<?php
<<<<<<< HEAD
class Framework_MockObject_GeneratorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PHPUnit_Framework_MockObject_Generator
     */
    protected $generator;

    protected function setUp()
    {
        $this->generator = new PHPUnit_Framework_MockObject_Generator;
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMock
     * @expectedException PHPUnit_Framework_Exception
     */
    public function testGetMockFailsWhenInvalidFunctionNameIsPassedInAsAFunctionToMock()
    {
        $this->generator->getMock('StdClass', array(0));
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMock
     */
    public function testGetMockCanCreateNonExistingFunctions()
    {
        $mock = $this->generator->getMock('StdClass', array('testFunction'));
        $this->assertTrue(method_exists($mock, 'testFunction'));
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMock
     * @expectedException PHPUnit_Framework_MockObject_RuntimeException
     * @expectedExceptionMessage duplicates: "foo, foo"
     */
    public function testGetMockGeneratorFails()
    {
        $mock = $this->generator->getMock('StdClass', array('foo', 'foo'));
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     */
    public function testGetMockForAbstractClassDoesNotFailWhenFakingInterfaces()
    {
        $mock = $this->generator->getMockForAbstractClass('Countable');
        $this->assertTrue(method_exists($mock, 'count'));
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     */
    public function testGetMockForAbstractClassStubbingAbstractClass()
    {
        $mock = $this->generator->getMockForAbstractClass('AbstractMockTestClass');
        $this->assertTrue(method_exists($mock, 'doSomething'));
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     */
    public function testGetMockForAbstractClassWithNonExistentMethods()
    {
        $mock = $this->generator->getMockForAbstractClass(
            'AbstractMockTestClass',
            array(),
=======
/*
 * This file is part of the phpunit-mock-objects package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\MockObject\Generator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \PHPUnit\Framework\MockObject\Generator
 *
 * @uses \PHPUnit\Framework\MockObject\InvocationMocker
 * @uses \PHPUnit\Framework\MockObject\Builder\InvocationMocker
 * @uses \PHPUnit\Framework\MockObject\Invocation\ObjectInvocation
 * @uses \PHPUnit\Framework\MockObject\Invocation\StaticInvocation
 * @uses \PHPUnit\Framework\MockObject\Matcher
 * @uses \PHPUnit\Framework\MockObject\Matcher\InvokedRecorder
 * @uses \PHPUnit\Framework\MockObject\Matcher\MethodName
 * @uses \PHPUnit\Framework\MockObject\Stub\ReturnStub
 * @uses \PHPUnit\Framework\MockObject\Matcher\InvokedCount
 */
class GeneratorTest extends TestCase
{
    /**
     * @var Generator
     */
    private $generator;

    protected function setUp()
    {
        $this->generator = new Generator;
    }

    public function testGetMockFailsWhenInvalidFunctionNameIsPassedInAsAFunctionToMock()
    {
        $this->expectException(\PHPUnit\Framework\MockObject\RuntimeException::class);

        $this->generator->getMock(stdClass::class, [0]);
    }

    public function testGetMockCanCreateNonExistingFunctions()
    {
        $mock = $this->generator->getMock(stdClass::class, ['testFunction']);

        $this->assertTrue(method_exists($mock, 'testFunction'));
    }

    public function testGetMockGeneratorFails()
    {
        $this->expectException(\PHPUnit\Framework\MockObject\RuntimeException::class);
        $this->expectExceptionMessage('duplicates: "foo, bar, foo" (duplicate: "foo")');

        $this->generator->getMock(stdClass::class, ['foo', 'bar', 'foo']);
    }

    /**
     * @requires PHP 7
     */
    public function testGetMockBlacklistedMethodNamesPhp7()
    {
        $mock = $this->generator->getMock(InterfaceWithSemiReservedMethodName::class);

        $this->assertTrue(method_exists($mock, 'unset'));
        $this->assertInstanceOf(InterfaceWithSemiReservedMethodName::class, $mock);
    }

    public function testGetMockForAbstractClassDoesNotFailWhenFakingInterfaces()
    {
        $mock = $this->generator->getMockForAbstractClass(Countable::class);

        $this->assertTrue(method_exists($mock, 'count'));
    }

    public function testGetMockForAbstractClassStubbingAbstractClass()
    {
        $mock = $this->generator->getMockForAbstractClass(AbstractMockTestClass::class);

        $this->assertTrue(method_exists($mock, 'doSomething'));
    }

    public function testGetMockForAbstractClassWithNonExistentMethods()
    {
        $mock = $this->generator->getMockForAbstractClass(
            AbstractMockTestClass::class,
            [],
>>>>>>> dev
            '',
            true,
            true,
            true,
<<<<<<< HEAD
            array('nonexistentMethod')
=======
            ['nonexistentMethod']
>>>>>>> dev
        );

        $this->assertTrue(method_exists($mock, 'nonexistentMethod'));
        $this->assertTrue(method_exists($mock, 'doSomething'));
    }

<<<<<<< HEAD
    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     */
    public function testGetMockForAbstractClassShouldCreateStubsOnlyForAbstractMethodWhenNoMethodsWereInformed()
    {
        $mock = $this->generator->getMockForAbstractClass('AbstractMockTestClass');
=======
    public function testGetMockForAbstractClassShouldCreateStubsOnlyForAbstractMethodWhenNoMethodsWereInformed()
    {
        $mock = $this->generator->getMockForAbstractClass(AbstractMockTestClass::class);
>>>>>>> dev

        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturn('testing');

        $this->assertEquals('testing', $mock->doSomething());
        $this->assertEquals(1, $mock->returnAnything());
    }

    /**
     * @dataProvider getMockForAbstractClassExpectsInvalidArgumentExceptionDataprovider
<<<<<<< HEAD
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     * @expectedException PHPUnit_Framework_Exception
     */
    public function testGetMockForAbstractClassExpectingInvalidArgumentException($className, $mockClassName)
    {
        $mock = $this->generator->getMockForAbstractClass($className, array(), $mockClassName);
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForAbstractClass
     * @expectedException PHPUnit_Framework_MockObject_RuntimeException
     */
    public function testGetMockForAbstractClassAbstractClassDoesNotExist()
    {
        $mock = $this->generator->getMockForAbstractClass('Tux');
    }

    /**
     * Dataprovider for test "testGetMockForAbstractClassExpectingInvalidArgumentException"
     */
    public static function getMockForAbstractClassExpectsInvalidArgumentExceptionDataprovider()
    {
        return array(
            'className not a string' => array(array(), ''),
            'mockClassName not a string' => array('Countable', new StdClass),
        );
    }

    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMockForTrait
     * @requires PHP 5.4.0
     */
    public function testGetMockForTraitWithNonExistentMethodsAndNonAbstractMethods()
    {
        $mock = $this->generator->getMockForTrait(
            'AbstractTrait',
            array(),
=======
     */
    public function testGetMockForAbstractClassExpectingInvalidArgumentException($className, $mockClassName)
    {
        $this->expectException(PHPUnit\Framework\Exception::class);

        $this->generator->getMockForAbstractClass($className, [], $mockClassName);
    }

    public function testGetMockForAbstractClassAbstractClassDoesNotExist()
    {
        $this->expectException(\PHPUnit\Framework\MockObject\RuntimeException::class);

        $this->generator->getMockForAbstractClass('Tux');
    }

    public function getMockForAbstractClassExpectsInvalidArgumentExceptionDataprovider()
    {
        return [
            'className not a string'     => [[], ''],
            'mockClassName not a string' => [Countable::class, new stdClass],
        ];
    }

    public function testGetMockForTraitWithNonExistentMethodsAndNonAbstractMethods()
    {
        $mock = $this->generator->getMockForTrait(
            AbstractTrait::class,
            [],
>>>>>>> dev
            '',
            true,
            true,
            true,
<<<<<<< HEAD
            array('nonexistentMethod')
=======
            ['nonexistentMethod']
>>>>>>> dev
        );

        $this->assertTrue(method_exists($mock, 'nonexistentMethod'));
        $this->assertTrue(method_exists($mock, 'doSomething'));
        $this->assertTrue($mock->mockableMethod());
        $this->assertTrue($mock->anotherMockableMethod());
    }

<<<<<<< HEAD
    /**
     * @covers   PHPUnit_Framework_MockObject_Generator::getMockForTrait
     * @requires PHP 5.4.0
     */
    public function testGetMockForTraitStubbingAbstractMethod()
    {
        $mock = $this->generator->getMockForTrait('AbstractTrait');
        $this->assertTrue(method_exists($mock, 'doSomething'));
    }

    /**
     * @requires PHP 5.4.0
     */
    public function testGetMockForSingletonWithReflectionSuccess()
    {
        // Probably, this should be moved to tests/autoload.php
        require_once __DIR__ . '/_fixture/SingletonClass.php';

        $mock = $this->generator->getMock('SingletonClass', array('doSomething'), array(), '', false);
        $this->assertInstanceOf('SingletonClass', $mock);
    }

    /**
     * Same as "testGetMockForSingletonWithReflectionSuccess", but we expect
     * warning for PHP < 5.4.0 since PHPUnit will try to execute private __wakeup
     * on unserialize
     */
    public function testGetMockForSingletonWithUnserializeFail()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $this->markTestSkipped('Only for PHP < 5.4.0');
        }

        $this->setExpectedException('PHPUnit_Framework_MockObject_RuntimeException');

        // Probably, this should be moved to tests/autoload.php
        require_once __DIR__ . '/_fixture/SingletonClass.php';

        $mock = $this->generator->getMock('SingletonClass', array('doSomething'), array(), '', false);
    }

    /**
     * ReflectionClass::getMethods for SoapClient on PHP 5.3 produces PHP Fatal Error
     * @runInSeparateProcess
     */
    public function testGetMockForSoapClientReflectionMethodsDuplication()
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $this->markTestSkipped('Only for PHP < 5.4.0');
        }

        $mock = $this->generator->getMock('SoapClient', array(), array(), '', false);
        $this->assertInstanceOf('SoapClient', $mock);
=======
    public function testGetMockForTraitStubbingAbstractMethod()
    {
        $mock = $this->generator->getMockForTrait(AbstractTrait::class);

        $this->assertTrue(method_exists($mock, 'doSomething'));
    }

    public function testGetMockForSingletonWithReflectionSuccess()
    {
        $mock = $this->generator->getMock(SingletonClass::class, ['doSomething'], [], '', false);

        $this->assertInstanceOf('SingletonClass', $mock);
    }

    public function testExceptionIsRaisedForMutuallyExclusiveOptions()
    {
        $this->expectException(\PHPUnit\Framework\MockObject\RuntimeException::class);

        $this->generator->getMock(stdClass::class, [], [], '', false, true, true, true, true);
    }

    /**
     * @requires PHP 7
     */
    public function testCanImplementInterfacesThatHaveMethodsWithReturnTypes()
    {
        $stub = $this->generator->getMock([AnInterfaceWithReturnType::class, AnInterface::class]);

        $this->assertInstanceOf(AnInterfaceWithReturnType::class, $stub);
        $this->assertInstanceOf(AnInterface::class, $stub);
        $this->assertInstanceOf(MockObject::class, $stub);
    }

    public function testCanConfigureMethodsForDoubleOfNonExistentClass()
    {
        $className = 'X' . md5(microtime());

        $mock = $this->generator->getMock($className, ['someMethod']);

        $this->assertInstanceOf($className, $mock);
    }

    public function testCanInvokeMethodsOfNonExistentClass()
    {
        $className = 'X' . md5(microtime());

        $mock = $this->generator->getMock($className, ['someMethod']);

        $mock->expects($this->once())->method('someMethod');

        $this->assertNull($mock->someMethod());
>>>>>>> dev
    }
}
