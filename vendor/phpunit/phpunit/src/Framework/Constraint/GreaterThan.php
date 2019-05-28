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
>>>>>>> dev

/**
 * Constraint that asserts that the value it is evaluated for is greater
 * than a given value.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_GreaterThan extends PHPUnit_Framework_Constraint
{
    /**
     * @var numeric
=======
 */
class GreaterThan extends Constraint
{
    /**
     * @var int|float
>>>>>>> dev
     */
    protected $value;

    /**
<<<<<<< HEAD
     * @param numeric $value
=======
     * @param int|float $value
>>>>>>> dev
     */
    public function __construct($value)
    {
        parent::__construct();
<<<<<<< HEAD
=======

>>>>>>> dev
        $this->value = $value;
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
        return $this->value < $other;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is greater than ' . $this->exporter->export($this->value);
    }
}
