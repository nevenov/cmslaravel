<?php

<<<<<<< HEAD
=======
use Egulias\EmailValidator\EmailValidator;

>>>>>>> dev
class Swift_Mime_Headers_MailboxHeaderTest extends \SwiftMailerTestCase
{
    /* -- RFC 2822, 3.6.2 for all tests.
     */

<<<<<<< HEAD
    private $_charset = 'utf-8';

    public function testTypeIsMailboxHeader()
    {
        $header = $this->_getHeader('To', $this->_getEncoder('Q', true));
=======
    private $charset = 'utf-8';

    public function testTypeIsMailboxHeader()
    {
        $header = $this->getHeader('To');
>>>>>>> dev
        $this->assertEquals(Swift_Mime_Header::TYPE_MAILBOX, $header->getFieldType());
    }

    public function testMailboxIsSetForAddress()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses('chris@swiftmailer.org');
        $this->assertEquals(array('chris@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setAddresses('chris@swiftmailer.org');
        $this->assertEquals(['chris@swiftmailer.org'],
>>>>>>> dev
            $header->getNameAddressStrings()
            );
    }

    public function testMailboxIsRenderedForNameAddress()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array('chris@swiftmailer.org' => 'Chris Corbyn'));
        $this->assertEquals(
            array('Chris Corbyn <chris@swiftmailer.org>'), $header->getNameAddressStrings()
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses(['chris@swiftmailer.org' => 'Chris Corbyn']);
        $this->assertEquals(
            ['Chris Corbyn <chris@swiftmailer.org>'], $header->getNameAddressStrings()
>>>>>>> dev
            );
    }

    public function testAddressCanBeReturnedForAddress()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses('chris@swiftmailer.org');
        $this->assertEquals(array('chris@swiftmailer.org'), $header->getAddresses());
=======
        $header = $this->getHeader('From');
        $header->setAddresses('chris@swiftmailer.org');
        $this->assertEquals(['chris@swiftmailer.org'], $header->getAddresses());
>>>>>>> dev
    }

    public function testAddressCanBeReturnedForNameAddress()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array('chris@swiftmailer.org' => 'Chris Corbyn'));
        $this->assertEquals(array('chris@swiftmailer.org'), $header->getAddresses());
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses(['chris@swiftmailer.org' => 'Chris Corbyn']);
        $this->assertEquals(['chris@swiftmailer.org'], $header->getAddresses());
>>>>>>> dev
    }

    public function testQuotesInNameAreQuoted()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn, "DHE"',
            ));
        $this->assertEquals(
            array('"Chris Corbyn, \"DHE\"" <chris@swiftmailer.org>'),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn, "DHE"',
            ]);
        $this->assertEquals(
            ['"Chris Corbyn, \"DHE\"" <chris@swiftmailer.org>'],
>>>>>>> dev
            $header->getNameAddressStrings()
            );
    }

    public function testEscapeCharsInNameAreQuoted()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn, \\escaped\\',
            ));
        $this->assertEquals(
            array('"Chris Corbyn, \\\\escaped\\\\" <chris@swiftmailer.org>'),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn, \\escaped\\',
            ]);
        $this->assertEquals(
            ['"Chris Corbyn, \\\\escaped\\\\" <chris@swiftmailer.org>'],
            $header->getNameAddressStrings()
            );
    }

    public function testUtf8CharsInDomainAreIdnEncoded()
    {
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swïftmailer.org' => 'Chris Corbyn',
            ]);
        $this->assertEquals(
            ['Chris Corbyn <chris@xn--swftmailer-78a.org>'],
            $header->getNameAddressStrings()
            );
    }

    /**
     * @expectedException \Swift_AddressEncoderException
     */
    public function testUtf8CharsInLocalPartThrows()
    {
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chrïs@swiftmailer.org' => 'Chris Corbyn',
            ]);
        $header->getNameAddressStrings();
    }

    public function testUtf8CharsInEmail()
    {
        $header = $this->getHeader('From', null, new Swift_AddressEncoder_Utf8AddressEncoder());
        $header->setNameAddresses([
            'chrïs@swïftmailer.org' => 'Chris Corbyn',
            ]);
        $this->assertEquals(
            ['Chris Corbyn <chrïs@swïftmailer.org>'],
>>>>>>> dev
            $header->getNameAddressStrings()
            );
    }

    public function testGetMailboxesReturnsNameValuePairs()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn, DHE',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org' => 'Chris Corbyn, DHE'), $header->getNameAddresses()
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn, DHE',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org' => 'Chris Corbyn, DHE'], $header->getNameAddresses()
>>>>>>> dev
            );
    }

    public function testMultipleAddressesCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses(array(
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setAddresses([
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org'],
>>>>>>> dev
            $header->getAddresses()
            );
    }

    public function testMultipleAddressesAsMailboxes()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses(array(
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org' => null, 'mark@swiftmailer.org' => null),
=======
        $header = $this->getHeader('From');
        $header->setAddresses([
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org' => null, 'mark@swiftmailer.org' => null],
>>>>>>> dev
            $header->getNameAddresses()
            );
    }

    public function testMultipleAddressesAsMailboxStrings()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses(array(
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setAddresses([
            'chris@swiftmailer.org', 'mark@swiftmailer.org',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org'],
>>>>>>> dev
            $header->getNameAddressStrings()
            );
    }

    public function testMultipleNamedMailboxesReturnsMultipleAddresses()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org'],
>>>>>>> dev
            $header->getAddresses()
            );
    }

    public function testMultipleNamedMailboxesReturnsMultipleMailboxes()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $this->assertEquals(array(
                'chris@swiftmailer.org' => 'Chris Corbyn',
                'mark@swiftmailer.org' => 'Mark Corbyn',
                ),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $this->assertEquals([
                'chris@swiftmailer.org' => 'Chris Corbyn',
                'mark@swiftmailer.org' => 'Mark Corbyn',
                ],
>>>>>>> dev
            $header->getNameAddresses()
            );
    }

    public function testMultipleMailboxesProducesMultipleMailboxStrings()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $this->assertEquals(array(
                'Chris Corbyn <chris@swiftmailer.org>',
                'Mark Corbyn <mark@swiftmailer.org>',
                ),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $this->assertEquals([
                'Chris Corbyn <chris@swiftmailer.org>',
                'Mark Corbyn <mark@swiftmailer.org>',
                ],
>>>>>>> dev
            $header->getNameAddressStrings()
            );
    }

    public function testSetAddressesOverwritesAnyMailboxes()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $this->assertEquals(
            array('chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn', ),
            $header->getNameAddresses()
            );
        $this->assertEquals(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org'),
            $header->getAddresses()
            );

        $header->setAddresses(array('chris@swiftmailer.org', 'mark@swiftmailer.org'));

        $this->assertEquals(
            array('chris@swiftmailer.org' => null, 'mark@swiftmailer.org' => null),
            $header->getNameAddresses()
            );
        $this->assertEquals(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $this->assertEquals(
            ['chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn', ],
            $header->getNameAddresses()
            );
        $this->assertEquals(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org'],
            $header->getAddresses()
            );

        $header->setAddresses(['chris@swiftmailer.org', 'mark@swiftmailer.org']);

        $this->assertEquals(
            ['chris@swiftmailer.org' => null, 'mark@swiftmailer.org' => null],
            $header->getNameAddresses()
            );
        $this->assertEquals(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org'],
>>>>>>> dev
            $header->getAddresses()
            );
    }

    public function testNameIsEncodedIfNonAscii()
    {
        $name = 'C'.pack('C', 0x8F).'rbyn';

<<<<<<< HEAD
        $encoder = $this->_getEncoder('Q');
=======
        $encoder = $this->getEncoder('Q');
>>>>>>> dev
        $encoder->shouldReceive('encodeString')
                ->once()
                ->with($name, \Mockery::any(), \Mockery::any(), \Mockery::any())
                ->andReturn('C=8Frbyn');

<<<<<<< HEAD
        $header = $this->_getHeader('From', $encoder);
        $header->setNameAddresses(array('chris@swiftmailer.org' => 'Chris '.$name));

        $addresses = $header->getNameAddressStrings();
        $this->assertEquals(
            'Chris =?'.$this->_charset.'?Q?C=8Frbyn?= <chris@swiftmailer.org>',
=======
        $header = $this->getHeader('From', $encoder);
        $header->setNameAddresses(['chris@swiftmailer.org' => 'Chris '.$name]);

        $addresses = $header->getNameAddressStrings();
        $this->assertEquals(
            'Chris =?'.$this->charset.'?Q?C=8Frbyn?= <chris@swiftmailer.org>',
>>>>>>> dev
            array_shift($addresses)
            );
    }

    public function testEncodingLineLengthCalculations()
    {
        /* -- RFC 2047, 2.
        An 'encoded-word' may not be more than 75 characters long, including
        'charset', 'encoding', 'encoded-text', and delimiters.
        */

        $name = 'C'.pack('C', 0x8F).'rbyn';

<<<<<<< HEAD
        $encoder = $this->_getEncoder('Q');
=======
        $encoder = $this->getEncoder('Q');
>>>>>>> dev
        $encoder->shouldReceive('encodeString')
                ->once()
                ->with($name, \Mockery::any(), \Mockery::any(), \Mockery::any())
                ->andReturn('C=8Frbyn');

<<<<<<< HEAD
        $header = $this->_getHeader('From', $encoder);
        $header->setNameAddresses(array('chris@swiftmailer.org' => 'Chris '.$name));
=======
        $header = $this->getHeader('From', $encoder);
        $header->setNameAddresses(['chris@swiftmailer.org' => 'Chris '.$name]);
>>>>>>> dev

        $header->getNameAddressStrings();
    }

    public function testGetValueReturnsMailboxStringValue()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
>>>>>>> dev
        $this->assertEquals(
            'Chris Corbyn <chris@swiftmailer.org>', $header->getFieldBody()
            );
    }

    public function testGetValueReturnsMailboxStringValueForMultipleMailboxes()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
>>>>>>> dev
        $this->assertEquals(
            'Chris Corbyn <chris@swiftmailer.org>, Mark Corbyn <mark@swiftmailer.org>',
            $header->getFieldBody()
            );
    }

    public function testRemoveAddressesWithSingleValue()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $header->removeAddresses('chris@swiftmailer.org');
        $this->assertEquals(array('mark@swiftmailer.org'),
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $header->removeAddresses('chris@swiftmailer.org');
        $this->assertEquals(['mark@swiftmailer.org'],
>>>>>>> dev
            $header->getAddresses()
            );
    }

    public function testRemoveAddressesWithList()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
        $header->removeAddresses(
            array('chris@swiftmailer.org', 'mark@swiftmailer.org')
            );
        $this->assertEquals(array(), $header->getAddresses());
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
        $header->removeAddresses(
            ['chris@swiftmailer.org', 'mark@swiftmailer.org']
            );
        $this->assertEquals([], $header->getAddresses());
>>>>>>> dev
    }

    public function testSetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setFieldBodyModel('chris@swiftmailer.org');
        $this->assertEquals(array('chris@swiftmailer.org' => null), $header->getNameAddresses());
=======
        $header = $this->getHeader('From');
        $header->setFieldBodyModel('chris@swiftmailer.org');
        $this->assertEquals(['chris@swiftmailer.org' => null], $header->getNameAddresses());
>>>>>>> dev
    }

    public function testGetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setAddresses(array('chris@swiftmailer.org'));
        $this->assertEquals(array('chris@swiftmailer.org' => null), $header->getFieldBodyModel());
=======
        $header = $this->getHeader('From');
        $header->setAddresses(['chris@swiftmailer.org']);
        $this->assertEquals(['chris@swiftmailer.org' => null], $header->getFieldBodyModel());
>>>>>>> dev
    }

    public function testToString()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('From', $this->_getEncoder('Q', true));
        $header->setNameAddresses(array(
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ));
=======
        $header = $this->getHeader('From');
        $header->setNameAddresses([
            'chris@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org' => 'Mark Corbyn',
            ]);
>>>>>>> dev
        $this->assertEquals(
            'From: Chris Corbyn <chris@swiftmailer.org>, '.
            'Mark Corbyn <mark@swiftmailer.org>'."\r\n",
            $header->toString()
            );
    }

<<<<<<< HEAD
    private function _getHeader($name, $encoder)
    {
        $header = new Swift_Mime_Headers_MailboxHeader($name, $encoder, new Swift_Mime_Grammar());
        $header->setCharset($this->_charset);
=======
    private function getHeader($name, $encoder = null, $addressEncoder = null)
    {
        $encoder = $encoder ?? $this->getEncoder('Q', true);
        $addressEncoder = $addressEncoder ?? new Swift_AddressEncoder_IdnAddressEncoder();
        $header = new Swift_Mime_Headers_MailboxHeader($name, $encoder, new EmailValidator(), $addressEncoder);
        $header->setCharset($this->charset);
>>>>>>> dev

        return $header;
    }

<<<<<<< HEAD
    private function _getEncoder($type, $stub = false)
=======
    private function getEncoder($type)
>>>>>>> dev
    {
        $encoder = $this->getMockery('Swift_Mime_HeaderEncoder')->shouldIgnoreMissing();
        $encoder->shouldReceive('getName')
                ->zeroOrMoreTimes()
                ->andReturn($type);

        return $encoder;
    }
}
