<?php

<<<<<<< HEAD
class Swift_Mime_Headers_IdentificationHeaderTest extends \PHPUnit_Framework_TestCase
{
    public function testTypeIsIdHeader()
    {
        $header = $this->_getHeader('Message-ID');
=======
use Egulias\EmailValidator\EmailValidator;

class Swift_Mime_Headers_IdentificationHeaderTest extends \PHPUnit\Framework\TestCase
{
    public function testTypeIsIdHeader()
    {
        $header = $this->getHeader('Message-ID');
>>>>>>> dev
        $this->assertEquals(Swift_Mime_Header::TYPE_ID, $header->getFieldType());
    }

    public function testValueMatchesMsgIdSpec()
    {
        /* -- RFC 2822, 3.6.4.
     message-id      =       "Message-ID:" msg-id CRLF

     in-reply-to     =       "In-Reply-To:" 1*msg-id CRLF

     references      =       "References:" 1*msg-id CRLF

     msg-id          =       [CFWS] "<" id-left "@" id-right ">" [CFWS]

     id-left         =       dot-atom-text / no-fold-quote / obs-id-left

     id-right        =       dot-atom-text / no-fold-literal / obs-id-right

     no-fold-quote   =       DQUOTE *(qtext / quoted-pair) DQUOTE

     no-fold-literal =       "[" *(dtext / quoted-pair) "]"
     */

<<<<<<< HEAD
        $header = $this->_getHeader('Message-ID');
=======
        $header = $this->getHeader('Message-ID');
>>>>>>> dev
        $header->setId('id-left@id-right');
        $this->assertEquals('<id-left@id-right>', $header->getFieldBody());
    }

    public function testIdCanBeRetrievedVerbatim()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Message-ID');
=======
        $header = $this->getHeader('Message-ID');
>>>>>>> dev
        $header->setId('id-left@id-right');
        $this->assertEquals('id-left@id-right', $header->getId());
    }

    public function testMultipleIdsCanBeSet()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('References');
        $header->setIds(array('a@b', 'x@y'));
        $this->assertEquals(array('a@b', 'x@y'), $header->getIds());
=======
        $header = $this->getHeader('References');
        $header->setIds(['a@b', 'x@y']);
        $this->assertEquals(['a@b', 'x@y'], $header->getIds());
>>>>>>> dev
    }

    public function testSettingMultipleIdsProducesAListValue()
    {
        /* -- RFC 2822, 3.6.4.
     The "References:" and "In-Reply-To:" field each contain one or more
     unique message identifiers, optionally separated by CFWS.

     .. SNIP ..

     in-reply-to     =       "In-Reply-To:" 1*msg-id CRLF

     references      =       "References:" 1*msg-id CRLF
     */

<<<<<<< HEAD
        $header = $this->_getHeader('References');
        $header->setIds(array('a@b', 'x@y'));
=======
        $header = $this->getHeader('References');
        $header->setIds(['a@b', 'x@y']);
>>>>>>> dev
        $this->assertEquals('<a@b> <x@y>', $header->getFieldBody());
    }

    public function testIdLeftCanBeQuoted()
    {
        /* -- RFC 2822, 3.6.4.
     id-left         =       dot-atom-text / no-fold-quote / obs-id-left
     */

<<<<<<< HEAD
        $header = $this->_getHeader('References');
=======
        $header = $this->getHeader('References');
>>>>>>> dev
        $header->setId('"ab"@c');
        $this->assertEquals('"ab"@c', $header->getId());
        $this->assertEquals('<"ab"@c>', $header->getFieldBody());
    }

    public function testIdLeftCanContainAnglesAsQuotedPairs()
    {
        /* -- RFC 2822, 3.6.4.
     no-fold-quote   =       DQUOTE *(qtext / quoted-pair) DQUOTE
     */

<<<<<<< HEAD
        $header = $this->_getHeader('References');
=======
        $header = $this->getHeader('References');
>>>>>>> dev
        $header->setId('"a\\<\\>b"@c');
        $this->assertEquals('"a\\<\\>b"@c', $header->getId());
        $this->assertEquals('<"a\\<\\>b"@c>', $header->getFieldBody());
    }

    public function testIdLeftCanBeDotAtom()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('References');
=======
        $header = $this->getHeader('References');
>>>>>>> dev
        $header->setId('a.b+&%$.c@d');
        $this->assertEquals('a.b+&%$.c@d', $header->getId());
        $this->assertEquals('<a.b+&%$.c@d>', $header->getFieldBody());
    }

<<<<<<< HEAD
    public function testInvalidIdLeftThrowsException()
    {
        try {
            $header = $this->_getHeader('References');
            $header->setId('a b c@d');
            $this->fail(
                'Exception should be thrown since "a b c" is not valid id-left.'
                );
        } catch (Exception $e) {
        }
=======
    /**
     * @expectedException \Exception
     * @expectedMessageException "a b c" is not valid id-left
     */
    public function testInvalidIdLeftThrowsException()
    {
        $header = $this->getHeader('References');
        $header->setId('a b c@d');
>>>>>>> dev
    }

    public function testIdRightCanBeDotAtom()
    {
        /* -- RFC 2822, 3.6.4.
     id-right        =       dot-atom-text / no-fold-literal / obs-id-right
     */

<<<<<<< HEAD
        $header = $this->_getHeader('References');
=======
        $header = $this->getHeader('References');
>>>>>>> dev
        $header->setId('a@b.c+&%$.d');
        $this->assertEquals('a@b.c+&%$.d', $header->getId());
        $this->assertEquals('<a@b.c+&%$.d>', $header->getFieldBody());
    }

    public function testIdRightCanBeLiteral()
    {
        /* -- RFC 2822, 3.6.4.
     no-fold-literal =       "[" *(dtext / quoted-pair) "]"
     */

<<<<<<< HEAD
        $header = $this->_getHeader('References');
=======
        $header = $this->getHeader('References');
>>>>>>> dev
        $header->setId('a@[1.2.3.4]');
        $this->assertEquals('a@[1.2.3.4]', $header->getId());
        $this->assertEquals('<a@[1.2.3.4]>', $header->getFieldBody());
    }

<<<<<<< HEAD
    public function testInvalidIdRightThrowsException()
    {
        try {
            $header = $this->_getHeader('References');
            $header->setId('a@b c d');
            $this->fail(
                'Exception should be thrown since "b c d" is not valid id-right.'
                );
        } catch (Exception $e) {
        }
    }

=======
    public function testIdRigthIsIdnEncoded()
    {
        $header = $this->getHeader('References');
        $header->setId('a@ä');
        $this->assertEquals('a@ä', $header->getId());
        $this->assertEquals('<a@xn--4ca>', $header->getFieldBody());
    }

    /**
     * @expectedException \Exception
     * @expectedMessageException "b c d" is not valid id-right
     */
    public function testInvalidIdRightThrowsException()
    {
        $header = $this->getHeader('References');
        $header->setId('a@b c d');
    }

    /**
     * @expectedException \Exception
     * @expectedMessageException "abc" is does not contain @
     */
>>>>>>> dev
    public function testMissingAtSignThrowsException()
    {
        /* -- RFC 2822, 3.6.4.
     msg-id          =       [CFWS] "<" id-left "@" id-right ">" [CFWS]
     */
<<<<<<< HEAD

        try {
            $header = $this->_getHeader('References');
            $header->setId('abc');
            $this->fail(
                'Exception should be thrown since "abc" is does not contain @.'
                );
        } catch (Exception $e) {
        }
=======
        $header = $this->getHeader('References');
        $header->setId('abc');
>>>>>>> dev
    }

    public function testSetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Message-ID');
        $header->setFieldBodyModel('a@b');
        $this->assertEquals(array('a@b'), $header->getIds());
=======
        $header = $this->getHeader('Message-ID');
        $header->setFieldBodyModel('a@b');
        $this->assertEquals(['a@b'], $header->getIds());
>>>>>>> dev
    }

    public function testGetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Message-ID');
        $header->setId('a@b');
        $this->assertEquals(array('a@b'), $header->getFieldBodyModel());
=======
        $header = $this->getHeader('Message-ID');
        $header->setId('a@b');
        $this->assertEquals(['a@b'], $header->getFieldBodyModel());
>>>>>>> dev
    }

    public function testStringValue()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('References');
        $header->setIds(array('a@b', 'x@y'));
        $this->assertEquals('References: <a@b> <x@y>'."\r\n", $header->toString());
    }

    private function _getHeader($name)
    {
        return new Swift_Mime_Headers_IdentificationHeader($name, new Swift_Mime_Grammar());
=======
        $header = $this->getHeader('References');
        $header->setIds(['a@b', 'x@y']);
        $this->assertEquals('References: <a@b> <x@y>'."\r\n", $header->toString());
    }

    private function getHeader($name)
    {
        return new Swift_Mime_Headers_IdentificationHeader($name, new EmailValidator(), new Swift_AddressEncoder_IdnAddressEncoder());
>>>>>>> dev
    }
}
