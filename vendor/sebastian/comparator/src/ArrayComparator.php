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
 * Compares arrays for equality.
 */
class ArrayComparator extends Comparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
<<<<<<< HEAD
     * @param  mixed $expected The first value to compare
     * @param  mixed $actual   The second value to compare
=======
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
>>>>>>> dev
     * @return bool
     */
    public function accepts($expected, $actual)
    {
<<<<<<< HEAD
        return is_array($expected) && is_array($actual);
=======
        return \is_array($expected) && \is_array($actual);
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
     * @param array $processed    List of already processed elements (used to prevent infinite recursion)
     *
     * @throws ComparisonFailure
     */
<<<<<<< HEAD
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array())
    {
        if ($canonicalize) {
            sort($expected);
            sort($actual);
        }

        $remaining = $actual;
        $expString = $actString = "Array (\n";
        $equal     = true;
=======
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])
    {
        if ($canonicalize) {
            \sort($expected);
            \sort($actual);
        }

        $remaining        = $actual;
        $actualAsString   = "Array (\n";
        $expectedAsString = "Array (\n";
        $equal            = true;
>>>>>>> dev

        foreach ($expected as $key => $value) {
            unset($remaining[$key]);

<<<<<<< HEAD
            if (!array_key_exists($key, $actual)) {
                $expString .= sprintf(
=======
            if (!\array_key_exists($key, $actual)) {
                $expectedAsString .= \sprintf(
>>>>>>> dev
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
                );

                $equal = false;

                continue;
            }

            try {
                $comparator = $this->factory->getComparatorFor($value, $actual[$key]);
                $comparator->assertEquals($value, $actual[$key], $delta, $canonicalize, $ignoreCase, $processed);

<<<<<<< HEAD
                $expString .= sprintf(
=======
                $expectedAsString .= \sprintf(
>>>>>>> dev
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
                );
<<<<<<< HEAD
                $actString .= sprintf(
=======

                $actualAsString .= \sprintf(
>>>>>>> dev
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($actual[$key])
                );
            } catch (ComparisonFailure $e) {
<<<<<<< HEAD
                $expString .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getExpectedAsString()
                    ? $this->indent($e->getExpectedAsString())
                    : $this->exporter->shortenedExport($e->getExpected())
                );

                $actString .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getActualAsString()
                    ? $this->indent($e->getActualAsString())
                    : $this->exporter->shortenedExport($e->getActual())
=======
                $expectedAsString .= \sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getExpectedAsString() ? $this->indent($e->getExpectedAsString()) : $this->exporter->shortenedExport($e->getExpected())
                );

                $actualAsString .= \sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getActualAsString() ? $this->indent($e->getActualAsString()) : $this->exporter->shortenedExport($e->getActual())
>>>>>>> dev
                );

                $equal = false;
            }
        }

        foreach ($remaining as $key => $value) {
<<<<<<< HEAD
            $actString .= sprintf(
=======
            $actualAsString .= \sprintf(
>>>>>>> dev
                "    %s => %s\n",
                $this->exporter->export($key),
                $this->exporter->shortenedExport($value)
            );

            $equal = false;
        }

<<<<<<< HEAD
        $expString .= ')';
        $actString .= ')';
=======
        $expectedAsString .= ')';
        $actualAsString .= ')';
>>>>>>> dev

        if (!$equal) {
            throw new ComparisonFailure(
                $expected,
                $actual,
<<<<<<< HEAD
                $expString,
                $actString,
=======
                $expectedAsString,
                $actualAsString,
>>>>>>> dev
                false,
                'Failed asserting that two arrays are equal.'
            );
        }
    }

    protected function indent($lines)
    {
<<<<<<< HEAD
        return trim(str_replace("\n", "\n    ", $lines));
=======
        return \trim(\str_replace("\n", "\n    ", $lines));
>>>>>>> dev
    }
}
