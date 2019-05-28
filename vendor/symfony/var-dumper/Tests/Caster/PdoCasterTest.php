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
use Symfony\Component\VarDumper\Caster\PdoCaster;
use Symfony\Component\VarDumper\Cloner\Stub;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\Caster\PdoCaster;
use Symfony\Component\VarDumper\Cloner\Stub;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;
>>>>>>> dev

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
<<<<<<< HEAD
class PdoCasterTest extends \PHPUnit_Framework_TestCase
{
=======
class PdoCasterTest extends TestCase
{
    use VarDumperTestTrait;

>>>>>>> dev
    /**
     * @requires extension pdo_sqlite
     */
    public function testCastPdo()
    {
        $pdo = new \PDO('sqlite::memory:');
<<<<<<< HEAD
        $pdo->setAttribute(\PDO::ATTR_STATEMENT_CLASS, array('PDOStatement', array($pdo)));

        $cast = PdoCaster::castPdo($pdo, array(), new Stub(), false);
=======
        $pdo->setAttribute(\PDO::ATTR_STATEMENT_CLASS, ['PDOStatement', [$pdo]]);

        $cast = PdoCaster::castPdo($pdo, [], new Stub(), false);
>>>>>>> dev

        $this->assertInstanceOf('Symfony\Component\VarDumper\Caster\EnumStub', $cast["\0~\0attributes"]);

        $attr = $cast["\0~\0attributes"] = $cast["\0~\0attributes"]->value;
        $this->assertInstanceOf('Symfony\Component\VarDumper\Caster\ConstStub', $attr['CASE']);
        $this->assertSame('NATURAL', $attr['CASE']->class);
        $this->assertSame('BOTH', $attr['DEFAULT_FETCH_MODE']->class);

<<<<<<< HEAD
        $xCast = array(
            "\0~\0inTransaction" => $pdo->inTransaction(),
            "\0~\0attributes" => array(
                'CASE' => $attr['CASE'],
                'ERRMODE' => $attr['ERRMODE'],
                'PERSISTENT' => false,
                'DRIVER_NAME' => 'sqlite',
                'ORACLE_NULLS' => $attr['ORACLE_NULLS'],
                'CLIENT_VERSION' => $pdo->getAttribute(\PDO::ATTR_CLIENT_VERSION),
                'SERVER_VERSION' => $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION),
                'STATEMENT_CLASS' => array('PDOStatement'),
                'DEFAULT_FETCH_MODE' => $attr['DEFAULT_FETCH_MODE'],
            ),
        );
        unset($cast["\0~\0attributes"]['STATEMENT_CLASS'][1]);

        $this->assertSame($xCast, $cast);
=======
        $xDump = <<<'EODUMP'
array:2 [
  "\x00~\x00inTransaction" => false
  "\x00~\x00attributes" => array:9 [
    "CASE" => NATURAL
    "ERRMODE" => SILENT
    "PERSISTENT" => false
    "DRIVER_NAME" => "sqlite"
    "ORACLE_NULLS" => NATURAL
    "CLIENT_VERSION" => "%s"
    "SERVER_VERSION" => "%s"
    "STATEMENT_CLASS" => array:%d [
      0 => "PDOStatement"%A
    ]
    "DEFAULT_FETCH_MODE" => BOTH
  ]
]
EODUMP;

        $this->assertDumpMatchesFormat($xDump, $cast);
>>>>>>> dev
    }
}
