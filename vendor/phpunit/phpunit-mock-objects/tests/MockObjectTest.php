<?php
/*
<<<<<<< HEAD
 * This file is part of the PHPUnit_MockObject package.
=======
 * This file is part of the phpunit-mock-objects package.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
/**
 *
 *
 * @since      Class available since Release 3.0.0
 */
class Framework_MockObjectTest extends PHPUnit_Framework_TestCase
{
    public function testMockedMethodIsNeverCalled()
    {
        $mock = $this->getMock('AnInterface');
=======
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\ExpectationFailedException;

class MockObjectTest extends TestCase
{
    public function testMockedMethodIsNeverCalled()
    {
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->never())
             ->method('doSomething');
    }

    public function testMockedMethodIsNeverCalledWithParameter()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass');
        $mock->expects($this->never())
            ->method('doSomething')
            ->with('someArg');
    }

    public function testMockedMethodIsNotCalledWhenExpectsAnyWithParameter()
    {
        $mock = $this->getMock('SomeClass');
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->getMock();

        $mock->expects($this->never())
             ->method('doSomething')
             ->with('someArg');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testMockedMethodIsNotCalledWhenExpectsAnyWithParameter()
    {
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomethingElse')
             ->with('someArg');
    }

<<<<<<< HEAD
    public function testMockedMethodIsNotCalledWhenMethodSpecifiedDirectlyWithParameter()
    {
        $mock = $this->getMock('SomeClass');
        $mock->method('doSomethingElse')
            ->with('someArg');
=======
    /**
     * @doesNotPerformAssertions
     */
    public function testMockedMethodIsNotCalledWhenMethodSpecifiedDirectlyWithParameter()
    {
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->getMock();

        $mock->method('doSomethingElse')
             ->with('someArg');
>>>>>>> dev
    }

    public function testMockedMethodIsCalledAtLeastOnce()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atLeastOnce())
             ->method('doSomething');

        $mock->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastOnce2()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atLeastOnce())
             ->method('doSomething');

        $mock->doSomething();
        $mock->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastTwice()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atLeast(2))
             ->method('doSomething');

        $mock->doSomething();
        $mock->doSomething();
    }

    public function testMockedMethodIsCalledAtLeastTwice2()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atLeast(2))
             ->method('doSomething');

        $mock->doSomething();
        $mock->doSomething();
        $mock->doSomething();
    }

    public function testMockedMethodIsCalledAtMostTwice()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atMost(2))
             ->method('doSomething');

        $mock->doSomething();
        $mock->doSomething();
    }

    public function testMockedMethodIsCalledAtMosttTwice2()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->atMost(2))
             ->method('doSomething');

        $mock->doSomething();
    }

    public function testMockedMethodIsCalledOnce()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('doSomething');

        $mock->doSomething();
    }

    public function testMockedMethodIsCalledOnceWithParameter()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass');
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('doSomethingElse')
             ->with($this->equalTo('something'));

        $mock->doSomethingElse('something');
    }

    public function testMockedMethodIsCalledExactly()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->exactly(2))
             ->method('doSomething');

        $mock->doSomething();
        $mock->doSomething();
    }

    public function testStubbedException()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->throwException(new Exception));

        try {
            $mock->doSomething();
        } catch (Exception $e) {
            return;
        }

        $this->fail();
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->throwException(new \Exception()));

        $this->expectException(\Exception::class);

        $mock->doSomething();
>>>>>>> dev
    }

    public function testStubbedWillThrowException()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
        $mock->expects($this->any())
             ->method('doSomething')
             ->willThrowException(new Exception);

        try {
            $mock->doSomething();
        } catch (Exception $e) {
            return;
        }

        $this->fail();
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

        $mock->expects($this->any())
             ->method('doSomething')
             ->willThrowException(new \Exception());

        $this->expectException(\Exception::class);

        $mock->doSomething();
>>>>>>> dev
    }

    public function testStubbedReturnValue()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->returnValue('something'));

        $this->assertEquals('something', $mock->doSomething());

<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturn('something');

        $this->assertEquals('something', $mock->doSomething());
    }

    public function testStubbedReturnValueMap()
    {
<<<<<<< HEAD
        $map = array(
            array('a', 'b', 'c', 'd'),
            array('e', 'f', 'g', 'h')
        );

        $mock = $this->getMock('AnInterface');
=======
        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];

        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->returnValueMap($map));

        $this->assertEquals('d', $mock->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $mock->doSomething('e', 'f', 'g'));
        $this->assertEquals(null, $mock->doSomething('foo', 'bar'));

<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturnMap($map);

        $this->assertEquals('d', $mock->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $mock->doSomething('e', 'f', 'g'));
        $this->assertEquals(null, $mock->doSomething('foo', 'bar'));
    }

    public function testStubbedReturnArgument()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->returnArgument(1));

        $this->assertEquals('b', $mock->doSomething('a', 'b'));

<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturnArgument(1);

        $this->assertEquals('b', $mock->doSomething('a', 'b'));
    }

    public function testFunctionCallback()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['doSomething'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback('functionCallback'));

        $this->assertEquals('pass', $mock->doSomething('foo', 'bar'));

<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['doSomething'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('doSomething')
             ->willReturnCallback('functionCallback');

        $this->assertEquals('pass', $mock->doSomething('foo', 'bar'));
    }

    public function testStubbedReturnSelf()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->returnSelf());

        $this->assertEquals($mock, $mock->doSomething());

<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturnSelf();

        $this->assertEquals($mock, $mock->doSomething());
    }

    public function testStubbedReturnOnConsecutiveCalls()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->will($this->onConsecutiveCalls('a', 'b', 'c'));

        $this->assertEquals('a', $mock->doSomething());
        $this->assertEquals('b', $mock->doSomething());
        $this->assertEquals('c', $mock->doSomething());

<<<<<<< HEAD
        $mock = $this->getMock('AnInterface');
=======
        $mock = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->any())
             ->method('doSomething')
             ->willReturnOnConsecutiveCalls('a', 'b', 'c');

        $this->assertEquals('a', $mock->doSomething());
        $this->assertEquals('b', $mock->doSomething());
        $this->assertEquals('c', $mock->doSomething());
    }

    public function testStaticMethodCallback()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $mock->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback(array('MethodCallback', 'staticCallback')));
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['doSomething'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback(['MethodCallback', 'staticCallback']));
>>>>>>> dev

        $this->assertEquals('pass', $mock->doSomething('foo', 'bar'));
    }

    public function testPublicMethodCallback()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('doSomething'), array(), '', false);
        $mock->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback(array(new MethodCallback, 'nonStaticCallback')));
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['doSomething'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('doSomething')
             ->will($this->returnCallback([new MethodCallback, 'nonStaticCallback']));
>>>>>>> dev

        $this->assertEquals('pass', $mock->doSomething('foo', 'bar'));
    }

    public function testMockClassOnlyGeneratedOnce()
    {
<<<<<<< HEAD
        $mock1 = $this->getMock('AnInterface');
        $mock2 = $this->getMock('AnInterface');
=======
        $mock1 = $this->getMockBuilder(AnInterface::class)
                     ->getMock();

        $mock2 = $this->getMockBuilder(AnInterface::class)
                     ->getMock();
>>>>>>> dev

        $this->assertEquals(get_class($mock1), get_class($mock2));
    }

    public function testMockClassDifferentForPartialMocks()
    {
<<<<<<< HEAD
        $mock1 = $this->getMock('PartialMockTestClass');
        $mock2 = $this->getMock('PartialMockTestClass', array('doSomething'));
        $mock3 = $this->getMock('PartialMockTestClass', array('doSomething'));
        $mock4 = $this->getMock('PartialMockTestClass', array('doAnotherThing'));
        $mock5 = $this->getMock('PartialMockTestClass', array('doAnotherThing'));
=======
        $mock1 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->getMock();

        $mock2 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMethods(['doSomething'])
                      ->getMock();

        $mock3 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMethods(['doSomething'])
                      ->getMock();

        $mock4 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMethods(['doAnotherThing'])
                      ->getMock();

        $mock5 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMethods(['doAnotherThing'])
                      ->getMock();
>>>>>>> dev

        $this->assertNotEquals(get_class($mock1), get_class($mock2));
        $this->assertNotEquals(get_class($mock1), get_class($mock3));
        $this->assertNotEquals(get_class($mock1), get_class($mock4));
        $this->assertNotEquals(get_class($mock1), get_class($mock5));
        $this->assertEquals(get_class($mock2), get_class($mock3));
        $this->assertNotEquals(get_class($mock2), get_class($mock4));
        $this->assertNotEquals(get_class($mock2), get_class($mock5));
        $this->assertEquals(get_class($mock4), get_class($mock5));
    }

    public function testMockClassStoreOverrulable()
    {
<<<<<<< HEAD
        $mock1 = $this->getMock('PartialMockTestClass');
        $mock2 = $this->getMock('PartialMockTestClass', array(), array(), 'MyMockClassNameForPartialMockTestClass1');
        $mock3 = $this->getMock('PartialMockTestClass');
        $mock4 = $this->getMock('PartialMockTestClass', array('doSomething'), array(), 'AnotherMockClassNameForPartialMockTestClass');
        $mock5 = $this->getMock('PartialMockTestClass', array(), array(), 'MyMockClassNameForPartialMockTestClass2');
=======
        $mock1 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->getMock();

        $mock2 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMockClassName('MyMockClassNameForPartialMockTestClass1')
                      ->getMock();

        $mock3 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->getMock();

        $mock4 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMethods(['doSomething'])
                      ->setMockClassName('AnotherMockClassNameForPartialMockTestClass')
                      ->getMock();

        $mock5 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->setMockClassName('MyMockClassNameForPartialMockTestClass2')
                      ->getMock();
>>>>>>> dev

        $this->assertNotEquals(get_class($mock1), get_class($mock2));
        $this->assertEquals(get_class($mock1), get_class($mock3));
        $this->assertNotEquals(get_class($mock1), get_class($mock4));
        $this->assertNotEquals(get_class($mock2), get_class($mock3));
        $this->assertNotEquals(get_class($mock2), get_class($mock4));
        $this->assertNotEquals(get_class($mock2), get_class($mock5));
        $this->assertNotEquals(get_class($mock3), get_class($mock4));
        $this->assertNotEquals(get_class($mock3), get_class($mock5));
        $this->assertNotEquals(get_class($mock4), get_class($mock5));
    }

<<<<<<< HEAD
    /**
     * @covers PHPUnit_Framework_MockObject_Generator::getMock
     */
    public function testGetMockWithFixedClassNameCanProduceTheSameMockTwice()
    {
        $mock = $this->getMockBuilder('StdClass')->setMockClassName('FixedName')->getMock();
        $mock = $this->getMockBuilder('StdClass')->setMockClassName('FixedName')->getMock();
        $this->assertInstanceOf('StdClass', $mock);
=======
    public function testGetMockWithFixedClassNameCanProduceTheSameMockTwice()
    {
        $mock = $this->getMockBuilder(stdClass::class)->setMockClassName('FixedName')->getMock();
        $mock = $this->getMockBuilder(stdClass::class)->setMockClassName('FixedName')->getMock();
        $this->assertInstanceOf(stdClass::class, $mock);
>>>>>>> dev
    }

    public function testOriginalConstructorSettingConsidered()
    {
<<<<<<< HEAD
        $mock1 = $this->getMock('PartialMockTestClass');
        $mock2 = $this->getMock('PartialMockTestClass', array(), array(), '', false);
=======
        $mock1 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->getMock();

        $mock2 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->disableOriginalConstructor()
                      ->getMock();
>>>>>>> dev

        $this->assertTrue($mock1->constructorCalled);
        $this->assertFalse($mock2->constructorCalled);
    }

    public function testOriginalCloneSettingConsidered()
    {
<<<<<<< HEAD
        $mock1 = $this->getMock('PartialMockTestClass');
        $mock2 = $this->getMock('PartialMockTestClass', array(), array(), '', true, false);
=======
        $mock1 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->getMock();

        $mock2 = $this->getMockBuilder(PartialMockTestClass::class)
                      ->disableOriginalClone()
                      ->getMock();
>>>>>>> dev

        $this->assertNotEquals(get_class($mock1), get_class($mock2));
    }

    public function testGetMockForAbstractClass()
    {
<<<<<<< HEAD
        $mock = $this->getMock('AbstractMockTestClass');
=======
        $mock = $this->getMockBuilder(AbstractMockTestClass::class)
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->never())
             ->method('doSomething');
    }

<<<<<<< HEAD
    public function traversableProvider()
    {
        return array(
          array('Traversable'),
          array('\Traversable'),
          array('TraversableMockTestInterface'),
          array(array('Traversable')),
          array(array('Iterator','Traversable')),
          array(array('\Iterator','\Traversable'))
        );
    }

=======
>>>>>>> dev
    /**
     * @dataProvider traversableProvider
     */
    public function testGetMockForTraversable($type)
    {
<<<<<<< HEAD
        $mock = $this->getMock($type);
        $this->assertInstanceOf('Traversable', $mock);
=======
        $mock = $this->getMockBuilder($type)
                     ->getMock();

        $this->assertInstanceOf(Traversable::class, $mock);
>>>>>>> dev
    }

    public function testMultipleInterfacesCanBeMockedInSingleObject()
    {
<<<<<<< HEAD
        $mock = $this->getMock(array('AnInterface', 'AnotherInterface'));
        $this->assertInstanceOf('AnInterface', $mock);
        $this->assertInstanceOf('AnotherInterface', $mock);
    }

    /**
     * @requires PHP 5.4.0
     */
    public function testGetMockForTrait()
    {
        $mock = $this->getMockForTrait('AbstractTrait');
        $mock->expects($this->never())->method('doSomething');
=======
        $mock = $this->getMockBuilder([AnInterface::class, AnotherInterface::class])
                     ->getMock();

        $this->assertInstanceOf(AnInterface::class, $mock);
        $this->assertInstanceOf(AnotherInterface::class, $mock);
    }

    public function testGetMockForTrait()
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->never())
             ->method('doSomething');
>>>>>>> dev

        $parent = get_parent_class($mock);
        $traits = class_uses($parent, false);

<<<<<<< HEAD
        $this->assertContains('AbstractTrait', $traits);
=======
        $this->assertContains(AbstractTrait::class, $traits);
>>>>>>> dev
    }

    public function testClonedMockObjectShouldStillEqualTheOriginal()
    {
<<<<<<< HEAD
        $a = $this->getMock('stdClass');
        $b = clone $a;
=======
        $a = $this->getMockBuilder(stdClass::class)
                  ->getMock();

        $b = clone $a;

>>>>>>> dev
        $this->assertEquals($a, $b);
    }

    public function testMockObjectsConstructedIndepentantlyShouldBeEqual()
    {
<<<<<<< HEAD
        $a = $this->getMock('stdClass');
        $b = $this->getMock('stdClass');
=======
        $a = $this->getMockBuilder(stdClass::class)
                  ->getMock();

        $b = $this->getMockBuilder(stdClass::class)
                  ->getMock();

>>>>>>> dev
        $this->assertEquals($a, $b);
    }

    public function testMockObjectsConstructedIndepentantlyShouldNotBeTheSame()
    {
<<<<<<< HEAD
        $a = $this->getMock('stdClass');
        $b = $this->getMock('stdClass');
=======
        $a = $this->getMockBuilder(stdClass::class)
                  ->getMock();

        $b = $this->getMockBuilder(stdClass::class)
                  ->getMock();

>>>>>>> dev
        $this->assertNotSame($a, $b);
    }

    public function testClonedMockObjectCanBeUsedInPlaceOfOriginalOne()
    {
<<<<<<< HEAD
        $x = $this->getMock('stdClass');
        $y = clone $x;

        $mock = $this->getMock('stdClass', array('foo'));
        $mock->expects($this->once())->method('foo')->with($this->equalTo($x));
=======
        $x = $this->getMockBuilder(stdClass::class)
                  ->getMock();

        $y = clone $x;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->setMethods(['foo'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('foo')
             ->with($this->equalTo($x));

>>>>>>> dev
        $mock->foo($y);
    }

    public function testClonedMockObjectIsNotIdenticalToOriginalOne()
    {
<<<<<<< HEAD
        $x = $this->getMock('stdClass');
        $y = clone $x;

        $mock = $this->getMock('stdClass', array('foo'));
        $mock->expects($this->once())->method('foo')->with($this->logicalNot($this->identicalTo($x)));
=======
        $x = $this->getMockBuilder(stdClass::class)
                  ->getMock();

        $y = clone $x;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->setMethods(['foo'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('foo')
             ->with($this->logicalNot($this->identicalTo($x)));

>>>>>>> dev
        $mock->foo($y);
    }

    public function testObjectMethodCallWithArgumentCloningEnabled()
    {
<<<<<<< HEAD
        $expectedObject = new StdClass;

        $mock = $this->getMockBuilder('SomeClass')
                     ->setMethods(array('doSomethingElse'))
                     ->enableArgumentCloning()
                     ->getMock();

        $actualArguments = array();

        $mock->expects($this->any())
        ->method('doSomethingElse')
        ->will($this->returnCallback(function () use (&$actualArguments) {
            $actualArguments = func_get_args();
        }));
=======
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder('SomeClass')
                     ->setMethods(['doSomethingElse'])
                     ->enableArgumentCloning()
                     ->getMock();

        $actualArguments = [];

        $mock->expects($this->any())
             ->method('doSomethingElse')
             ->will(
                 $this->returnCallback(
                     function () use (&$actualArguments) {
                         $actualArguments = func_get_args();
                     }
                 )
             );
>>>>>>> dev

        $mock->doSomethingElse($expectedObject);

        $this->assertEquals(1, count($actualArguments));
        $this->assertEquals($expectedObject, $actualArguments[0]);
        $this->assertNotSame($expectedObject, $actualArguments[0]);
    }

    public function testObjectMethodCallWithArgumentCloningDisabled()
    {
<<<<<<< HEAD
        $expectedObject = new StdClass;

        $mock = $this->getMockBuilder('SomeClass')
                     ->setMethods(array('doSomethingElse'))
                     ->disableArgumentCloning()
                     ->getMock();

        $actualArguments = array();

        $mock->expects($this->any())
        ->method('doSomethingElse')
        ->will($this->returnCallback(function () use (&$actualArguments) {
            $actualArguments = func_get_args();
        }));
=======
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder('SomeClass')
                     ->setMethods(['doSomethingElse'])
                     ->disableArgumentCloning()
                     ->getMock();

        $actualArguments = [];

        $mock->expects($this->any())
             ->method('doSomethingElse')
             ->will(
                 $this->returnCallback(
                     function () use (&$actualArguments) {
                         $actualArguments = func_get_args();
                     }
                 )
             );
>>>>>>> dev

        $mock->doSomethingElse($expectedObject);

        $this->assertEquals(1, count($actualArguments));
        $this->assertSame($expectedObject, $actualArguments[0]);
    }

    public function testArgumentCloningOptionGeneratesUniqueMock()
    {
        $mockWithCloning = $this->getMockBuilder('SomeClass')
<<<<<<< HEAD
                                ->setMethods(array('doSomethingElse'))
=======
                                ->setMethods(['doSomethingElse'])
>>>>>>> dev
                                ->enableArgumentCloning()
                                ->getMock();

        $mockWithoutCloning = $this->getMockBuilder('SomeClass')
<<<<<<< HEAD
                                   ->setMethods(array('doSomethingElse'))
=======
                                   ->setMethods(['doSomethingElse'])
>>>>>>> dev
                                   ->disableArgumentCloning()
                                   ->getMock();

        $this->assertNotEquals($mockWithCloning, $mockWithoutCloning);
    }

    public function testVerificationOfMethodNameFailsWithoutParameters()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('right');

        $mock->wrong();
<<<<<<< HEAD
        try {
            $mock->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Method was expected to be called 1 times, actually called 0 times.\n",
=======

        try {
            $mock->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (ExpectationFailedException $e) {
            $this->assertSame(
                'Expectation failed for method name is equal to "right" when invoked 1 time(s).' . PHP_EOL .
                'Method was expected to be called 1 times, actually called 0 times.' . PHP_EOL,
>>>>>>> dev
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfMethodNameFailsWithParameters()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('right');

        $mock->wrong();
<<<<<<< HEAD
        try {
            $mock->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Method was expected to be called 1 times, actually called 0 times.\n",
=======

        try {
            $mock->__phpunit_verify();
            $this->fail('Expected exception');
        } catch (ExpectationFailedException $e) {
            $this->assertSame(
                'Expectation failed for method name is equal to "right" when invoked 1 time(s).' . PHP_EOL .
                'Method was expected to be called 1 times, actually called 0 times.' . PHP_EOL,
>>>>>>> dev
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfMethodNameFailsWithWrongParameters()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
        $mock->expects($this->once())
             ->method('right')
             ->with(array('first', 'second'));

        try {
            $mock->right(array('second'));
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s)\n"
                . "Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.\n"
                . "Failed asserting that two arrays are equal.",
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('right')
             ->with(['first', 'second']);

        try {
            $mock->right(['second']);
        } catch (ExpectationFailedException $e) {
            $this->assertSame(
                'Expectation failed for method name is equal to "right" when invoked 1 time(s)' . PHP_EOL .
                'Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.' . PHP_EOL .
                'Failed asserting that two arrays are equal.',
>>>>>>> dev
                $e->getMessage()
            );
        }

        try {
            $mock->__phpunit_verify();
<<<<<<< HEAD
            $this->fail('Expected exception');
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s).\n"
                . "Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.\n"
                . "Failed asserting that two arrays are equal.\n"
                . "--- Expected\n"
                . "+++ Actual\n"
                . "@@ @@\n"
                . " Array (\n"
                . "-    0 => 'first'\n"
                . "-    1 => 'second'\n"
                . "+    0 => 'second'\n"
                . " )\n",
=======

// CHECKOUT THIS MORE CAREFULLY
//            $this->fail('Expected exception');

        } catch (ExpectationFailedException $e) {
            $this->assertSame(
                'Expectation failed for method name is equal to "right" when invoked 1 time(s).' . PHP_EOL .
                'Parameter 0 for invocation SomeClass::right(Array (...)) does not match expected value.' . PHP_EOL .
                'Failed asserting that two arrays are equal.' . PHP_EOL .
                '--- Expected' . PHP_EOL .
                '+++ Actual' . PHP_EOL .
                '@@ @@' . PHP_EOL .
                ' Array (' . PHP_EOL .
                '-    0 => \'first\'' . PHP_EOL .
                '-    1 => \'second\'' . PHP_EOL .
                '+    0 => \'second\'' . PHP_EOL,
>>>>>>> dev
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfNeverFailsWithEmptyParameters()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->never())
             ->method('right')
             ->with();

        try {
            $mock->right();
            $this->fail('Expected exception');
<<<<<<< HEAD
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
=======
        } catch (ExpectationFailedException $e) {
>>>>>>> dev
            $this->assertSame(
                'SomeClass::right() was not expected to be called.',
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    public function testVerificationOfNeverFailsWithAnyParameters()
    {
<<<<<<< HEAD
        $mock = $this->getMock('SomeClass', array('right', 'wrong'), array(), '', true, true, true);
=======
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->never())
             ->method('right')
             ->withAnyParameters();

        try {
            $mock->right();
            $this->fail('Expected exception');
<<<<<<< HEAD
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
=======
        } catch (ExpectationFailedException $e) {
>>>>>>> dev
            $this->assertSame(
                'SomeClass::right() was not expected to be called.',
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

<<<<<<< HEAD
    /**
     * @ticket 199
     */
    public function testWithAnythingInsteadOfWithAnyParameters()
    {
        $mock = $this->getMock('SomeClass', array('right'), array(), '', true, true, true);
=======
    public function testWithAnythingInsteadOfWithAnyParameters()
    {
        $mock = $this->getMockBuilder(SomeClass::class)
                     ->setMethods(['right', 'wrong'])
                     ->getMock();

>>>>>>> dev
        $mock->expects($this->once())
             ->method('right')
             ->with($this->anything());

        try {
            $mock->right();
            $this->fail('Expected exception');
<<<<<<< HEAD
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->assertSame(
                "Expectation failed for method name is equal to <string:right> when invoked 1 time(s)\n" .
                "Parameter count for invocation SomeClass::right() is too low.\n" .
                "To allow 0 or more parameters with any value, omit ->with() or use ->withAnyParameters() instead.",
=======
        } catch (ExpectationFailedException $e) {
            $this->assertSame(
                'Expectation failed for method name is equal to "right" when invoked 1 time(s)' . PHP_EOL .
                'Parameter count for invocation SomeClass::right() is too low.' . PHP_EOL .
                'To allow 0 or more parameters with any value, omit ->with() or use ->withAnyParameters() instead.',
>>>>>>> dev
                $e->getMessage()
            );
        }

        $this->resetMockObjects();
    }

    /**
     * See https://github.com/sebastianbergmann/phpunit-mock-objects/issues/81
     */
    public function testMockArgumentsPassedByReference()
    {
        $foo = $this->getMockBuilder('MethodCallbackByReference')
<<<<<<< HEAD
                    ->setMethods(array('bar'))
=======
                    ->setMethods(['bar'])
>>>>>>> dev
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $foo->expects($this->any())
            ->method('bar')
<<<<<<< HEAD
            ->will($this->returnCallback(array($foo, 'callback')));
=======
            ->will($this->returnCallback([$foo, 'callback']));
>>>>>>> dev

        $a = $b = $c = 0;

        $foo->bar($a, $b, $c);

        $this->assertEquals(1, $b);
    }

    /**
     * See https://github.com/sebastianbergmann/phpunit-mock-objects/issues/81
     */
    public function testMockArgumentsPassedByReference2()
    {
        $foo = $this->getMockBuilder('MethodCallbackByReference')
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

        $foo->expects($this->any())
            ->method('bar')
            ->will($this->returnCallback(
                function (&$a, &$b, $c) {
                    $b = 1;
                }
            ));

        $a = $b = $c = 0;

        $foo->bar($a, $b, $c);

        $this->assertEquals(1, $b);
    }

    /**
<<<<<<< HEAD
     * https://github.com/sebastianbergmann/phpunit-mock-objects/issues/116
=======
     * @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/116
>>>>>>> dev
     */
    public function testMockArgumentsPassedByReference3()
    {
        $foo = $this->getMockBuilder('MethodCallbackByReference')
<<<<<<< HEAD
                    ->setMethods(array('bar'))
=======
                    ->setMethods(['bar'])
>>>>>>> dev
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

<<<<<<< HEAD
        $a = new stdClass();
=======
        $a = new stdClass;
>>>>>>> dev
        $b = $c = 0;

        $foo->expects($this->any())
            ->method('bar')
            ->with($a, $b, $c)
<<<<<<< HEAD
            ->will($this->returnCallback(array($foo, 'callback')));

        $foo->bar($a, $b, $c);
    }

    /**
     * https://github.com/sebastianbergmann/phpunit/issues/796
=======
            ->will($this->returnCallback([$foo, 'callback']));

        $this->assertNull($foo->bar($a, $b, $c));
    }

    /**
     * @see https://github.com/sebastianbergmann/phpunit/issues/796
>>>>>>> dev
     */
    public function testMockArgumentsPassedByReference4()
    {
        $foo = $this->getMockBuilder('MethodCallbackByReference')
<<<<<<< HEAD
                    ->setMethods(array('bar'))
=======
                    ->setMethods(['bar'])
>>>>>>> dev
                    ->disableOriginalConstructor()
                    ->disableArgumentCloning()
                    ->getMock();

<<<<<<< HEAD
        $a = new stdClass();
=======
        $a = new stdClass;
>>>>>>> dev
        $b = $c = 0;

        $foo->expects($this->any())
            ->method('bar')
<<<<<<< HEAD
            ->with($this->isInstanceOf("stdClass"), $b, $c)
            ->will($this->returnCallback(array($foo, 'callback')));

        $foo->bar($a, $b, $c);
=======
            ->with($this->isInstanceOf(stdClass::class), $b, $c)
            ->will($this->returnCallback([$foo, 'callback']));

        $this->assertNull($foo->bar($a, $b, $c));
>>>>>>> dev
    }

    /**
     * @requires extension soap
     */
    public function testCreateMockFromWsdl()
    {
        $mock = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl', 'WsdlMock');
<<<<<<< HEAD
=======

>>>>>>> dev
        $this->assertStringStartsWith(
            'Mock_WsdlMock_',
            get_class($mock)
        );
    }

    /**
     * @requires extension soap
     */
    public function testCreateNamespacedMockFromWsdl()
    {
        $mock = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl', 'My\\Space\\WsdlMock');
<<<<<<< HEAD
=======

>>>>>>> dev
        $this->assertStringStartsWith(
            'Mock_WsdlMock_',
            get_class($mock)
        );
    }

    /**
     * @requires extension soap
     */
    public function testCreateTwoMocksOfOneWsdlFile()
    {
<<<<<<< HEAD
        $mock = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');
        $mock = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');
=======
        $a = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');
        $b = $this->getMockFromWsdl(__DIR__ . '/_fixture/GoogleSearch.wsdl');

        $this->assertStringStartsWith('Mock_GoogleSearch_', get_class($a));
        $this->assertEquals(get_class($a), get_class($b));
    }

    /**
     * @requires extension soap
     */
    public function testCreateMockOfWsdlFileWithSpecialChars()
    {
        $mock = $this->getMockFromWsdl(__DIR__ . '/_fixture/Go ogle-Sea.rch.wsdl');

        $this->assertStringStartsWith('Mock_GoogleSearch_', get_class($mock));
>>>>>>> dev
    }

    /**
     * @see    https://github.com/sebastianbergmann/phpunit-mock-objects/issues/156
     * @ticket 156
     */
    public function testInterfaceWithStaticMethodCanBeStubbed()
    {
        $this->assertInstanceOf(
<<<<<<< HEAD
            'InterfaceWithStaticMethod',
            $this->getMock('InterfaceWithStaticMethod')
        );
    }

    /**
     * @expectedException PHPUnit_Framework_MockObject_BadMethodCallException
     */
    public function testInvokingStubbedStaticMethodRaisesException()
    {
        $mock = $this->getMock('ClassWithStaticMethod');
=======
            InterfaceWithStaticMethod::class,
            $this->getMockBuilder(InterfaceWithStaticMethod::class)->getMock()
        );
    }

    public function testInvokingStubbedStaticMethodRaisesException()
    {
        $mock = $this->getMockBuilder(ClassWithStaticMethod::class)->getMock();

        $this->expectException(\PHPUnit\Framework\MockObject\BadMethodCallException::class);

>>>>>>> dev
        $mock->staticMethod();
    }

    /**
     * @see    https://github.com/sebastianbergmann/phpunit-mock-objects/issues/171
     * @ticket 171
     */
    public function testStubForClassThatImplementsSerializableCanBeCreatedWithoutInvokingTheConstructor()
    {
        $this->assertInstanceOf(
<<<<<<< HEAD
            'ClassThatImplementsSerializable',
            $this->getMockBuilder('ClassThatImplementsSerializable')
=======
            ClassThatImplementsSerializable::class,
            $this->getMockBuilder(ClassThatImplementsSerializable::class)
>>>>>>> dev
                 ->disableOriginalConstructor()
                 ->getMock()
        );
    }

<<<<<<< HEAD
=======
    public function testGetMockForClassWithSelfTypeHint()
    {
        $this->assertInstanceOf(
            ClassWithSelfTypeHint::class,
            $this->getMockBuilder(ClassWithSelfTypeHint::class)->getMock()
        );
    }

>>>>>>> dev
    private function resetMockObjects()
    {
        $refl = new ReflectionObject($this);
        $refl = $refl->getParentClass();
        $prop = $refl->getProperty('mockObjects');
        $prop->setAccessible(true);
<<<<<<< HEAD
        $prop->setValue($this, array());
=======
        $prop->setValue($this, []);
    }

    public function testStringableClassDoesNotThrow()
    {
        $mock = $this->getMockBuilder(StringableClass::class)->getMock();

        $this->assertInternalType('string', (string) $mock);
    }

    public function testStringableClassCanBeMocked()
    {
        $mock = $this->getMockBuilder(StringableClass::class)->getMock();

        $mock->method('__toString')->willReturn('foo');

        $this->assertSame('foo', (string) $mock);
    }

    public function traversableProvider()
    {
        return [
          ['Traversable'],
          ['\Traversable'],
          ['TraversableMockTestInterface'],
          [['Traversable']],
          [['Iterator','Traversable']],
          [['\Iterator','\Traversable']]
        ];
    }

    public function testParameterCallbackConstraintOnlyEvaluatedOnce()
    {
        $mock                  = $this->getMockBuilder(Foo::class)->setMethods(['bar'])->getMock();
        $expectedNumberOfCalls = 1;
        $callCount             = 0;

        $mock->expects($this->exactly($expectedNumberOfCalls))->method('bar')
            ->with($this->callback(function ($argument) use (&$callCount) {
                return $argument === 'call_' . $callCount++;
            }));

        for ($i = 0; $i < $expectedNumberOfCalls; $i++) {
            $mock->bar('call_' . $i);
        }
    }

    public function testReturnTypesAreMockedCorrectly()
    {
        /** @var ClassWithAllPossibleReturnTypes|MockObject $stub */
        $stub = $this->createMock(ClassWithAllPossibleReturnTypes::class);

        $this->assertNull($stub->methodWithNoReturnTypeDeclaration());
        $this->assertSame('', $stub->methodWithStringReturnTypeDeclaration());
        $this->assertSame(0.0, $stub->methodWithFloatReturnTypeDeclaration());
        $this->assertSame(0, $stub->methodWithIntReturnTypeDeclaration());
        $this->assertFalse($stub->methodWithBoolReturnTypeDeclaration());
        $this->assertSame([], $stub->methodWithArrayReturnTypeDeclaration());
        $this->assertInstanceOf(MockObject::class, $stub->methodWithClassReturnTypeDeclaration());
    }

    /**
     * @requires PHP 7.1
     */
    public function testVoidReturnTypeIsMockedCorrectly()
    {
        /** @var ClassWithAllPossibleReturnTypes|MockObject $stub */
        $stub = $this->createMock(ClassWithAllPossibleReturnTypes::class);

        $this->assertNull($stub->methodWithVoidReturnTypeDeclaration());
    }

    /**
     * @requires PHP 7.2
     */
    public function testObjectReturnTypeIsMockedCorrectly()
    {
        /** @var ClassWithAllPossibleReturnTypes|MockObject $stub */
        $stub = $this->createMock(ClassWithAllPossibleReturnTypes::class);

        $this->assertInstanceOf(stdClass::class, $stub->methodWithObjectReturnTypeDeclaration());
>>>>>>> dev
    }
}
