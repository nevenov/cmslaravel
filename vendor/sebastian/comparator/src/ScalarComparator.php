<?php
/*
<<<<<<< HEAD
 * This file is part of the Comparator package.
=======
 * This file is part of sebastian/comparator.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Comparator;

/**
 * Compares scalar or NULL values for equality.
 */
class ScalarComparator extends Comparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
<<<<<<< HEAD
     * @param  mixed $expected The first value to compare
     * @param  mixed $actual   The second value to compare
     * @return bool
=======
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
     * @return bool
     *
>>>>>>> dev
     * @since  Method available since Release 3.6.0
     */
    public function accepts($expected, $actual)
    {
<<<<<<< HEAD
        return ((is_scalar($expected) xor null === $expected) &&
               (is_scalar($actual) xor null === $actual))
               // allow comparison between strings and objects featuring __toString()
               || (is_string($expected) && is_object($actual) && method_exists($actual, '__toString'))
               || (is_object($expected) && method_exists($expected, '__toString') && is_string($actual));
=======
        return ((\is_scalar($expected) xor null === $expected) &&
               (\is_scalar($actual) xor null === $actual))
               // allow comparison between strings and objects featuring __toString()
               || (\is_string($expected) && \is_object($actual) && \method_exists($actual, '__toString'))
               || (\is_object($expected) && \method_exists($expected, '__toString') && \is_string($actual));
>>>>>>> dev
    }

    /**
     * Asserts that two values are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     *
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false)
    {
        $expectedToCompare = $expected;
        $actualToCompare   = $actual;

        // always compare as strings to avoid strange behaviour
        // otherwise 0 == 'Foobar'
<<<<<<< HEAD
        if (is_string($expected) || is_string($actual)) {
=======
        if (\is_string($expected) || \is_string($actual)) {
>>>>>>> dev
            $expectedToCompare = (string) $expectedToCompare;
            $actualToCompare   = (string) $actualToCompare;

            if ($ignoreCase) {
<<<<<<< HEAD
                $expectedToCompare = strtolower($expectedToCompare);
                $actualToCompare   = strtolower($actualToCompare);
=======
                $expectedToCompare = \strtolower($expectedToCompare);
                $actualToCompare   = \strtolower($actualToCompare);
>>>>>>> dev
            }
        }

        if ($expectedToCompare != $actualToCompare) {
<<<<<<< HEAD
            if (is_string($expected) && is_string($actual)) {
=======
            if (\is_string($expected) && \is_string($actual)) {
>>>>>>> dev
                throw new ComparisonFailure(
                    $expected,
                    $actual,
                    $this->exporter->export($expected),
                    $this->exporter->export($actual),
                    false,
                    'Failed asserting that two strings are equal.'
                );
            }

            throw new ComparisonFailure(
                $expected,
                $actual,
                // no diff is required
                '',
                '',
                false,
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> dev
                    'Failed asserting that %s matches expected %s.',
                    $this->exporter->export($actual),
                    $this->exporter->export($expected)
                )
            );
        }
    }
}
