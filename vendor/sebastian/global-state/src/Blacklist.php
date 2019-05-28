<?php
/*
<<<<<<< HEAD
 * This file is part of the GlobalState package.
=======
 * This file is part of sebastian/global-state.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> dev
namespace SebastianBergmann\GlobalState;

use ReflectionClass;

/**
 * A blacklist for global state elements that should not be snapshotted.
 */
class Blacklist
{
    /**
     * @var array
     */
<<<<<<< HEAD
    private $globalVariables = array();

    /**
     * @var array
     */
    private $classes = array();

    /**
     * @var array
     */
    private $classNamePrefixes = array();

    /**
     * @var array
     */
    private $parentClasses = array();

    /**
     * @var array
     */
    private $interfaces = array();
=======
    private $globalVariables = [];

    /**
     * @var string[]
     */
    private $classes = [];

    /**
     * @var string[]
     */
    private $classNamePrefixes = [];

    /**
     * @var string[]
     */
    private $parentClasses = [];

    /**
     * @var string[]
     */
    private $interfaces = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $staticAttributes = array();

    /**
     * @param string $variableName
     */
    public function addGlobalVariable($variableName)
=======
    private $staticAttributes = [];

    public function addGlobalVariable(string $variableName)
>>>>>>> dev
    {
        $this->globalVariables[$variableName] = true;
    }

<<<<<<< HEAD
    /**
     * @param string $className
     */
    public function addClass($className)
=======
    public function addClass(string $className)
>>>>>>> dev
    {
        $this->classes[] = $className;
    }

<<<<<<< HEAD
    /**
     * @param string $className
     */
    public function addSubclassesOf($className)
=======
    public function addSubclassesOf(string $className)
>>>>>>> dev
    {
        $this->parentClasses[] = $className;
    }

<<<<<<< HEAD
    /**
     * @param string $interfaceName
     */
    public function addImplementorsOf($interfaceName)
=======
    public function addImplementorsOf(string $interfaceName)
>>>>>>> dev
    {
        $this->interfaces[] = $interfaceName;
    }

<<<<<<< HEAD
    /**
     * @param string $classNamePrefix
     */
    public function addClassNamePrefix($classNamePrefix)
=======
    public function addClassNamePrefix(string $classNamePrefix)
>>>>>>> dev
    {
        $this->classNamePrefixes[] = $classNamePrefix;
    }

<<<<<<< HEAD
    /**
     * @param string $className
     * @param string $attributeName
     */
    public function addStaticAttribute($className, $attributeName)
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = array();
=======
    public function addStaticAttribute(string $className, string $attributeName)
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = [];
>>>>>>> dev
        }

        $this->staticAttributes[$className][$attributeName] = true;
    }

<<<<<<< HEAD
    /**
     * @param  string $variableName
     * @return bool
     */
    public function isGlobalVariableBlacklisted($variableName)
=======
    public function isGlobalVariableBlacklisted(string $variableName): bool
>>>>>>> dev
    {
        return isset($this->globalVariables[$variableName]);
    }

<<<<<<< HEAD
    /**
     * @param  string $className
     * @param  string $attributeName
     * @return bool
     */
    public function isStaticAttributeBlacklisted($className, $attributeName)
    {
        if (in_array($className, $this->classes)) {
=======
    public function isStaticAttributeBlacklisted(string $className, string $attributeName): bool
    {
        if (\in_array($className, $this->classes)) {
>>>>>>> dev
            return true;
        }

        foreach ($this->classNamePrefixes as $prefix) {
<<<<<<< HEAD
            if (strpos($className, $prefix) === 0) {
=======
            if (\strpos($className, $prefix) === 0) {
>>>>>>> dev
                return true;
            }
        }

        $class = new ReflectionClass($className);

        foreach ($this->parentClasses as $type) {
            if ($class->isSubclassOf($type)) {
                return true;
            }
        }

        foreach ($this->interfaces as $type) {
            if ($class->implementsInterface($type)) {
                return true;
            }
        }

        if (isset($this->staticAttributes[$className][$attributeName])) {
            return true;
        }

        return false;
    }
}
