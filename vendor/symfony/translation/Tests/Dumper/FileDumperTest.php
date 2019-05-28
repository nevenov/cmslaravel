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
use Symfony\Component\Translation\Dumper\FileDumper;

class FileDumperTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Dumper\FileDumper;
use Symfony\Component\Translation\MessageCatalogue;

class FileDumperTest extends TestCase
>>>>>>> dev
{
    public function testDump()
    {
        $tempDir = sys_get_temp_dir();

        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->add(array('foo' => 'bar'));

        $dumper = new ConcreteFileDumper();
        $dumper->dump($catalogue, array('path' => $tempDir));

        $this->assertTrue(file_exists($tempDir.'/messages.en.concrete'));
    }

    public function testDumpBackupsFileIfExisting()
    {
        $tempDir = sys_get_temp_dir();
        $file = $tempDir.'/messages.en.concrete';
        $backupFile = $file.'~';

        @touch($file);

        $catalogue = new MessageCatalogue('en');
        $catalogue->add(array('foo' => 'bar'));

        $dumper = new ConcreteFileDumper();
        $dumper->dump($catalogue, array('path' => $tempDir));

        $this->assertTrue(file_exists($backupFile));

        @unlink($file);
        @unlink($backupFile);
=======
        $catalogue->add(['foo' => 'bar']);

        $dumper = new ConcreteFileDumper();
        $dumper->dump($catalogue, ['path' => $tempDir]);

        $this->assertFileExists($tempDir.'/messages.en.concrete');

        @unlink($tempDir.'/messages.en.concrete');
    }

    public function testDumpIntl()
    {
        $tempDir = sys_get_temp_dir();

        $catalogue = new MessageCatalogue('en');
        $catalogue->add(['foo' => 'bar'], 'd1');
        $catalogue->add(['bar' => 'foo'], 'd1+intl-icu');
        $catalogue->add(['bar' => 'foo'], 'd2+intl-icu');

        $dumper = new ConcreteFileDumper();
        @unlink($tempDir.'/d2.en.concrete');
        $dumper->dump($catalogue, ['path' => $tempDir]);

        $this->assertStringEqualsFile($tempDir.'/d1.en.concrete', 'foo=bar');
        @unlink($tempDir.'/d1.en.concrete');

        $this->assertStringEqualsFile($tempDir.'/d1+intl-icu.en.concrete', 'bar=foo');
        @unlink($tempDir.'/d1+intl-icu.en.concrete');

        $this->assertFileNotExists($tempDir.'/d2.en.concrete');
        $this->assertStringEqualsFile($tempDir.'/d2+intl-icu.en.concrete', 'bar=foo');
        @unlink($tempDir.'/d2+intl-icu.en.concrete');
>>>>>>> dev
    }

    public function testDumpCreatesNestedDirectoriesAndFile()
    {
        $tempDir = sys_get_temp_dir();
        $translationsDir = $tempDir.'/test/translations';
        $file = $translationsDir.'/messages.en.concrete';

        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->add(array('foo' => 'bar'));

        $dumper = new ConcreteFileDumper();
        $dumper->setRelativePathTemplate('test/translations/%domain%.%locale%.%extension%');
        $dumper->dump($catalogue, array('path' => $tempDir));

        $this->assertTrue(file_exists($file));
=======
        $catalogue->add(['foo' => 'bar']);

        $dumper = new ConcreteFileDumper();
        $dumper->setRelativePathTemplate('test/translations/%domain%.%locale%.%extension%');
        $dumper->dump($catalogue, ['path' => $tempDir]);

        $this->assertFileExists($file);
>>>>>>> dev

        @unlink($file);
        @rmdir($translationsDir);
    }
}

class ConcreteFileDumper extends FileDumper
{
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = array())
    {
        return '';
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = [])
    {
        return http_build_query($messages->all($domain), '', '&');
>>>>>>> dev
    }

    protected function getExtension()
    {
        return 'concrete';
    }
}
