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
class Chunk
=======
final class Chunk
>>>>>>> dev
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $startRange;

    /**
     * @var int
     */
    private $end;

    /**
     * @var int
     */
    private $endRange;

    /**
     * @var array
     */
    private $lines;

<<<<<<< HEAD
    /**
     * @param int   $start
     * @param int   $startRange
     * @param int   $end
     * @param int   $endRange
     * @param array $lines
     */
    public function __construct($start = 0, $startRange = 1, $end = 0, $endRange = 1, array $lines = array())
    {
        $this->start      = (int) $start;
        $this->startRange = (int) $startRange;
        $this->end        = (int) $end;
        $this->endRange   = (int) $endRange;
        $this->lines      = $lines;
    }

    /**
     * @return int
     */
    public function getStart()
=======
    public function __construct(int $start = 0, int $startRange = 1, int $end = 0, int $endRange = 1, array $lines = [])
    {
        $this->start      = $start;
        $this->startRange = $startRange;
        $this->end        = $end;
        $this->endRange   = $endRange;
        $this->lines      = $lines;
    }

    public function getStart(): int
>>>>>>> dev
    {
        return $this->start;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
    public function getStartRange()
=======
    public function getStartRange(): int
>>>>>>> dev
    {
        return $this->startRange;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
    public function getEnd()
=======
    public function getEnd(): int
>>>>>>> dev
    {
        return $this->end;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
    public function getEndRange()
=======
    public function getEndRange(): int
>>>>>>> dev
    {
        return $this->endRange;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function getLines()
=======
    public function getLines(): array
>>>>>>> dev
    {
        return $this->lines;
    }

<<<<<<< HEAD
    /**
     * @param array $lines
     */
=======
>>>>>>> dev
    public function setLines(array $lines)
    {
        $this->lines = $lines;
    }
}
