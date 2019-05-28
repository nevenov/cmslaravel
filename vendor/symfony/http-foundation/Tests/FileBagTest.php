<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

/**
 * FileBagTest.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
<<<<<<< HEAD
class FileBagTest extends \PHPUnit_Framework_TestCase
=======
class FileBagTest extends TestCase
>>>>>>> dev
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFileMustBeAnArrayOrUploadedFile()
    {
<<<<<<< HEAD
        new FileBag(array('file' => 'foo'));
=======
        new FileBag(['file' => 'foo']);
>>>>>>> dev
    }

    public function testShouldConvertsUploadedFiles()
    {
        $tmpFile = $this->createTempFile();
<<<<<<< HEAD
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain', 100, 0);

        $bag = new FileBag(array('file' => array(
=======
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain');

        $bag = new FileBag(['file' => [
>>>>>>> dev
            'name' => basename($tmpFile),
            'type' => 'text/plain',
            'tmp_name' => $tmpFile,
            'error' => 0,
<<<<<<< HEAD
            'size' => 100,
        )));
=======
            'size' => null,
        ]]);
>>>>>>> dev

        $this->assertEquals($file, $bag->get('file'));
    }

    public function testShouldSetEmptyUploadedFilesToNull()
    {
<<<<<<< HEAD
        $bag = new FileBag(array('file' => array(
=======
        $bag = new FileBag(['file' => [
>>>>>>> dev
            'name' => '',
            'type' => '',
            'tmp_name' => '',
            'error' => UPLOAD_ERR_NO_FILE,
            'size' => 0,
<<<<<<< HEAD
        )));
=======
        ]]);
>>>>>>> dev

        $this->assertNull($bag->get('file'));
    }

<<<<<<< HEAD
    public function testShouldConvertUploadedFilesWithPhpBug()
    {
        $tmpFile = $this->createTempFile();
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain', 100, 0);

        $bag = new FileBag(array(
            'child' => array(
                'name' => array(
                    'file' => basename($tmpFile),
                ),
                'type' => array(
                    'file' => 'text/plain',
                ),
                'tmp_name' => array(
                    'file' => $tmpFile,
                ),
                'error' => array(
                    'file' => 0,
                ),
                'size' => array(
                    'file' => 100,
                ),
            ),
        ));
=======
    public function testShouldRemoveEmptyUploadedFilesForMultiUpload()
    {
        $bag = new FileBag(['files' => [
            'name' => [''],
            'type' => [''],
            'tmp_name' => [''],
            'error' => [UPLOAD_ERR_NO_FILE],
            'size' => [0],
        ]]);

        $this->assertSame([], $bag->get('files'));
    }

    public function testShouldNotRemoveEmptyUploadedFilesForAssociativeArray()
    {
        $bag = new FileBag(['files' => [
            'name' => ['file1' => ''],
            'type' => ['file1' => ''],
            'tmp_name' => ['file1' => ''],
            'error' => ['file1' => UPLOAD_ERR_NO_FILE],
            'size' => ['file1' => 0],
        ]]);

        $this->assertSame(['file1' => null], $bag->get('files'));
    }

    public function testShouldConvertUploadedFilesWithPhpBug()
    {
        $tmpFile = $this->createTempFile();
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain');

        $bag = new FileBag([
            'child' => [
                'name' => [
                    'file' => basename($tmpFile),
                ],
                'type' => [
                    'file' => 'text/plain',
                ],
                'tmp_name' => [
                    'file' => $tmpFile,
                ],
                'error' => [
                    'file' => 0,
                ],
                'size' => [
                    'file' => null,
                ],
            ],
        ]);
>>>>>>> dev

        $files = $bag->all();
        $this->assertEquals($file, $files['child']['file']);
    }

    public function testShouldConvertNestedUploadedFilesWithPhpBug()
    {
        $tmpFile = $this->createTempFile();
<<<<<<< HEAD
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain', 100, 0);

        $bag = new FileBag(array(
            'child' => array(
                'name' => array(
                    'sub' => array('file' => basename($tmpFile)),
                ),
                'type' => array(
                    'sub' => array('file' => 'text/plain'),
                ),
                'tmp_name' => array(
                    'sub' => array('file' => $tmpFile),
                ),
                'error' => array(
                    'sub' => array('file' => 0),
                ),
                'size' => array(
                    'sub' => array('file' => 100),
                ),
            ),
        ));
=======
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain');

        $bag = new FileBag([
            'child' => [
                'name' => [
                    'sub' => ['file' => basename($tmpFile)],
                ],
                'type' => [
                    'sub' => ['file' => 'text/plain'],
                ],
                'tmp_name' => [
                    'sub' => ['file' => $tmpFile],
                ],
                'error' => [
                    'sub' => ['file' => 0],
                ],
                'size' => [
                    'sub' => ['file' => null],
                ],
            ],
        ]);
>>>>>>> dev

        $files = $bag->all();
        $this->assertEquals($file, $files['child']['sub']['file']);
    }

    public function testShouldNotConvertNestedUploadedFiles()
    {
        $tmpFile = $this->createTempFile();
<<<<<<< HEAD
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain', 100, 0);
        $bag = new FileBag(array('image' => array('file' => $file)));
=======
        $file = new UploadedFile($tmpFile, basename($tmpFile), 'text/plain');
        $bag = new FileBag(['image' => ['file' => $file]]);
>>>>>>> dev

        $files = $bag->all();
        $this->assertEquals($file, $files['image']['file']);
    }

    protected function createTempFile()
    {
<<<<<<< HEAD
        return tempnam(sys_get_temp_dir().'/form_test', 'FormTest');
=======
        $tempFile = tempnam(sys_get_temp_dir().'/form_test', 'FormTest');
        file_put_contents($tempFile, '1');

        return $tempFile;
>>>>>>> dev
    }

    protected function setUp()
    {
        mkdir(sys_get_temp_dir().'/form_test', 0777, true);
    }

    protected function tearDown()
    {
        foreach (glob(sys_get_temp_dir().'/form_test/*') as $file) {
            unlink($file);
        }

        rmdir(sys_get_temp_dir().'/form_test');
    }
}
