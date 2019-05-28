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

use PHPUnit\Framework\TestCase;

/**
 * @covers SebastianBergmann\Diff\Diff
 *
 * @uses SebastianBergmann\Diff\Chunk
 */
final class DiffTest extends TestCase
{
    public function testGettersAfterConstructionWithDefault()
    {
        $from = 'line1a';
        $to   = 'line2a';
        $diff = new Diff($from, $to);

        $this->assertSame($from, $diff->getFrom());
        $this->assertSame($to, $diff->getTo());
<<<<<<< HEAD
        $this->assertSame(array(), $diff->getChunks(), 'Expect chunks to be default value "array()".');
=======
        $this->assertSame([], $diff->getChunks(), 'Expect chunks to be default value "array()".');
>>>>>>> dev
    }

    public function testGettersAfterConstructionWithChunks()
    {
        $from   = 'line1b';
        $to     = 'line2b';
<<<<<<< HEAD
        $chunks = array(new Chunk(), new Chunk(2, 3));
=======
        $chunks = [new Chunk(), new Chunk(2, 3)];
>>>>>>> dev

        $diff = new Diff($from, $to, $chunks);

        $this->assertSame($from, $diff->getFrom());
        $this->assertSame($to, $diff->getTo());
        $this->assertSame($chunks, $diff->getChunks(), 'Expect chunks to be passed value.');
    }

    public function testSetChunksAfterConstruction()
    {
        $diff = new Diff('line1c', 'line2c');
<<<<<<< HEAD
        $this->assertSame(array(), $diff->getChunks(), 'Expect chunks to be default value "array()".');

        $chunks = array(new Chunk(), new Chunk(2, 3));
=======
        $this->assertSame([], $diff->getChunks(), 'Expect chunks to be default value "array()".');

        $chunks = [new Chunk(), new Chunk(2, 3)];
>>>>>>> dev
        $diff->setChunks($chunks);
        $this->assertSame($chunks, $diff->getChunks(), 'Expect chunks to be passed value.');
    }
}
