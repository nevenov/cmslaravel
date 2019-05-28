<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Tests\Comparator;

<<<<<<< HEAD
use Symfony\Component\Finder\Comparator\NumberComparator;

class NumberComparatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Comparator\NumberComparator;

class NumberComparatorTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider getConstructorTestData
     */
    public function testConstructor($successes, $failures)
    {
        foreach ($successes as $s) {
            new NumberComparator($s);
        }

        foreach ($failures as $f) {
            try {
                new NumberComparator($f);
                $this->fail('__construct() throws an \InvalidArgumentException if the test expression is not valid.');
            } catch (\Exception $e) {
                $this->assertInstanceOf('InvalidArgumentException', $e, '__construct() throws an \InvalidArgumentException if the test expression is not valid.');
            }
        }
    }

    /**
     * @dataProvider getTestData
     */
    public function testTest($test, $match, $noMatch)
    {
        $c = new NumberComparator($test);

        foreach ($match as $m) {
            $this->assertTrue($c->test($m), '->test() tests a string against the expression');
        }

        foreach ($noMatch as $m) {
            $this->assertFalse($c->test($m), '->test() tests a string against the expression');
        }
    }

    public function getTestData()
    {
<<<<<<< HEAD
        return array(
            array('< 1000', array('500', '999'), array('1000', '1500')),

            array('< 1K', array('500', '999'), array('1000', '1500')),
            array('<1k', array('500', '999'), array('1000', '1500')),
            array('  < 1 K ', array('500', '999'), array('1000', '1500')),
            array('<= 1K', array('1000'), array('1001')),
            array('> 1K', array('1001'), array('1000')),
            array('>= 1K', array('1000'), array('999')),

            array('< 1KI', array('500', '1023'), array('1024', '1500')),
            array('<= 1KI', array('1024'), array('1025')),
            array('> 1KI', array('1025'), array('1024')),
            array('>= 1KI', array('1024'), array('1023')),

            array('1KI', array('1024'), array('1023', '1025')),
            array('==1KI', array('1024'), array('1023', '1025')),

            array('==1m', array('1000000'), array('999999', '1000001')),
            array('==1mi', array(1024 * 1024), array(1024 * 1024 - 1, 1024 * 1024 + 1)),

            array('==1g', array('1000000000'), array('999999999', '1000000001')),
            array('==1gi', array(1024 * 1024 * 1024), array(1024 * 1024 * 1024 - 1, 1024 * 1024 * 1024 + 1)),

            array('!= 1000', array('500', '999'), array('1000')),
        );
=======
        return [
            ['< 1000', ['500', '999'], ['1000', '1500']],

            ['< 1K', ['500', '999'], ['1000', '1500']],
            ['<1k', ['500', '999'], ['1000', '1500']],
            ['  < 1 K ', ['500', '999'], ['1000', '1500']],
            ['<= 1K', ['1000'], ['1001']],
            ['> 1K', ['1001'], ['1000']],
            ['>= 1K', ['1000'], ['999']],

            ['< 1KI', ['500', '1023'], ['1024', '1500']],
            ['<= 1KI', ['1024'], ['1025']],
            ['> 1KI', ['1025'], ['1024']],
            ['>= 1KI', ['1024'], ['1023']],

            ['1KI', ['1024'], ['1023', '1025']],
            ['==1KI', ['1024'], ['1023', '1025']],

            ['==1m', ['1000000'], ['999999', '1000001']],
            ['==1mi', [1024 * 1024], [1024 * 1024 - 1, 1024 * 1024 + 1]],

            ['==1g', ['1000000000'], ['999999999', '1000000001']],
            ['==1gi', [1024 * 1024 * 1024], [1024 * 1024 * 1024 - 1, 1024 * 1024 * 1024 + 1]],

            ['!= 1000', ['500', '999'], ['1000']],
        ];
>>>>>>> dev
    }

    public function getConstructorTestData()
    {
<<<<<<< HEAD
        return array(
            array(
                array(
=======
        return [
            [
                [
>>>>>>> dev
                    '1', '0',
                    '3.5', '33.55', '123.456', '123456.78',
                    '.1', '.123',
                    '.0', '0.0',
                    '1.', '0.', '123.',
                    '==1', '!=1', '<1', '>1', '<=1', '>=1',
                    '==1k', '==1ki', '==1m', '==1mi', '==1g', '==1gi',
                    '1k', '1ki', '1m', '1mi', '1g', '1gi',
<<<<<<< HEAD
                ),
                array(
=======
                ],
                [
>>>>>>> dev
                    false, null, '',
                    ' ', 'foobar',
                    '=1', '===1',
                    '0 . 1', '123 .45', '234. 567',
                    '..', '.0.', '0.1.2',
<<<<<<< HEAD
                ),
            ),
        );
=======
                ],
            ],
        ];
>>>>>>> dev
    }
}
