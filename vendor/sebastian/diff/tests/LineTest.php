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
 * @covers SebastianBergmann\Diff\Line
 */
<<<<<<< HEAD
class LineTest extends TestCase
=======
final class LineTest extends TestCase
>>>>>>> dev
{
    /**
     * @var Line
     */
    private $line;

    protected function setUp()
    {
        $this->line = new Line;
    }

    public function testCanBeCreatedWithoutArguments()
    {
<<<<<<< HEAD
        $this->assertInstanceOf('SebastianBergmann\Diff\Line', $this->line);
=======
        $this->assertInstanceOf(Line::class, $this->line);
>>>>>>> dev
    }

    public function testTypeCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals(Line::UNCHANGED, $this->line->getType());
=======
        $this->assertSame(Line::UNCHANGED, $this->line->getType());
>>>>>>> dev
    }

    public function testContentCanBeRetrieved()
    {
<<<<<<< HEAD
        $this->assertEquals('', $this->line->getContent());
=======
        $this->assertSame('', $this->line->getContent());
>>>>>>> dev
    }
}
