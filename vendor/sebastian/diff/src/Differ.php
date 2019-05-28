<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> dev
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Diff;

<<<<<<< HEAD
use SebastianBergmann\Diff\LCS\LongestCommonSubsequence;
use SebastianBergmann\Diff\LCS\TimeEfficientImplementation;
use SebastianBergmann\Diff\LCS\MemoryEfficientImplementation;
=======
use SebastianBergmann\Diff\Output\DiffOutputBuilderInterface;
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;
>>>>>>> dev

/**
 * Diff implementation.
 */
<<<<<<< HEAD
class Differ
{
    /**
     * @var string
     */
    private $header;

    /**
     * @var bool
     */
    private $showNonDiffLines;

    /**
     * @param string $header
     * @param bool   $showNonDiffLines
     */
    public function __construct($header = "--- Original\n+++ New\n", $showNonDiffLines = true)
    {
        $this->header           = $header;
        $this->showNonDiffLines = $showNonDiffLines;
=======
final class Differ
{
    /**
     * @var DiffOutputBuilderInterface
     */
    private $outputBuilder;

    /**
     * @param DiffOutputBuilderInterface $outputBuilder
     *
     * @throws InvalidArgumentException
     */
    public function __construct($outputBuilder = null)
    {
        if ($outputBuilder instanceof DiffOutputBuilderInterface) {
            $this->outputBuilder = $outputBuilder;
        } elseif (null === $outputBuilder) {
            $this->outputBuilder = new UnifiedDiffOutputBuilder;
        } elseif (\is_string($outputBuilder)) {
            // PHPUnit 6.1.4, 6.2.0, 6.2.1, 6.2.2, and 6.2.3 support
            // @see https://github.com/sebastianbergmann/phpunit/issues/2734#issuecomment-314514056
            // @deprecated
            $this->outputBuilder = new UnifiedDiffOutputBuilder($outputBuilder);
        } else {
            throw new InvalidArgumentException(
                \sprintf(
                    'Expected builder to be an instance of DiffOutputBuilderInterface, <null> or a string, got %s.',
                    \is_object($outputBuilder) ? 'instance of "' . \get_class($outputBuilder) . '"' : \gettype($outputBuilder) . ' "' . $outputBuilder . '"'
                )
            );
        }
>>>>>>> dev
    }

    /**
     * Returns the diff between two arrays or strings as string.
     *
<<<<<<< HEAD
     * @param array|string             $from
     * @param array|string             $to
     * @param LongestCommonSubsequence $lcs
     *
     * @return string
     */
    public function diff($from, $to, LongestCommonSubsequence $lcs = null)
    {
        $from  = $this->validateDiffInput($from);
        $to    = $this->validateDiffInput($to);
        $diff  = $this->diffToArray($from, $to, $lcs);
        $old   = $this->checkIfDiffInOld($diff);
        $start = isset($old[0]) ? $old[0] : 0;
        $end   = \count($diff);

        if ($tmp = \array_search($end, $old)) {
            $end = $tmp;
        }

        return $this->getBuffer($diff, $old, $start, $end);
=======
     * @param array|string                            $from
     * @param array|string                            $to
     * @param LongestCommonSubsequenceCalculator|null $lcs
     *
     * @return string
     */
    public function diff($from, $to, LongestCommonSubsequenceCalculator $lcs = null): string
    {
        $from = $this->validateDiffInput($from);
        $to   = $this->validateDiffInput($to);
        $diff = $this->diffToArray($from, $to, $lcs);

        return $this->outputBuilder->getDiff($diff);
>>>>>>> dev
    }

    /**
     * Casts variable to string if it is not a string or array.
     *
     * @param mixed $input
     *
     * @return string
     */
<<<<<<< HEAD
    private function validateDiffInput($input)
=======
    private function validateDiffInput($input): string
>>>>>>> dev
    {
        if (!\is_array($input) && !\is_string($input)) {
            return (string) $input;
        }

        return $input;
    }

    /**
<<<<<<< HEAD
     * Takes input of the diff array and returns the old array.
     * Iterates through diff line by line,
     *
     * @param array $diff
     *
     * @return array
     */
    private function checkIfDiffInOld(array $diff)
    {
        $inOld = false;
        $i     = 0;
        $old   = array();

        foreach ($diff as $line) {
            if ($line[1] === 0 /* OLD */) {
                if ($inOld === false) {
                    $inOld = $i;
                }
            } elseif ($inOld !== false) {
                if (($i - $inOld) > 5) {
                    $old[$inOld] = $i - 1;
                }

                $inOld = false;
            }

            ++$i;
        }

        return $old;
    }

    /**
     * Generates buffer in string format, returning the patch.
     *
     * @param array $diff
     * @param array $old
     * @param int   $start
     * @param int   $end
     *
     * @return string
     */
    private function getBuffer(array $diff, array $old, $start, $end)
    {
        $buffer = $this->header;

        if (!isset($old[$start])) {
            $buffer = $this->getDiffBufferElementNew($diff, $buffer, $start);
            ++$start;
        }

        for ($i = $start; $i < $end; $i++) {
            if (isset($old[$i])) {
                $i      = $old[$i];
                $buffer = $this->getDiffBufferElementNew($diff, $buffer, $i);
            } else {
                $buffer = $this->getDiffBufferElement($diff, $buffer, $i);
            }
        }

        return $buffer;
    }

    /**
     * Gets individual buffer element.
     *
     * @param array  $diff
     * @param string $buffer
     * @param int    $diffIndex
     *
     * @return string
     */
    private function getDiffBufferElement(array $diff, $buffer, $diffIndex)
    {
        if ($diff[$diffIndex][1] === 1 /* ADDED */) {
            $buffer .= '+' . $diff[$diffIndex][0] . "\n";
        } elseif ($diff[$diffIndex][1] === 2 /* REMOVED */) {
            $buffer .= '-' . $diff[$diffIndex][0] . "\n";
        } elseif ($this->showNonDiffLines === true) {
            $buffer .= ' ' . $diff[$diffIndex][0] . "\n";
        }

        return $buffer;
    }

    /**
     * Gets individual buffer element with opening.
     *
     * @param array  $diff
     * @param string $buffer
     * @param int    $diffIndex
     *
     * @return string
     */
    private function getDiffBufferElementNew(array $diff, $buffer, $diffIndex)
    {
        if ($this->showNonDiffLines === true) {
            $buffer .= "@@ @@\n";
        }

        return $this->getDiffBufferElement($diff, $buffer, $diffIndex);
    }

    /**
=======
>>>>>>> dev
     * Returns the diff between two arrays or strings as array.
     *
     * Each array element contains two elements:
     *   - [0] => mixed $token
     *   - [1] => 2|1|0
     *
     * - 2: REMOVED: $token was removed from $from
     * - 1: ADDED: $token was added to $from
     * - 0: OLD: $token is not changed in $to
     *
<<<<<<< HEAD
     * @param array|string             $from
     * @param array|string             $to
     * @param LongestCommonSubsequence $lcs
     *
     * @return array
     */
    public function diffToArray($from, $to, LongestCommonSubsequence $lcs = null)
    {
        if (\is_string($from)) {
            $fromMatches = $this->getNewLineMatches($from);
            $from        = $this->splitStringByLines($from);
        } elseif (\is_array($from)) {
            $fromMatches = array();
        } else {
=======
     * @param array|string                       $from
     * @param array|string                       $to
     * @param LongestCommonSubsequenceCalculator $lcs
     *
     * @return array
     */
    public function diffToArray($from, $to, LongestCommonSubsequenceCalculator $lcs = null): array
    {
        if (\is_string($from)) {
            $from = $this->splitStringByLines($from);
        } elseif (!\is_array($from)) {
>>>>>>> dev
            throw new \InvalidArgumentException('"from" must be an array or string.');
        }

        if (\is_string($to)) {
<<<<<<< HEAD
            $toMatches = $this->getNewLineMatches($to);
            $to        = $this->splitStringByLines($to);
        } elseif (\is_array($to)) {
            $toMatches = array();
        } else {
=======
            $to = $this->splitStringByLines($to);
        } elseif (!\is_array($to)) {
>>>>>>> dev
            throw new \InvalidArgumentException('"to" must be an array or string.');
        }

        list($from, $to, $start, $end) = self::getArrayDiffParted($from, $to);

        if ($lcs === null) {
            $lcs = $this->selectLcsImplementation($from, $to);
        }

        $common = $lcs->calculate(\array_values($from), \array_values($to));
<<<<<<< HEAD
        $diff   = array();

        if ($this->detectUnmatchedLineEndings($fromMatches, $toMatches)) {
            $diff[] = array(
                '#Warning: Strings contain different line endings!',
                0
            );
        }

        foreach ($start as $token) {
            $diff[] = array($token, 0 /* OLD */);
=======
        $diff   = [];

        foreach ($start as $token) {
            $diff[] = [$token, 0 /* OLD */];
>>>>>>> dev
        }

        \reset($from);
        \reset($to);

        foreach ($common as $token) {
            while (($fromToken = \reset($from)) !== $token) {
<<<<<<< HEAD
                $diff[] = array(\array_shift($from), 2 /* REMOVED */);
            }

            while (($toToken = \reset($to)) !== $token) {
                $diff[] = array(\array_shift($to), 1 /* ADDED */);
            }

            $diff[] = array($token, 0 /* OLD */);
=======
                $diff[] = [\array_shift($from), 2 /* REMOVED */];
            }

            while (($toToken = \reset($to)) !== $token) {
                $diff[] = [\array_shift($to), 1 /* ADDED */];
            }

            $diff[] = [$token, 0 /* OLD */];
>>>>>>> dev

            \array_shift($from);
            \array_shift($to);
        }

        while (($token = \array_shift($from)) !== null) {
<<<<<<< HEAD
            $diff[] = array($token, 2 /* REMOVED */);
        }

        while (($token = \array_shift($to)) !== null) {
            $diff[] = array($token, 1 /* ADDED */);
        }

        foreach ($end as $token) {
            $diff[] = array($token, 0 /* OLD */);
        }

        return $diff;
    }

    /**
     * Get new strings denoting new lines from a given string.
     *
     * @param string $string
     *
     * @return array
     */
    private function getNewLineMatches($string)
    {
        \preg_match_all('(\r\n|\r|\n)', $string, $stringMatches);

        return $stringMatches;
=======
            $diff[] = [$token, 2 /* REMOVED */];
        }

        while (($token = \array_shift($to)) !== null) {
            $diff[] = [$token, 1 /* ADDED */];
        }

        foreach ($end as $token) {
            $diff[] = [$token, 0 /* OLD */];
        }

        if ($this->detectUnmatchedLineEndings($diff)) {
            \array_unshift($diff, ["#Warning: Strings contain different line endings!\n", 3]);
        }

        return $diff;
>>>>>>> dev
    }

    /**
     * Checks if input is string, if so it will split it line-by-line.
     *
     * @param string $input
     *
     * @return array
     */
<<<<<<< HEAD
    private function splitStringByLines($input)
    {
        return \preg_split('(\r\n|\r|\n)', $input);
=======
    private function splitStringByLines(string $input): array
    {
        return \preg_split('/(.*\R)/', $input, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
>>>>>>> dev
    }

    /**
     * @param array $from
     * @param array $to
     *
<<<<<<< HEAD
     * @return LongestCommonSubsequence
     */
    private function selectLcsImplementation(array $from, array $to)
=======
     * @return LongestCommonSubsequenceCalculator
     */
    private function selectLcsImplementation(array $from, array $to): LongestCommonSubsequenceCalculator
>>>>>>> dev
    {
        // We do not want to use the time-efficient implementation if its memory
        // footprint will probably exceed this value. Note that the footprint
        // calculation is only an estimation for the matrix and the LCS method
        // will typically allocate a bit more memory than this.
        $memoryLimit = 100 * 1024 * 1024;

        if ($this->calculateEstimatedFootprint($from, $to) > $memoryLimit) {
<<<<<<< HEAD
            return new MemoryEfficientImplementation;
        }

        return new TimeEfficientImplementation;
=======
            return new MemoryEfficientLongestCommonSubsequenceCalculator;
        }

        return new TimeEfficientLongestCommonSubsequenceCalculator;
>>>>>>> dev
    }

    /**
     * Calculates the estimated memory footprint for the DP-based method.
     *
     * @param array $from
     * @param array $to
     *
     * @return int|float
     */
    private function calculateEstimatedFootprint(array $from, array $to)
    {
        $itemSize = PHP_INT_SIZE === 4 ? 76 : 144;

<<<<<<< HEAD
        return $itemSize * \pow(\min(\count($from), \count($to)), 2);
    }

    /**
     * Returns true if line ends don't match on fromMatches and toMatches.
     *
     * @param array $fromMatches
     * @param array $toMatches
     *
     * @return bool
     */
    private function detectUnmatchedLineEndings(array $fromMatches, array $toMatches)
    {
        return isset($fromMatches[0], $toMatches[0]) &&
               \count($fromMatches[0]) === \count($toMatches[0]) &&
               $fromMatches[0] !== $toMatches[0];
    }

    /**
     * @param array $from
     * @param array $to
     *
     * @return array
     */
    private static function getArrayDiffParted(array &$from, array &$to)
    {
        $start = array();
        $end   = array();
=======
        return $itemSize * \min(\count($from), \count($to)) ** 2;
    }

    /**
     * Returns true if line ends don't match in a diff.
     *
     * @param array $diff
     *
     * @return bool
     */
    private function detectUnmatchedLineEndings(array $diff): bool
    {
        $newLineBreaks = ['' => true];
        $oldLineBreaks = ['' => true];

        foreach ($diff as $entry) {
            if (0 === $entry[1]) { /* OLD */
                $ln                 = $this->getLinebreak($entry[0]);
                $oldLineBreaks[$ln] = true;
                $newLineBreaks[$ln] = true;
            } elseif (1 === $entry[1]) {  /* ADDED */
                $newLineBreaks[$this->getLinebreak($entry[0])] = true;
            } elseif (2 === $entry[1]) {  /* REMOVED */
                $oldLineBreaks[$this->getLinebreak($entry[0])] = true;
            }
        }

        // if either input or output is a single line without breaks than no warning should be raised
        if (['' => true] === $newLineBreaks || ['' => true] === $oldLineBreaks) {
            return false;
        }

        // two way compare
        foreach ($newLineBreaks as $break => $set) {
            if (!isset($oldLineBreaks[$break])) {
                return true;
            }
        }

        foreach ($oldLineBreaks as $break => $set) {
            if (!isset($newLineBreaks[$break])) {
                return true;
            }
        }

        return false;
    }

    private function getLinebreak($line): string
    {
        if (!\is_string($line)) {
            return '';
        }

        $lc = \substr($line, -1);
        if ("\r" === $lc) {
            return "\r";
        }

        if ("\n" !== $lc) {
            return '';
        }

        if ("\r\n" === \substr($line, -2)) {
            return "\r\n";
        }

        return "\n";
    }

    private static function getArrayDiffParted(array &$from, array &$to): array
    {
        $start = [];
        $end   = [];
>>>>>>> dev

        \reset($to);

        foreach ($from as $k => $v) {
            $toK = \key($to);

            if ($toK === $k && $v === $to[$k]) {
                $start[$k] = $v;

                unset($from[$k], $to[$k]);
            } else {
                break;
            }
        }

        \end($from);
        \end($to);

        do {
            $fromK = \key($from);
            $toK   = \key($to);

            if (null === $fromK || null === $toK || \current($from) !== \current($to)) {
                break;
            }

            \prev($from);
            \prev($to);

<<<<<<< HEAD
            $end = array($fromK => $from[$fromK]) + $end;
            unset($from[$fromK], $to[$toK]);
        } while (true);

        return array($from, $to, $start, $end);
=======
            $end = [$fromK => $from[$fromK]] + $end;
            unset($from[$fromK], $to[$toK]);
        } while (true);

        return [$from, $to, $start, $end];
>>>>>>> dev
    }
}
