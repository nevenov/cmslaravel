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
namespace PHPUnit\Framework;

use SebastianBergmann\Comparator\ComparisonFailure;
>>>>>>> dev

/**
 * Exception for expectations which failed their check.
 *
 * The exception contains the error message and optionally a
 * SebastianBergmann\Comparator\ComparisonFailure which is used to
 * generate diff output of the failed expectations.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_ExpectationFailedException extends PHPUnit_Framework_AssertionFailedError
{
    /**
     * @var SebastianBergmann\Comparator\ComparisonFailure
     */
    protected $comparisonFailure;

    public function __construct($message, SebastianBergmann\Comparator\ComparisonFailure $comparisonFailure = null, Exception $previous = null)
=======
 */
class ExpectationFailedException extends AssertionFailedError
{
    protected $comparisonFailure;

    /**
     * @param string                 $message
     * @param ComparisonFailure|null $comparisonFailure
     * @param \Exception|null        $previous
     */
    public function __construct($message, ComparisonFailure $comparisonFailure = null, \Exception $previous = null)
>>>>>>> dev
    {
        $this->comparisonFailure = $comparisonFailure;

        parent::__construct($message, 0, $previous);
    }

    /**
<<<<<<< HEAD
     * @return SebastianBergmann\Comparator\ComparisonFailure
=======
     * @return null|ComparisonFailure
>>>>>>> dev
     */
    public function getComparisonFailure()
    {
        return $this->comparisonFailure;
    }
}
