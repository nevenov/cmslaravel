<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Tests\Iterator;

use Symfony\Component\Finder\Iterator\CustomFilterIterator;

class CustomFilterIteratorTest extends IteratorTestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWithInvalidFilter()
    {
<<<<<<< HEAD
        new CustomFilterIterator(new Iterator(), array('foo'));
=======
        new CustomFilterIterator(new Iterator(), ['foo']);
>>>>>>> dev
    }

    /**
     * @dataProvider getAcceptData
     */
    public function testAccept($filters, $expected)
    {
<<<<<<< HEAD
        $inner = new Iterator(array('test.php', 'test.py', 'foo.php'));
=======
        $inner = new Iterator(['test.php', 'test.py', 'foo.php']);
>>>>>>> dev

        $iterator = new CustomFilterIterator($inner, $filters);

        $this->assertIterator($expected, $iterator);
    }

    public function getAcceptData()
    {
<<<<<<< HEAD
        return array(
            array(array(function (\SplFileInfo $fileinfo) { return false; }), array()),
            array(array(function (\SplFileInfo $fileinfo) { return 0 === strpos($fileinfo, 'test'); }), array('test.php', 'test.py')),
            array(array('is_dir'), array()),
        );
=======
        return [
            [[function (\SplFileInfo $fileinfo) { return false; }], []],
            [[function (\SplFileInfo $fileinfo) { return 0 === strpos($fileinfo, 'test'); }], ['test.php', 'test.py']],
            [['is_dir'], []],
        ];
>>>>>>> dev
    }
}
