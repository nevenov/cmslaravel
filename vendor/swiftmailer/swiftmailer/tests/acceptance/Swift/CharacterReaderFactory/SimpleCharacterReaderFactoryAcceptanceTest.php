<?php

<<<<<<< HEAD
class Swift_CharacterReaderFactory_SimpleCharacterReaderFactoryAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_factory;
    private $_prefix = 'Swift_CharacterReader_';

    protected function setUp()
    {
        $this->_factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
=======
class Swift_CharacterReaderFactory_SimpleCharacterReaderFactoryAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $factory;
    private $prefix = 'Swift_CharacterReader_';

    protected function setUp()
    {
        $this->factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
>>>>>>> dev
    }

    public function testCreatingUtf8Reader()
    {
<<<<<<< HEAD
        foreach (array('utf8', 'utf-8', 'UTF-8', 'UTF8') as $utf8) {
            $reader = $this->_factory->getReaderFor($utf8);
            $this->assertInstanceOf($this->_prefix.'Utf8Reader', $reader);
=======
        foreach (['utf8', 'utf-8', 'UTF-8', 'UTF8'] as $utf8) {
            $reader = $this->factory->getReaderFor($utf8);
            $this->assertInstanceOf($this->prefix.'Utf8Reader', $reader);
>>>>>>> dev
        }
    }

    public function testCreatingIso8859XReaders()
    {
<<<<<<< HEAD
        $charsets = array();
        foreach (range(1, 16) as $number) {
            foreach (array('iso', 'iec') as $body) {
=======
        $charsets = [];
        foreach (range(1, 16) as $number) {
            foreach (['iso', 'iec'] as $body) {
>>>>>>> dev
                $charsets[] = $body.'-8859-'.$number;
                $charsets[] = $body.'8859-'.$number;
                $charsets[] = strtoupper($body).'-8859-'.$number;
                $charsets[] = strtoupper($body).'8859-'.$number;
            }
        }

        foreach ($charsets as $charset) {
<<<<<<< HEAD
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingWindows125XReaders()
    {
<<<<<<< HEAD
        $charsets = array();
=======
        $charsets = [];
>>>>>>> dev
        foreach (range(0, 8) as $number) {
            $charsets[] = 'windows-125'.$number;
            $charsets[] = 'windows125'.$number;
            $charsets[] = 'WINDOWS-125'.$number;
            $charsets[] = 'WINDOWS125'.$number;
        }

        foreach ($charsets as $charset) {
<<<<<<< HEAD
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingCodePageReaders()
    {
<<<<<<< HEAD
        $charsets = array();
=======
        $charsets = [];
>>>>>>> dev
        foreach (range(0, 8) as $number) {
            $charsets[] = 'cp-125'.$number;
            $charsets[] = 'cp125'.$number;
            $charsets[] = 'CP-125'.$number;
            $charsets[] = 'CP125'.$number;
        }

<<<<<<< HEAD
        foreach (array(437, 737, 850, 855, 857, 858, 860,
            861, 863, 865, 866, 869, ) as $number) {
=======
        foreach ([437, 737, 850, 855, 857, 858, 860,
            861, 863, 865, 866, 869, ] as $number) {
>>>>>>> dev
            $charsets[] = 'cp-'.$number;
            $charsets[] = 'cp'.$number;
            $charsets[] = 'CP-'.$number;
            $charsets[] = 'CP'.$number;
        }

        foreach ($charsets as $charset) {
<<<<<<< HEAD
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingAnsiReader()
    {
<<<<<<< HEAD
        foreach (array('ansi', 'ANSI') as $ansi) {
            $reader = $this->_factory->getReaderFor($ansi);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['ansi', 'ANSI'] as $ansi) {
            $reader = $this->factory->getReaderFor($ansi);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingMacintoshReader()
    {
<<<<<<< HEAD
        foreach (array('macintosh', 'MACINTOSH') as $mac) {
            $reader = $this->_factory->getReaderFor($mac);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['macintosh', 'MACINTOSH'] as $mac) {
            $reader = $this->factory->getReaderFor($mac);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingKOIReaders()
    {
<<<<<<< HEAD
        $charsets = array();
        foreach (array('7', '8-r', '8-u', '8u', '8r') as $end) {
=======
        $charsets = [];
        foreach (['7', '8-r', '8-u', '8u', '8r'] as $end) {
>>>>>>> dev
            $charsets[] = 'koi-'.$end;
            $charsets[] = 'koi'.$end;
            $charsets[] = 'KOI-'.$end;
            $charsets[] = 'KOI'.$end;
        }

        foreach ($charsets as $charset) {
<<<<<<< HEAD
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingIsciiReaders()
    {
<<<<<<< HEAD
        foreach (array('iscii', 'ISCII', 'viscii', 'VISCII') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['iscii', 'ISCII', 'viscii', 'VISCII'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingMIKReader()
    {
<<<<<<< HEAD
        foreach (array('mik', 'MIK') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['mik', 'MIK'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingCorkReader()
    {
<<<<<<< HEAD
        foreach (array('cork', 'CORK', 't1', 'T1') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['cork', 'CORK', 't1', 'T1'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(1, $reader->getInitialByteSize());
        }
    }

    public function testCreatingUcs2Reader()
    {
<<<<<<< HEAD
        foreach (array('ucs-2', 'UCS-2', 'ucs2', 'UCS2') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['ucs-2', 'UCS-2', 'ucs2', 'UCS2'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(2, $reader->getInitialByteSize());
        }
    }

    public function testCreatingUtf16Reader()
    {
<<<<<<< HEAD
        foreach (array('utf-16', 'UTF-16', 'utf16', 'UTF16') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['utf-16', 'UTF-16', 'utf16', 'UTF16'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(2, $reader->getInitialByteSize());
        }
    }

    public function testCreatingUcs4Reader()
    {
<<<<<<< HEAD
        foreach (array('ucs-4', 'UCS-4', 'ucs4', 'UCS4') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['ucs-4', 'UCS-4', 'ucs4', 'UCS4'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(4, $reader->getInitialByteSize());
        }
    }

    public function testCreatingUtf32Reader()
    {
<<<<<<< HEAD
        foreach (array('utf-32', 'UTF-32', 'utf32', 'UTF32') as $charset) {
            $reader = $this->_factory->getReaderFor($charset);
            $this->assertInstanceOf($this->_prefix.'GenericFixedWidthReader', $reader);
=======
        foreach (['utf-32', 'UTF-32', 'utf32', 'UTF32'] as $charset) {
            $reader = $this->factory->getReaderFor($charset);
            $this->assertInstanceOf($this->prefix.'GenericFixedWidthReader', $reader);
>>>>>>> dev
            $this->assertEquals(4, $reader->getInitialByteSize());
        }
    }
}
