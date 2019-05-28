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
 * @since      File available since Release 1.0.0
 */
class Framework_MockBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testMockBuilderRequiresClassName()
    {
        $spec = $this->getMockBuilder('Mockable');
        $mock = $spec->getMock();
=======
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockBuilder;

class MockBuilderTest extends TestCase
{
    public function testMockBuilderRequiresClassName()
    {
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

>>>>>>> dev
        $this->assertTrue($mock instanceof Mockable);
    }

    public function testByDefaultMocksAllMethods()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $mock = $spec->getMock();
=======
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

>>>>>>> dev
        $this->assertNull($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

    public function testMethodsToMockCanBeSpecified()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $spec->setMethods(array('mockableMethod'));
        $mock = $spec->getMock();
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMethods(['mockableMethod'])
                     ->getMock();

>>>>>>> dev
        $this->assertNull($mock->mockableMethod());
        $this->assertTrue($mock->anotherMockableMethod());
    }

<<<<<<< HEAD
    public function testByDefaultDoesNotPassArgumentsToTheConstructor()
    {
        $spec = $this->getMockBuilder('Mockable');
        $mock = $spec->getMock();
        $this->assertEquals(array(null, null), $mock->constructorArgs);
=======
    public function testMethodExceptionsToMockCanBeSpecified()
    {
        $mock = $this->getMockBuilder(Mockable::class)
            ->setMethodsExcept(['mockableMethod'])
            ->getMock();

        $this->assertTrue($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

    public function testEmptyMethodExceptionsToMockCanBeSpecified()
    {
        $mock = $this->getMockBuilder(Mockable::class)
            ->setMethodsExcept()
            ->getMock();

        $this->assertNull($mock->mockableMethod());
        $this->assertNull($mock->anotherMockableMethod());
    }

    public function testByDefaultDoesNotPassArgumentsToTheConstructor()
    {
        $mock = $this->getMockBuilder(Mockable::class)->getMock();

        $this->assertEquals([null, null], $mock->constructorArgs);
>>>>>>> dev
    }

    public function testMockClassNameCanBeSpecified()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $spec->setMockClassName('ACustomClassName');
        $mock = $spec->getMock();
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setMockClassName('ACustomClassName')
                     ->getMock();

>>>>>>> dev
        $this->assertTrue($mock instanceof ACustomClassName);
    }

    public function testConstructorArgumentsCanBeSpecified()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $spec->setConstructorArgs($expected = array(23, 42));
        $mock = $spec->getMock();
        $this->assertEquals($expected, $mock->constructorArgs);
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->setConstructorArgs([23, 42])
                     ->getMock();

        $this->assertEquals([23, 42], $mock->constructorArgs);
>>>>>>> dev
    }

    public function testOriginalConstructorCanBeDisabled()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $spec->disableOriginalConstructor();
        $mock = $spec->getMock();
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->disableOriginalConstructor()
                     ->getMock();

>>>>>>> dev
        $this->assertNull($mock->constructorArgs);
    }

    public function testByDefaultOriginalCloneIsPreserved()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $mock = $spec->getMock();
        $cloned = clone $mock;
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->getMock();

        $cloned = clone $mock;

>>>>>>> dev
        $this->assertTrue($cloned->cloned);
    }

    public function testOriginalCloneCanBeDisabled()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable');
        $spec->disableOriginalClone();
        $mock = $spec->getMock();
        $mock->cloned = false;
        $cloned = clone $mock;
        $this->assertFalse($cloned->cloned);
    }

    public function testCallingAutoloadCanBeDisabled()
    {
        // it is not clear to me how to test this nor the difference
        // between calling it or not
        $this->markTestIncomplete();
=======
        $mock = $this->getMockBuilder(Mockable::class)
                     ->disableOriginalClone()
                     ->getMock();

        $mock->cloned = false;
        $cloned       = clone $mock;

        $this->assertFalse($cloned->cloned);
>>>>>>> dev
    }

    public function testProvidesAFluentInterface()
    {
<<<<<<< HEAD
        $spec = $this->getMockBuilder('Mockable')
                     ->setMethods(array('mockableMethod'))
                     ->setConstructorArgs(array())
=======
        $spec = $this->getMockBuilder(Mockable::class)
                     ->setMethods(['mockableMethod'])
                     ->setConstructorArgs([])
>>>>>>> dev
                     ->setMockClassName('DummyClassName')
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableAutoload();
<<<<<<< HEAD
        $this->assertTrue($spec instanceof PHPUnit_Framework_MockObject_MockBuilder);
=======

        $this->assertTrue($spec instanceof MockBuilder);
>>>>>>> dev
    }
}
