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

use Symfony\Component\Finder\Iterator\SortableIterator;

class SortableIteratorTest extends RealIteratorTestCase
{
    public function testConstructor()
    {
        try {
<<<<<<< HEAD
            new SortableIterator(new Iterator(array()), 'foobar');
=======
            new SortableIterator(new Iterator([]), 'foobar');
>>>>>>> dev
            $this->fail('__construct() throws an \InvalidArgumentException exception if the mode is not valid');
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e, '__construct() throws an \InvalidArgumentException exception if the mode is not valid');
        }
    }

    /**
     * @dataProvider getAcceptData
     */
    public function testAccept($mode, $expected)
    {
<<<<<<< HEAD
        if (!is_callable($mode)) {
            switch ($mode) {
                case SortableIterator::SORT_BY_ACCESSED_TIME :
                    if ('\\' === DIRECTORY_SEPARATOR) {
=======
        if (!\is_callable($mode)) {
            switch ($mode) {
                case SortableIterator::SORT_BY_ACCESSED_TIME:
                    if ('\\' === \DIRECTORY_SEPARATOR) {
>>>>>>> dev
                        touch(self::toAbsolute('.git'));
                    } else {
                        file_get_contents(self::toAbsolute('.git'));
                    }
                    sleep(1);
                    file_get_contents(self::toAbsolute('.bar'));
                    break;
<<<<<<< HEAD
                case SortableIterator::SORT_BY_CHANGED_TIME :
=======
                case SortableIterator::SORT_BY_CHANGED_TIME:
>>>>>>> dev
                    file_put_contents(self::toAbsolute('test.php'), 'foo');
                    sleep(1);
                    file_put_contents(self::toAbsolute('test.py'), 'foo');
                    break;
<<<<<<< HEAD
                case SortableIterator::SORT_BY_MODIFIED_TIME :
=======
                case SortableIterator::SORT_BY_MODIFIED_TIME:
>>>>>>> dev
                    file_put_contents(self::toAbsolute('test.php'), 'foo');
                    sleep(1);
                    file_put_contents(self::toAbsolute('test.py'), 'foo');
                    break;
            }
        }

        $inner = new Iterator(self::$files);

        $iterator = new SortableIterator($inner, $mode);

<<<<<<< HEAD
        if ($mode === SortableIterator::SORT_BY_ACCESSED_TIME
            || $mode === SortableIterator::SORT_BY_CHANGED_TIME
            || $mode === SortableIterator::SORT_BY_MODIFIED_TIME
        ) {
            if ('\\' === DIRECTORY_SEPARATOR && SortableIterator::SORT_BY_MODIFIED_TIME !== $mode) {
=======
        if (SortableIterator::SORT_BY_ACCESSED_TIME === $mode
            || SortableIterator::SORT_BY_CHANGED_TIME === $mode
            || SortableIterator::SORT_BY_MODIFIED_TIME === $mode
        ) {
            if ('\\' === \DIRECTORY_SEPARATOR && SortableIterator::SORT_BY_MODIFIED_TIME !== $mode) {
>>>>>>> dev
                $this->markTestSkipped('Sorting by atime or ctime is not supported on Windows');
            }
            $this->assertOrderedIteratorForGroups($expected, $iterator);
        } else {
            $this->assertOrderedIterator($expected, $iterator);
        }
    }

    public function getAcceptData()
    {
<<<<<<< HEAD
        $sortByName = array(
=======
        $sortByName = [
>>>>>>> dev
            '.bar',
            '.foo',
            '.foo/.bar',
            '.foo/bar',
            '.git',
            'foo',
            'foo bar',
            'foo/bar.tmp',
<<<<<<< HEAD
=======
            'qux',
            'qux/baz_100_1.py',
            'qux/baz_1_2.py',
            'qux_0_1.php',
            'qux_1000_1.php',
            'qux_1002_0.php',
            'qux_10_2.php',
            'qux_12_0.php',
            'qux_2_0.php',
>>>>>>> dev
            'test.php',
            'test.py',
            'toto',
            'toto/.git',
<<<<<<< HEAD
        );

        $sortByType = array(
            '.foo',
            '.git',
            'foo',
=======
        ];

        $sortByType = [
            '.foo',
            '.git',
            'foo',
            'qux',
>>>>>>> dev
            'toto',
            'toto/.git',
            '.bar',
            '.foo/.bar',
            '.foo/bar',
            'foo bar',
            'foo/bar.tmp',
<<<<<<< HEAD
            'test.php',
            'test.py',
        );

        $customComparison = array(
            '.bar',
            '.foo',
            '.foo/.bar',
            '.foo/bar',
            '.git',
            'foo',
            'foo bar',
            'foo/bar.tmp',
            'test.php',
            'test.py',
            'toto',
            'toto/.git',
        );

        $sortByAccessedTime = array(
            // For these two files the access time was set to 2005-10-15
            array('foo/bar.tmp', 'test.php'),
            // These files were created more or less at the same time
            array(
=======
            'qux/baz_100_1.py',
            'qux/baz_1_2.py',
            'qux_0_1.php',
            'qux_1000_1.php',
            'qux_1002_0.php',
            'qux_10_2.php',
            'qux_12_0.php',
            'qux_2_0.php',
            'test.php',
            'test.py',
        ];

        $sortByAccessedTime = [
            // For these two files the access time was set to 2005-10-15
            ['foo/bar.tmp', 'test.php'],
            // These files were created more or less at the same time
            [
>>>>>>> dev
                '.git',
                '.foo',
                '.foo/.bar',
                '.foo/bar',
                'test.py',
                'foo',
                'toto',
                'toto/.git',
                'foo bar',
<<<<<<< HEAD
            ),
            // This file was accessed after sleeping for 1 sec
            array('.bar'),
        );

        $sortByChangedTime = array(
            array(
=======
                'qux',
                'qux/baz_100_1.py',
                'qux/baz_1_2.py',
                'qux_0_1.php',
                'qux_1000_1.php',
                'qux_1002_0.php',
                'qux_10_2.php',
                'qux_12_0.php',
                'qux_2_0.php',
            ],
            // This file was accessed after sleeping for 1 sec
            ['.bar'],
        ];

        $sortByChangedTime = [
            [
>>>>>>> dev
                '.git',
                '.foo',
                '.foo/.bar',
                '.foo/bar',
                '.bar',
                'foo',
                'foo/bar.tmp',
                'toto',
                'toto/.git',
                'foo bar',
<<<<<<< HEAD
            ),
            array('test.php'),
            array('test.py'),
        );

        $sortByModifiedTime = array(
            array(
=======
                'qux',
                'qux/baz_100_1.py',
                'qux/baz_1_2.py',
                'qux_0_1.php',
                'qux_1000_1.php',
                'qux_1002_0.php',
                'qux_10_2.php',
                'qux_12_0.php',
                'qux_2_0.php',
            ],
            ['test.php'],
            ['test.py'],
        ];

        $sortByModifiedTime = [
            [
>>>>>>> dev
                '.git',
                '.foo',
                '.foo/.bar',
                '.foo/bar',
                '.bar',
                'foo',
                'foo/bar.tmp',
                'toto',
                'toto/.git',
                'foo bar',
<<<<<<< HEAD
            ),
            array('test.php'),
            array('test.py'),
        );

        return array(
            array(SortableIterator::SORT_BY_NAME, $this->toAbsolute($sortByName)),
            array(SortableIterator::SORT_BY_TYPE, $this->toAbsolute($sortByType)),
            array(SortableIterator::SORT_BY_ACCESSED_TIME, $this->toAbsolute($sortByAccessedTime)),
            array(SortableIterator::SORT_BY_CHANGED_TIME, $this->toAbsolute($sortByChangedTime)),
            array(SortableIterator::SORT_BY_MODIFIED_TIME, $this->toAbsolute($sortByModifiedTime)),
            array(function (\SplFileInfo $a, \SplFileInfo $b) { return strcmp($a->getRealPath(), $b->getRealPath()); }, $this->toAbsolute($customComparison)),
        );
=======
                'qux',
                'qux/baz_100_1.py',
                'qux/baz_1_2.py',
                'qux_0_1.php',
                'qux_1000_1.php',
                'qux_1002_0.php',
                'qux_10_2.php',
                'qux_12_0.php',
                'qux_2_0.php',
            ],
            ['test.php'],
            ['test.py'],
        ];

        $sortByNameNatural = [
            '.bar',
            '.foo',
            '.foo/.bar',
            '.foo/bar',
            '.git',
            'foo',
            'foo/bar.tmp',
            'foo bar',
            'qux',
            'qux/baz_1_2.py',
            'qux/baz_100_1.py',
            'qux_0_1.php',
            'qux_2_0.php',
            'qux_10_2.php',
            'qux_12_0.php',
            'qux_1000_1.php',
            'qux_1002_0.php',
            'test.php',
            'test.py',
            'toto',
            'toto/.git',
        ];

        $customComparison = [
            '.bar',
            '.foo',
            '.foo/.bar',
            '.foo/bar',
            '.git',
            'foo',
            'foo bar',
            'foo/bar.tmp',
            'qux',
            'qux/baz_100_1.py',
            'qux/baz_1_2.py',
            'qux_0_1.php',
            'qux_1000_1.php',
            'qux_1002_0.php',
            'qux_10_2.php',
            'qux_12_0.php',
            'qux_2_0.php',
            'test.php',
            'test.py',
            'toto',
            'toto/.git',
        ];

        return [
            [SortableIterator::SORT_BY_NAME, $this->toAbsolute($sortByName)],
            [SortableIterator::SORT_BY_TYPE, $this->toAbsolute($sortByType)],
            [SortableIterator::SORT_BY_ACCESSED_TIME, $this->toAbsolute($sortByAccessedTime)],
            [SortableIterator::SORT_BY_CHANGED_TIME, $this->toAbsolute($sortByChangedTime)],
            [SortableIterator::SORT_BY_MODIFIED_TIME, $this->toAbsolute($sortByModifiedTime)],
            [SortableIterator::SORT_BY_NAME_NATURAL, $this->toAbsolute($sortByNameNatural)],
            [function (\SplFileInfo $a, \SplFileInfo $b) { return strcmp($a->getRealPath(), $b->getRealPath()); }, $this->toAbsolute($customComparison)],
        ];
>>>>>>> dev
    }
}
