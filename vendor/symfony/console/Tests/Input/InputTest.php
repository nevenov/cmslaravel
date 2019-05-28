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
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $input = new ArrayInput(array('name' => 'foo'), new InputDefinition(array(new InputArgument('name'))));
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

class InputTest extends TestCase
{
    public function testConstructor()
    {
        $input = new ArrayInput(['name' => 'foo'], new InputDefinition([new InputArgument('name')]));
>>>>>>> dev
        $this->assertEquals('foo', $input->getArgument('name'), '->__construct() takes a InputDefinition as an argument');
    }

    public function testOptions()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('--name' => 'foo'), new InputDefinition(array(new InputOption('name'))));
=======
        $input = new ArrayInput(['--name' => 'foo'], new InputDefinition([new InputOption('name')]));
>>>>>>> dev
        $this->assertEquals('foo', $input->getOption('name'), '->getOption() returns the value for the given option');

        $input->setOption('name', 'bar');
        $this->assertEquals('bar', $input->getOption('name'), '->setOption() sets the value for a given option');
<<<<<<< HEAD
        $this->assertEquals(array('name' => 'bar'), $input->getOptions(), '->getOptions() returns all option values');

        $input = new ArrayInput(array('--name' => 'foo'), new InputDefinition(array(new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default'))));
        $this->assertEquals('default', $input->getOption('bar'), '->getOption() returns the default value for optional options');
        $this->assertEquals(array('name' => 'foo', 'bar' => 'default'), $input->getOptions(), '->getOptions() returns all option values, even optional ones');
=======
        $this->assertEquals(['name' => 'bar'], $input->getOptions(), '->getOptions() returns all option values');

        $input = new ArrayInput(['--name' => 'foo'], new InputDefinition([new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default')]));
        $this->assertEquals('default', $input->getOption('bar'), '->getOption() returns the default value for optional options');
        $this->assertEquals(['name' => 'foo', 'bar' => 'default'], $input->getOptions(), '->getOptions() returns all option values, even optional ones');

        $input = new ArrayInput(['--name' => 'foo', '--bar' => ''], new InputDefinition([new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default')]));
        $this->assertEquals('', $input->getOption('bar'), '->getOption() returns null for options explicitly passed without value (or an empty value)');
        $this->assertEquals(['name' => 'foo', 'bar' => ''], $input->getOptions(), '->getOptions() returns all option values.');

        $input = new ArrayInput(['--name' => 'foo', '--bar' => null], new InputDefinition([new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default')]));
        $this->assertNull($input->getOption('bar'), '->getOption() returns null for options explicitly passed without value (or an empty value)');
        $this->assertEquals(['name' => 'foo', 'bar' => null], $input->getOptions(), '->getOptions() returns all option values');
>>>>>>> dev
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "foo" option does not exist.
     */
    public function testSetInvalidOption()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('--name' => 'foo'), new InputDefinition(array(new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default'))));
=======
        $input = new ArrayInput(['--name' => 'foo'], new InputDefinition([new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default')]));
>>>>>>> dev
        $input->setOption('foo', 'bar');
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "foo" option does not exist.
     */
    public function testGetInvalidOption()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('--name' => 'foo'), new InputDefinition(array(new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default'))));
=======
        $input = new ArrayInput(['--name' => 'foo'], new InputDefinition([new InputOption('name'), new InputOption('bar', '', InputOption::VALUE_OPTIONAL, '', 'default')]));
>>>>>>> dev
        $input->getOption('foo');
    }

    public function testArguments()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('name' => 'foo'), new InputDefinition(array(new InputArgument('name'))));
=======
        $input = new ArrayInput(['name' => 'foo'], new InputDefinition([new InputArgument('name')]));
>>>>>>> dev
        $this->assertEquals('foo', $input->getArgument('name'), '->getArgument() returns the value for the given argument');

        $input->setArgument('name', 'bar');
        $this->assertEquals('bar', $input->getArgument('name'), '->setArgument() sets the value for a given argument');
<<<<<<< HEAD
        $this->assertEquals(array('name' => 'bar'), $input->getArguments(), '->getArguments() returns all argument values');

        $input = new ArrayInput(array('name' => 'foo'), new InputDefinition(array(new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default'))));
        $this->assertEquals('default', $input->getArgument('bar'), '->getArgument() returns the default value for optional arguments');
        $this->assertEquals(array('name' => 'foo', 'bar' => 'default'), $input->getArguments(), '->getArguments() returns all argument values, even optional ones');
=======
        $this->assertEquals(['name' => 'bar'], $input->getArguments(), '->getArguments() returns all argument values');

        $input = new ArrayInput(['name' => 'foo'], new InputDefinition([new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default')]));
        $this->assertEquals('default', $input->getArgument('bar'), '->getArgument() returns the default value for optional arguments');
        $this->assertEquals(['name' => 'foo', 'bar' => 'default'], $input->getArguments(), '->getArguments() returns all argument values, even optional ones');
>>>>>>> dev
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "foo" argument does not exist.
     */
    public function testSetInvalidArgument()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('name' => 'foo'), new InputDefinition(array(new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default'))));
=======
        $input = new ArrayInput(['name' => 'foo'], new InputDefinition([new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default')]));
>>>>>>> dev
        $input->setArgument('foo', 'bar');
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage The "foo" argument does not exist.
     */
    public function testGetInvalidArgument()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('name' => 'foo'), new InputDefinition(array(new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default'))));
=======
        $input = new ArrayInput(['name' => 'foo'], new InputDefinition([new InputArgument('name'), new InputArgument('bar', InputArgument::OPTIONAL, '', 'default')]));
>>>>>>> dev
        $input->getArgument('foo');
    }

    /**
     * @expectedException        \RuntimeException
     * @expectedExceptionMessage Not enough arguments (missing: "name").
     */
    public function testValidateWithMissingArguments()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array());
        $input->bind(new InputDefinition(array(new InputArgument('name', InputArgument::REQUIRED))));
=======
        $input = new ArrayInput([]);
        $input->bind(new InputDefinition([new InputArgument('name', InputArgument::REQUIRED)]));
>>>>>>> dev
        $input->validate();
    }

    /**
     * @expectedException        \RuntimeException
     * @expectedExceptionMessage Not enough arguments (missing: "name").
     */
    public function testValidateWithMissingRequiredArguments()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('bar' => 'baz'));
        $input->bind(new InputDefinition(array(new InputArgument('name', InputArgument::REQUIRED), new InputArgument('bar', InputArgument::OPTIONAL))));
=======
        $input = new ArrayInput(['bar' => 'baz']);
        $input->bind(new InputDefinition([new InputArgument('name', InputArgument::REQUIRED), new InputArgument('bar', InputArgument::OPTIONAL)]));
>>>>>>> dev
        $input->validate();
    }

    public function testValidate()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array('name' => 'foo'));
        $input->bind(new InputDefinition(array(new InputArgument('name', InputArgument::REQUIRED))));
=======
        $input = new ArrayInput(['name' => 'foo']);
        $input->bind(new InputDefinition([new InputArgument('name', InputArgument::REQUIRED)]));
>>>>>>> dev

        $this->assertNull($input->validate());
    }

    public function testSetGetInteractive()
    {
<<<<<<< HEAD
        $input = new ArrayInput(array());
=======
        $input = new ArrayInput([]);
>>>>>>> dev
        $this->assertTrue($input->isInteractive(), '->isInteractive() returns whether the input should be interactive or not');
        $input->setInteractive(false);
        $this->assertFalse($input->isInteractive(), '->setInteractive() changes the interactive flag');
    }
<<<<<<< HEAD
=======

    public function testSetGetStream()
    {
        $input = new ArrayInput([]);
        $stream = fopen('php://memory', 'r+', false);
        $input->setStream($stream);
        $this->assertSame($stream, $input->getStream());
    }
>>>>>>> dev
}
