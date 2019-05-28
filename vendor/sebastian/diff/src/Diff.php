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
class Diff
=======
final class Diff
>>>>>>> dev
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var Chunk[]
     */
    private $chunks;

    /**
     * @param string  $from
     * @param string  $to
     * @param Chunk[] $chunks
     */
<<<<<<< HEAD
    public function __construct($from, $to, array $chunks = array())
=======
    public function __construct(string $from, string $to, array $chunks = [])
>>>>>>> dev
    {
        $this->from   = $from;
        $this->to     = $to;
        $this->chunks = $chunks;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getFrom()
=======
    public function getFrom(): string
>>>>>>> dev
    {
        return $this->from;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getTo()
=======
    public function getTo(): string
>>>>>>> dev
    {
        return $this->to;
    }

    /**
     * @return Chunk[]
     */
<<<<<<< HEAD
    public function getChunks()
=======
    public function getChunks(): array
>>>>>>> dev
    {
        return $this->chunks;
    }

    /**
     * @param Chunk[] $chunks
     */
    public function setChunks(array $chunks)
    {
        $this->chunks = $chunks;
    }
}
