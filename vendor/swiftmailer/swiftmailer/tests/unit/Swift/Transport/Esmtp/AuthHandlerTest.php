<?php

class Swift_Transport_Esmtp_AuthHandlerTest extends \SwiftMailerTestCase
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

    public function testKeywordIsAuth()
    {
<<<<<<< HEAD
        $auth = $this->_createHandler(array());
=======
        $auth = $this->createHandler([]);
>>>>>>> dev
        $this->assertEquals('AUTH', $auth->getHandledKeyword());
    }

    public function testUsernameCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $auth = $this->_createHandler(array());
=======
        $auth = $this->createHandler([]);
>>>>>>> dev
        $auth->setUsername('jack');
        $this->assertEquals('jack', $auth->getUsername());
    }

    public function testPasswordCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $auth = $this->_createHandler(array());
=======
        $auth = $this->createHandler([]);
>>>>>>> dev
        $auth->setPassword('pass');
        $this->assertEquals('pass', $auth->getPassword());
    }

    public function testAuthModeCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $auth = $this->_createHandler(array());
=======
        $auth = $this->createHandler([]);
>>>>>>> dev
        $auth->setAuthMode('PLAIN');
        $this->assertEquals('PLAIN', $auth->getAuthMode());
    }

    public function testMixinMethods()
    {
<<<<<<< HEAD
        $auth = $this->_createHandler(array());
=======
        $auth = $this->createHandler([]);
>>>>>>> dev
        $mixins = $auth->exposeMixinMethods();
        $this->assertTrue(in_array('getUsername', $mixins),
            '%s: getUsername() should be accessible via mixin'
            );
        $this->assertTrue(in_array('setUsername', $mixins),
            '%s: setUsername() should be accessible via mixin'
            );
        $this->assertTrue(in_array('getPassword', $mixins),
            '%s: getPassword() should be accessible via mixin'
            );
        $this->assertTrue(in_array('setPassword', $mixins),
            '%s: setPassword() should be accessible via mixin'
            );
        $this->assertTrue(in_array('setAuthMode', $mixins),
            '%s: setAuthMode() should be accessible via mixin'
            );
        $this->assertTrue(in_array('getAuthMode', $mixins),
            '%s: getAuthMode() should be accessible via mixin'
            );
    }

    public function testAuthenticatorsAreCalledAccordingToParamsAfterEhlo()
    {
<<<<<<< HEAD
        $a1 = $this->_createMockAuthenticator('PLAIN');
        $a2 = $this->_createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->never()
           ->with($this->_agent, 'jack', 'pass');
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->_createHandler(array($a1, $a2));
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(array('CRAM-MD5', 'LOGIN'));
        $auth->afterEhlo($this->_agent);
=======
        $a1 = $this->createMockAuthenticator('PLAIN');
        $a2 = $this->createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->never()
           ->with($this->agent, 'jack', 'pass');
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->createHandler([$a1, $a2]);
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(['CRAM-MD5', 'LOGIN']);
        $auth->afterEhlo($this->agent);
>>>>>>> dev
    }

    public function testAuthenticatorsAreNotUsedIfNoUsernameSet()
    {
<<<<<<< HEAD
        $a1 = $this->_createMockAuthenticator('PLAIN');
        $a2 = $this->_createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->never()
           ->with($this->_agent, 'jack', 'pass');
        $a2->shouldReceive('authenticate')
           ->never()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->_createHandler(array($a1, $a2));

        $auth->setKeywordParams(array('CRAM-MD5', 'LOGIN'));
        $auth->afterEhlo($this->_agent);
=======
        $a1 = $this->createMockAuthenticator('PLAIN');
        $a2 = $this->createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->never()
           ->with($this->agent, 'jack', 'pass');
        $a2->shouldReceive('authenticate')
           ->never()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->createHandler([$a1, $a2]);

        $auth->setKeywordParams(['CRAM-MD5', 'LOGIN']);
        $auth->afterEhlo($this->agent);
>>>>>>> dev
    }

    public function testSeveralAuthenticatorsAreTriedIfNeeded()
    {
<<<<<<< HEAD
        $a1 = $this->_createMockAuthenticator('PLAIN');
        $a2 = $this->_createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->once()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(false);
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->_createHandler(array($a1, $a2));
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(array('PLAIN', 'LOGIN'));
        $auth->afterEhlo($this->_agent);
=======
        $a1 = $this->createMockAuthenticator('PLAIN');
        $a2 = $this->createMockAuthenticator('LOGIN');

        $a1->shouldReceive('authenticate')
           ->once()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(false);
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(true);

        $auth = $this->createHandler([$a1, $a2]);
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(['PLAIN', 'LOGIN']);
        $auth->afterEhlo($this->agent);
>>>>>>> dev
    }

    public function testFirstAuthenticatorToPassBreaksChain()
    {
<<<<<<< HEAD
        $a1 = $this->_createMockAuthenticator('PLAIN');
        $a2 = $this->_createMockAuthenticator('LOGIN');
        $a3 = $this->_createMockAuthenticator('CRAM-MD5');

        $a1->shouldReceive('authenticate')
           ->once()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(false);
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->_agent, 'jack', 'pass')
           ->andReturn(true);
        $a3->shouldReceive('authenticate')
           ->never()
           ->with($this->_agent, 'jack', 'pass');

        $auth = $this->_createHandler(array($a1, $a2));
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(array('PLAIN', 'LOGIN', 'CRAM-MD5'));
        $auth->afterEhlo($this->_agent);
    }

    private function _createHandler($authenticators)
=======
        $a1 = $this->createMockAuthenticator('PLAIN');
        $a2 = $this->createMockAuthenticator('LOGIN');
        $a3 = $this->createMockAuthenticator('CRAM-MD5');

        $a1->shouldReceive('authenticate')
           ->once()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(false);
        $a2->shouldReceive('authenticate')
           ->once()
           ->with($this->agent, 'jack', 'pass')
           ->andReturn(true);
        $a3->shouldReceive('authenticate')
           ->never()
           ->with($this->agent, 'jack', 'pass');

        $auth = $this->createHandler([$a1, $a2]);
        $auth->setUsername('jack');
        $auth->setPassword('pass');

        $auth->setKeywordParams(['PLAIN', 'LOGIN', 'CRAM-MD5']);
        $auth->afterEhlo($this->agent);
    }

    private function createHandler($authenticators)
>>>>>>> dev
    {
        return new Swift_Transport_Esmtp_AuthHandler($authenticators);
    }

<<<<<<< HEAD
    private function _createMockAuthenticator($type)
=======
    private function createMockAuthenticator($type)
>>>>>>> dev
    {
        $authenticator = $this->getMockery('Swift_Transport_Esmtp_Authenticator')->shouldIgnoreMissing();
        $authenticator->shouldReceive('getAuthKeyword')
                      ->zeroOrMoreTimes()
                      ->andReturn($type);

        return $authenticator;
    }
}
