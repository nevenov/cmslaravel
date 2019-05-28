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
 * @covers SebastianBergmann\Diff\Chunk
 */
<<<<<<< HEAD
class ChunkTest extends TestCase
=======
final class ChunkTest extends TestCase
>>>>>>> dev
{
    /**
     * @var Chunk
     */
    private $chunk;

    protected function setUp()
    {
        $this->chunk = new Chunk;
    }

    public function testCanBeCreatedWithoutArguments()
    {
<<<<<<< HEAD
        $this->assertInstanceOf('SebastianBergmann\Diff\Chunk', $this->chunk);
=======
        $this->assertInstanceOf(Chunk::class, $this->chunk);
>>>>>>> dev
    }

    public function testStartCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(0, $this->chunk->getStart());
=======
        $this->assertSame(0, $this->chunk->getStart());
>>>>>>> dev
    }

    public function testStartRangeCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(1, $this->chunk->getStartRange());
=======
        $this->assertSame(1, $this->chunk->getStartRange());
>>>>>>> dev
    }

    public function testEndCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(0, $this->chunk->getEnd());
=======
        $this->assertSame(0, $this->chunk->getEnd());
>>>>>>> dev
    }

    public function testEndRangeCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(1, $this->chunk->getEndRange());
=======
        $this->assertSame(1, $this->chunk->getEndRange());
>>>>>>> dev
    }

    public function testLinesCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(array(), $this->chunk->getLines());
=======
        $this->assertSame([], $this->chunk->getLines());
>>>>>>> dev
    }

    public function testLinesCanBeSet()
    {
<<<<<<< HEAD
        $this->assertEquals(array(), $this->chunk->getLines());

        $testValue = array('line0', 'line1');
        $this->chunk->setLines($testValue);
        $this->assertEquals($testValue, $this->chunk->getLines());
=======
        $this->assertSame([], $this->chunk->getLines());

        $testValue = ['line0', 'line1'];
        $this->chunk->setLines($testValue);
        $this->assertSame($testValue, $this->chunk->getLines());
>>>>>>> dev
    }
}
