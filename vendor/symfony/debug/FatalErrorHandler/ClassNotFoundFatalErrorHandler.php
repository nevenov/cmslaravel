<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\FatalErrorHandler;

<<<<<<< HEAD
use Symfony\Component\Debug\Exception\ClassNotFoundException;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Debug\DebugClassLoader;
use Composer\Autoload\ClassLoader as ComposerClassLoader;
use Symfony\Component\ClassLoader\ClassLoader as SymfonyClassLoader;
=======
use Composer\Autoload\ClassLoader as ComposerClassLoader;
use Symfony\Component\ClassLoader\ClassLoader as SymfonyClassLoader;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Debug\Exception\ClassNotFoundException;
use Symfony\Component\Debug\Exception\FatalErrorException;
>>>>>>> dev

/**
 * ErrorHandler for classes that do not exist.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ClassNotFoundFatalErrorHandler implements FatalErrorHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handleError(array $error, FatalErrorException $exception)
    {
<<<<<<< HEAD
        $messageLen = strlen($error['message']);
        $notFoundSuffix = '\' not found';
        $notFoundSuffixLen = strlen($notFoundSuffix);
=======
        $messageLen = \strlen($error['message']);
        $notFoundSuffix = '\' not found';
        $notFoundSuffixLen = \strlen($notFoundSuffix);
>>>>>>> dev
        if ($notFoundSuffixLen > $messageLen) {
            return;
        }

        if (0 !== substr_compare($error['message'], $notFoundSuffix, -$notFoundSuffixLen)) {
            return;
        }

<<<<<<< HEAD
        foreach (array('class', 'interface', 'trait') as $typeName) {
            $prefix = ucfirst($typeName).' \'';
            $prefixLen = strlen($prefix);
=======
        foreach (['class', 'interface', 'trait'] as $typeName) {
            $prefix = ucfirst($typeName).' \'';
            $prefixLen = \strlen($prefix);
>>>>>>> dev
            if (0 !== strpos($error['message'], $prefix)) {
                continue;
            }

            $fullyQualifiedClassName = substr($error['message'], $prefixLen, -$notFoundSuffixLen);
            if (false !== $namespaceSeparatorIndex = strrpos($fullyQualifiedClassName, '\\')) {
                $className = substr($fullyQualifiedClassName, $namespaceSeparatorIndex + 1);
                $namespacePrefix = substr($fullyQualifiedClassName, 0, $namespaceSeparatorIndex);
                $message = sprintf('Attempted to load %s "%s" from namespace "%s".', $typeName, $className, $namespacePrefix);
                $tail = ' for another namespace?';
            } else {
                $className = $fullyQualifiedClassName;
                $message = sprintf('Attempted to load %s "%s" from the global namespace.', $typeName, $className);
                $tail = '?';
            }

            if ($candidates = $this->getClassCandidates($className)) {
                $tail = array_pop($candidates).'"?';
                if ($candidates) {
                    $tail = ' for e.g. "'.implode('", "', $candidates).'" or "'.$tail;
                } else {
                    $tail = ' for "'.$tail;
                }
            }
            $message .= "\nDid you forget a \"use\" statement".$tail;

            return new ClassNotFoundException($message, $exception);
        }
    }

    /**
     * Tries to guess the full namespace for a given class name.
     *
     * By default, it looks for PSR-0 and PSR-4 classes registered via a Symfony or a Composer
     * autoloader (that should cover all common cases).
     *
     * @param string $class A class name (without its namespace)
     *
     * @return array An array of possible fully qualified class names
     */
<<<<<<< HEAD
    private function getClassCandidates($class)
    {
        if (!is_array($functions = spl_autoload_functions())) {
            return array();
        }

        // find Symfony and Composer autoloaders
        $classes = array();

        foreach ($functions as $function) {
            if (!is_array($function)) {
=======
    private function getClassCandidates(string $class): array
    {
        if (!\is_array($functions = spl_autoload_functions())) {
            return [];
        }

        // find Symfony and Composer autoloaders
        $classes = [];

        foreach ($functions as $function) {
            if (!\is_array($function)) {
>>>>>>> dev
                continue;
            }
            // get class loaders wrapped by DebugClassLoader
            if ($function[0] instanceof DebugClassLoader) {
                $function = $function[0]->getClassLoader();

<<<<<<< HEAD
                if (!is_array($function)) {
=======
                if (!\is_array($function)) {
>>>>>>> dev
                    continue;
                }
            }

            if ($function[0] instanceof ComposerClassLoader || $function[0] instanceof SymfonyClassLoader) {
                foreach ($function[0]->getPrefixes() as $prefix => $paths) {
                    foreach ($paths as $path) {
                        $classes = array_merge($classes, $this->findClassInPath($path, $class, $prefix));
                    }
                }
            }
            if ($function[0] instanceof ComposerClassLoader) {
                foreach ($function[0]->getPrefixesPsr4() as $prefix => $paths) {
                    foreach ($paths as $path) {
                        $classes = array_merge($classes, $this->findClassInPath($path, $class, $prefix));
                    }
                }
            }
        }

        return array_unique($classes);
    }

<<<<<<< HEAD
    /**
     * @param string $path
     * @param string $class
     * @param string $prefix
     *
     * @return array
     */
    private function findClassInPath($path, $class, $prefix)
    {
        if (!$path = realpath($path.'/'.strtr($prefix, '\\_', '//')) ?: realpath($path.'/'.dirname(strtr($prefix, '\\_', '//'))) ?: realpath($path)) {
            return array();
        }

        $classes = array();
=======
    private function findClassInPath(string $path, string $class, string $prefix): array
    {
        if (!$path = realpath($path.'/'.strtr($prefix, '\\_', '//')) ?: realpath($path.'/'.\dirname(strtr($prefix, '\\_', '//'))) ?: realpath($path)) {
            return [];
        }

        $classes = [];
>>>>>>> dev
        $filename = $class.'.php';
        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::LEAVES_ONLY) as $file) {
            if ($filename == $file->getFileName() && $class = $this->convertFileToClass($path, $file->getPathName(), $prefix)) {
                $classes[] = $class;
            }
        }

        return $classes;
    }

<<<<<<< HEAD
    /**
     * @param string $path
     * @param string $file
     * @param string $prefix
     *
     * @return string|null
     */
    private function convertFileToClass($path, $file, $prefix)
    {
        $candidates = array(
            // namespaced class
            $namespacedClass = str_replace(array($path.DIRECTORY_SEPARATOR, '.php', '/'), array('', '', '\\'), $file),
=======
    private function convertFileToClass(string $path, string $file, string $prefix): ?string
    {
        $candidates = [
            // namespaced class
            $namespacedClass = str_replace([$path.\DIRECTORY_SEPARATOR, '.php', '/'], ['', '', '\\'], $file),
>>>>>>> dev
            // namespaced class (with target dir)
            $prefix.$namespacedClass,
            // namespaced class (with target dir and separator)
            $prefix.'\\'.$namespacedClass,
            // PEAR class
            str_replace('\\', '_', $namespacedClass),
            // PEAR class (with target dir)
            str_replace('\\', '_', $prefix.$namespacedClass),
            // PEAR class (with target dir and separator)
            str_replace('\\', '_', $prefix.'\\'.$namespacedClass),
<<<<<<< HEAD
        );

        if ($prefix) {
            $candidates = array_filter($candidates, function ($candidate) use ($prefix) {return 0 === strpos($candidate, $prefix);});
=======
        ];

        if ($prefix) {
            $candidates = array_filter($candidates, function ($candidate) use ($prefix) { return 0 === strpos($candidate, $prefix); });
>>>>>>> dev
        }

        // We cannot use the autoloader here as most of them use require; but if the class
        // is not found, the new autoloader call will require the file again leading to a
        // "cannot redeclare class" error.
        foreach ($candidates as $candidate) {
            if ($this->classExists($candidate)) {
                return $candidate;
            }
        }

        require_once $file;

        foreach ($candidates as $candidate) {
            if ($this->classExists($candidate)) {
                return $candidate;
            }
        }
<<<<<<< HEAD
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    private function classExists($class)
=======

        return null;
    }

    private function classExists(string $class): bool
>>>>>>> dev
    {
        return class_exists($class, false) || interface_exists($class, false) || trait_exists($class, false);
    }
}
