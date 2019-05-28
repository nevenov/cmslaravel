<?php

class Swift_Mime_HeaderEncoder_QpHeaderEncoderTest extends \SwiftMailerTestCase
{
    //Most tests are already covered in QpEncoderTest since this subclass only
    // adds a getName() method

    public function testNameIsQ()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder(
            $this->_createCharacterStream(true)
=======
        $encoder = $this->createEncoder(
            $this->createCharacterStream(true)
>>>>>>> dev
            );
        $this->assertEquals('Q', $encoder->getName());
    }

    public function testSpaceAndTabNeverAppear()
    {
        /* -- RFC 2047, 4.
     Only a subset of the printable ASCII characters may be used in
     'encoded-text'.  Space and tab characters are not allowed, so that
     the beginning and end of an 'encoded-word' are obvious.
     */

<<<<<<< HEAD
        $charStream = $this->_createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->atLeast()->times(6)
                   ->andReturn(array(ord('a')), array(0x20), array(0x09), array(0x20), array(ord('b')), false);

        $encoder = $this->_createEncoder($charStream);
=======
        $charStream = $this->createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->atLeast()->times(6)
                   ->andReturn([ord('a')], [0x20], [0x09], [0x20], [ord('b')], false);

        $encoder = $this->createEncoder($charStream);
>>>>>>> dev
        $this->assertNotRegExp('~[ \t]~', $encoder->encodeString("a \t b"),
            '%s: encoded-words in headers cannot contain LWSP as per RFC 2047.'
            );
    }

    public function testSpaceIsRepresentedByUnderscore()
    {
        /* -- RFC 2047, 4.2.
        (2) The 8-bit hexadecimal value 20 (e.g., ISO-8859-1 SPACE) may be
       represented as "_" (underscore, ASCII 95.).  (This character may
       not pass through some internetwork mail gateways, but its use
       will greatly enhance readability of "Q" encoded data with mail
       readers that do not support this encoding.)  Note that the "_"
       always represents hexadecimal 20, even if the SPACE character
       occupies a different code position in the character set in use.
       */
<<<<<<< HEAD
        $charStream = $this->_createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('a')));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(0x20));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('b')));
=======
        $charStream = $this->createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('a')]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([0x20]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('b')]);
>>>>>>> dev
        $charStream->shouldReceive('readBytes')
                   ->zeroOrMoreTimes()
                   ->andReturn(false);

<<<<<<< HEAD
        $encoder = $this->_createEncoder($charStream);
=======
        $encoder = $this->createEncoder($charStream);
>>>>>>> dev
        $this->assertEquals('a_b', $encoder->encodeString('a b'),
            '%s: Spaces can be represented by more readable underscores as per RFC 2047.'
            );
    }

    public function testEqualsAndQuestionAndUnderscoreAreEncoded()
    {
        /* -- RFC 2047, 4.2.
        (3) 8-bit values which correspond to printable ASCII characters other
       than "=", "?", and "_" (underscore), MAY be represented as those
       characters.  (But see section 5 for restrictions.)  In
       particular, SPACE and TAB MUST NOT be represented as themselves
       within encoded words.
       */
<<<<<<< HEAD
        $charStream = $this->_createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('=')));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('?')));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('_')));
=======
        $charStream = $this->createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('=')]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('?')]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('_')]);
>>>>>>> dev
        $charStream->shouldReceive('readBytes')
                   ->zeroOrMoreTimes()
                   ->andReturn(false);

<<<<<<< HEAD
        $encoder = $this->_createEncoder($charStream);
=======
        $encoder = $this->createEncoder($charStream);
>>>>>>> dev
        $this->assertEquals('=3D=3F=5F', $encoder->encodeString('=?_'),
            '%s: Chars =, ? and _ (underscore) may not appear as per RFC 2047.'
            );
    }

    public function testParensAndQuotesAreEncoded()
    {
        /* -- RFC 2047, 5 (2).
     A "Q"-encoded 'encoded-word' which appears in a 'comment' MUST NOT
     contain the characters "(", ")" or "
     */

<<<<<<< HEAD
        $charStream = $this->_createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('(')));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord('"')));
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array(ord(')')));
=======
        $charStream = $this->createCharacterStream();
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('(')]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord('"')]);
        $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([ord(')')]);
>>>>>>> dev
        $charStream->shouldReceive('readBytes')
                   ->zeroOrMoreTimes()
                   ->andReturn(false);

<<<<<<< HEAD
        $encoder = $this->_createEncoder($charStream);
=======
        $encoder = $this->createEncoder($charStream);
>>>>>>> dev
        $this->assertEquals('=28=22=29', $encoder->encodeString('(")'),
            '%s: Chars (, " (DQUOTE) and ) may not appear as per RFC 2047.'
            );
    }

    public function testOnlyCharactersAllowedInPhrasesAreUsed()
    {
        /* -- RFC 2047, 5.
        (3) As a replacement for a 'word' entity within a 'phrase', for example,
        one that precedes an address in a From, To, or Cc header.  The ABNF
        definition for 'phrase' from RFC 822 thus becomes:

        phrase = 1*( encoded-word / word )

        In this case the set of characters that may be used in a "Q"-encoded
        'encoded-word' is restricted to: <upper and lower case ASCII
        letters, decimal digits, "!", "*", "+", "-", "/", "=", and "_"
        (underscore, ASCII 95.)>.  An 'encoded-word' that appears within a
        'phrase' MUST be separated from any adjacent 'word', 'text' or
        'special' by 'linear-white-space'.
        */

        $allowedBytes = array_merge(
            range(ord('a'), ord('z')), range(ord('A'), ord('Z')),
            range(ord('0'), ord('9')),
<<<<<<< HEAD
            array(ord('!'), ord('*'), ord('+'), ord('-'), ord('/'))
=======
            [ord('!'), ord('*'), ord('+'), ord('-'), ord('/')]
>>>>>>> dev
            );

        foreach (range(0x00, 0xFF) as $byte) {
            $char = pack('C', $byte);

<<<<<<< HEAD
            $charStream = $this->_createCharacterStream();
            $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn(array($byte));
=======
            $charStream = $this->createCharacterStream();
            $charStream->shouldReceive('readBytes')
                   ->once()
                   ->andReturn([$byte]);
>>>>>>> dev
            $charStream->shouldReceive('readBytes')
                   ->zeroOrMoreTimes()
                   ->andReturn(false);

<<<<<<< HEAD
            $encoder = $this->_createEncoder($charStream);
=======
            $encoder = $this->createEncoder($charStream);
>>>>>>> dev
            $encodedChar = $encoder->encodeString($char);

            if (in_array($byte, $allowedBytes)) {
                $this->assertEquals($char, $encodedChar,
                    '%s: Character '.$char.' should not be encoded.'
                    );
            } elseif (0x20 == $byte) {
                //Special case
                $this->assertEquals('_', $encodedChar,
                    '%s: Space character should be replaced.'
                    );
            } else {
                $this->assertEquals(sprintf('=%02X', $byte), $encodedChar,
                    '%s: Byte '.$byte.' should be encoded.'
                    );
            }
        }
    }

    public function testEqualsNeverAppearsAtEndOfLine()
    {
        /* -- RFC 2047, 5 (3).
        The 'encoded-text' in an 'encoded-word' must be self-contained;
        'encoded-text' MUST NOT be continued from one 'encoded-word' to
        another.  This implies that the 'encoded-text' portion of a "B"
        'encoded-word' will be a multiple of 4 characters long; for a "Q"
        'encoded-word', any "=" character that appears in the 'encoded-text'
        portion will be followed by two hexadecimal characters.
        */

        $input = str_repeat('a', 140);

<<<<<<< HEAD
        $charStream = $this->_createCharacterStream();
=======
        $charStream = $this->createCharacterStream();
>>>>>>> dev

        $output = '';
        $seq = 0;
        for (; $seq < 140; ++$seq) {
            $charStream->shouldReceive('readBytes')
                       ->once()
<<<<<<< HEAD
                       ->andReturn(array(ord('a')));
=======
                       ->andReturn([ord('a')]);
>>>>>>> dev

            if (75 == $seq) {
                $output .= "\r\n"; // =\r\n
            }
            $output .= 'a';
        }

        $charStream->shouldReceive('readBytes')
                   ->zeroOrMoreTimes()
                   ->andReturn(false);

<<<<<<< HEAD
        $encoder = $this->_createEncoder($charStream);
        $this->assertEquals($output, $encoder->encodeString($input));
    }

    private function _createEncoder($charStream)
=======
        $encoder = $this->createEncoder($charStream);
        $this->assertEquals($output, $encoder->encodeString($input));
    }

    private function createEncoder($charStream)
>>>>>>> dev
    {
        return new Swift_Mime_HeaderEncoder_QpHeaderEncoder($charStream);
    }

<<<<<<< HEAD
    private function _createCharacterStream($stub = false)
=======
    private function createCharacterStream($stub = false)
>>>>>>> dev
    {
        return $this->getMockery('Swift_CharacterStream')->shouldIgnoreMissing();
    }
}
