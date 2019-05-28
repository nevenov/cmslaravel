<?php

class Swift_Transport_Esmtp_Auth_CramMd5AuthenticatorTest extends \SwiftMailerTestCase
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

    public function testKeywordIsCramMd5()
    {
        /* -- RFC 2195, 2.
        The authentication type associated with CRAM is "CRAM-MD5".
        */

<<<<<<< HEAD
        $cram = $this->_getAuthenticator();
=======
        $cram = $this->getAuthenticator();
>>>>>>> dev
        $this->assertEquals('CRAM-MD5', $cram->getAuthKeyword());
    }

    public function testSuccessfulAuthentication()
    {
<<<<<<< HEAD
        $cram = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH CRAM-MD5\r\n", array(334))
             ->andReturn('334 '.base64_encode('<foo@bar>')."\r\n");
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(\Mockery::any(), array(235));

        $this->assertTrue($cram->authenticate($this->_agent, 'jack', 'pass'),
=======
        $cram = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH CRAM-MD5\r\n", [334])
             ->andReturn('334 '.base64_encode('<foo@bar>')."\r\n");
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(\Mockery::any(), [235]);

        $this->assertTrue($cram->authenticate($this->agent, 'jack', 'pass'),
>>>>>>> dev
            '%s: The buffer accepted all commands authentication should succeed'
            );
    }

<<<<<<< HEAD
    public function testAuthenticationFailureSendRsetAndReturnFalse()
    {
        $cram = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH CRAM-MD5\r\n", array(334))
             ->andReturn('334 '.base64_encode('<foo@bar>')."\r\n");
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(\Mockery::any(), array(235))
             ->andThrow(new Swift_TransportException(''));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", array(250));

        $this->assertFalse($cram->authenticate($this->_agent, 'jack', 'pass'),
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
        $cram = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH CRAM-MD5\r\n", [334])
             ->andReturn('334 '.base64_encode('<foo@bar>')."\r\n");
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(\Mockery::any(), [235])
             ->andThrow(new Swift_TransportException(''));
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", [250]);

        $cram->authenticate($this->agent, 'jack', 'pass');
    }

    private function getAuthenticator()
>>>>>>> dev
    {
        return new Swift_Transport_Esmtp_Auth_CramMd5Authenticator();
    }
}
