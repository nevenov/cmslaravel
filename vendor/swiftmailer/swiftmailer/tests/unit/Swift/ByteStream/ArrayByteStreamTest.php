<?php

<<<<<<< HEAD
class Swift_ByteStream_ArrayByteStreamTest extends \PHPUnit_Framework_TestCase
{
    public function testReadingSingleBytesFromBaseInput()
    {
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
        $output = array();
=======
class Swift_ByteStream_ArrayByteStreamTest extends \PHPUnit\Framework\TestCase
{
    public function testReadingSingleBytesFromBaseInput()
    {
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);
        $output = [];
>>>>>>> dev
        while (false !== $bytes = $bs->read(1)) {
            $output[] = $bytes;
        }
        $this->assertEquals($input, $output,
            '%s: Bytes read from stream should be the same as bytes in constructor'
            );
    }

    public function testReadingMultipleBytesFromBaseInput()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c', 'd');
        $bs = $this->_createArrayStream($input);
        $output = array();
        while (false !== $bytes = $bs->read(2)) {
            $output[] = $bytes;
        }
        $this->assertEquals(array('ab', 'cd'), $output,
=======
        $input = ['a', 'b', 'c', 'd'];
        $bs = $this->createArrayStream($input);
        $output = [];
        while (false !== $bytes = $bs->read(2)) {
            $output[] = $bytes;
        }
        $this->assertEquals(['ab', 'cd'], $output,
>>>>>>> dev
            '%s: Bytes read from stream should be in pairs'
            );
    }

    public function testReadingOddOffsetOnLastByte()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c', 'd', 'e');
        $bs = $this->_createArrayStream($input);
        $output = array();
        while (false !== $bytes = $bs->read(2)) {
            $output[] = $bytes;
        }
        $this->assertEquals(array('ab', 'cd', 'e'), $output,
=======
        $input = ['a', 'b', 'c', 'd', 'e'];
        $bs = $this->createArrayStream($input);
        $output = [];
        while (false !== $bytes = $bs->read(2)) {
            $output[] = $bytes;
        }
        $this->assertEquals(['ab', 'cd', 'e'], $output,
>>>>>>> dev
            '%s: Bytes read from stream should be in pairs except final read'
            );
    }

    public function testSettingPointerPartway()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
=======
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);
>>>>>>> dev
        $bs->setReadPointer(1);
        $this->assertEquals('b', $bs->read(1),
            '%s: Byte should be second byte since pointer as at offset 1'
            );
    }

    public function testResettingPointerAfterExhaustion()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
=======
        $input = ['a', 'b', 'c'];

        $bs = $this->createArrayStream($input);
>>>>>>> dev
        while (false !== $bs->read(1));

        $bs->setReadPointer(0);
        $this->assertEquals('a', $bs->read(1),
            '%s: Byte should be first byte since pointer as at offset 0'
            );
    }

    public function testPointerNeverSetsBelowZero()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
=======
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);
>>>>>>> dev

        $bs->setReadPointer(-1);
        $this->assertEquals('a', $bs->read(1),
            '%s: Byte should be first byte since pointer should be at offset 0'
            );
    }

    public function testPointerNeverSetsAboveStackSize()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
=======
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);
>>>>>>> dev

        $bs->setReadPointer(3);
        $this->assertFalse($bs->read(1),
            '%s: Stream should be at end and thus return false'
            );
    }

    public function testBytesCanBeWrittenToStream()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);

        $bs->write('de');

        $output = array();
        while (false !== $bytes = $bs->read(1)) {
            $output[] = $bytes;
        }
        $this->assertEquals(array('a', 'b', 'c', 'd', 'e'), $output,
=======
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);

        $bs->write('de');

        $output = [];
        while (false !== $bytes = $bs->read(1)) {
            $output[] = $bytes;
        }
        $this->assertEquals(['a', 'b', 'c', 'd', 'e'], $output,
>>>>>>> dev
            '%s: Bytes read from stream should be from initial stack + written'
            );
    }

    public function testContentsCanBeFlushed()
    {
<<<<<<< HEAD
        $input = array('a', 'b', 'c');
        $bs = $this->_createArrayStream($input);
=======
        $input = ['a', 'b', 'c'];
        $bs = $this->createArrayStream($input);
>>>>>>> dev

        $bs->flushBuffers();

        $this->assertFalse($bs->read(1),
            '%s: Contents have been flushed so read() should return false'
            );
    }

    public function testConstructorCanTakeStringArgument()
    {
<<<<<<< HEAD
        $bs = $this->_createArrayStream('abc');
        $output = array();
        while (false !== $bytes = $bs->read(1)) {
            $output[] = $bytes;
        }
        $this->assertEquals(array('a', 'b', 'c'), $output,
=======
        $bs = $this->createArrayStream('abc');
        $output = [];
        while (false !== $bytes = $bs->read(1)) {
            $output[] = $bytes;
        }
        $this->assertEquals(['a', 'b', 'c'], $output,
>>>>>>> dev
            '%s: Bytes read from stream should be the same as bytes in constructor'
            );
    }

    public function testBindingOtherStreamsMirrorsWriteOperations()
    {
<<<<<<< HEAD
        $bs = $this->_createArrayStream('');
=======
        $bs = $this->createArrayStream('');
>>>>>>> dev
        $is1 = $this->getMockBuilder('Swift_InputByteStream')->getMock();
        $is2 = $this->getMockBuilder('Swift_InputByteStream')->getMock();

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

        $bs->bind($is1);
        $bs->bind($is2);

        $bs->write('x');
        $bs->write('y');
    }

    public function testBindingOtherStreamsMirrorsFlushOperations()
    {
<<<<<<< HEAD
        $bs = $this->_createArrayStream('');
=======
        $bs = $this->createArrayStream('');
>>>>>>> dev
        $is1 = $this->getMockBuilder('Swift_InputByteStream')->getMock();
        $is2 = $this->getMockBuilder('Swift_InputByteStream')->getMock();

        $is1->expects($this->once())
            ->method('flushBuffers');
        $is2->expects($this->once())
            ->method('flushBuffers');

        $bs->bind($is1);
        $bs->bind($is2);

        $bs->flushBuffers();
    }

    public function testUnbindingStreamPreventsFurtherWrites()
    {
<<<<<<< HEAD
        $bs = $this->_createArrayStream('');
=======
        $bs = $this->createArrayStream('');
>>>>>>> dev
        $is1 = $this->getMockBuilder('Swift_InputByteStream')->getMock();
        $is2 = $this->getMockBuilder('Swift_InputByteStream')->getMock();

        $is1->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is1->expects($this->at(1))
            ->method('write')
            ->with('y');
        $is2->expects($this->once())
            ->method('write')
            ->with('x');

        $bs->bind($is1);
        $bs->bind($is2);

        $bs->write('x');

        $bs->unbind($is2);

        $bs->write('y');
    }

<<<<<<< HEAD
    private function _createArrayStream($input)
=======
    private function createArrayStream($input)
>>>>>>> dev
    {
        return new Swift_ByteStream_ArrayByteStream($input);
    }
}
