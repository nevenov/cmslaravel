<?php

<<<<<<< HEAD
class Swift_ByteStream_FileByteStreamAcceptanceTest extends \PHPUnit_Framework_TestCase
=======
class Swift_ByteStream_FileByteStreamAcceptanceTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    private $_testFile;

    protected function setUp()
    {
<<<<<<< HEAD
        $this->_testFile = sys_get_temp_dir().'/swift-test-file'.__CLASS__;
        file_put_contents($this->_testFile, 'abcdefghijklm');
=======
        $this->testFile = sys_get_temp_dir().'/swift-test-file'.__CLASS__;
        file_put_contents($this->testFile, 'abcdefghijklm');
>>>>>>> dev
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        unlink($this->_testFile);
=======
        unlink($this->testFile);
>>>>>>> dev
    }

    public function testFileDataCanBeRead()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile);
=======
        $file = $this->createFileStream($this->testFile);
>>>>>>> dev
        $str = '';
        while (false !== $bytes = $file->read(8192)) {
            $str .= $bytes;
        }
        $this->assertEquals('abcdefghijklm', $str);
    }

    public function testFileDataCanBeReadSequentially()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile);
=======
        $file = $this->createFileStream($this->testFile);
>>>>>>> dev
        $this->assertEquals('abcde', $file->read(5));
        $this->assertEquals('fghijklm', $file->read(8));
        $this->assertFalse($file->read(1));
    }

    public function testFilenameIsReturned()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile);
        $this->assertEquals($this->_testFile, $file->getPath());
=======
        $file = $this->createFileStream($this->testFile);
        $this->assertEquals($this->testFile, $file->getPath());
>>>>>>> dev
    }

    public function testFileCanBeWrittenTo()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
=======
        $file = $this->createFileStream($this->testFile, true);
>>>>>>> dev
        $file->write('foobar');
        $this->assertEquals('foobar', $file->read(8192));
    }

    public function testReadingFromThenWritingToFile()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
=======
        $file = $this->createFileStream($this->testFile, true);
>>>>>>> dev
        $file->write('foobar');
        $this->assertEquals('foobar', $file->read(8192));
        $file->write('zipbutton');
        $this->assertEquals('zipbutton', $file->read(8192));
    }

    public function testWritingToFileWithCanonicalization()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
        $file->addFilter($this->_createFilter(array("\r\n", "\r"), "\n"), 'allToLF');
        $file->write("foo\r\nbar\r");
        $file->write("\nzip\r\ntest\r");
        $file->flushBuffers();
        $this->assertEquals("foo\nbar\nzip\ntest\n", file_get_contents($this->_testFile));
=======
        $file = $this->createFileStream($this->testFile, true);
        $file->addFilter($this->createFilter(["\r\n", "\r"], "\n"), 'allToLF');
        $file->write("foo\r\nbar\r");
        $file->write("\nzip\r\ntest\r");
        $file->flushBuffers();
        $this->assertEquals("foo\nbar\nzip\ntest\n", file_get_contents($this->testFile));
>>>>>>> dev
    }

    public function testWritingWithFulleMessageLengthOfAMultipleOf8192()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
        $file->addFilter($this->_createFilter(array("\r\n", "\r"), "\n"), 'allToLF');
        $file->write('');
        $file->flushBuffers();
        $this->assertEquals('', file_get_contents($this->_testFile));
=======
        $file = $this->createFileStream($this->testFile, true);
        $file->addFilter($this->createFilter(["\r\n", "\r"], "\n"), 'allToLF');
        $file->write('');
        $file->flushBuffers();
        $this->assertEquals('', file_get_contents($this->testFile));
>>>>>>> dev
    }

    public function testBindingOtherStreamsMirrorsWriteOperations()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $file = $this->createFileStream($this->testFile, true);
        $is1 = $this->createMockInputStream();
        $is2 = $this->createMockInputStream();
>>>>>>> dev

        $is1->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is1->expects($this->at(1))
            ->method('write')
            ->with('y');
        $is2->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is2->expects($this->at(1))
            ->method('write')
            ->with('y');

        $file->bind($is1);
        $file->bind($is2);

        $file->write('x');
        $file->write('y');
    }

    public function testBindingOtherStreamsMirrorsFlushOperations()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream(
            $this->_testFile, true
            );
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $file = $this->createFileStream(
            $this->testFile, true
            );
        $is1 = $this->createMockInputStream();
        $is2 = $this->createMockInputStream();
>>>>>>> dev

        $is1->expects($this->once())
            ->method('flushBuffers');
        $is2->expects($this->once())
            ->method('flushBuffers');

        $file->bind($is1);
        $file->bind($is2);

        $file->flushBuffers();
    }

    public function testUnbindingStreamPreventsFurtherWrites()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream($this->_testFile, true);
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $file = $this->createFileStream($this->testFile, true);
        $is1 = $this->createMockInputStream();
        $is2 = $this->createMockInputStream();
>>>>>>> dev

        $is1->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is1->expects($this->at(1))
            ->method('write')
            ->with('y');
        $is2->expects($this->once())
            ->method('write')
            ->with('x');

        $file->bind($is1);
        $file->bind($is2);

        $file->write('x');

        $file->unbind($is2);

        $file->write('y');
    }

<<<<<<< HEAD
    private function _createFilter($search, $replace)
=======
    private function createFilter($search, $replace)
>>>>>>> dev
    {
        return new Swift_StreamFilters_StringReplacementFilter($search, $replace);
    }

<<<<<<< HEAD
    private function _createMockInputStream()
=======
    private function createMockInputStream()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_InputByteStream')->getMock();
    }

<<<<<<< HEAD
    private function _createFileStream($file, $writable = false)
=======
    private function createFileStream($file, $writable = false)
>>>>>>> dev
    {
        return new Swift_ByteStream_FileByteStream($file, $writable);
    }
}
