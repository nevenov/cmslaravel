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
 * A Test can be run and collect its results.
 *
 * @since Interface available since Release 2.0.0
 */
interface PHPUnit_Framework_Test extends Countable
=======
namespace PHPUnit\Framework;

use Countable;

/**
 * A Test can be run and collect its results.
 */
interface Test extends Countable
>>>>>>> dev
{
    /**
     * Runs a test and collects its result in a TestResult instance.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     */
    public function run(PHPUnit_Framework_TestResult $result = null);
=======
     * @param TestResult $result
     *
     * @return TestResult
     */
    public function run(TestResult $result = null);
>>>>>>> dev
}
