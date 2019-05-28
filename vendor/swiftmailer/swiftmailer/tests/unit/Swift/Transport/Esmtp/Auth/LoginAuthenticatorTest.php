<?php

class Swift_Transport_Esmtp_Auth_LoginAuthenticatorTest extends \SwiftMailerTestCase
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

    public function testKeywordIsLogin()
    {
<<<<<<< HEAD
        $login = $this->_getAuthenticator();
=======
        $login = $this->getAuthenticator();
>>>>>>> dev
        $this->assertEquals('LOGIN', $login->getAuthKeyword());
    }

    public function testSuccessfulAuthentication()
    {
<<<<<<< HEAD
        $login = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH LOGIN\r\n", array(334));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('jack')."\r\n", array(334));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('pass')."\r\n", array(235));

        $this->assertTrue($login->authenticate($this->_agent, 'jack', 'pass'),
=======
        $login = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH LOGIN\r\n", [334]);
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('jack')."\r\n", [334]);
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('pass')."\r\n", [235]);

        $this->assertTrue($login->authenticate($this->agent, 'jack', 'pass'),
>>>>>>> dev
            '%s: The buffer accepted all commands authentication should succeed'
            );
    }

<<<<<<< HEAD
    public function testAuthenticationFailureSendRsetAndReturnFalse()
    {
        $login = $this->_getAuthenticator();

        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH LOGIN\r\n", array(334));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('jack')."\r\n", array(334));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('pass')."\r\n", array(235))
             ->andThrow(new Swift_TransportException(''));
        $this->_agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", array(250));

        $this->assertFalse($login->authenticate($this->_agent, 'jack', 'pass'),
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
        $login = $this->getAuthenticator();

        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("AUTH LOGIN\r\n", [334]);
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('jack')."\r\n", [334]);
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with(base64_encode('pass')."\r\n", [235])
             ->andThrow(new Swift_TransportException(''));
        $this->agent->shouldReceive('executeCommand')
             ->once()
             ->with("RSET\r\n", [250]);

        $login->authenticate($this->agent, 'jack', 'pass');
    }

    private function getAuthenticator()
>>>>>>> dev
    {
        return new Swift_Transport_Esmtp_Auth_LoginAuthenticator();
    }
}
