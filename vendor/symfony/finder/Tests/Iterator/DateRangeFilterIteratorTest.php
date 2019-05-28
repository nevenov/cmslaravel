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

<<<<<<< HEAD
use Symfony\Component\Finder\Iterator\DateRangeFilterIterator;
use Symfony\Component\Finder\Comparator\DateComparator;
=======
use Symfony\Component\Finder\Comparator\DateComparator;
use Symfony\Component\Finder\Iterator\DateRangeFilterIterator;
>>>>>>> dev

class DateRangeFilterIteratorTest extends RealIteratorTestCase
{
    /**
     * @dataProvider getAcceptData
     */
    public function testAccept($size, $expected)
    {
        $files = self::$files;
        $files[] = self::toAbsolute('doesnotexist');
        $inner = new Iterator($files);

        $iterator = new DateRangeFilterIterator($inner, $size);

        $this->assertIterator($expected, $iterator);
    }

    public function getAcceptData()
    {
<<<<<<< HEAD
        $since20YearsAgo = array(
=======
        $since20YearsAgo = [
>>>>>>> dev
            '.git',
            'test.py',
            'foo',
            'foo/bar.tmp',
            'test.php',
            'toto',
            'toto/.git',
            '.bar',
            '.foo',
            '.foo/.bar',
            'foo bar',
            '.foo/bar',
<<<<<<< HEAD
        );

        $since2MonthsAgo = array(
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
        ];

        $since2MonthsAgo = [
>>>>>>> dev
            '.git',
            'test.py',
            'foo',
            'toto',
            'toto/.git',
            '.bar',
            '.foo',
            '.foo/.bar',
            'foo bar',
            '.foo/bar',
<<<<<<< HEAD
        );

        $untilLastMonth = array(
            'foo/bar.tmp',
            'test.php',
        );

        return array(
            array(array(new DateComparator('since 20 years ago')), $this->toAbsolute($since20YearsAgo)),
            array(array(new DateComparator('since 2 months ago')), $this->toAbsolute($since2MonthsAgo)),
            array(array(new DateComparator('until last month')), $this->toAbsolute($untilLastMonth)),
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
        ];

        $untilLastMonth = [
            'foo/bar.tmp',
            'test.php',
        ];

        return [
            [[new DateComparator('since 20 years ago')], $this->toAbsolute($since20YearsAgo)],
            [[new DateComparator('since 2 months ago')], $this->toAbsolute($since2MonthsAgo)],
            [[new DateComparator('until last month')], $this->toAbsolute($untilLastMonth)],
        ];
>>>>>>> dev
    }
}
