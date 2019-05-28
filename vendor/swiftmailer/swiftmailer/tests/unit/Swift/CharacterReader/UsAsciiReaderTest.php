<?php

<<<<<<< HEAD
class Swift_CharacterReader_UsAsciiReaderTest extends \PHPUnit_Framework_TestCase
=======
class Swift_CharacterReader_UsAsciiReaderTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    /*

    for ($c = '', $size = 1; false !== $bytes = $os->read($size); ) {
        $c .= $bytes;
        $size = $v->validateCharacter($c);
        if (-1 == $size) {
            throw new Exception( ... invalid char .. );
        } elseif (0 == $size) {
            return $c; //next character in $os
        }
    }

    */

<<<<<<< HEAD
    private $_reader;

    protected function setUp()
    {
        $this->_reader = new Swift_CharacterReader_UsAsciiReader();
=======
    private $reader;

    protected function setUp()
    {
        $this->reader = new Swift_CharacterReader_UsAsciiReader();
>>>>>>> dev
    }

    public function testAllValidAsciiCharactersReturnZero()
    {
        for ($ordinal = 0x00; $ordinal <= 0x7F; ++$ordinal) {
            $this->assertSame(
<<<<<<< HEAD
                0, $this->_reader->validateByteSequence(array($ordinal), 1)
=======
                0, $this->reader->validateByteSequence([$ordinal], 1)
>>>>>>> dev
                );
        }
    }

    public function testMultipleBytesAreInvalid()
    {
        for ($ordinal = 0x00; $ordinal <= 0x7F; $ordinal += 2) {
            $this->assertSame(
<<<<<<< HEAD
                -1, $this->_reader->validateByteSequence(array($ordinal, $ordinal + 1), 2)
=======
                -1, $this->reader->validateByteSequence([$ordinal, $ordinal + 1], 2)
>>>>>>> dev
                );
        }
    }

    public function testBytesAboveAsciiRangeAreInvalid()
    {
        for ($ordinal = 0x80; $ordinal <= 0xFF; ++$ordinal) {
            $this->assertSame(
<<<<<<< HEAD
                -1, $this->_reader->validateByteSequence(array($ordinal), 1)
=======
                -1, $this->reader->validateByteSequence([$ordinal], 1)
>>>>>>> dev
                );
        }
    }
}
