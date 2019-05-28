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
use Symfony\Component\Translation\Dumper\QtFileDumper;

class QtFileDumperTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Dumper\QtFileDumper;
use Symfony\Component\Translation\MessageCatalogue;

class QtFileDumperTest extends TestCase
>>>>>>> dev
{
    public function testFormatCatalogue()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->add(array('foo' => 'bar'), 'resources');
=======
        $catalogue->add(['foo' => 'bar'], 'resources');
>>>>>>> dev

        $dumper = new QtFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/resources.ts', $dumper->formatCatalogue($catalogue, 'resources'));
    }
}
