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
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

/**
 * JSON descriptor.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 *
 * @internal
 */
class JsonDescriptor extends Descriptor
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputArgument(InputArgument $argument, array $options = array())
=======
    protected function describeInputArgument(InputArgument $argument, array $options = [])
>>>>>>> dev
    {
        $this->writeData($this->getInputArgumentData($argument), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputOption(InputOption $option, array $options = array())
=======
    protected function describeInputOption(InputOption $option, array $options = [])
>>>>>>> dev
    {
        $this->writeData($this->getInputOptionData($option), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputDefinition(InputDefinition $definition, array $options = array())
=======
    protected function describeInputDefinition(InputDefinition $definition, array $options = [])
>>>>>>> dev
    {
        $this->writeData($this->getInputDefinitionData($definition), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeCommand(Command $command, array $options = array())
=======
    protected function describeCommand(Command $command, array $options = [])
>>>>>>> dev
    {
        $this->writeData($this->getCommandData($command), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeApplication(Application $application, array $options = array())
    {
        $describedNamespace = isset($options['namespace']) ? $options['namespace'] : null;
        $description = new ApplicationDescription($application, $describedNamespace);
        $commands = array();
=======
    protected function describeApplication(Application $application, array $options = [])
    {
        $describedNamespace = isset($options['namespace']) ? $options['namespace'] : null;
        $description = new ApplicationDescription($application, $describedNamespace, true);
        $commands = [];
>>>>>>> dev

        foreach ($description->getCommands() as $command) {
            $commands[] = $this->getCommandData($command);
        }

<<<<<<< HEAD
        $data = $describedNamespace
            ? array('commands' => $commands, 'namespace' => $describedNamespace)
            : array('commands' => $commands, 'namespaces' => array_values($description->getNamespaces()));
=======
        $data = [];
        if ('UNKNOWN' !== $application->getName()) {
            $data['application']['name'] = $application->getName();
            if ('UNKNOWN' !== $application->getVersion()) {
                $data['application']['version'] = $application->getVersion();
            }
        }

        $data['commands'] = $commands;

        if ($describedNamespace) {
            $data['namespace'] = $describedNamespace;
        } else {
            $data['namespaces'] = array_values($description->getNamespaces());
        }
>>>>>>> dev

        $this->writeData($data, $options);
    }

    /**
     * Writes data as json.
     *
<<<<<<< HEAD
     * @param array $data
     * @param array $options
     *
=======
>>>>>>> dev
     * @return array|string
     */
    private function writeData(array $data, array $options)
    {
        $this->write(json_encode($data, isset($options['json_encoding']) ? $options['json_encoding'] : 0));
    }

    /**
<<<<<<< HEAD
     * @param InputArgument $argument
     *
=======
>>>>>>> dev
     * @return array
     */
    private function getInputArgumentData(InputArgument $argument)
    {
<<<<<<< HEAD
        return array(
=======
        return [
>>>>>>> dev
            'name' => $argument->getName(),
            'is_required' => $argument->isRequired(),
            'is_array' => $argument->isArray(),
            'description' => preg_replace('/\s*[\r\n]\s*/', ' ', $argument->getDescription()),
<<<<<<< HEAD
            'default' => $argument->getDefault(),
        );
    }

    /**
     * @param InputOption $option
     *
=======
            'default' => INF === $argument->getDefault() ? 'INF' : $argument->getDefault(),
        ];
    }

    /**
>>>>>>> dev
     * @return array
     */
    private function getInputOptionData(InputOption $option)
    {
<<<<<<< HEAD
        return array(
            'name' => '--'.$option->getName(),
            'shortcut' => $option->getShortcut() ? '-'.implode('|-', explode('|', $option->getShortcut())) : '',
=======
        return [
            'name' => '--'.$option->getName(),
            'shortcut' => $option->getShortcut() ? '-'.str_replace('|', '|-', $option->getShortcut()) : '',
>>>>>>> dev
            'accept_value' => $option->acceptValue(),
            'is_value_required' => $option->isValueRequired(),
            'is_multiple' => $option->isArray(),
            'description' => preg_replace('/\s*[\r\n]\s*/', ' ', $option->getDescription()),
<<<<<<< HEAD
            'default' => $option->getDefault(),
        );
    }

    /**
     * @param InputDefinition $definition
     *
=======
            'default' => INF === $option->getDefault() ? 'INF' : $option->getDefault(),
        ];
    }

    /**
>>>>>>> dev
     * @return array
     */
    private function getInputDefinitionData(InputDefinition $definition)
    {
<<<<<<< HEAD
        $inputArguments = array();
=======
        $inputArguments = [];
>>>>>>> dev
        foreach ($definition->getArguments() as $name => $argument) {
            $inputArguments[$name] = $this->getInputArgumentData($argument);
        }

<<<<<<< HEAD
        $inputOptions = array();
=======
        $inputOptions = [];
>>>>>>> dev
        foreach ($definition->getOptions() as $name => $option) {
            $inputOptions[$name] = $this->getInputOptionData($option);
        }

<<<<<<< HEAD
        return array('arguments' => $inputArguments, 'options' => $inputOptions);
    }

    /**
     * @param Command $command
     *
=======
        return ['arguments' => $inputArguments, 'options' => $inputOptions];
    }

    /**
>>>>>>> dev
     * @return array
     */
    private function getCommandData(Command $command)
    {
        $command->getSynopsis();
        $command->mergeApplicationDefinition(false);

<<<<<<< HEAD
        return array(
            'name' => $command->getName(),
            'usage' => array_merge(array($command->getSynopsis()), $command->getUsages(), $command->getAliases()),
            'description' => $command->getDescription(),
            'help' => $command->getProcessedHelp(),
            'definition' => $this->getInputDefinitionData($command->getNativeDefinition()),
        );
=======
        return [
            'name' => $command->getName(),
            'usage' => array_merge([$command->getSynopsis()], $command->getUsages(), $command->getAliases()),
            'description' => $command->getDescription(),
            'help' => $command->getProcessedHelp(),
            'definition' => $this->getInputDefinitionData($command->getNativeDefinition()),
            'hidden' => $command->isHidden(),
        ];
>>>>>>> dev
    }
}
