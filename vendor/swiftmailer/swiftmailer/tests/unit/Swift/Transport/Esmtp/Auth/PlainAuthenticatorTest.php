<?php

class Swift_Transport_Esmtp_Auth_PlainAuthenticatorTest extends \SwiftMailerTestCase
{
<<<<<<< HEAD
    private $_agent;

    protected function setUp()
    {
        $this->_agent = $this->getMockery('Swift_Transport_SmtpAgent')->shouldIgnoreMissing();
=======
    private $agent;

    protected function setUp()
    {
        $this->agent = $this->getMockery('Swift_Transport_SmtpAgent')->shouldIgnoreMissing();
>>>>>>> dev
    }

    public function testKeywordIsPlain()
    {
        /* -- RFC 4616, 1.
        The name associated with this mechanism is "PLAIN".
        */

<<<<<<< HEAD
        $login = $this->_getAuthenticator();
=======
        $login = $this->getAuthenticator();
>>>>>>> dev
        $this->assertEquals('PLAIN', $login->getAuthKeyword());
    }

    public function testSuccessfulAuthentication()
    {
        /* -- RFC 4616, 2.
        The client presents the authorization identity (identity to act as),
        followed by a NUL (U+0000) character, followed by the authentication
        identity (identity whose password will be used), followed by a NUL
        (U+0000) character, followed by the clear-text password.
        */

<<<<<<< HEAD
        $plain = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with('AUTH PLAIN '.base64_encode(
                        'jack'.chr(0).'jack'.chr(0).'pass'
                    )."\r\n", array(235));

        $this->assertTrue($plain->authenticate($this->_agent, 'jack', 'pass'),
=======
        $plain = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with('AUTH PLAIN '.base64_encode(
                        'jack'.chr(0).'jack'.chr(0).'pass'
                    )."\r\n", [235]);

        $this->assertTrue($plain->authenticate($this->agent, 'jack', 'pass'),
>>>>>>> dev
            '%s: The buffer accepted all commands authentication should succeed'
            );
    }

<<<<<<< HEAD
    public function testAuthenticationFailureSendRsetAndReturnFalse()
    {
        $plain = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with('AUTH PLAIN '.base64_encode(
                        'jack'.chr(0).'jack'.chr(0).'pass'
                    )."\r\n", array(235))
             ->andThrow(new Swift_TransportException(''));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", array(250));

        $this->assertFalse($plain->authenticate($this->_agent, 'jack', 'pass'),
            '%s: Authentication fails, so RSET should be sent'
            );
    }

    private function _getAuthenticator()
=======
    /**
     * @expectedException \Swift_TransportException
     */
    public function testAuthenticationFailureSendRset()
    {
        $plain = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with('AUTH PLAIN '.base64_encode(
                        'jack'.chr(0).'jack'.chr(0).'pass'
                    )."\r\n", [235])
             ->andThrow(new Swift_TransportException(''));
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", [250]);

        $plain->authenticate($this->agent, 'jack', 'pass');
    }

    private function getAuthenticator()
>>>>>>> dev
    {
        return new Swift_Transport_Esmtp_Auth_PlainAuthenticator();
    }
}
