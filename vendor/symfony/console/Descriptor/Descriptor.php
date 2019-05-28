<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Descriptor;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
<<<<<<< HEAD
=======
use Symfony\Component\Console\Exception\InvalidArgumentException;
>>>>>>> dev
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
<<<<<<< HEAD
use Symfony\Component\Console\Exception\InvalidArgumentException;
=======
>>>>>>> dev

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
abstract class Descriptor implements DescriptorInterface
{
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function describe(OutputInterface $output, $object, array $options = array())
=======
    public function describe(OutputInterface $output, $object, array $options = [])
>>>>>>> dev
    {
        $this->output = $output;

        switch (true) {
            case $object instanceof InputArgument:
                $this->describeInputArgument($object, $options);
                break;
            case $object instanceof InputOption:
                $this->describeInputOption($object, $options);
                break;
            case $object instanceof InputDefinition:
                $this->describeInputDefinition($object, $options);
                break;
            case $object instanceof Command:
                $this->describeCommand($object, $options);
                break;
            case $object instanceof Application:
                $this->describeApplication($object, $options);
                break;
            default:
<<<<<<< HEAD
                throw new InvalidArgumentException(sprintf('Object of type "%s" is not describable.', get_class($object)));
=======
                throw new InvalidArgumentException(sprintf('Object of type "%s" is not describable.', \get_class($object)));
>>>>>>> dev
        }
    }

    /**
     * Writes content to output.
     *
     * @param string $content
     * @param bool   $decorated
     */
    protected function write($content, $decorated = false)
    {
        $this->output->write($content, false, $decorated ? OutputInterface::OUTPUT_NORMAL : OutputInterface::OUTPUT_RAW);
    }

    /**
     * Describes an InputArgument instance.
     *
<<<<<<< HEAD
     * @param InputArgument $argument
     * @param array         $options
     *
     * @return string|mixed
     */
    abstract protected function describeInputArgument(InputArgument $argument, array $options = array());
=======
     * @return string|mixed
     */
    abstract protected function describeInputArgument(InputArgument $argument, array $options = []);
>>>>>>> dev

    /**
     * Describes an InputOption instance.
     *
<<<<<<< HEAD
     * @param InputOption $option
     * @param array       $options
     *
     * @return string|mixed
     */
    abstract protected function describeInputOption(InputOption $option, array $options = array());
=======
     * @return string|mixed
     */
    abstract protected function describeInputOption(InputOption $option, array $options = []);
>>>>>>> dev

    /**
     * Describes an InputDefinition instance.
     *
<<<<<<< HEAD
     * @param InputDefinition $definition
     * @param array           $options
     *
     * @return string|mixed
     */
    abstract protected function describeInputDefinition(InputDefinition $definition, array $options = array());
=======
     * @return string|mixed
     */
    abstract protected function describeInputDefinition(InputDefinition $definition, array $options = []);
>>>>>>> dev

    /**
     * Describes a Command instance.
     *
<<<<<<< HEAD
     * @param Command $command
     * @param array   $options
     *
     * @return string|mixed
     */
    abstract protected function describeCommand(Command $command, array $options = array());
=======
     * @return string|mixed
     */
    abstract protected function describeCommand(Command $command, array $options = []);
>>>>>>> dev

    /**
     * Describes an Application instance.
     *
<<<<<<< HEAD
     * @param Application $application
     * @param array       $options
     *
     * @return string|mixed
     */
    abstract protected function describeApplication(Application $application, array $options = array());
=======
     * @return string|mixed
     */
    abstract protected function describeApplication(Application $application, array $options = []);
>>>>>>> dev
}
