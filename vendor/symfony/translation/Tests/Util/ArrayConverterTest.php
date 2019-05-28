<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Util;

<<<<<<< HEAD
use Symfony\Component\Translation\Util\ArrayConverter;

class ArrayConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider messsagesData
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Util\ArrayConverter;

class ArrayConverterTest extends TestCase
{
    /**
     * @dataProvider messagesData
>>>>>>> dev
     */
    public function testDump($input, $expectedOutput)
    {
        $this->assertEquals($expectedOutput, ArrayConverter::expandToTree($input));
    }

<<<<<<< HEAD
    public function messsagesData()
    {
        return array(
            array(
                // input
                array(
                    'foo1' => 'bar',
                    'foo.bar' => 'value',
                ),
                // expected output
                array(
                    'foo1' => 'bar',
                    'foo' => array('bar' => 'value'),
                ),
            ),
            array(
                // input
                array(
                    'foo.bar' => 'value1',
                    'foo.bar.test' => 'value2',
                ),
                // expected output
                array(
                    'foo' => array(
                        'bar' => 'value1',
                        'bar.test' => 'value2',
                    ),
                ),
            ),
            array(
                // input
                array(
                    'foo.level2.level3.level4' => 'value1',
                    'foo.level2' => 'value2',
                    'foo.bar' => 'value3',
                ),
                // expected output
                array(
                    'foo' => array(
                        'level2' => 'value2',
                        'level2.level3.level4' => 'value1',
                        'bar' => 'value3',
                    ),
                ),
            ),
        );
=======
    public function messagesData()
    {
        return [
            [
                // input
                [
                    'foo1' => 'bar',
                    'foo.bar' => 'value',
                ],
                // expected output
                [
                    'foo1' => 'bar',
                    'foo' => ['bar' => 'value'],
                ],
            ],
            [
                // input
                [
                    'foo.bar' => 'value1',
                    'foo.bar.test' => 'value2',
                ],
                // expected output
                [
                    'foo' => [
                        'bar' => 'value1',
                        'bar.test' => 'value2',
                    ],
                ],
            ],
            [
                // input
                [
                    'foo.level2.level3.level4' => 'value1',
                    'foo.level2' => 'value2',
                    'foo.bar' => 'value3',
                ],
                // expected output
                [
                    'foo' => [
                        'level2' => 'value2',
                        'level2.level3.level4' => 'value1',
                        'bar' => 'value3',
                    ],
                ],
            ],
        ];
>>>>>>> dev
    }
}
