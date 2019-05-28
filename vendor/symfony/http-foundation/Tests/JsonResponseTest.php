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
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseTest extends TestCase
>>>>>>> dev
{
    public function testConstructorEmptyCreatesJsonObject()
    {
        $response = new JsonResponse();
        $this->assertSame('{}', $response->getContent());
    }

    public function testConstructorWithArrayCreatesJsonArray()
    {
<<<<<<< HEAD
        $response = new JsonResponse(array(0, 1, 2, 3));
=======
        $response = new JsonResponse([0, 1, 2, 3]);
>>>>>>> dev
        $this->assertSame('[0,1,2,3]', $response->getContent());
    }

    public function testConstructorWithAssocArrayCreatesJsonObject()
    {
<<<<<<< HEAD
        $response = new JsonResponse(array('foo' => 'bar'));
=======
        $response = new JsonResponse(['foo' => 'bar']);
>>>>>>> dev
        $this->assertSame('{"foo":"bar"}', $response->getContent());
    }

    public function testConstructorWithSimpleTypes()
    {
        $response = new JsonResponse('foo');
        $this->assertSame('"foo"', $response->getContent());

        $response = new JsonResponse(0);
        $this->assertSame('0', $response->getContent());

        $response = new JsonResponse(0.1);
        $this->assertSame('0.1', $response->getContent());

        $response = new JsonResponse(true);
        $this->assertSame('true', $response->getContent());
    }

    public function testConstructorWithCustomStatus()
    {
<<<<<<< HEAD
        $response = new JsonResponse(array(), 202);
=======
        $response = new JsonResponse([], 202);
>>>>>>> dev
        $this->assertSame(202, $response->getStatusCode());
    }

    public function testConstructorAddsContentTypeHeader()
    {
        $response = new JsonResponse();
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
    }

    public function testConstructorWithCustomHeaders()
    {
<<<<<<< HEAD
        $response = new JsonResponse(array(), 200, array('ETag' => 'foo'));
=======
        $response = new JsonResponse([], 200, ['ETag' => 'foo']);
>>>>>>> dev
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
        $this->assertSame('foo', $response->headers->get('ETag'));
    }

    public function testConstructorWithCustomContentType()
    {
<<<<<<< HEAD
        $headers = array('Content-Type' => 'application/vnd.acme.blog-v1+json');

        $response = new JsonResponse(array(), 200, $headers);
        $this->assertSame('application/vnd.acme.blog-v1+json', $response->headers->get('Content-Type'));
    }

    public function testCreate()
    {
        $response = JsonResponse::create(array('foo' => 'bar'), 204);
=======
        $headers = ['Content-Type' => 'application/vnd.acme.blog-v1+json'];

        $response = new JsonResponse([], 200, $headers);
        $this->assertSame('application/vnd.acme.blog-v1+json', $response->headers->get('Content-Type'));
    }

    public function testSetJson()
    {
        $response = new JsonResponse('1', 200, [], true);
        $this->assertEquals('1', $response->getContent());

        $response = new JsonResponse('[1]', 200, [], true);
        $this->assertEquals('[1]', $response->getContent());

        $response = new JsonResponse(null, 200, []);
        $response->setJson('true');
        $this->assertEquals('true', $response->getContent());
    }

    public function testCreate()
    {
        $response = JsonResponse::create(['foo' => 'bar'], 204);
>>>>>>> dev

        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertEquals('{"foo":"bar"}', $response->getContent());
        $this->assertEquals(204, $response->getStatusCode());
    }

    public function testStaticCreateEmptyJsonObject()
    {
        $response = JsonResponse::create();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('{}', $response->getContent());
    }

    public function testStaticCreateJsonArray()
    {
<<<<<<< HEAD
        $response = JsonResponse::create(array(0, 1, 2, 3));
=======
        $response = JsonResponse::create([0, 1, 2, 3]);
>>>>>>> dev
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('[0,1,2,3]', $response->getContent());
    }

    public function testStaticCreateJsonObject()
    {
<<<<<<< HEAD
        $response = JsonResponse::create(array('foo' => 'bar'));
=======
        $response = JsonResponse::create(['foo' => 'bar']);
>>>>>>> dev
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('{"foo":"bar"}', $response->getContent());
    }

    public function testStaticCreateWithSimpleTypes()
    {
        $response = JsonResponse::create('foo');
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('"foo"', $response->getContent());

        $response = JsonResponse::create(0);
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('0', $response->getContent());

        $response = JsonResponse::create(0.1);
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('0.1', $response->getContent());

        $response = JsonResponse::create(true);
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $response);
        $this->assertSame('true', $response->getContent());
    }

    public function testStaticCreateWithCustomStatus()
    {
<<<<<<< HEAD
        $response = JsonResponse::create(array(), 202);
=======
        $response = JsonResponse::create([], 202);
>>>>>>> dev
        $this->assertSame(202, $response->getStatusCode());
    }

    public function testStaticCreateAddsContentTypeHeader()
    {
        $response = JsonResponse::create();
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
    }

    public function testStaticCreateWithCustomHeaders()
    {
<<<<<<< HEAD
        $response = JsonResponse::create(array(), 200, array('ETag' => 'foo'));
=======
        $response = JsonResponse::create([], 200, ['ETag' => 'foo']);
>>>>>>> dev
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
        $this->assertSame('foo', $response->headers->get('ETag'));
    }

    public function testStaticCreateWithCustomContentType()
    {
<<<<<<< HEAD
        $headers = array('Content-Type' => 'application/vnd.acme.blog-v1+json');

        $response = JsonResponse::create(array(), 200, $headers);
=======
        $headers = ['Content-Type' => 'application/vnd.acme.blog-v1+json'];

        $response = JsonResponse::create([], 200, $headers);
>>>>>>> dev
        $this->assertSame('application/vnd.acme.blog-v1+json', $response->headers->get('Content-Type'));
    }

    public function testSetCallback()
    {
<<<<<<< HEAD
        $response = JsonResponse::create(array('foo' => 'bar'))->setCallback('callback');
=======
        $response = JsonResponse::create(['foo' => 'bar'])->setCallback('callback');
>>>>>>> dev

        $this->assertEquals('/**/callback({"foo":"bar"});', $response->getContent());
        $this->assertEquals('text/javascript', $response->headers->get('Content-Type'));
    }

    public function testJsonEncodeFlags()
    {
        $response = new JsonResponse('<>\'&"');

        $this->assertEquals('"\u003C\u003E\u0027\u0026\u0022"', $response->getContent());
    }

    public function testGetEncodingOptions()
    {
        $response = new JsonResponse();

        $this->assertEquals(JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT, $response->getEncodingOptions());
    }

    public function testSetEncodingOptions()
    {
        $response = new JsonResponse();
<<<<<<< HEAD
        $response->setData(array(array(1, 2, 3)));
=======
        $response->setData([[1, 2, 3]]);
>>>>>>> dev

        $this->assertEquals('[[1,2,3]]', $response->getContent());

        $response->setEncodingOptions(JSON_FORCE_OBJECT);

        $this->assertEquals('{"0":{"0":1,"1":2,"2":3}}', $response->getContent());
    }

<<<<<<< HEAD
=======
    public function testItAcceptsJsonAsString()
    {
        $response = JsonResponse::fromJsonString('{"foo":"bar"}');
        $this->assertSame('{"foo":"bar"}', $response->getContent());
    }

>>>>>>> dev
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetCallbackInvalidIdentifier()
    {
        $response = new JsonResponse('foo');
        $response->setCallback('+invalid');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetContent()
    {
        JsonResponse::create("\xB1\x31");
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage This error is expected
     */
    public function testSetContentJsonSerializeError()
    {
<<<<<<< HEAD
=======
        if (!interface_exists('JsonSerializable', false)) {
            $this->markTestSkipped('JsonSerializable is required.');
        }

>>>>>>> dev
        $serializable = new JsonSerializableObject();

        JsonResponse::create($serializable);
    }
<<<<<<< HEAD
}

if (interface_exists('JsonSerializable')) {
=======

    public function testSetComplexCallback()
    {
        $response = JsonResponse::create(['foo' => 'bar']);
        $response->setCallback('ಠ_ಠ["foo"].bar[0]');

        $this->assertEquals('/**/ಠ_ಠ["foo"].bar[0]({"foo":"bar"});', $response->getContent());
    }
}

if (interface_exists('JsonSerializable', false)) {
>>>>>>> dev
    class JsonSerializableObject implements \JsonSerializable
    {
        public function jsonSerialize()
        {
            throw new \Exception('This error is expected');
        }
    }
}
