<?php

<<<<<<< HEAD
class Swift_CharacterReader_Utf8ReaderTest extends \PHPUnit_Framework_TestCase
{
    private $_reader;

    protected function setUp()
    {
        $this->_reader = new Swift_CharacterReader_Utf8Reader();
=======
class Swift_CharacterReader_Utf8ReaderTest extends \PHPUnit\Framework\TestCase
{
    private $reader;

    protected function setUp()
    {
        $this->reader = new Swift_CharacterReader_Utf8Reader();
>>>>>>> dev
    }

    public function testLeading7BitOctetCausesReturnZero()
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

    public function testLeadingByteOf2OctetCharCausesReturn1()
    {
        for ($octet = 0xC0; $octet <= 0xDF; ++$octet) {
            $this->assertSame(
<<<<<<< HEAD
                1, $this->_reader->validateByteSequence(array($octet), 1)
=======
                1, $this->reader->validateByteSequence([$octet], 1)
>>>>>>> dev
                );
        }
    }

    public function testLeadingByteOf3OctetCharCausesReturn2()
    {
        for ($octet = 0xE0; $octet <= 0xEF; ++$octet) {
            $this->assertSame(
<<<<<<< HEAD
                2, $this->_reader->validateByteSequence(array($octet), 1)
=======
                2, $this->reader->validateByteSequence([$octet], 1)
>>>>>>> dev
                );
        }
    }

    public function testLeadingByteOf4OctetCharCausesReturn3()
    {
        for ($octet = 0xF0; $octet <= 0xF7; ++$octet) {
            $this->assertSame(
<<<<<<< HEAD
                3, $this->_reader->validateByteSequence(array($octet), 1)
=======
                3, $this->reader->validateByteSequence([$octet], 1)
>>>>>>> dev
                );
        }
    }

    public function testLeadingByteOf5OctetCharCausesReturn4()
    {
        for ($octet = 0xF8; $octet <= 0xFB; ++$octet) {
            $this->assertSame(
<<<<<<< HEAD
                4, $this->_reader->validateByteSequence(array($octet), 1)
=======
                4, $this->reader->validateByteSequence([$octet], 1)
>>>>>>> dev
                );
        }
    }

    public function testLeadingByteOf6OctetCharCausesReturn5()
    {
        for ($octet = 0xFC; $octet <= 0xFD; ++$octet) {
            $this->assertSame(
<<<<<<< HEAD
                5, $this->_reader->validateByteSequence(array($octet), 1)
=======
                5, $this->reader->validateByteSequence([$octet], 1)
>>>>>>> dev
                );
        }
    }
}
