<?php

<<<<<<< HEAD
abstract class Swift_Transport_StreamBuffer_AbstractStreamBufferAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    protected $_buffer;

    abstract protected function _initializeBuffer();
=======
abstract class Swift_Transport_StreamBuffer_AbstractStreamBufferAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    protected $buffer;

    abstract protected function initializeBuffer();
>>>>>>> dev

    protected function setUp()
    {
        if (true == getenv('TRAVIS')) {
            $this->markTestSkipped(
                'Will fail on travis-ci if not skipped due to travis blocking '.
                'socket mailing tcp connections.'
             );
        }

<<<<<<< HEAD
        $this->_buffer = new Swift_Transport_StreamBuffer(
=======
        $this->buffer = new Swift_Transport_StreamBuffer(
>>>>>>> dev
            $this->getMockBuilder('Swift_ReplacementFilterFactory')->getMock()
        );
    }

    public function testReadLine()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();

        $line = $this->_buffer->readLine(0);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $seq = $this->_buffer->write("QUIT\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->_buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $this->_buffer->terminate();
=======
        $this->initializeBuffer();

        $line = $this->buffer->readLine(0);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $seq = $this->buffer->write("QUIT\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $this->buffer->terminate();
>>>>>>> dev
    }

    public function testWrite()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();

        $line = $this->_buffer->readLine(0);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);

        $seq = $this->_buffer->write("HELO foo\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->_buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);

        $seq = $this->_buffer->write("QUIT\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->_buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $this->_buffer->terminate();
=======
        $this->initializeBuffer();

        $line = $this->buffer->readLine(0);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);

        $seq = $this->buffer->write("HELO foo\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);

        $seq = $this->buffer->write("QUIT\r\n");
        $this->assertTrue((bool) $seq);
        $line = $this->buffer->readLine($seq);
        $this->assertRegExp('/^[0-9]{3}.*?\r\n$/D', $line);
        $this->buffer->terminate();
>>>>>>> dev
    }

    public function testBindingOtherStreamsMirrorsWriteOperations()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();

        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $this->initializeBuffer();

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

<<<<<<< HEAD
        $this->_buffer->bind($is1);
        $this->_buffer->bind($is2);

        $this->_buffer->write('x');
        $this->_buffer->write('y');
=======
        $this->buffer->bind($is1);
        $this->buffer->bind($is2);

        $this->buffer->write('x');
        $this->buffer->write('y');
>>>>>>> dev
    }

    public function testBindingOtherStreamsMirrorsFlushOperations()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();

        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $this->initializeBuffer();

        $is1 = $this->createMockInputStream();
        $is2 = $this->createMockInputStream();
>>>>>>> dev

        $is1->expects($this->once())
            ->method('flushBuffers');
        $is2->expects($this->once())
            ->method('flushBuffers');

<<<<<<< HEAD
        $this->_buffer->bind($is1);
        $this->_buffer->bind($is2);

        $this->_buffer->flushBuffers();
=======
        $this->buffer->bind($is1);
        $this->buffer->bind($is2);

        $this->buffer->flushBuffers();
>>>>>>> dev
    }

    public function testUnbindingStreamPreventsFurtherWrites()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();

        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();
=======
        $this->initializeBuffer();

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

<<<<<<< HEAD
        $this->_buffer->bind($is1);
        $this->_buffer->bind($is2);

        $this->_buffer->write('x');

        $this->_buffer->unbind($is2);

        $this->_buffer->write('y');
    }

    private function _createMockInputStream()
=======
        $this->buffer->bind($is1);
        $this->buffer->bind($is2);

        $this->buffer->write('x');

        $this->buffer->unbind($is2);

        $this->buffer->write('y');
    }

    private function createMockInputStream()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_InputByteStream')->getMock();
    }
}
