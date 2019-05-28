<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Tests\Caster;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\VarDumper\Caster\Caster;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
<<<<<<< HEAD
class CasterTest extends \PHPUnit_Framework_TestCase
{
    use VarDumperTestTrait;

    private $referenceArray = array(
=======
class CasterTest extends TestCase
{
    use VarDumperTestTrait;

    private $referenceArray = [
>>>>>>> dev
        'null' => null,
        'empty' => false,
        'public' => 'pub',
        "\0~\0virtual" => 'virt',
        "\0+\0dynamic" => 'dyn',
        "\0*\0protected" => 'prot',
        "\0Foo\0private" => 'priv',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> dev

    /**
     * @dataProvider provideFilter
     */
    public function testFilter($filter, $expectedDiff, $listedProperties = null)
    {
        if (null === $listedProperties) {
            $filteredArray = Caster::filter($this->referenceArray, $filter);
        } else {
            $filteredArray = Caster::filter($this->referenceArray, $filter, $listedProperties);
        }

        $this->assertSame($expectedDiff, array_diff_assoc($this->referenceArray, $filteredArray));
    }

    public function provideFilter()
    {
<<<<<<< HEAD
        return array(
            array(
                0,
                array(),
            ),
            array(
                Caster::EXCLUDE_PUBLIC,
                array(
                    'null' => null,
                    'empty' => false,
                    'public' => 'pub',
                ),
            ),
            array(
                Caster::EXCLUDE_NULL,
                array(
                    'null' => null,
                ),
            ),
            array(
                Caster::EXCLUDE_EMPTY,
                array(
                    'null' => null,
                    'empty' => false,
                ),
            ),
            array(
                Caster::EXCLUDE_VIRTUAL,
                array(
                    "\0~\0virtual" => 'virt',
                ),
            ),
            array(
                Caster::EXCLUDE_DYNAMIC,
                array(
                    "\0+\0dynamic" => 'dyn',
                ),
            ),
            array(
                Caster::EXCLUDE_PROTECTED,
                array(
                    "\0*\0protected" => 'prot',
                ),
            ),
            array(
                Caster::EXCLUDE_PRIVATE,
                array(
                    "\0Foo\0private" => 'priv',
                ),
            ),
            array(
                Caster::EXCLUDE_VERBOSE,
                array(
                    'public' => 'pub',
                    "\0*\0protected" => 'prot',
                ),
                array('public', "\0*\0protected"),
            ),
            array(
                Caster::EXCLUDE_NOT_IMPORTANT,
                array(
=======
        return [
            [
                0,
                [],
            ],
            [
                Caster::EXCLUDE_PUBLIC,
                [
                    'null' => null,
                    'empty' => false,
                    'public' => 'pub',
                ],
            ],
            [
                Caster::EXCLUDE_NULL,
                [
                    'null' => null,
                ],
            ],
            [
                Caster::EXCLUDE_EMPTY,
                [
                    'null' => null,
                    'empty' => false,
                ],
            ],
            [
                Caster::EXCLUDE_VIRTUAL,
                [
                    "\0~\0virtual" => 'virt',
                ],
            ],
            [
                Caster::EXCLUDE_DYNAMIC,
                [
                    "\0+\0dynamic" => 'dyn',
                ],
            ],
            [
                Caster::EXCLUDE_PROTECTED,
                [
                    "\0*\0protected" => 'prot',
                ],
            ],
            [
                Caster::EXCLUDE_PRIVATE,
                [
                    "\0Foo\0private" => 'priv',
                ],
            ],
            [
                Caster::EXCLUDE_VERBOSE,
                [
                    'public' => 'pub',
                    "\0*\0protected" => 'prot',
                ],
                ['public', "\0*\0protected"],
            ],
            [
                Caster::EXCLUDE_NOT_IMPORTANT,
                [
>>>>>>> dev
                    'null' => null,
                    'empty' => false,
                    "\0~\0virtual" => 'virt',
                    "\0+\0dynamic" => 'dyn',
                    "\0Foo\0private" => 'priv',
<<<<<<< HEAD
                ),
                array('public', "\0*\0protected"),
            ),
            array(
                Caster::EXCLUDE_VIRTUAL | Caster::EXCLUDE_DYNAMIC,
                array(
                    "\0~\0virtual" => 'virt',
                    "\0+\0dynamic" => 'dyn',
                ),
            ),
            array(
                Caster::EXCLUDE_NOT_IMPORTANT | Caster::EXCLUDE_VERBOSE,
                $this->referenceArray,
                array('public', "\0*\0protected"),
            ),
            array(
                Caster::EXCLUDE_NOT_IMPORTANT | Caster::EXCLUDE_EMPTY,
                array(
=======
                ],
                ['public', "\0*\0protected"],
            ],
            [
                Caster::EXCLUDE_VIRTUAL | Caster::EXCLUDE_DYNAMIC,
                [
                    "\0~\0virtual" => 'virt',
                    "\0+\0dynamic" => 'dyn',
                ],
            ],
            [
                Caster::EXCLUDE_NOT_IMPORTANT | Caster::EXCLUDE_VERBOSE,
                $this->referenceArray,
                ['public', "\0*\0protected"],
            ],
            [
                Caster::EXCLUDE_NOT_IMPORTANT | Caster::EXCLUDE_EMPTY,
                [
>>>>>>> dev
                    'null' => null,
                    'empty' => false,
                    "\0~\0virtual" => 'virt',
                    "\0+\0dynamic" => 'dyn',
                    "\0*\0protected" => 'prot',
                    "\0Foo\0private" => 'priv',
<<<<<<< HEAD
                ),
                array('public', 'empty'),
            ),
            array(
                Caster::EXCLUDE_VERBOSE | Caster::EXCLUDE_EMPTY | Caster::EXCLUDE_STRICT,
                array(
                    'empty' => false,
                ),
                array('public', 'empty'),
            ),
        );
    }

    /**
     * @requires PHP 7.0
     */
=======
                ],
                ['public', 'empty'],
            ],
            [
                Caster::EXCLUDE_VERBOSE | Caster::EXCLUDE_EMPTY | Caster::EXCLUDE_STRICT,
                [
                    'empty' => false,
                ],
                ['public', 'empty'],
            ],
        ];
    }

>>>>>>> dev
    public function testAnonymousClass()
    {
        $c = eval('return new class extends stdClass { private $foo = "foo"; };');

        $this->assertDumpMatchesFormat(
            <<<'EOTXT'
stdClass@anonymous {
  -foo: "foo"
}
EOTXT
            , $c
        );

        $c = eval('return new class { private $foo = "foo"; };');

        $this->assertDumpMatchesFormat(
            <<<'EOTXT'
@anonymous {
  -foo: "foo"
}
EOTXT
            , $c
        );
    }
}
