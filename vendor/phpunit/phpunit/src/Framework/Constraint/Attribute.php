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

/**
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_Attribute extends PHPUnit_Framework_Constraint_Composite
=======
namespace PHPUnit\Framework\Constraint;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\ExpectationFailedException;

class Attribute extends Composite
>>>>>>> dev
{
    /**
     * @var string
     */
    protected $attributeName;

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $attributeName
     */
    public function __construct(PHPUnit_Framework_Constraint $constraint, $attributeName)
=======
     * @param Constraint $constraint
     * @param string     $attributeName
     */
    public function __construct(Constraint $constraint, $attributeName)
>>>>>>> dev
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
    }

    /**
     * Evaluates the constraint for parameter $other
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
     * @param mixed  $other        Value or object to evaluate.
     * @param string $description  Additional information about the test
     * @param bool   $returnResult Whether to return a result or throw an exception
     *
     * @return mixed
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_ExpectationFailedException
=======
     * @throws ExpectationFailedException
>>>>>>> dev
     */
    public function evaluate($other, $description = '', $returnResult = false)
    {
        return parent::evaluate(
<<<<<<< HEAD
            PHPUnit_Framework_Assert::readAttribute(
=======
            Assert::readAttribute(
>>>>>>> dev
                $other,
                $this->attributeName
            ),
            $description,
            $returnResult
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'attribute "' . $this->attributeName . '" ' .
<<<<<<< HEAD
               $this->innerConstraint->toString();
=======
            $this->innerConstraint->toString();
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
        return $this->toString();
    }
}
