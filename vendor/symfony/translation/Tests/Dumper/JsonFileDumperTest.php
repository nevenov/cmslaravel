<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Dumper;

<<<<<<< HEAD
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Dumper\JsonFileDumper;

class JsonFileDumperTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Dumper\JsonFileDumper;
use Symfony\Component\Translation\MessageCatalogue;

class JsonFileDumperTest extends TestCase
>>>>>>> dev
{
    public function testFormatCatalogue()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->add(array('foo' => 'bar'));
=======
        $catalogue->add(['foo' => 'bar']);
>>>>>>> dev

        $dumper = new JsonFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/resources.json', $dumper->formatCatalogue($catalogue, 'messages'));
    }

    public function testDumpWithCustomEncoding()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->add(array('foo' => '"bar"'));

        $dumper = new JsonFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/resources.dump.json', $dumper->formatCatalogue($catalogue, 'messages', array('json_encoding' => JSON_HEX_QUOT)));
=======
        $catalogue->add(['foo' => '"bar"']);

        $dumper = new JsonFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/resources.dump.json', $dumper->formatCatalogue($catalogue, 'messages', ['json_encoding' => JSON_HEX_QUOT]));
>>>>>>> dev
    }
}
