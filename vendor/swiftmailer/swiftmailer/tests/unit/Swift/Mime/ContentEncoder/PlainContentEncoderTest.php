<?php

class Swift_Mime_ContentEncoder_PlainContentEncoderTest extends \SwiftMailerTestCase
{
    public function testNameCanBeSpecifiedInConstructor()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit');
        $this->assertEquals('7bit', $encoder->getName());

        $encoder = $this->_getEncoder('8bit');
=======
        $encoder = $this->getEncoder('7bit');
        $this->assertEquals('7bit', $encoder->getName());

        $encoder = $this->getEncoder('8bit');
>>>>>>> dev
        $this->assertEquals('8bit', $encoder->getName());
    }

    public function testNoOctetsAreModifiedInString()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit');
=======
        $encoder = $this->getEncoder('7bit');
>>>>>>> dev
        foreach (range(0x00, 0xFF) as $octet) {
            $byte = pack('C', $octet);
            $this->assertIdenticalBinary($byte, $encoder->encodeString($byte));
        }
    }

    public function testNoOctetsAreModifiedInByteStream()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit');
        foreach (range(0x00, 0xFF) as $octet) {
            $byte = pack('C', $octet);

            $os = $this->_createOutputByteStream();
            $is = $this->_createInputByteStream();
=======
        $encoder = $this->getEncoder('7bit');
        foreach (range(0x00, 0xFF) as $octet) {
            $byte = pack('C', $octet);

            $os = $this->createOutputByteStream();
            $is = $this->createInputByteStream();
>>>>>>> dev
            $collection = new Swift_StreamCollector();

            $is->shouldReceive('write')
               ->zeroOrMoreTimes()
               ->andReturnUsing($collection);
            $os->shouldReceive('read')
               ->once()
               ->andReturn($byte);
            $os->shouldReceive('read')
               ->zeroOrMoreTimes()
               ->andReturn(false);

            $encoder->encodeByteStream($os, $is);
            $this->assertIdenticalBinary($byte, $collection->content);
        }
    }

    public function testLineLengthCanBeSpecified()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit');

        $chars = array();
=======
        $encoder = $this->getEncoder('7bit');

        $chars = [];
>>>>>>> dev
        for ($i = 0; $i < 50; ++$i) {
            $chars[] = 'a';
        }
        $input = implode(' ', $chars); //99 chars long

        $this->assertEquals(
            'a a a a a a a a a a a a a a a a a a a a a a a a a '."\r\n".//50 *
            'a a a a a a a a a a a a a a a a a a a a a a a a a',            //99
            $encoder->encodeString($input, 0, 50),
            '%s: Lines should be wrapped at 50 chars'
            );
    }

    public function testLineLengthCanBeSpecifiedInByteStream()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit');

        $os = $this->_createOutputByteStream();
        $is = $this->_createInputByteStream();
=======
        $encoder = $this->getEncoder('7bit');

        $os = $this->createOutputByteStream();
        $is = $this->createInputByteStream();
>>>>>>> dev
        $collection = new Swift_StreamCollector();

        $is->shouldReceive('write')
           ->zeroOrMoreTimes()
           ->andReturnUsing($collection);

        for ($i = 0; $i < 50; ++$i) {
            $os->shouldReceive('read')
               ->once()
               ->andReturn('a ');
        }

        $os->shouldReceive('read')
           ->zeroOrMoreTimes()
           ->andReturn(false);

        $encoder->encodeByteStream($os, $is, 0, 50);
        $this->assertEquals(
            str_repeat('a ', 25)."\r\n".str_repeat('a ', 25),
            $collection->content
            );
    }

    public function testencodeStringGeneratesCorrectCrlf()
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit', true);
=======
        $encoder = $this->getEncoder('7bit', true);
>>>>>>> dev
        $this->assertEquals("a\r\nb", $encoder->encodeString("a\rb"),
            '%s: Line endings should be standardized'
            );
        $this->assertEquals("a\r\nb", $encoder->encodeString("a\nb"),
            '%s: Line endings should be standardized'
            );
        $this->assertEquals("a\r\n\r\nb", $encoder->encodeString("a\n\rb"),
            '%s: Line endings should be standardized'
            );
        $this->assertEquals("a\r\n\r\nb", $encoder->encodeString("a\r\rb"),
            '%s: Line endings should be standardized'
            );
        $this->assertEquals("a\r\n\r\nb", $encoder->encodeString("a\n\nb"),
            '%s: Line endings should be standardized'
            );
    }

    public function crlfProvider()
    {
<<<<<<< HEAD
        return array(
            array("\r", "a\r\nb"),
            array("\n", "a\r\nb"),
            array("\n\r", "a\r\n\r\nb"),
            array("\n\n", "a\r\n\r\nb"),
            array("\r\r", "a\r\n\r\nb"),
        );
=======
        return [
            ["\r", "a\r\nb"],
            ["\n", "a\r\nb"],
            ["\n\r", "a\r\n\r\nb"],
            ["\n\n", "a\r\n\r\nb"],
            ["\r\r", "a\r\n\r\nb"],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider crlfProvider
     */
    public function testCanonicEncodeByteStreamGeneratesCorrectCrlf($test, $expected)
    {
<<<<<<< HEAD
        $encoder = $this->_getEncoder('7bit', true);

        $os = $this->_createOutputByteStream();
        $is = $this->_createInputByteStream();
=======
        $encoder = $this->getEncoder('7bit', true);

        $os = $this->createOutputByteStream();
        $is = $this->createInputByteStream();
>>>>>>> dev
        $collection = new Swift_StreamCollector();

        $is->shouldReceive('write')
           ->zeroOrMoreTimes()
           ->andReturnUsing($collection);
        $os->shouldReceive('read')
           ->once()
           ->andReturn('a');
        $os->shouldReceive('read')
           ->once()
           ->andReturn($test);
        $os->shouldReceive('read')
           ->once()
           ->andReturn('b');
        $os->shouldReceive('read')
           ->zeroOrMoreTimes()
           ->andReturn(false);

        $encoder->encodeByteStream($os, $is);
        $this->assertEquals($expected, $collection->content);
    }

<<<<<<< HEAD
    private function _getEncoder($name, $canonical = false)
=======
    private function getEncoder($name, $canonical = false)
>>>>>>> dev
    {
        return new Swift_Mime_ContentEncoder_PlainContentEncoder($name, $canonical);
    }

<<<<<<< HEAD
    private function _createOutputByteStream($stub = false)
=======
    private function createOutputByteStream($stub = false)
>>>>>>> dev
    {
        return $this->getMockery('Swift_OutputByteStream')->shouldIgnoreMissing();
    }

<<<<<<< HEAD
    private function _createInputByteStream($stub = false)
=======
    private function createInputByteStream($stub = false)
>>>>>>> dev
    {
        return $this->getMockery('Swift_InputByteStream')->shouldIgnoreMissing();
    }
}
