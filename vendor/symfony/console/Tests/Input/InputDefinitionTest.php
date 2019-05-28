<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Input;

<<<<<<< HEAD
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InputDefinitionTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

class InputDefinitionTest extends TestCase
>>>>>>> dev
{
    protected static $fixtures;

    protected $foo;
    protected $bar;
    protected $foo1;
    protected $foo2;

    public static function setUpBeforeClass()
    {
        self::$fixtures = __DIR__.'/../Fixtures/';
    }

    public function testConstructorArguments()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $this->assertEquals(array(), $definition->getArguments(), '__construct() creates a new InputDefinition object');

        $definition = new InputDefinition(array($this->foo, $this->bar));
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getArguments(), '__construct() takes an array of InputArgument objects as its first argument');
=======
        $this->assertEquals([], $definition->getArguments(), '__construct() creates a new InputDefinition object');

        $definition = new InputDefinition([$this->foo, $this->bar]);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getArguments(), '__construct() takes an array of InputArgument objects as its first argument');
>>>>>>> dev
    }

    public function testConstructorOptions()
    {
        $this->initializeOptions();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $this->assertEquals(array(), $definition->getOptions(), '__construct() creates a new InputDefinition object');

        $definition = new InputDefinition(array($this->foo, $this->bar));
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getOptions(), '__construct() takes an array of InputOption objects as its first argument');
=======
        $this->assertEquals([], $definition->getOptions(), '__construct() creates a new InputDefinition object');

        $definition = new InputDefinition([$this->foo, $this->bar]);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getOptions(), '__construct() takes an array of InputOption objects as its first argument');
>>>>>>> dev
    }

    public function testSetArguments()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $definition->setArguments(array($this->foo));
        $this->assertEquals(array('foo' => $this->foo), $definition->getArguments(), '->setArguments() sets the array of InputArgument objects');
        $definition->setArguments(array($this->bar));

        $this->assertEquals(array('bar' => $this->bar), $definition->getArguments(), '->setArguments() clears all InputArgument objects');
=======
        $definition->setArguments([$this->foo]);
        $this->assertEquals(['foo' => $this->foo], $definition->getArguments(), '->setArguments() sets the array of InputArgument objects');
        $definition->setArguments([$this->bar]);

        $this->assertEquals(['bar' => $this->bar], $definition->getArguments(), '->setArguments() clears all InputArgument objects');
>>>>>>> dev
    }

    public function testAddArguments()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $definition->addArguments(array($this->foo));
        $this->assertEquals(array('foo' => $this->foo), $definition->getArguments(), '->addArguments() adds an array of InputArgument objects');
        $definition->addArguments(array($this->bar));
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getArguments(), '->addArguments() does not clear existing InputArgument objects');
=======
        $definition->addArguments([$this->foo]);
        $this->assertEquals(['foo' => $this->foo], $definition->getArguments(), '->addArguments() adds an array of InputArgument objects');
        $definition->addArguments([$this->bar]);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getArguments(), '->addArguments() does not clear existing InputArgument objects');
>>>>>>> dev
    }

    public function testAddArgument()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument($this->foo);
<<<<<<< HEAD
        $this->assertEquals(array('foo' => $this->foo), $definition->getArguments(), '->addArgument() adds a InputArgument object');
        $definition->addArgument($this->bar);
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getArguments(), '->addArgument() adds a InputArgument object');
=======
        $this->assertEquals(['foo' => $this->foo], $definition->getArguments(), '->addArgument() adds a InputArgument object');
        $definition->addArgument($this->bar);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getArguments(), '->addArgument() adds a InputArgument object');
>>>>>>> dev
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage An argument with name "foo" already exists.
     */
    public function testArgumentsMustHaveDifferentNames()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument($this->foo);
        $definition->addArgument($this->foo1);
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage Cannot add an argument after an array argument.
     */
    public function testArrayArgumentHasToBeLast()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument(new InputArgument('fooarray', InputArgument::IS_ARRAY));
        $definition->addArgument(new InputArgument('anotherbar'));
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage Cannot add a required argument after an optional one.
     */
    public function testRequiredArgumentCannotFollowAnOptionalOne()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument($this->foo);
        $definition->addArgument($this->foo2);
    }

    public function testGetArgument()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $definition->addArguments(array($this->foo));
=======
        $definition->addArguments([$this->foo]);
>>>>>>> dev
        $this->assertEquals($this->foo, $definition->getArgument('foo'), '->getArgument() returns a InputArgument by its name');
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "bar" argument does not exist.
     */
    public function testGetInvalidArgument()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $definition->addArguments(array($this->foo));
=======
        $definition->addArguments([$this->foo]);
>>>>>>> dev
        $definition->getArgument('bar');
    }

    public function testHasArgument()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
<<<<<<< HEAD
        $definition->addArguments(array($this->foo));
=======
        $definition->addArguments([$this->foo]);
>>>>>>> dev

        $this->assertTrue($definition->hasArgument('foo'), '->hasArgument() returns true if a InputArgument exists for the given name');
        $this->assertFalse($definition->hasArgument('bar'), '->hasArgument() returns false if a InputArgument exists for the given name');
    }

    public function testGetArgumentRequiredCount()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument($this->foo2);
        $this->assertEquals(1, $definition->getArgumentRequiredCount(), '->getArgumentRequiredCount() returns the number of required arguments');
        $definition->addArgument($this->foo);
        $this->assertEquals(1, $definition->getArgumentRequiredCount(), '->getArgumentRequiredCount() returns the number of required arguments');
    }

    public function testGetArgumentCount()
    {
        $this->initializeArguments();

        $definition = new InputDefinition();
        $definition->addArgument($this->foo2);
        $this->assertEquals(1, $definition->getArgumentCount(), '->getArgumentCount() returns the number of arguments');
        $definition->addArgument($this->foo);
        $this->assertEquals(2, $definition->getArgumentCount(), '->getArgumentCount() returns the number of arguments');
    }

    public function testGetArgumentDefaults()
    {
<<<<<<< HEAD
        $definition = new InputDefinition(array(
            new InputArgument('foo1', InputArgument::OPTIONAL),
            new InputArgument('foo2', InputArgument::OPTIONAL, '', 'default'),
            new InputArgument('foo3', InputArgument::OPTIONAL | InputArgument::IS_ARRAY),
        //  new InputArgument('foo4', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, '', array(1, 2)),
        ));
        $this->assertEquals(array('foo1' => null, 'foo2' => 'default', 'foo3' => array()), $definition->getArgumentDefaults(), '->getArgumentDefaults() return the default values for each argument');

        $definition = new InputDefinition(array(
            new InputArgument('foo4', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, '', array(1, 2)),
        ));
        $this->assertEquals(array('foo4' => array(1, 2)), $definition->getArgumentDefaults(), '->getArgumentDefaults() return the default values for each argument');
=======
        $definition = new InputDefinition([
            new InputArgument('foo1', InputArgument::OPTIONAL),
            new InputArgument('foo2', InputArgument::OPTIONAL, '', 'default'),
            new InputArgument('foo3', InputArgument::OPTIONAL | InputArgument::IS_ARRAY),
        //  new InputArgument('foo4', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, '', [1, 2]),
        ]);
        $this->assertEquals(['foo1' => null, 'foo2' => 'default', 'foo3' => []], $definition->getArgumentDefaults(), '->getArgumentDefaults() return the default values for each argument');

        $definition = new InputDefinition([
            new InputArgument('foo4', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, '', [1, 2]),
        ]);
        $this->assertEquals(['foo4' => [1, 2]], $definition->getArgumentDefaults(), '->getArgumentDefaults() return the default values for each argument');
>>>>>>> dev
    }

    public function testSetOptions()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
        $this->assertEquals(array('foo' => $this->foo), $definition->getOptions(), '->setOptions() sets the array of InputOption objects');
        $definition->setOptions(array($this->bar));
        $this->assertEquals(array('bar' => $this->bar), $definition->getOptions(), '->setOptions() clears all InputOption objects');
=======
        $definition = new InputDefinition([$this->foo]);
        $this->assertEquals(['foo' => $this->foo], $definition->getOptions(), '->setOptions() sets the array of InputOption objects');
        $definition->setOptions([$this->bar]);
        $this->assertEquals(['bar' => $this->bar], $definition->getOptions(), '->setOptions() clears all InputOption objects');
>>>>>>> dev
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "-f" option does not exist.
     */
    public function testSetOptionsClearsOptions()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
        $definition->setOptions(array($this->bar));
=======
        $definition = new InputDefinition([$this->foo]);
        $definition->setOptions([$this->bar]);
>>>>>>> dev
        $definition->getOptionForShortcut('f');
    }

    public function testAddOptions()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
        $this->assertEquals(array('foo' => $this->foo), $definition->getOptions(), '->addOptions() adds an array of InputOption objects');
        $definition->addOptions(array($this->bar));
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getOptions(), '->addOptions() does not clear existing InputOption objects');
=======
        $definition = new InputDefinition([$this->foo]);
        $this->assertEquals(['foo' => $this->foo], $definition->getOptions(), '->addOptions() adds an array of InputOption objects');
        $definition->addOptions([$this->bar]);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getOptions(), '->addOptions() does not clear existing InputOption objects');
>>>>>>> dev
    }

    public function testAddOption()
    {
        $this->initializeOptions();

        $definition = new InputDefinition();
        $definition->addOption($this->foo);
<<<<<<< HEAD
        $this->assertEquals(array('foo' => $this->foo), $definition->getOptions(), '->addOption() adds a InputOption object');
        $definition->addOption($this->bar);
        $this->assertEquals(array('foo' => $this->foo, 'bar' => $this->bar), $definition->getOptions(), '->addOption() adds a InputOption object');
=======
        $this->assertEquals(['foo' => $this->foo], $definition->getOptions(), '->addOption() adds a InputOption object');
        $definition->addOption($this->bar);
        $this->assertEquals(['foo' => $this->foo, 'bar' => $this->bar], $definition->getOptions(), '->addOption() adds a InputOption object');
>>>>>>> dev
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage An option named "foo" already exists.
     */
    public function testAddDuplicateOption()
    {
        $this->initializeOptions();

        $definition = new InputDefinition();
        $definition->addOption($this->foo);
        $definition->addOption($this->foo2);
    }

    /**
     * @expectedException        \LogicException
     * @expectedExceptionMessage An option with shortcut "f" already exists.
     */
    public function testAddDuplicateShortcutOption()
    {
        $this->initializeOptions();

        $definition = new InputDefinition();
        $definition->addOption($this->foo);
        $definition->addOption($this->foo1);
    }

    public function testGetOption()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $this->assertEquals($this->foo, $definition->getOption('foo'), '->getOption() returns a InputOption by its name');
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "--bar" option does not exist.
     */
    public function testGetInvalidOption()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $definition->getOption('bar');
    }

    public function testHasOption()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $this->assertTrue($definition->hasOption('foo'), '->hasOption() returns true if a InputOption exists for the given name');
        $this->assertFalse($definition->hasOption('bar'), '->hasOption() returns false if a InputOption exists for the given name');
    }

    public function testHasShortcut()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $this->assertTrue($definition->hasShortcut('f'), '->hasShortcut() returns true if a InputOption exists for the given shortcut');
        $this->assertFalse($definition->hasShortcut('b'), '->hasShortcut() returns false if a InputOption exists for the given shortcut');
    }

    public function testGetOptionForShortcut()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $this->assertEquals($this->foo, $definition->getOptionForShortcut('f'), '->getOptionForShortcut() returns a InputOption by its shortcut');
    }

    public function testGetOptionForMultiShortcut()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->multi));
=======
        $definition = new InputDefinition([$this->multi]);
>>>>>>> dev
        $this->assertEquals($this->multi, $definition->getOptionForShortcut('m'), '->getOptionForShortcut() returns a InputOption by its shortcut');
        $this->assertEquals($this->multi, $definition->getOptionForShortcut('mmm'), '->getOptionForShortcut() returns a InputOption by its shortcut');
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "-l" option does not exist.
     */
    public function testGetOptionForInvalidShortcut()
    {
        $this->initializeOptions();

<<<<<<< HEAD
        $definition = new InputDefinition(array($this->foo));
=======
        $definition = new InputDefinition([$this->foo]);
>>>>>>> dev
        $definition->getOptionForShortcut('l');
    }

    public function testGetOptionDefaults()
    {
<<<<<<< HEAD
        $definition = new InputDefinition(array(
=======
        $definition = new InputDefinition([
>>>>>>> dev
            new InputOption('foo1', null, InputOption::VALUE_NONE),
            new InputOption('foo2', null, InputOption::VALUE_REQUIRED),
            new InputOption('foo3', null, InputOption::VALUE_REQUIRED, '', 'default'),
            new InputOption('foo4', null, InputOption::VALUE_OPTIONAL),
            new InputOption('foo5', null, InputOption::VALUE_OPTIONAL, '', 'default'),
            new InputOption('foo6', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY),
<<<<<<< HEAD
            new InputOption('foo7', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, '', array(1, 2)),
        ));
        $defaults = array(
=======
            new InputOption('foo7', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, '', [1, 2]),
        ]);
        $defaults = [
>>>>>>> dev
            'foo1' => false,
            'foo2' => null,
            'foo3' => 'default',
            'foo4' => null,
            'foo5' => 'default',
<<<<<<< HEAD
            'foo6' => array(),
            'foo7' => array(1, 2),
        );
=======
            'foo6' => [],
            'foo7' => [1, 2],
        ];
>>>>>>> dev
        $this->assertSame($defaults, $definition->getOptionDefaults(), '->getOptionDefaults() returns the default values for all options');
    }

    /**
     * @dataProvider getGetSynopsisData
     */
    public function testGetSynopsis(InputDefinition $definition, $expectedSynopsis, $message = null)
    {
        $this->assertEquals($expectedSynopsis, $definition->getSynopsis(), $message ? '->getSynopsis() '.$message : '');
    }

    public function getGetSynopsisData()
    {
<<<<<<< HEAD
        return array(
            array(new InputDefinition(array(new InputOption('foo'))), '[--foo]', 'puts optional options in square brackets'),
            array(new InputDefinition(array(new InputOption('foo', 'f'))), '[-f|--foo]', 'separates shortcut with a pipe'),
            array(new InputDefinition(array(new InputOption('foo', 'f', InputOption::VALUE_REQUIRED))), '[-f|--foo FOO]', 'uses shortcut as value placeholder'),
            array(new InputDefinition(array(new InputOption('foo', 'f', InputOption::VALUE_OPTIONAL))), '[-f|--foo [FOO]]', 'puts optional values in square brackets'),

            array(new InputDefinition(array(new InputArgument('foo', InputArgument::REQUIRED))), '<foo>', 'puts arguments in angle brackets'),
            array(new InputDefinition(array(new InputArgument('foo'))), '[<foo>]', 'puts optional arguments in square brackets'),
            array(new InputDefinition(array(new InputArgument('foo', InputArgument::IS_ARRAY))), '[<foo>]...', 'uses an ellipsis for array arguments'),
            array(new InputDefinition(array(new InputArgument('foo', InputArgument::REQUIRED | InputArgument::IS_ARRAY))), '<foo> (<foo>)...', 'uses parenthesis and ellipsis for required array arguments'),

            array(new InputDefinition(array(new InputOption('foo'), new InputArgument('foo', InputArgument::REQUIRED))), '[--foo] [--] <foo>', 'puts [--] between options and arguments'),
        );
=======
        return [
            [new InputDefinition([new InputOption('foo')]), '[--foo]', 'puts optional options in square brackets'],
            [new InputDefinition([new InputOption('foo', 'f')]), '[-f|--foo]', 'separates shortcut with a pipe'],
            [new InputDefinition([new InputOption('foo', 'f', InputOption::VALUE_REQUIRED)]), '[-f|--foo FOO]', 'uses shortcut as value placeholder'],
            [new InputDefinition([new InputOption('foo', 'f', InputOption::VALUE_OPTIONAL)]), '[-f|--foo [FOO]]', 'puts optional values in square brackets'],

            [new InputDefinition([new InputArgument('foo', InputArgument::REQUIRED)]), '<foo>', 'puts arguments in angle brackets'],
            [new InputDefinition([new InputArgument('foo')]), '[<foo>]', 'puts optional arguments in square brackets'],
            [new InputDefinition([new InputArgument('foo'), new InputArgument('bar')]), '[<foo> [<bar>]]', 'chains optional arguments inside brackets'],
            [new InputDefinition([new InputArgument('foo', InputArgument::IS_ARRAY)]), '[<foo>...]', 'uses an ellipsis for array arguments'],
            [new InputDefinition([new InputArgument('foo', InputArgument::REQUIRED | InputArgument::IS_ARRAY)]), '<foo>...', 'uses an ellipsis for required array arguments'],

            [new InputDefinition([new InputOption('foo'), new InputArgument('foo', InputArgument::REQUIRED)]), '[--foo] [--] <foo>', 'puts [--] between options and arguments'],
        ];
>>>>>>> dev
    }

    public function testGetShortSynopsis()
    {
<<<<<<< HEAD
        $definition = new InputDefinition(array(new InputOption('foo'), new InputOption('bar'), new InputArgument('cat')));
=======
        $definition = new InputDefinition([new InputOption('foo'), new InputOption('bar'), new InputArgument('cat')]);
>>>>>>> dev
        $this->assertEquals('[options] [--] [<cat>]', $definition->getSynopsis(true), '->getSynopsis(true) groups options in [options]');
    }

    protected function initializeArguments()
    {
        $this->foo = new InputArgument('foo');
        $this->bar = new InputArgument('bar');
        $this->foo1 = new InputArgument('foo');
        $this->foo2 = new InputArgument('foo2', InputArgument::REQUIRED);
    }

    protected function initializeOptions()
    {
        $this->foo = new InputOption('foo', 'f');
        $this->bar = new InputOption('bar', 'b');
        $this->foo1 = new InputOption('fooBis', 'f');
        $this->foo2 = new InputOption('foo', 'p');
        $this->multi = new InputOption('multi', 'm|mm|mmm');
    }
}
