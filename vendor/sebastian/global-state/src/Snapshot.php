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
use Serializable;

/**
 * A snapshot of global state.
 */
class Snapshot
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $globalVariables = array();
=======
    private $globalVariables = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $superGlobalArrays = array();
=======
    private $superGlobalArrays = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $superGlobalVariables = array();
=======
    private $superGlobalVariables = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $staticAttributes = array();
=======
    private $staticAttributes = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $iniSettings = array();
=======
    private $iniSettings = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $includedFiles = array();
=======
    private $includedFiles = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $constants = array();
=======
    private $constants = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $functions = array();
=======
    private $functions = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $interfaces = array();
=======
    private $interfaces = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $classes = array();
=======
    private $classes = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $traits = array();

    /**
     * Creates a snapshot of the current global state.
     *
     * @param Blacklist $blacklist
     * @param bool      $includeGlobalVariables
     * @param bool      $includeStaticAttributes
     * @param bool      $includeConstants
     * @param bool      $includeFunctions
     * @param bool      $includeClasses
     * @param bool      $includeInterfaces
     * @param bool      $includeTraits
     * @param bool      $includeIniSettings
     * @param bool      $includeIncludedFiles
     */
    public function __construct(Blacklist $blacklist = null, $includeGlobalVariables = true, $includeStaticAttributes = true, $includeConstants = true, $includeFunctions = true, $includeClasses = true, $includeInterfaces = true, $includeTraits = true, $includeIniSettings = true, $includeIncludedFiles = true)
=======
    private $traits = [];

    /**
     * Creates a snapshot of the current global state.
     */
    public function __construct(Blacklist $blacklist = null, bool $includeGlobalVariables = true, bool $includeStaticAttributes = true, bool $includeConstants = true, bool $includeFunctions = true, bool $includeClasses = true, bool $includeInterfaces = true, bool $includeTraits = true, bool $includeIniSettings = true, bool $includeIncludedFiles = true)
>>>>>>> dev
    {
        if ($blacklist === null) {
            $blacklist = new Blacklist;
        }

        $this->blacklist = $blacklist;

        if ($includeConstants) {
            $this->snapshotConstants();
        }

        if ($includeFunctions) {
            $this->snapshotFunctions();
        }

        if ($includeClasses || $includeStaticAttributes) {
            $this->snapshotClasses();
        }

        if ($includeInterfaces) {
            $this->snapshotInterfaces();
        }

        if ($includeGlobalVariables) {
            $this->setupSuperGlobalArrays();
            $this->snapshotGlobals();
        }

        if ($includeStaticAttributes) {
            $this->snapshotStaticAttributes();
        }

        if ($includeIniSettings) {
<<<<<<< HEAD
            $this->iniSettings = ini_get_all(null, false);
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = get_included_files();
        }

        if (function_exists('get_declared_traits')) {
            $this->traits = get_declared_traits();
        }
    }

    /**
     * @return Blacklist
     */
    public function blacklist()
=======
            $this->iniSettings = \ini_get_all(null, false);
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = \get_included_files();
        }

        $this->traits = \get_declared_traits();
    }

    public function blacklist(): Blacklist
>>>>>>> dev
    {
        return $this->blacklist;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function globalVariables()
=======
    public function globalVariables(): array
>>>>>>> dev
    {
        return $this->globalVariables;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function superGlobalVariables()
=======
    public function superGlobalVariables(): array
>>>>>>> dev
    {
        return $this->superGlobalVariables;
    }

<<<<<<< HEAD
    /**
     * Returns a list of all super-global variable arrays.
     *
     * @return array
     */
    public function superGlobalArrays()
=======
    public function superGlobalArrays(): array
>>>>>>> dev
    {
        return $this->superGlobalArrays;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function staticAttributes()
=======
    public function staticAttributes(): array
>>>>>>> dev
    {
        return $this->staticAttributes;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function iniSettings()
=======
    public function iniSettings(): array
>>>>>>> dev
    {
        return $this->iniSettings;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function includedFiles()
=======
    public function includedFiles(): array
>>>>>>> dev
    {
        return $this->includedFiles;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function constants()
=======
    public function constants(): array
>>>>>>> dev
    {
        return $this->constants;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function functions()
=======
    public function functions(): array
>>>>>>> dev
    {
        return $this->functions;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function interfaces()
=======
    public function interfaces(): array
>>>>>>> dev
    {
        return $this->interfaces;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function classes()
=======
    public function classes(): array
>>>>>>> dev
    {
        return $this->classes;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function traits()
=======
    public function traits(): array
>>>>>>> dev
    {
        return $this->traits;
    }

    /**
     * Creates a snapshot user-defined constants.
     */
    private function snapshotConstants()
    {
<<<<<<< HEAD
        $constants = get_defined_constants(true);
=======
        $constants = \get_defined_constants(true);
>>>>>>> dev

        if (isset($constants['user'])) {
            $this->constants = $constants['user'];
        }
    }

    /**
     * Creates a snapshot user-defined functions.
     */
    private function snapshotFunctions()
    {
<<<<<<< HEAD
        $functions = get_defined_functions();
=======
        $functions = \get_defined_functions();
>>>>>>> dev

        $this->functions = $functions['user'];
    }

    /**
     * Creates a snapshot user-defined classes.
     */
    private function snapshotClasses()
    {
<<<<<<< HEAD
        foreach (array_reverse(get_declared_classes()) as $className) {
=======
        foreach (\array_reverse(\get_declared_classes()) as $className) {
>>>>>>> dev
            $class = new ReflectionClass($className);

            if (!$class->isUserDefined()) {
                break;
            }

            $this->classes[] = $className;
        }

<<<<<<< HEAD
        $this->classes = array_reverse($this->classes);
=======
        $this->classes = \array_reverse($this->classes);
>>>>>>> dev
    }

    /**
     * Creates a snapshot user-defined interfaces.
     */
    private function snapshotInterfaces()
    {
<<<<<<< HEAD
        foreach (array_reverse(get_declared_interfaces()) as $interfaceName) {
=======
        foreach (\array_reverse(\get_declared_interfaces()) as $interfaceName) {
>>>>>>> dev
            $class = new ReflectionClass($interfaceName);

            if (!$class->isUserDefined()) {
                break;
            }

            $this->interfaces[] = $interfaceName;
        }

<<<<<<< HEAD
        $this->interfaces = array_reverse($this->interfaces);
=======
        $this->interfaces = \array_reverse($this->interfaces);
>>>>>>> dev
    }

    /**
     * Creates a snapshot of all global and super-global variables.
     */
    private function snapshotGlobals()
    {
        $superGlobalArrays = $this->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->snapshotSuperGlobalArray($superGlobalArray);
        }

<<<<<<< HEAD
        foreach (array_keys($GLOBALS) as $key) {
            if ($key != 'GLOBALS' &&
                !in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
                $this->globalVariables[$key] = unserialize(serialize($GLOBALS[$key]));
=======
        foreach (\array_keys($GLOBALS) as $key) {
            if ($key != 'GLOBALS' &&
                !\in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
                $this->globalVariables[$key] = \unserialize(\serialize($GLOBALS[$key]));
>>>>>>> dev
            }
        }
    }

    /**
     * Creates a snapshot a super-global variable array.
<<<<<<< HEAD
     *
     * @param $superGlobalArray
     */
    private function snapshotSuperGlobalArray($superGlobalArray)
    {
        $this->superGlobalVariables[$superGlobalArray] = array();

        if (isset($GLOBALS[$superGlobalArray]) && is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
                $this->superGlobalVariables[$superGlobalArray][$key] = unserialize(serialize($value));
=======
     */
    private function snapshotSuperGlobalArray(string $superGlobalArray)
    {
        $this->superGlobalVariables[$superGlobalArray] = [];

        if (isset($GLOBALS[$superGlobalArray]) && \is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
                $this->superGlobalVariables[$superGlobalArray][$key] = \unserialize(\serialize($value));
>>>>>>> dev
            }
        }
    }

    /**
     * Creates a snapshot of all static attributes in user-defined classes.
     */
    private function snapshotStaticAttributes()
    {
        foreach ($this->classes as $className) {
            $class    = new ReflectionClass($className);
<<<<<<< HEAD
            $snapshot = array();
=======
            $snapshot = [];
>>>>>>> dev

            foreach ($class->getProperties() as $attribute) {
                if ($attribute->isStatic()) {
                    $name = $attribute->getName();

                    if ($this->blacklist->isStaticAttributeBlacklisted($className, $name)) {
                        continue;
                    }

                    $attribute->setAccessible(true);
                    $value = $attribute->getValue();

                    if ($this->canBeSerialized($value)) {
<<<<<<< HEAD
                        $snapshot[$name] = unserialize(serialize($value));
=======
                        $snapshot[$name] = \unserialize(\serialize($value));
>>>>>>> dev
                    }
                }
            }

            if (!empty($snapshot)) {
                $this->staticAttributes[$className] = $snapshot;
            }
        }
    }

    /**
     * Returns a list of all super-global variable arrays.
<<<<<<< HEAD
     *
     * @return array
     */
    private function setupSuperGlobalArrays()
    {
        $this->superGlobalArrays = array(
=======
     */
    private function setupSuperGlobalArrays()
    {
        $this->superGlobalArrays = [
>>>>>>> dev
            '_ENV',
            '_POST',
            '_GET',
            '_COOKIE',
            '_SERVER',
            '_FILES',
            '_REQUEST'
<<<<<<< HEAD
        );

        if (ini_get('register_long_arrays') == '1') {
            $this->superGlobalArrays = array_merge(
                $this->superGlobalArrays,
                array(
=======
        ];

        if (\ini_get('register_long_arrays') == '1') {
            $this->superGlobalArrays = \array_merge(
                $this->superGlobalArrays,
                [
>>>>>>> dev
                    'HTTP_ENV_VARS',
                    'HTTP_POST_VARS',
                    'HTTP_GET_VARS',
                    'HTTP_COOKIE_VARS',
                    'HTTP_SERVER_VARS',
                    'HTTP_POST_FILES'
<<<<<<< HEAD
                )
=======
                ]
>>>>>>> dev
            );
        }
    }

    /**
<<<<<<< HEAD
     * @param  mixed $variable
     * @return bool
     * @todo   Implement this properly
     */
    private function canBeSerialized($variable)
    {
        if (!is_object($variable)) {
            return !is_resource($variable);
=======
     * @todo Implement this properly
     */
    private function canBeSerialized($variable): bool
    {
        if (!\is_object($variable)) {
            return !\is_resource($variable);
>>>>>>> dev
        }

        if ($variable instanceof \stdClass) {
            return true;
        }

        $class = new ReflectionClass($variable);

        do {
            if ($class->isInternal()) {
                return $variable instanceof Serializable;
            }
        } while ($class = $class->getParentClass());

        return true;
    }
}
