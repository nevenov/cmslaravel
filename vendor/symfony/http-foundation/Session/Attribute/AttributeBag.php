<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Attribute;

/**
 * This class relates to session attribute storage.
 */
class AttributeBag implements AttributeBagInterface, \IteratorAggregate, \Countable
{
    private $name = 'attributes';
<<<<<<< HEAD

    /**
     * @var string
     */
    private $storageKey;

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * Constructor.
     *
     * @param string $storageKey The key used to store attributes in the session
     */
    public function __construct($storageKey = '_sf2_attributes')
=======
    private $storageKey;

    protected $attributes = [];

    /**
     * @param string $storageKey The key used to store attributes in the session
     */
    public function __construct(string $storageKey = '_sf2_attributes')
>>>>>>> dev
    {
        $this->storageKey = $storageKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array &$attributes)
    {
        $this->attributes = &$attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function getStorageKey()
    {
        return $this->storageKey;
    }

    /**
     * {@inheritdoc}
     */
    public function has($name)
    {
<<<<<<< HEAD
        return array_key_exists($name, $this->attributes);
=======
        return \array_key_exists($name, $this->attributes);
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function get($name, $default = null)
    {
<<<<<<< HEAD
        return array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
=======
        return \array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $attributes)
    {
<<<<<<< HEAD
        $this->attributes = array();
=======
        $this->attributes = [];
>>>>>>> dev
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function remove($name)
    {
        $retval = null;
<<<<<<< HEAD
        if (array_key_exists($name, $this->attributes)) {
=======
        if (\array_key_exists($name, $this->attributes)) {
>>>>>>> dev
            $retval = $this->attributes[$name];
            unset($this->attributes[$name]);
        }

        return $retval;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $return = $this->attributes;
<<<<<<< HEAD
        $this->attributes = array();
=======
        $this->attributes = [];
>>>>>>> dev

        return $return;
    }

    /**
     * Returns an iterator for attributes.
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     * Returns the number of attributes.
     *
     * @return int The number of attributes
     */
    public function count()
    {
<<<<<<< HEAD
        return count($this->attributes);
=======
        return \count($this->attributes);
>>>>>>> dev
    }
}
