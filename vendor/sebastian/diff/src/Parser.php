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

/**
 * Unified diff parser.
 */
<<<<<<< HEAD
class Parser
=======
final class Parser
>>>>>>> dev
{
    /**
     * @param string $string
     *
     * @return Diff[]
     */
<<<<<<< HEAD
    public function parse($string)
    {
        $lines = \preg_split('(\r\n|\r|\n)', $string);

        if (!empty($lines) && $lines[\count($lines) - 1] == '') {
=======
    public function parse(string $string): array
    {
        $lines = \preg_split('(\r\n|\r|\n)', $string);

        if (!empty($lines) && $lines[\count($lines) - 1] === '') {
>>>>>>> dev
            \array_pop($lines);
        }

        $lineCount = \count($lines);
<<<<<<< HEAD
        $diffs     = array();
        $diff      = null;
        $collected = array();
=======
        $diffs     = [];
        $diff      = null;
        $collected = [];
>>>>>>> dev

        for ($i = 0; $i < $lineCount; ++$i) {
            if (\preg_match('(^---\\s+(?P<file>\\S+))', $lines[$i], $fromMatch) &&
                \preg_match('(^\\+\\+\\+\\s+(?P<file>\\S+))', $lines[$i + 1], $toMatch)) {
                if ($diff !== null) {
                    $this->parseFileDiff($diff, $collected);

                    $diffs[]   = $diff;
<<<<<<< HEAD
                    $collected = array();
=======
                    $collected = [];
>>>>>>> dev
                }

                $diff = new Diff($fromMatch['file'], $toMatch['file']);

                ++$i;
            } else {
                if (\preg_match('/^(?:diff --git |index [\da-f\.]+|[+-]{3} [ab])/', $lines[$i])) {
                    continue;
                }

                $collected[] = $lines[$i];
            }
        }

        if ($diff !== null && \count($collected)) {
            $this->parseFileDiff($diff, $collected);

            $diffs[] = $diff;
        }

        return $diffs;
    }

<<<<<<< HEAD
    /**
     * @param Diff  $diff
     * @param array $lines
     */
    private function parseFileDiff(Diff $diff, array $lines)
    {
        $chunks = array();
=======
    private function parseFileDiff(Diff $diff, array $lines)
    {
        $chunks = [];
>>>>>>> dev
        $chunk  = null;

        foreach ($lines as $line) {
            if (\preg_match('/^@@\s+-(?P<start>\d+)(?:,\s*(?P<startrange>\d+))?\s+\+(?P<end>\d+)(?:,\s*(?P<endrange>\d+))?\s+@@/', $line, $match)) {
                $chunk = new Chunk(
<<<<<<< HEAD
                    $match['start'],
                    isset($match['startrange']) ? \max(1, $match['startrange']) : 1,
                    $match['end'],
                    isset($match['endrange']) ? \max(1, $match['endrange']) : 1
                );

                $chunks[]  = $chunk;
                $diffLines = array();
=======
                    (int) $match['start'],
                    isset($match['startrange']) ? \max(1, (int) $match['startrange']) : 1,
                    (int) $match['end'],
                    isset($match['endrange']) ? \max(1, (int) $match['endrange']) : 1
                );

                $chunks[]  = $chunk;
                $diffLines = [];
>>>>>>> dev

                continue;
            }

            if (\preg_match('/^(?P<type>[+ -])?(?P<line>.*)/', $line, $match)) {
                $type = Line::UNCHANGED;

                if ($match['type'] === '+') {
                    $type = Line::ADDED;
                } elseif ($match['type'] === '-') {
                    $type = Line::REMOVED;
                }

                $diffLines[] = new Line($type, $match['line']);

                if (null !== $chunk) {
                    $chunk->setLines($diffLines);
                }
            }
        }

        $diff->setChunks($chunks);
    }
}
