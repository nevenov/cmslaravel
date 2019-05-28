<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Input;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;

/**
 * A InputDefinition represents a set of valid command line arguments and options.
 *
 * Usage:
 *
<<<<<<< HEAD
 *     $definition = new InputDefinition(array(
 *       new InputArgument('name', InputArgument::REQUIRED),
 *       new InputOption('foo', 'f', InputOption::VALUE_REQUIRED),
 *     ));
=======
 *     $definition = new InputDefinition([
 *         new InputArgument('name', InputArgument::REQUIRED),
 *         new InputOption('foo', 'f', InputOption::VALUE_REQUIRED),
 *     ]);
>>>>>>> dev
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class InputDefinition
{
    private $arguments;
    private $requiredCount;
    private $hasAnArrayArgument = false;
    private $hasOptional;
    private $options;
    private $shortcuts;

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param array $definition An array of InputArgument and InputOption instance
     */
    public function __construct(array $definition = array())
=======
     * @param array $definition An array of InputArgument and InputOption instance
     */
    public function __construct(array $definition = [])
>>>>>>> dev
    {
        $this->setDefinition($definition);
    }

    /**
     * Sets the definition of the input.
<<<<<<< HEAD
     *
     * @param array $definition The definition array
     */
    public function setDefinition(array $definition)
    {
        $arguments = array();
        $options = array();
=======
     */
    public function setDefinition(array $definition)
    {
        $arguments = [];
        $options = [];
>>>>>>> dev
        foreach ($definition as $item) {
            if ($item instanceof InputOption) {
                $options[] = $item;
            } else {
                $arguments[] = $item;
            }
        }

        $this->setArguments($arguments);
        $this->setOptions($options);
    }

    /**
     * Sets the InputArgument objects.
     *
     * @param InputArgument[] $arguments An array of InputArgument objects
     */
<<<<<<< HEAD
    public function setArguments($arguments = array())
    {
        $this->arguments = array();
=======
    public function setArguments($arguments = [])
    {
        $this->arguments = [];
>>>>>>> dev
        $this->requiredCount = 0;
        $this->hasOptional = false;
        $this->hasAnArrayArgument = false;
        $this->addArguments($arguments);
    }

    /**
     * Adds an array of InputArgument objects.
     *
     * @param InputArgument[] $arguments An array of InputArgument objects
     */
<<<<<<< HEAD
    public function addArguments($arguments = array())
=======
    public function addArguments($arguments = [])
>>>>>>> dev
    {
        if (null !== $arguments) {
            foreach ($arguments as $argument) {
                $this->addArgument($argument);
            }
        }
    }

    /**
<<<<<<< HEAD
     * Adds an InputArgument object.
     *
     * @param InputArgument $argument An InputArgument object
     *
=======
>>>>>>> dev
     * @throws LogicException When incorrect argument is given
     */
    public function addArgument(InputArgument $argument)
    {
        if (isset($this->arguments[$argument->getName()])) {
            throw new LogicException(sprintf('An argument with name "%s" already exists.', $argument->getName()));
        }

        if ($this->hasAnArrayArgument) {
            throw new LogicException('Cannot add an argument after an array argument.');
        }

        if ($argument->isRequired() && $this->hasOptional) {
            throw new LogicException('Cannot add a required argument after an optional one.');
        }

        if ($argument->isArray()) {
            $this->hasAnArrayArgument = true;
        }

        if ($argument->isRequired()) {
            ++$this->requiredCount;
        } else {
            $this->hasOptional = true;
        }

        $this->arguments[$argument->getName()] = $argument;
    }

    /**
     * Returns an InputArgument by name or by position.
     *
     * @param string|int $name The InputArgument name or position
     *
     * @return InputArgument An InputArgument object
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function getArgument($name)
    {
        if (!$this->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

<<<<<<< HEAD
        $arguments = is_int($name) ? array_values($this->arguments) : $this->arguments;
=======
        $arguments = \is_int($name) ? array_values($this->arguments) : $this->arguments;
>>>>>>> dev

        return $arguments[$name];
    }

    /**
     * Returns true if an InputArgument object exists by name or position.
     *
     * @param string|int $name The InputArgument name or position
     *
     * @return bool true if the InputArgument object exists, false otherwise
     */
    public function hasArgument($name)
    {
<<<<<<< HEAD
        $arguments = is_int($name) ? array_values($this->arguments) : $this->arguments;
=======
        $arguments = \is_int($name) ? array_values($this->arguments) : $this->arguments;
>>>>>>> dev

        return isset($arguments[$name]);
    }

    /**
     * Gets the array of InputArgument objects.
     *
     * @return InputArgument[] An array of InputArgument objects
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Returns the number of InputArguments.
     *
     * @return int The number of InputArguments
     */
    public function getArgumentCount()
    {
<<<<<<< HEAD
        return $this->hasAnArrayArgument ? PHP_INT_MAX : count($this->arguments);
=======
        return $this->hasAnArrayArgument ? PHP_INT_MAX : \count($this->arguments);
>>>>>>> dev
    }

    /**
     * Returns the number of required InputArguments.
     *
     * @return int The number of required InputArguments
     */
    public function getArgumentRequiredCount()
    {
        return $this->requiredCount;
    }

    /**
     * Gets the default values.
     *
     * @return array An array of default values
     */
    public function getArgumentDefaults()
    {
<<<<<<< HEAD
        $values = array();
=======
        $values = [];
>>>>>>> dev
        foreach ($this->arguments as $argument) {
            $values[$argument->getName()] = $argument->getDefault();
        }

        return $values;
    }

    /**
     * Sets the InputOption objects.
     *
     * @param InputOption[] $options An array of InputOption objects
     */
<<<<<<< HEAD
    public function setOptions($options = array())
    {
        $this->options = array();
        $this->shortcuts = array();
=======
    public function setOptions($options = [])
    {
        $this->options = [];
        $this->shortcuts = [];
>>>>>>> dev
        $this->addOptions($options);
    }

    /**
     * Adds an array of InputOption objects.
     *
     * @param InputOption[] $options An array of InputOption objects
     */
<<<<<<< HEAD
    public function addOptions($options = array())
=======
    public function addOptions($options = [])
>>>>>>> dev
    {
        foreach ($options as $option) {
            $this->addOption($option);
        }
    }

    /**
<<<<<<< HEAD
     * Adds an InputOption object.
     *
     * @param InputOption $option An InputOption object
     *
=======
>>>>>>> dev
     * @throws LogicException When option given already exist
     */
    public function addOption(InputOption $option)
    {
        if (isset($this->options[$option->getName()]) && !$option->equals($this->options[$option->getName()])) {
            throw new LogicException(sprintf('An option named "%s" already exists.', $option->getName()));
        }

        if ($option->getShortcut()) {
            foreach (explode('|', $option->getShortcut()) as $shortcut) {
                if (isset($this->shortcuts[$shortcut]) && !$option->equals($this->options[$this->shortcuts[$shortcut]])) {
                    throw new LogicException(sprintf('An option with shortcut "%s" already exists.', $shortcut));
                }
            }
        }

        $this->options[$option->getName()] = $option;
        if ($option->getShortcut()) {
            foreach (explode('|', $option->getShortcut()) as $shortcut) {
                $this->shortcuts[$shortcut] = $option->getName();
            }
        }
    }

    /**
     * Returns an InputOption by name.
     *
     * @param string $name The InputOption name
     *
     * @return InputOption A InputOption object
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function getOption($name)
    {
        if (!$this->hasOption($name)) {
            throw new InvalidArgumentException(sprintf('The "--%s" option does not exist.', $name));
        }

        return $this->options[$name];
    }

    /**
     * Returns true if an InputOption object exists by name.
     *
<<<<<<< HEAD
=======
     * This method can't be used to check if the user included the option when
     * executing the command (use getOption() instead).
     *
>>>>>>> dev
     * @param string $name The InputOption name
     *
     * @return bool true if the InputOption object exists, false otherwise
     */
    public function hasOption($name)
    {
        return isset($this->options[$name]);
    }

    /**
     * Gets the array of InputOption objects.
     *
     * @return InputOption[] An array of InputOption objects
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Returns true if an InputOption object exists by shortcut.
     *
     * @param string $name The InputOption shortcut
     *
     * @return bool true if the InputOption object exists, false otherwise
     */
    public function hasShortcut($name)
    {
        return isset($this->shortcuts[$name]);
    }

    /**
     * Gets an InputOption by shortcut.
     *
<<<<<<< HEAD
     * @param string $shortcut the Shortcut name
=======
     * @param string $shortcut The Shortcut name
>>>>>>> dev
     *
     * @return InputOption An InputOption object
     */
    public function getOptionForShortcut($shortcut)
    {
        return $this->getOption($this->shortcutToName($shortcut));
    }

    /**
     * Gets an array of default values.
     *
     * @return array An array of all default values
     */
    public function getOptionDefaults()
    {
<<<<<<< HEAD
        $values = array();
=======
        $values = [];
>>>>>>> dev
        foreach ($this->options as $option) {
            $values[$option->getName()] = $option->getDefault();
        }

        return $values;
    }

    /**
     * Returns the InputOption name given a shortcut.
     *
     * @param string $shortcut The shortcut
     *
     * @return string The InputOption name
     *
     * @throws InvalidArgumentException When option given does not exist
<<<<<<< HEAD
     */
    private function shortcutToName($shortcut)
=======
     *
     * @internal
     */
    public function shortcutToName($shortcut)
>>>>>>> dev
    {
        if (!isset($this->shortcuts[$shortcut])) {
            throw new InvalidArgumentException(sprintf('The "-%s" option does not exist.', $shortcut));
        }

        return $this->shortcuts[$shortcut];
    }

    /**
     * Gets the synopsis.
     *
     * @param bool $short Whether to return the short version (with options folded) or not
     *
     * @return string The synopsis
     */
    public function getSynopsis($short = false)
    {
<<<<<<< HEAD
        $elements = array();
=======
        $elements = [];
>>>>>>> dev

        if ($short && $this->getOptions()) {
            $elements[] = '[options]';
        } elseif (!$short) {
            foreach ($this->getOptions() as $option) {
                $value = '';
                if ($option->acceptValue()) {
                    $value = sprintf(
                        ' %s%s%s',
                        $option->isValueOptional() ? '[' : '',
                        strtoupper($option->getName()),
                        $option->isValueOptional() ? ']' : ''
                    );
                }

                $shortcut = $option->getShortcut() ? sprintf('-%s|', $option->getShortcut()) : '';
                $elements[] = sprintf('[%s--%s%s]', $shortcut, $option->getName(), $value);
            }
        }

<<<<<<< HEAD
        if (count($elements) && $this->getArguments()) {
            $elements[] = '[--]';
        }

        foreach ($this->getArguments() as $argument) {
            $element = '<'.$argument->getName().'>';
            if (!$argument->isRequired()) {
                $element = '['.$element.']';
            } elseif ($argument->isArray()) {
                $element = $element.' ('.$element.')';
            }

=======
        if (\count($elements) && $this->getArguments()) {
            $elements[] = '[--]';
        }

        $tail = '';
        foreach ($this->getArguments() as $argument) {
            $element = '<'.$argument->getName().'>';
>>>>>>> dev
            if ($argument->isArray()) {
                $element .= '...';
            }

<<<<<<< HEAD
            $elements[] = $element;
        }

        return implode(' ', $elements);
=======
            if (!$argument->isRequired()) {
                $element = '['.$element;
                $tail .= ']';
            }

            $elements[] = $element;
        }

        return implode(' ', $elements).$tail;
>>>>>>> dev
    }
}
