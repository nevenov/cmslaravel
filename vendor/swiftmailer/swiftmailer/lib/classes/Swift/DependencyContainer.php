<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Dependency Injection container.
 *
<<<<<<< HEAD
 * @author Chris Corbyn
=======
 * @author  Chris Corbyn
>>>>>>> dev
 */
class Swift_DependencyContainer
{
    /** Constant for literal value types */
<<<<<<< HEAD
    const TYPE_VALUE = 0x0001;

    /** Constant for new instance types */
    const TYPE_INSTANCE = 0x0010;

    /** Constant for shared instance types */
    const TYPE_SHARED = 0x0100;

    /** Constant for aliases */
    const TYPE_ALIAS = 0x1000;

    /** Singleton instance */
    private static $_instance = null;

    /** The data container */
    private $_store = array();

    /** The current endpoint in the data container */
    private $_endPoint;
=======
    const TYPE_VALUE = 0x00001;

    /** Constant for new instance types */
    const TYPE_INSTANCE = 0x00010;

    /** Constant for shared instance types */
    const TYPE_SHARED = 0x00100;

    /** Constant for aliases */
    const TYPE_ALIAS = 0x01000;

    /** Constant for arrays */
    const TYPE_ARRAY = 0x10000;

    /** Singleton instance */
    private static $instance = null;

    /** The data container */
    private $store = [];

    /** The current endpoint in the data container */
    private $endPoint;
>>>>>>> dev

    /**
     * Constructor should not be used.
     *
     * Use {@link getInstance()} instead.
     */
    public function __construct()
    {
    }

    /**
     * Returns a singleton of the DependencyContainer.
     *
     * @return self
     */
    public static function getInstance()
    {
<<<<<<< HEAD
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
=======
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
>>>>>>> dev
    }

    /**
     * List the names of all items stored in the Container.
     *
     * @return array
     */
    public function listItems()
    {
<<<<<<< HEAD
        return array_keys($this->_store);
=======
        return array_keys($this->store);
>>>>>>> dev
    }

    /**
     * Test if an item is registered in this container with the given name.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return bool
     */
    public function has($itemName)
    {
<<<<<<< HEAD
        return array_key_exists($itemName, $this->_store)
            && isset($this->_store[$itemName]['lookupType']);
=======
        return array_key_exists($itemName, $this->store)
            && isset($this->store[$itemName]['lookupType']);
>>>>>>> dev
    }

    /**
     * Lookup the item with the given $itemName.
     *
     * @see register()
     *
     * @param string $itemName
     *
<<<<<<< HEAD
     * @throws Swift_DependencyException If the dependency is not found
     *
     * @return mixed
=======
     * @return mixed
     *
     * @throws Swift_DependencyException If the dependency is not found
>>>>>>> dev
     */
    public function lookup($itemName)
    {
        if (!$this->has($itemName)) {
            throw new Swift_DependencyException(
                'Cannot lookup dependency "'.$itemName.'" since it is not registered.'
                );
        }

<<<<<<< HEAD
        switch ($this->_store[$itemName]['lookupType']) {
            case self::TYPE_ALIAS:
                return $this->_createAlias($itemName);
            case self::TYPE_VALUE:
                return $this->_getValue($itemName);
            case self::TYPE_INSTANCE:
                return $this->_createNewInstance($itemName);
            case self::TYPE_SHARED:
                return $this->_createSharedInstance($itemName);
=======
        switch ($this->store[$itemName]['lookupType']) {
            case self::TYPE_ALIAS:
                return $this->createAlias($itemName);
            case self::TYPE_VALUE:
                return $this->getValue($itemName);
            case self::TYPE_INSTANCE:
                return $this->createNewInstance($itemName);
            case self::TYPE_SHARED:
                return $this->createSharedInstance($itemName);
            case self::TYPE_ARRAY:
                return $this->createDependenciesFor($itemName);
>>>>>>> dev
        }
    }

    /**
     * Create an array of arguments passed to the constructor of $itemName.
     *
     * @param string $itemName
     *
     * @return array
     */
    public function createDependenciesFor($itemName)
    {
<<<<<<< HEAD
        $args = array();
        if (isset($this->_store[$itemName]['args'])) {
            $args = $this->_resolveArgs($this->_store[$itemName]['args']);
=======
        $args = [];
        if (isset($this->store[$itemName]['args'])) {
            $args = $this->resolveArgs($this->store[$itemName]['args']);
>>>>>>> dev
        }

        return $args;
    }

    /**
     * Register a new dependency with $itemName.
     *
     * This method returns the current DependencyContainer instance because it
     * requires the use of the fluid interface to set the specific details for the
     * dependency.
     *
     * @see asNewInstanceOf(), asSharedInstanceOf(), asValue()
     *
     * @param string $itemName
     *
     * @return $this
     */
    public function register($itemName)
    {
<<<<<<< HEAD
        $this->_store[$itemName] = array();
        $this->_endPoint = &$this->_store[$itemName];
=======
        $this->store[$itemName] = [];
        $this->endPoint = &$this->store[$itemName];
>>>>>>> dev

        return $this;
    }

    /**
     * Specify the previously registered item as a literal value.
     *
     * {@link register()} must be called before this will work.
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function asValue($value)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
=======
        $endPoint = &$this->getEndPoint();
>>>>>>> dev
        $endPoint['lookupType'] = self::TYPE_VALUE;
        $endPoint['value'] = $value;

        return $this;
    }

    /**
     * Specify the previously registered item as an alias of another item.
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function asAliasOf($lookup)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
=======
        $endPoint = &$this->getEndPoint();
>>>>>>> dev
        $endPoint['lookupType'] = self::TYPE_ALIAS;
        $endPoint['ref'] = $lookup;

        return $this;
    }

    /**
     * Specify the previously registered item as a new instance of $className.
     *
     * {@link register()} must be called before this will work.
     * Any arguments can be set with {@link withDependencies()},
     * {@link addConstructorValue()} or {@link addConstructorLookup()}.
     *
     * @see withDependencies(), addConstructorValue(), addConstructorLookup()
     *
     * @param string $className
     *
     * @return $this
     */
    public function asNewInstanceOf($className)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
=======
        $endPoint = &$this->getEndPoint();
>>>>>>> dev
        $endPoint['lookupType'] = self::TYPE_INSTANCE;
        $endPoint['className'] = $className;

        return $this;
    }

    /**
     * Specify the previously registered item as a shared instance of $className.
     *
     * {@link register()} must be called before this will work.
     *
     * @param string $className
     *
     * @return $this
     */
    public function asSharedInstanceOf($className)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
=======
        $endPoint = &$this->getEndPoint();
>>>>>>> dev
        $endPoint['lookupType'] = self::TYPE_SHARED;
        $endPoint['className'] = $className;

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Specify the previously registered item as array of dependencies.
     *
     * {@link register()} must be called before this will work.
     *
     * @return $this
     */
    public function asArray()
    {
        $endPoint = &$this->getEndPoint();
        $endPoint['lookupType'] = self::TYPE_ARRAY;

        return $this;
    }

    /**
>>>>>>> dev
     * Specify a list of injected dependencies for the previously registered item.
     *
     * This method takes an array of lookup names.
     *
     * @see addConstructorValue(), addConstructorLookup()
     *
<<<<<<< HEAD
     * @param array $lookups
     *
=======
>>>>>>> dev
     * @return $this
     */
    public function withDependencies(array $lookups)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
        $endPoint['args'] = array();
=======
        $endPoint = &$this->getEndPoint();
        $endPoint['args'] = [];
>>>>>>> dev
        foreach ($lookups as $lookup) {
            $this->addConstructorLookup($lookup);
        }

        return $this;
    }

    /**
     * Specify a literal (non looked up) value for the constructor of the
     * previously registered item.
     *
     * @see withDependencies(), addConstructorLookup()
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function addConstructorValue($value)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
        if (!isset($endPoint['args'])) {
            $endPoint['args'] = array();
        }
        $endPoint['args'][] = array('type' => 'value', 'item' => $value);
=======
        $endPoint = &$this->getEndPoint();
        if (!isset($endPoint['args'])) {
            $endPoint['args'] = [];
        }
        $endPoint['args'][] = ['type' => 'value', 'item' => $value];
>>>>>>> dev

        return $this;
    }

    /**
     * Specify a dependency lookup for the constructor of the previously
     * registered item.
     *
     * @see withDependencies(), addConstructorValue()
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function addConstructorLookup($lookup)
    {
<<<<<<< HEAD
        $endPoint = &$this->_getEndPoint();
        if (!isset($this->_endPoint['args'])) {
            $endPoint['args'] = array();
        }
        $endPoint['args'][] = array('type' => 'lookup', 'item' => $lookup);
=======
        $endPoint = &$this->getEndPoint();
        if (!isset($this->endPoint['args'])) {
            $endPoint['args'] = [];
        }
        $endPoint['args'][] = ['type' => 'lookup', 'item' => $lookup];
>>>>>>> dev

        return $this;
    }

    /** Get the literal value with $itemName */
<<<<<<< HEAD
    private function _getValue($itemName)
    {
        return $this->_store[$itemName]['value'];
    }

    /** Resolve an alias to another item */
    private function _createAlias($itemName)
    {
        return $this->lookup($this->_store[$itemName]['ref']);
    }

    /** Create a fresh instance of $itemName */
    private function _createNewInstance($itemName)
    {
        $reflector = new ReflectionClass($this->_store[$itemName]['className']);
=======
    private function getValue($itemName)
    {
        return $this->store[$itemName]['value'];
    }

    /** Resolve an alias to another item */
    private function createAlias($itemName)
    {
        return $this->lookup($this->store[$itemName]['ref']);
    }

    /** Create a fresh instance of $itemName */
    private function createNewInstance($itemName)
    {
        $reflector = new ReflectionClass($this->store[$itemName]['className']);
>>>>>>> dev
        if ($reflector->getConstructor()) {
            return $reflector->newInstanceArgs(
                $this->createDependenciesFor($itemName)
                );
        }

        return $reflector->newInstance();
    }

    /** Create and register a shared instance of $itemName */
<<<<<<< HEAD
    private function _createSharedInstance($itemName)
    {
        if (!isset($this->_store[$itemName]['instance'])) {
            $this->_store[$itemName]['instance'] = $this->_createNewInstance($itemName);
        }

        return $this->_store[$itemName]['instance'];
    }

    /** Get the current endpoint in the store */
    private function &_getEndPoint()
    {
        if (!isset($this->_endPoint)) {
=======
    private function createSharedInstance($itemName)
    {
        if (!isset($this->store[$itemName]['instance'])) {
            $this->store[$itemName]['instance'] = $this->createNewInstance($itemName);
        }

        return $this->store[$itemName]['instance'];
    }

    /** Get the current endpoint in the store */
    private function &getEndPoint()
    {
        if (!isset($this->endPoint)) {
>>>>>>> dev
            throw new BadMethodCallException(
                'Component must first be registered by calling register()'
                );
        }

<<<<<<< HEAD
        return $this->_endPoint;
    }

    /** Get an argument list with dependencies resolved */
    private function _resolveArgs(array $args)
    {
        $resolved = array();
        foreach ($args as $argDefinition) {
            switch ($argDefinition['type']) {
                case 'lookup':
                    $resolved[] = $this->_lookupRecursive($argDefinition['item']);
=======
        return $this->endPoint;
    }

    /** Get an argument list with dependencies resolved */
    private function resolveArgs(array $args)
    {
        $resolved = [];
        foreach ($args as $argDefinition) {
            switch ($argDefinition['type']) {
                case 'lookup':
                    $resolved[] = $this->lookupRecursive($argDefinition['item']);
>>>>>>> dev
                    break;
                case 'value':
                    $resolved[] = $argDefinition['item'];
                    break;
            }
        }

        return $resolved;
    }

    /** Resolve a single dependency with an collections */
<<<<<<< HEAD
    private function _lookupRecursive($item)
    {
        if (is_array($item)) {
            $collection = array();
            foreach ($item as $k => $v) {
                $collection[$k] = $this->_lookupRecursive($v);
=======
    private function lookupRecursive($item)
    {
        if (is_array($item)) {
            $collection = [];
            foreach ($item as $k => $v) {
                $collection[$k] = $this->lookupRecursive($v);
>>>>>>> dev
            }

            return $collection;
        }

        return $this->lookup($item);
    }
}
