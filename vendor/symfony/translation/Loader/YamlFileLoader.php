<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Translation\Exception\InvalidResourceException;
<<<<<<< HEAD
use Symfony\Component\Yaml\Parser as YamlParser;
use Symfony\Component\Yaml\Exception\ParseException;
=======
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as YamlParser;
use Symfony\Component\Yaml\Yaml;
>>>>>>> dev

/**
 * YamlFileLoader loads translations from Yaml files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class YamlFileLoader extends FileLoader
{
    private $yamlParser;

    /**
     * {@inheritdoc}
     */
    protected function loadResource($resource)
    {
        if (null === $this->yamlParser) {
            if (!class_exists('Symfony\Component\Yaml\Parser')) {
<<<<<<< HEAD
                throw new \LogicException('Loading translations from the YAML format requires the Symfony Yaml component.');
=======
                throw new LogicException('Loading translations from the YAML format requires the Symfony Yaml component.');
>>>>>>> dev
            }

            $this->yamlParser = new YamlParser();
        }

        try {
<<<<<<< HEAD
            $messages = $this->yamlParser->parse(file_get_contents($resource));
=======
            $messages = $this->yamlParser->parseFile($resource, Yaml::PARSE_CONSTANT);
>>>>>>> dev
        } catch (ParseException $e) {
            throw new InvalidResourceException(sprintf('Error parsing YAML, invalid file "%s"', $resource), 0, $e);
        }

        return $messages;
    }
}
