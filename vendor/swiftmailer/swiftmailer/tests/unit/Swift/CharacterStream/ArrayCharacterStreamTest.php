<?php

class Swift_CharacterStream_ArrayCharacterStreamTest extends \SwiftMailerTestCase
{
    public function testValidatorAlgorithmOnImportString()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*',
            0xD0, 0x94,
            0xD0, 0xB6,
            0xD0, 0xBE,
            0xD1, 0x8D,
            0xD0, 0xBB,
            0xD0, 0xB0
            )
        );
    }

    public function testCharactersWrittenUseValidator()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $stream->write(pack('C*',
            0xD0, 0xBB,
            0xD1, 0x8E,
            0xD0, 0xB1,
            0xD1, 0x8B,
            0xD1, 0x85
            )
        );
    }

    public function testReadCharactersAreInTact()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
        //String
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        //Stream
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        //Stream
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $stream->write(pack('C*',
            0xD0, 0xBB,
            0xD1, 0x8E,
            0xD0, 0xB1,
            0xD1, 0x8B,
            0xD1, 0x85
            )
        );

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0x94), $stream->read(1));
        $this->assertIdenticalBinary(
            pack('C*', 0xD0, 0xB6, 0xD0, 0xBE), $stream->read(2)
            );
        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xBB), $stream->read(1));
        $this->assertIdenticalBinary(
            pack('C*', 0xD1, 0x8E, 0xD0, 0xB1, 0xD1, 0x8B), $stream->read(3)
            );
        $this->assertIdenticalBinary(pack('C*', 0xD1, 0x85), $stream->read(1));

        $this->assertFalse($stream->read(1));
    }

    public function testCharactersCanBeReadAsByteArrays()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
        //String
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        //Stream
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        //Stream
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $stream->write(pack('C*',
            0xD0, 0xBB,
            0xD1, 0x8E,
            0xD0, 0xB1,
            0xD1, 0x8B,
            0xD1, 0x85
            )
        );

<<<<<<< HEAD
        $this->assertEquals(array(0xD0, 0x94), $stream->readBytes(1));
        $this->assertEquals(array(0xD0, 0xB6, 0xD0, 0xBE), $stream->readBytes(2));
        $this->assertEquals(array(0xD0, 0xBB), $stream->readBytes(1));
        $this->assertEquals(
            array(0xD1, 0x8E, 0xD0, 0xB1, 0xD1, 0x8B), $stream->readBytes(3)
            );
        $this->assertEquals(array(0xD1, 0x85), $stream->readBytes(1));
=======
        $this->assertEquals([0xD0, 0x94], $stream->readBytes(1));
        $this->assertEquals([0xD0, 0xB6, 0xD0, 0xBE], $stream->readBytes(2));
        $this->assertEquals([0xD0, 0xBB], $stream->readBytes(1));
        $this->assertEquals(
            [0xD1, 0x8E, 0xD0, 0xB1, 0xD1, 0x8B], $stream->readBytes(3)
            );
        $this->assertEquals([0xD1, 0x85], $stream->readBytes(1));
>>>>>>> dev

        $this->assertFalse($stream->readBytes(1));
    }

    public function testRequestingLargeCharCountPastEndOfStream()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE),
            $stream->read(100)
            );

        $this->assertFalse($stream->read(1));
    }

    public function testRequestingByteArrayCountPastEndOfStream()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $this->assertEquals(array(0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE),
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $this->assertEquals([0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE],
>>>>>>> dev
            $stream->readBytes(100)
            );

        $this->assertFalse($stream->readBytes(1));
    }

    public function testPointerOffsetCanBeSet()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0x94), $stream->read(1));

        $stream->setPointer(0);

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0x94), $stream->read(1));

        $stream->setPointer(2);

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xBE), $stream->read(1));
    }

    public function testContentsCanBeFlushed()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importString(pack('C*', 0xD0, 0x94, 0xD0, 0xB6, 0xD0, 0xBE));

        $stream->flushContents();

        $this->assertFalse($stream->read(1));
    }

    public function testByteStreamCanBeImportingUsesValidator()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
        $os = $this->_getByteStream();
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
        $os = $this->getByteStream();
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $os->shouldReceive('setReadPointer')
           ->between(0, 1)
           ->with(0);
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0x94));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xB6));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xBE));
        $os->shouldReceive('read')
           ->zeroOrMoreTimes()
           ->andReturn(false);

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importByteStream($os);
    }

    public function testImportingStreamProducesCorrectCharArray()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
        $os = $this->_getByteStream();
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
        $os = $this->getByteStream();
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8');

        $os->shouldReceive('setReadPointer')
           ->between(0, 1)
           ->with(0);
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0x94));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xB6));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xD0));
        $os->shouldReceive('read')->once()->andReturn(pack('C*', 0xBE));
        $os->shouldReceive('read')
           ->zeroOrMoreTimes()
           ->andReturn(false);

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(1);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0), 1)->andReturn(1);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0], 1)->andReturn(1);
>>>>>>> dev

        $stream->importByteStream($os);

        $this->assertIdenticalBinary(pack('C*', 0xD0, 0x94), $stream->read(1));
        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xB6), $stream->read(1));
        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xBE), $stream->read(1));

        $this->assertFalse($stream->read(1));
    }

    public function testAlgorithmWithFixedWidthCharsets()
    {
<<<<<<< HEAD
        $reader = $this->_getReader();
        $factory = $this->_getFactory($reader);
=======
        $reader = $this->getReader();
        $factory = $this->getFactory($reader);
>>>>>>> dev

        $reader->shouldReceive('getInitialByteSize')
               ->zeroOrMoreTimes()
               ->andReturn(2);
<<<<<<< HEAD
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD1, 0x8D), 2);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0, 0xBB), 2);
        $reader->shouldReceive('validateByteSequence')->once()->with(array(0xD0, 0xB0), 2);
=======
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD1, 0x8D], 2);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0, 0xBB], 2);
        $reader->shouldReceive('validateByteSequence')->once()->with([0xD0, 0xB0], 2);
>>>>>>> dev

        $stream = new Swift_CharacterStream_ArrayCharacterStream(
            $factory, 'utf-8'
        );
        $stream->importString(pack('C*', 0xD1, 0x8D, 0xD0, 0xBB, 0xD0, 0xB0));

        $this->assertIdenticalBinary(pack('C*', 0xD1, 0x8D), $stream->read(1));
        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xBB), $stream->read(1));
        $this->assertIdenticalBinary(pack('C*', 0xD0, 0xB0), $stream->read(1));

        $this->assertFalse($stream->read(1));
    }

<<<<<<< HEAD
    private function _getReader()
=======
    private function getReader()
>>>>>>> dev
    {
        return $this->getMockery('Swift_CharacterReader');
    }

<<<<<<< HEAD
    private function _getFactory($reader)
=======
    private function getFactory($reader)
>>>>>>> dev
    {
        $factory = $this->getMockery('Swift_CharacterReaderFactory');
        $factory->shouldReceive('getReaderFor')
                ->zeroOrMoreTimes()
                ->with('utf-8')
                ->andReturn($reader);

        return $factory;
    }

<<<<<<< HEAD
    private function _getByteStream()
=======
    private function getByteStream()
>>>>>>> dev
    {
        return $this->getMockery('Swift_OutputByteStream');
    }
}
