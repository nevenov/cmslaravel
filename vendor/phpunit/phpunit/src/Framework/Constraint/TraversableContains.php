<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======
namespace PHPUnit\Framework\Constraint;

use PHPUnit\Util\InvalidArgumentHelper;
use SplObjectStorage;
>>>>>>> dev

/**
 * Constraint that asserts that the Traversable it is applied to contains
 * a given value.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_TraversableContains extends PHPUnit_Framework_Constraint
=======
 */
class TraversableContains extends Constraint
>>>>>>> dev
{
    /**
     * @var bool
     */
    protected $checkForObjectIdentity;

    /**
     * @var bool
     */
    protected $checkForNonObjectIdentity;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     * @param bool  $checkForObjectIdentity
     * @param bool  $checkForNonObjectIdentity
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
=======
     * @throws \PHPUnit\Framework\Exception
>>>>>>> dev
     */
    public function __construct($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        parent::__construct();

<<<<<<< HEAD
        if (!is_bool($checkForObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        if (!is_bool($checkForNonObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'boolean');
=======
        if (!\is_bool($checkForObjectIdentity)) {
            throw InvalidArgumentHelper::factory(2, 'boolean');
        }

        if (!\is_bool($checkForNonObjectIdentity)) {
            throw InvalidArgumentHelper::factory(3, 'boolean');
>>>>>>> dev
        }

        $this->checkForObjectIdentity    = $checkForObjectIdentity;
        $this->checkForNonObjectIdentity = $checkForNonObjectIdentity;
        $this->value                     = $value;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        if ($other instanceof SplObjectStorage) {
            return $other->contains($this->value);
        }

<<<<<<< HEAD
        if (is_object($this->value)) {
            foreach ($other as $element) {
                if ($this->checkForObjectIdentity && $element === $this->value) {
                    return true;
                } elseif (!$this->checkForObjectIdentity && $element == $this->value) {
=======
        if (\is_object($this->value)) {
            foreach ($other as $element) {
                if ($this->checkForObjectIdentity && $element === $this->value) {
                    return true;
                }

                if (!$this->checkForObjectIdentity && $element == $this->value) {
>>>>>>> dev
                    return true;
                }
            }
        } else {
            foreach ($other as $element) {
                if ($this->checkForNonObjectIdentity && $element === $this->value) {
                    return true;
<<<<<<< HEAD
                } elseif (!$this->checkForNonObjectIdentity && $element == $this->value) {
=======
                }

                if (!$this->checkForNonObjectIdentity && $element == $this->value) {
>>>>>>> dev
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
<<<<<<< HEAD
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        } else {
            return 'contains ' . $this->exporter->export($this->value);
        }
=======
        if (\is_string($this->value) && \strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        }

        return 'contains ' . $this->exporter->export($this->value);
>>>>>>> dev
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
<<<<<<< HEAD
        return sprintf(
            '%s %s',
            is_array($other) ? 'an array' : 'a traversable',
=======
        return \sprintf(
            '%s %s',
            \is_array($other) ? 'an array' : 'a traversable',
>>>>>>> dev
            $this->toString()
        );
    }
}
