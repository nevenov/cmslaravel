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
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Helper;
>>>>>>> dev
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;

/**
 * Text descriptor.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 *
 * @internal
 */
class TextDescriptor extends Descriptor
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputArgument(InputArgument $argument, array $options = array())
    {
        if (null !== $argument->getDefault() && (!is_array($argument->getDefault()) || count($argument->getDefault()))) {
=======
    protected function describeInputArgument(InputArgument $argument, array $options = [])
    {
        if (null !== $argument->getDefault() && (!\is_array($argument->getDefault()) || \count($argument->getDefault()))) {
>>>>>>> dev
            $default = sprintf('<comment> [default: %s]</comment>', $this->formatDefaultValue($argument->getDefault()));
        } else {
            $default = '';
        }

<<<<<<< HEAD
        $totalWidth = isset($options['total_width']) ? $options['total_width'] : strlen($argument->getName());
        $spacingWidth = $totalWidth - strlen($argument->getName()) + 2;

        $this->writeText(sprintf('  <info>%s</info>%s%s%s',
            $argument->getName(),
            str_repeat(' ', $spacingWidth),
            // + 17 = 2 spaces + <info> + </info> + 2 spaces
            preg_replace('/\s*[\r\n]\s*/', "\n".str_repeat(' ', $totalWidth + 17), $argument->getDescription()),
=======
        $totalWidth = isset($options['total_width']) ? $options['total_width'] : Helper::strlen($argument->getName());
        $spacingWidth = $totalWidth - \strlen($argument->getName());

        $this->writeText(sprintf('  <info>%s</info>  %s%s%s',
            $argument->getName(),
            str_repeat(' ', $spacingWidth),
            // + 4 = 2 spaces before <info>, 2 spaces after </info>
            preg_replace('/\s*[\r\n]\s*/', "\n".str_repeat(' ', $totalWidth + 4), $argument->getDescription()),
>>>>>>> dev
            $default
        ), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputOption(InputOption $option, array $options = array())
    {
        if ($option->acceptValue() && null !== $option->getDefault() && (!is_array($option->getDefault()) || count($option->getDefault()))) {
=======
    protected function describeInputOption(InputOption $option, array $options = [])
    {
        if ($option->acceptValue() && null !== $option->getDefault() && (!\is_array($option->getDefault()) || \count($option->getDefault()))) {
>>>>>>> dev
            $default = sprintf('<comment> [default: %s]</comment>', $this->formatDefaultValue($option->getDefault()));
        } else {
            $default = '';
        }

        $value = '';
        if ($option->acceptValue()) {
            $value = '='.strtoupper($option->getName());

            if ($option->isValueOptional()) {
                $value = '['.$value.']';
            }
        }

<<<<<<< HEAD
        $totalWidth = isset($options['total_width']) ? $options['total_width'] : $this->calculateTotalWidthForOptions(array($option));
=======
        $totalWidth = isset($options['total_width']) ? $options['total_width'] : $this->calculateTotalWidthForOptions([$option]);
>>>>>>> dev
        $synopsis = sprintf('%s%s',
            $option->getShortcut() ? sprintf('-%s, ', $option->getShortcut()) : '    ',
            sprintf('--%s%s', $option->getName(), $value)
        );

<<<<<<< HEAD
        $spacingWidth = $totalWidth - strlen($synopsis) + 2;

        $this->writeText(sprintf('  <info>%s</info>%s%s%s%s',
            $synopsis,
            str_repeat(' ', $spacingWidth),
            // + 17 = 2 spaces + <info> + </info> + 2 spaces
            preg_replace('/\s*[\r\n]\s*/', "\n".str_repeat(' ', $totalWidth + 17), $option->getDescription()),
=======
        $spacingWidth = $totalWidth - Helper::strlen($synopsis);

        $this->writeText(sprintf('  <info>%s</info>  %s%s%s%s',
            $synopsis,
            str_repeat(' ', $spacingWidth),
            // + 4 = 2 spaces before <info>, 2 spaces after </info>
            preg_replace('/\s*[\r\n]\s*/', "\n".str_repeat(' ', $totalWidth + 4), $option->getDescription()),
>>>>>>> dev
            $default,
            $option->isArray() ? '<comment> (multiple values allowed)</comment>' : ''
        ), $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeInputDefinition(InputDefinition $definition, array $options = array())
    {
        $totalWidth = $this->calculateTotalWidthForOptions($definition->getOptions());
        foreach ($definition->getArguments() as $argument) {
            $totalWidth = max($totalWidth, strlen($argument->getName()));
=======
    protected function describeInputDefinition(InputDefinition $definition, array $options = [])
    {
        $totalWidth = $this->calculateTotalWidthForOptions($definition->getOptions());
        foreach ($definition->getArguments() as $argument) {
            $totalWidth = max($totalWidth, Helper::strlen($argument->getName()));
>>>>>>> dev
        }

        if ($definition->getArguments()) {
            $this->writeText('<comment>Arguments:</comment>', $options);
            $this->writeText("\n");
            foreach ($definition->getArguments() as $argument) {
<<<<<<< HEAD
                $this->describeInputArgument($argument, array_merge($options, array('total_width' => $totalWidth)));
=======
                $this->describeInputArgument($argument, array_merge($options, ['total_width' => $totalWidth]));
>>>>>>> dev
                $this->writeText("\n");
            }
        }

        if ($definition->getArguments() && $definition->getOptions()) {
            $this->writeText("\n");
        }

        if ($definition->getOptions()) {
<<<<<<< HEAD
            $laterOptions = array();

            $this->writeText('<comment>Options:</comment>', $options);
            foreach ($definition->getOptions() as $option) {
                if (strlen($option->getShortcut()) > 1) {
=======
            $laterOptions = [];

            $this->writeText('<comment>Options:</comment>', $options);
            foreach ($definition->getOptions() as $option) {
                if (\strlen($option->getShortcut()) > 1) {
>>>>>>> dev
                    $laterOptions[] = $option;
                    continue;
                }
                $this->writeText("\n");
<<<<<<< HEAD
                $this->describeInputOption($option, array_merge($options, array('total_width' => $totalWidth)));
            }
            foreach ($laterOptions as $option) {
                $this->writeText("\n");
                $this->describeInputOption($option, array_merge($options, array('total_width' => $totalWidth)));
=======
                $this->describeInputOption($option, array_merge($options, ['total_width' => $totalWidth]));
            }
            foreach ($laterOptions as $option) {
                $this->writeText("\n");
                $this->describeInputOption($option, array_merge($options, ['total_width' => $totalWidth]));
>>>>>>> dev
            }
        }
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
        $command->getSynopsis(true);
        $command->getSynopsis(false);
        $command->mergeApplicationDefinition(false);

<<<<<<< HEAD
        $this->writeText('<comment>Usage:</comment>', $options);
        foreach (array_merge(array($command->getSynopsis(true)), $command->getAliases(), $command->getUsages()) as $usage) {
            $this->writeText("\n");
            $this->writeText('  '.$usage, $options);
=======
        if ($description = $command->getDescription()) {
            $this->writeText('<comment>Description:</comment>', $options);
            $this->writeText("\n");
            $this->writeText('  '.$description);
            $this->writeText("\n\n");
        }

        $this->writeText('<comment>Usage:</comment>', $options);
        foreach (array_merge([$command->getSynopsis(true)], $command->getAliases(), $command->getUsages()) as $usage) {
            $this->writeText("\n");
            $this->writeText('  '.OutputFormatter::escape($usage), $options);
>>>>>>> dev
        }
        $this->writeText("\n");

        $definition = $command->getNativeDefinition();
        if ($definition->getOptions() || $definition->getArguments()) {
            $this->writeText("\n");
            $this->describeInputDefinition($definition, $options);
            $this->writeText("\n");
        }

<<<<<<< HEAD
        if ($help = $command->getProcessedHelp()) {
            $this->writeText("\n");
            $this->writeText('<comment>Help:</comment>', $options);
            $this->writeText("\n");
            $this->writeText(' '.str_replace("\n", "\n ", $help), $options);
=======
        $help = $command->getProcessedHelp();
        if ($help && $help !== $description) {
            $this->writeText("\n");
            $this->writeText('<comment>Help:</comment>', $options);
            $this->writeText("\n");
            $this->writeText('  '.str_replace("\n", "\n  ", $help), $options);
>>>>>>> dev
            $this->writeText("\n");
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function describeApplication(Application $application, array $options = array())
=======
    protected function describeApplication(Application $application, array $options = [])
>>>>>>> dev
    {
        $describedNamespace = isset($options['namespace']) ? $options['namespace'] : null;
        $description = new ApplicationDescription($application, $describedNamespace);

        if (isset($options['raw_text']) && $options['raw_text']) {
            $width = $this->getColumnWidth($description->getCommands());

            foreach ($description->getCommands() as $command) {
                $this->writeText(sprintf("%-{$width}s %s", $command->getName(), $command->getDescription()), $options);
                $this->writeText("\n");
            }
        } else {
            if ('' != $help = $application->getHelp()) {
                $this->writeText("$help\n\n", $options);
            }

            $this->writeText("<comment>Usage:</comment>\n", $options);
            $this->writeText("  command [options] [arguments]\n\n", $options);

            $this->describeInputDefinition(new InputDefinition($application->getDefinition()->getOptions()), $options);

            $this->writeText("\n");
            $this->writeText("\n");

<<<<<<< HEAD
            $width = $this->getColumnWidth($description->getCommands());
=======
            $commands = $description->getCommands();
            $namespaces = $description->getNamespaces();
            if ($describedNamespace && $namespaces) {
                // make sure all alias commands are included when describing a specific namespace
                $describedNamespaceInfo = reset($namespaces);
                foreach ($describedNamespaceInfo['commands'] as $name) {
                    $commands[$name] = $description->getCommand($name);
                }
            }

            // calculate max. width based on available commands per namespace
            $width = $this->getColumnWidth(array_merge(...array_values(array_map(function ($namespace) use ($commands) {
                return array_intersect($namespace['commands'], array_keys($commands));
            }, $namespaces))));
>>>>>>> dev

            if ($describedNamespace) {
                $this->writeText(sprintf('<comment>Available commands for the "%s" namespace:</comment>', $describedNamespace), $options);
            } else {
                $this->writeText('<comment>Available commands:</comment>', $options);
            }

<<<<<<< HEAD
            // add commands by namespace
            foreach ($description->getNamespaces() as $namespace) {
=======
            foreach ($namespaces as $namespace) {
                $namespace['commands'] = array_filter($namespace['commands'], function ($name) use ($commands) {
                    return isset($commands[$name]);
                });

                if (!$namespace['commands']) {
                    continue;
                }

>>>>>>> dev
                if (!$describedNamespace && ApplicationDescription::GLOBAL_NAMESPACE !== $namespace['id']) {
                    $this->writeText("\n");
                    $this->writeText(' <comment>'.$namespace['id'].'</comment>', $options);
                }

                foreach ($namespace['commands'] as $name) {
                    $this->writeText("\n");
<<<<<<< HEAD
                    $spacingWidth = $width - strlen($name);
                    $this->writeText(sprintf('  <info>%s</info>%s%s', $name, str_repeat(' ', $spacingWidth), $description->getCommand($name)->getDescription()), $options);
=======
                    $spacingWidth = $width - Helper::strlen($name);
                    $command = $commands[$name];
                    $commandAliases = $name === $command->getName() ? $this->getCommandAliasesText($command) : '';
                    $this->writeText(sprintf('  <info>%s</info>%s%s', $name, str_repeat(' ', $spacingWidth), $commandAliases.$command->getDescription()), $options);
>>>>>>> dev
                }
            }

            $this->writeText("\n");
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    private function writeText($content, array $options = array())
=======
    private function writeText($content, array $options = [])
>>>>>>> dev
    {
        $this->write(
            isset($options['raw_text']) && $options['raw_text'] ? strip_tags($content) : $content,
            isset($options['raw_output']) ? !$options['raw_output'] : true
        );
    }

    /**
<<<<<<< HEAD
     * Formats input option/argument default value.
     *
     * @param mixed $default
     *
     * @return string
     */
    private function formatDefaultValue($default)
    {
=======
     * Formats command aliases to show them in the command description.
     */
    private function getCommandAliasesText(Command $command): string
    {
        $text = '';
        $aliases = $command->getAliases();

        if ($aliases) {
            $text = '['.implode('|', $aliases).'] ';
        }

        return $text;
    }

    /**
     * Formats input option/argument default value.
     *
     * @param mixed $default
     */
    private function formatDefaultValue($default): string
    {
        if (INF === $default) {
            return 'INF';
        }

        if (\is_string($default)) {
            $default = OutputFormatter::escape($default);
        } elseif (\is_array($default)) {
            foreach ($default as $key => $value) {
                if (\is_string($value)) {
                    $default[$key] = OutputFormatter::escape($value);
                }
            }
        }

>>>>>>> dev
        return str_replace('\\\\', '\\', json_encode($default, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }

    /**
<<<<<<< HEAD
     * @param Command[] $commands
     *
     * @return int
     */
    private function getColumnWidth(array $commands)
    {
        $widths = array();

        foreach ($commands as $command) {
            $widths[] = strlen($command->getName());
            foreach ($command->getAliases() as $alias) {
                $widths[] = strlen($alias);
            }
        }

        return max($widths) + 2;
=======
     * @param (Command|string)[] $commands
     */
    private function getColumnWidth(array $commands): int
    {
        $widths = [];

        foreach ($commands as $command) {
            if ($command instanceof Command) {
                $widths[] = Helper::strlen($command->getName());
                foreach ($command->getAliases() as $alias) {
                    $widths[] = Helper::strlen($alias);
                }
            } else {
                $widths[] = Helper::strlen($command);
            }
        }

        return $widths ? max($widths) + 2 : 0;
>>>>>>> dev
    }

    /**
     * @param InputOption[] $options
<<<<<<< HEAD
     *
     * @return int
     */
    private function calculateTotalWidthForOptions($options)
=======
     */
    private function calculateTotalWidthForOptions(array $options): int
>>>>>>> dev
    {
        $totalWidth = 0;
        foreach ($options as $option) {
            // "-" + shortcut + ", --" + name
<<<<<<< HEAD
            $nameLength = 1 + max(strlen($option->getShortcut()), 1) + 4 + strlen($option->getName());

            if ($option->acceptValue()) {
                $valueLength = 1 + strlen($option->getName()); // = + value
=======
            $nameLength = 1 + max(Helper::strlen($option->getShortcut()), 1) + 4 + Helper::strlen($option->getName());

            if ($option->acceptValue()) {
                $valueLength = 1 + Helper::strlen($option->getName()); // = + value
>>>>>>> dev
                $valueLength += $option->isValueOptional() ? 2 : 0; // [ + ]

                $nameLength += $valueLength;
            }
            $totalWidth = max($totalWidth, $nameLength);
        }

        return $totalWidth;
    }
}
