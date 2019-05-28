<?php

class One
{
    public $arg1;
    public $arg2;

    public function __construct($arg1 = null, $arg2 = null)
    {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }
}

<<<<<<< HEAD
class Swift_DependencyContainerTest extends \PHPUnit_Framework_TestCase
{
    private $_container;

    protected function setUp()
    {
        $this->_container = new Swift_DependencyContainer();
=======
class Swift_DependencyContainerTest extends \PHPUnit\Framework\TestCase
{
    private $container;

    protected function setUp()
    {
        $this->container = new Swift_DependencyContainer();
>>>>>>> dev
    }

    public function testRegisterAndLookupValue()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('bar');
        $this->assertEquals('bar', $this->_container->lookup('foo'));
=======
        $this->container->register('foo')->asValue('bar');
        $this->assertEquals('bar', $this->container->lookup('foo'));
>>>>>>> dev
    }

    public function testHasReturnsTrueForRegisteredValue()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('bar');
        $this->assertTrue($this->_container->has('foo'));
=======
        $this->container->register('foo')->asValue('bar');
        $this->assertTrue($this->container->has('foo'));
>>>>>>> dev
    }

    public function testHasReturnsFalseForUnregisteredValue()
    {
<<<<<<< HEAD
        $this->assertFalse($this->_container->has('foo'));
=======
        $this->assertFalse($this->container->has('foo'));
>>>>>>> dev
    }

    public function testRegisterAndLookupNewInstance()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asNewInstanceOf('One');
        $this->assertInstanceOf('One', $this->_container->lookup('one'));
=======
        $this->container->register('one')->asNewInstanceOf('One');
        $this->assertInstanceOf('One', $this->container->lookup('one'));
>>>>>>> dev
    }

    public function testHasReturnsTrueForRegisteredInstance()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asNewInstanceOf('One');
        $this->assertTrue($this->_container->has('one'));
=======
        $this->container->register('one')->asNewInstanceOf('One');
        $this->assertTrue($this->container->has('one'));
>>>>>>> dev
    }

    public function testNewInstanceIsAlwaysNew()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asNewInstanceOf('One');
        $a = $this->_container->lookup('one');
        $b = $this->_container->lookup('one');
=======
        $this->container->register('one')->asNewInstanceOf('One');
        $a = $this->container->lookup('one');
        $b = $this->container->lookup('one');
>>>>>>> dev
        $this->assertEquals($a, $b);
    }

    public function testRegisterAndLookupSharedInstance()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asSharedInstanceOf('One');
        $this->assertInstanceOf('One', $this->_container->lookup('one'));
=======
        $this->container->register('one')->asSharedInstanceOf('One');
        $this->assertInstanceOf('One', $this->container->lookup('one'));
>>>>>>> dev
    }

    public function testHasReturnsTrueForSharedInstance()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asSharedInstanceOf('One');
        $this->assertTrue($this->_container->has('one'));
=======
        $this->container->register('one')->asSharedInstanceOf('One');
        $this->assertTrue($this->container->has('one'));
>>>>>>> dev
    }

    public function testMultipleSharedInstancesAreSameInstance()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asSharedInstanceOf('One');
        $a = $this->_container->lookup('one');
        $b = $this->_container->lookup('one');
        $this->assertEquals($a, $b);
    }

    public function testNewInstanceWithDependencies()
    {
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('one')->asNewInstanceOf('One')
            ->withDependencies(array('foo'));
        $obj = $this->_container->lookup('one');
=======
        $this->container->register('one')->asSharedInstanceOf('One');
        $a = $this->container->lookup('one');
        $b = $this->container->lookup('one');
        $this->assertEquals($a, $b);
    }

    public function testRegisterAndLookupArray()
    {
        $this->container->register('One')->asArray();
        $this->assertSame([], $this->container->lookup('One'));
    }

    public function testNewInstanceWithDependencies()
    {
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('one')->asNewInstanceOf('One')
            ->withDependencies(['foo']);
        $obj = $this->container->lookup('one');
>>>>>>> dev
        $this->assertSame('FOO', $obj->arg1);
    }

    public function testNewInstanceWithMultipleDependencies()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('bar')->asValue(42);
        $this->_container->register('one')->asNewInstanceOf('One')
            ->withDependencies(array('foo', 'bar'));
        $obj = $this->_container->lookup('one');
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('bar')->asValue(42);
        $this->container->register('one')->asNewInstanceOf('One')
            ->withDependencies(['foo', 'bar']);
        $obj = $this->container->lookup('one');
>>>>>>> dev
        $this->assertSame('FOO', $obj->arg1);
        $this->assertSame(42, $obj->arg2);
    }

    public function testNewInstanceWithInjectedObjects()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('one')->asNewInstanceOf('One');
        $this->_container->register('two')->asNewInstanceOf('One')
            ->withDependencies(array('one', 'foo'));
        $obj = $this->_container->lookup('two');
        $this->assertEquals($this->_container->lookup('one'), $obj->arg1);
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('one')->asNewInstanceOf('One');
        $this->container->register('two')->asNewInstanceOf('One')
            ->withDependencies(['one', 'foo']);
        $obj = $this->container->lookup('two');
        $this->assertEquals($this->container->lookup('one'), $obj->arg1);
>>>>>>> dev
        $this->assertSame('FOO', $obj->arg2);
    }

    public function testNewInstanceWithAddConstructorValue()
    {
<<<<<<< HEAD
        $this->_container->register('one')->asNewInstanceOf('One')
            ->addConstructorValue('x')
            ->addConstructorValue(99);
        $obj = $this->_container->lookup('one');
=======
        $this->container->register('one')->asNewInstanceOf('One')
            ->addConstructorValue('x')
            ->addConstructorValue(99);
        $obj = $this->container->lookup('one');
>>>>>>> dev
        $this->assertSame('x', $obj->arg1);
        $this->assertSame(99, $obj->arg2);
    }

    public function testNewInstanceWithAddConstructorLookup()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('bar')->asValue(42);
        $this->_container->register('one')->asNewInstanceOf('One')
            ->addConstructorLookup('foo')
            ->addConstructorLookup('bar');

        $obj = $this->_container->lookup('one');
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('bar')->asValue(42);
        $this->container->register('one')->asNewInstanceOf('One')
            ->addConstructorLookup('foo')
            ->addConstructorLookup('bar');

        $obj = $this->container->lookup('one');
>>>>>>> dev
        $this->assertSame('FOO', $obj->arg1);
        $this->assertSame(42, $obj->arg2);
    }

    public function testResolvedDependenciesCanBeLookedUp()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('one')->asNewInstanceOf('One');
        $this->_container->register('two')->asNewInstanceOf('One')
            ->withDependencies(array('one', 'foo'));
        $deps = $this->_container->createDependenciesFor('two');
        $this->assertEquals(
            array($this->_container->lookup('one'), 'FOO'), $deps
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('one')->asNewInstanceOf('One');
        $this->container->register('two')->asNewInstanceOf('One')
            ->withDependencies(['one', 'foo']);
        $deps = $this->container->createDependenciesFor('two');
        $this->assertEquals(
            [$this->container->lookup('one'), 'FOO'], $deps
>>>>>>> dev
            );
    }

    public function testArrayOfDependenciesCanBeSpecified()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('one')->asNewInstanceOf('One');
        $this->_container->register('two')->asNewInstanceOf('One')
            ->withDependencies(array(array('one', 'foo'), 'foo'));

        $obj = $this->_container->lookup('two');
        $this->assertEquals(array($this->_container->lookup('one'), 'FOO'), $obj->arg1);
        $this->assertSame('FOO', $obj->arg2);
    }

    public function testAliasCanBeSet()
    {
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('bar')->asAliasOf('foo');

        $this->assertSame('FOO', $this->_container->lookup('bar'));
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('one')->asNewInstanceOf('One');
        $this->container->register('two')->asNewInstanceOf('One')
            ->withDependencies([['one', 'foo'], 'foo']);

        $obj = $this->container->lookup('two');
        $this->assertEquals([$this->container->lookup('one'), 'FOO'], $obj->arg1);
        $this->assertSame('FOO', $obj->arg2);
    }

    public function testArrayWithDependencies()
    {
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('bar')->asValue(42);
        $this->container->register('one')->asArray('One')
            ->withDependencies(['foo', 'bar']);
        $this->assertSame(['FOO', 42], $this->container->lookup('one'));
    }

    public function testAliasCanBeSet()
    {
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('bar')->asAliasOf('foo');

        $this->assertSame('FOO', $this->container->lookup('bar'));
>>>>>>> dev
    }

    public function testAliasOfAliasCanBeSet()
    {
<<<<<<< HEAD
        $this->_container->register('foo')->asValue('FOO');
        $this->_container->register('bar')->asAliasOf('foo');
        $this->_container->register('zip')->asAliasOf('bar');
        $this->_container->register('button')->asAliasOf('zip');

        $this->assertSame('FOO', $this->_container->lookup('button'));
=======
        $this->container->register('foo')->asValue('FOO');
        $this->container->register('bar')->asAliasOf('foo');
        $this->container->register('zip')->asAliasOf('bar');
        $this->container->register('button')->asAliasOf('zip');

        $this->assertSame('FOO', $this->container->lookup('button'));
>>>>>>> dev
    }
}
