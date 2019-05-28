<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\HttpFoundation\ServerBag;

/**
 * ServerBagTest.
 *
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
<<<<<<< HEAD
class ServerBagTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldExtractHeadersFromServerArray()
    {
        $server = array(
=======
class ServerBagTest extends TestCase
{
    public function testShouldExtractHeadersFromServerArray()
    {
        $server = [
>>>>>>> dev
            'SOME_SERVER_VARIABLE' => 'value',
            'SOME_SERVER_VARIABLE2' => 'value',
            'ROOT' => 'value',
            'HTTP_CONTENT_TYPE' => 'text/html',
            'HTTP_CONTENT_LENGTH' => '0',
            'HTTP_ETAG' => 'asdf',
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => 'bar',
<<<<<<< HEAD
        );

        $bag = new ServerBag($server);

        $this->assertEquals(array(
=======
        ];

        $bag = new ServerBag($server);

        $this->assertEquals([
>>>>>>> dev
            'CONTENT_TYPE' => 'text/html',
            'CONTENT_LENGTH' => '0',
            'ETAG' => 'asdf',
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:bar'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => 'bar',
<<<<<<< HEAD
        ), $bag->getHeaders());
=======
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpPasswordIsOptional()
    {
<<<<<<< HEAD
        $bag = new ServerBag(array('PHP_AUTH_USER' => 'foo'));

        $this->assertEquals(array(
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['PHP_AUTH_USER' => 'foo']);

        $this->assertEquals([
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpBasicAuthWithPhpCgi()
    {
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => 'Basic '.base64_encode('foo:bar')));

        $this->assertEquals(array(
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:bar'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => 'bar',
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => 'Basic '.base64_encode('foo:bar')]);

        $this->assertEquals([
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:bar'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => 'bar',
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpBasicAuthWithPhpCgiBogus()
    {
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => 'Basic_'.base64_encode('foo:bar')));

        // Username and passwords should not be set as the header is bogus
        $headers = $bag->getHeaders();
        $this->assertFalse(isset($headers['PHP_AUTH_USER']));
        $this->assertFalse(isset($headers['PHP_AUTH_PW']));
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => 'Basic_'.base64_encode('foo:bar')]);

        // Username and passwords should not be set as the header is bogus
        $headers = $bag->getHeaders();
        $this->assertArrayNotHasKey('PHP_AUTH_USER', $headers);
        $this->assertArrayNotHasKey('PHP_AUTH_PW', $headers);
>>>>>>> dev
    }

    public function testHttpBasicAuthWithPhpCgiRedirect()
    {
<<<<<<< HEAD
        $bag = new ServerBag(array('REDIRECT_HTTP_AUTHORIZATION' => 'Basic '.base64_encode('username:pass:word')));

        $this->assertEquals(array(
            'AUTHORIZATION' => 'Basic '.base64_encode('username:pass:word'),
            'PHP_AUTH_USER' => 'username',
            'PHP_AUTH_PW' => 'pass:word',
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['REDIRECT_HTTP_AUTHORIZATION' => 'Basic '.base64_encode('username:pass:word')]);

        $this->assertEquals([
            'AUTHORIZATION' => 'Basic '.base64_encode('username:pass:word'),
            'PHP_AUTH_USER' => 'username',
            'PHP_AUTH_PW' => 'pass:word',
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpBasicAuthWithPhpCgiEmptyPassword()
    {
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => 'Basic '.base64_encode('foo:')));

        $this->assertEquals(array(
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => 'Basic '.base64_encode('foo:')]);

        $this->assertEquals([
            'AUTHORIZATION' => 'Basic '.base64_encode('foo:'),
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpDigestAuthWithPhpCgi()
    {
        $digest = 'Digest username="foo", realm="acme", nonce="'.md5('secret').'", uri="/protected, qop="auth"';
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => $digest));

        $this->assertEquals(array(
            'AUTHORIZATION' => $digest,
            'PHP_AUTH_DIGEST' => $digest,
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => $digest]);

        $this->assertEquals([
            'AUTHORIZATION' => $digest,
            'PHP_AUTH_DIGEST' => $digest,
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testHttpDigestAuthWithPhpCgiBogus()
    {
        $digest = 'Digest_username="foo", realm="acme", nonce="'.md5('secret').'", uri="/protected, qop="auth"';
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => $digest));

        // Username and passwords should not be set as the header is bogus
        $headers = $bag->getHeaders();
        $this->assertFalse(isset($headers['PHP_AUTH_USER']));
        $this->assertFalse(isset($headers['PHP_AUTH_PW']));
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => $digest]);

        // Username and passwords should not be set as the header is bogus
        $headers = $bag->getHeaders();
        $this->assertArrayNotHasKey('PHP_AUTH_USER', $headers);
        $this->assertArrayNotHasKey('PHP_AUTH_PW', $headers);
>>>>>>> dev
    }

    public function testHttpDigestAuthWithPhpCgiRedirect()
    {
        $digest = 'Digest username="foo", realm="acme", nonce="'.md5('secret').'", uri="/protected, qop="auth"';
<<<<<<< HEAD
        $bag = new ServerBag(array('REDIRECT_HTTP_AUTHORIZATION' => $digest));

        $this->assertEquals(array(
            'AUTHORIZATION' => $digest,
            'PHP_AUTH_DIGEST' => $digest,
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['REDIRECT_HTTP_AUTHORIZATION' => $digest]);

        $this->assertEquals([
            'AUTHORIZATION' => $digest,
            'PHP_AUTH_DIGEST' => $digest,
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testOAuthBearerAuth()
    {
        $headerContent = 'Bearer L-yLEOr9zhmUYRkzN1jwwxwQ-PBNiKDc8dgfB4hTfvo';
<<<<<<< HEAD
        $bag = new ServerBag(array('HTTP_AUTHORIZATION' => $headerContent));

        $this->assertEquals(array(
            'AUTHORIZATION' => $headerContent,
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['HTTP_AUTHORIZATION' => $headerContent]);

        $this->assertEquals([
            'AUTHORIZATION' => $headerContent,
        ], $bag->getHeaders());
>>>>>>> dev
    }

    public function testOAuthBearerAuthWithRedirect()
    {
        $headerContent = 'Bearer L-yLEOr9zhmUYRkzN1jwwxwQ-PBNiKDc8dgfB4hTfvo';
<<<<<<< HEAD
        $bag = new ServerBag(array('REDIRECT_HTTP_AUTHORIZATION' => $headerContent));

        $this->assertEquals(array(
            'AUTHORIZATION' => $headerContent,
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['REDIRECT_HTTP_AUTHORIZATION' => $headerContent]);

        $this->assertEquals([
            'AUTHORIZATION' => $headerContent,
        ], $bag->getHeaders());
>>>>>>> dev
    }

    /**
     * @see https://github.com/symfony/symfony/issues/17345
     */
    public function testItDoesNotOverwriteTheAuthorizationHeaderIfItIsAlreadySet()
    {
        $headerContent = 'Bearer L-yLEOr9zhmUYRkzN1jwwxwQ-PBNiKDc8dgfB4hTfvo';
<<<<<<< HEAD
        $bag = new ServerBag(array('PHP_AUTH_USER' => 'foo', 'HTTP_AUTHORIZATION' => $headerContent));

        $this->assertEquals(array(
            'AUTHORIZATION' => $headerContent,
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ), $bag->getHeaders());
=======
        $bag = new ServerBag(['PHP_AUTH_USER' => 'foo', 'HTTP_AUTHORIZATION' => $headerContent]);

        $this->assertEquals([
            'AUTHORIZATION' => $headerContent,
            'PHP_AUTH_USER' => 'foo',
            'PHP_AUTH_PW' => '',
        ], $bag->getHeaders());
>>>>>>> dev
    }
}
