<?php

require_once dirname(dirname(dirname(__DIR__))).'/fixtures/MimeEntityFixture.php';

abstract class Swift_Mime_AbstractMimeEntityTest extends \SwiftMailerTestCase
{
    public function testGetHeadersReturnsHeaderSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet();
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet();
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $this->assertSame($headers, $entity->getHeaders());
    }

    public function testContentTypeIsReturnedFromHeader()
    {
<<<<<<< HEAD
        $ctype = $this->_createHeader('Content-Type', 'image/jpeg-test');
        $headers = $this->_createHeaderSet(array('Content-Type' => $ctype));
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $ctype = $this->createHeader('Content-Type', 'image/jpeg-test');
        $headers = $this->createHeaderSet(['Content-Type' => $ctype]);
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('image/jpeg-test', $entity->getContentType());
    }

    public function testContentTypeIsSetInHeader()
    {
<<<<<<< HEAD
        $ctype = $this->_createHeader('Content-Type', 'text/plain', array(), false);
        $headers = $this->_createHeaderSet(array('Content-Type' => $ctype));
=======
        $ctype = $this->createHeader('Content-Type', 'text/plain', [], false);
        $headers = $this->createHeaderSet(['Content-Type' => $ctype]);
>>>>>>> dev

        $ctype->shouldReceive('setFieldBodyModel')
              ->once()
              ->with('image/jpeg');
        $ctype->shouldReceive('setFieldBodyModel')
              ->zeroOrMoreTimes()
              ->with(\Mockery::not('image/jpeg'));

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setContentType('image/jpeg');
    }

    public function testContentTypeHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addParameterizedHeader')
                ->once()
                ->with('Content-Type', 'image/jpeg');
        $headers->shouldReceive('addParameterizedHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setContentType('image/jpeg');
    }

    public function testContentTypeCanBeSetViaSetBody()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addParameterizedHeader')
                ->once()
                ->with('Content-Type', 'text/html');
        $headers->shouldReceive('addParameterizedHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setBody('<b>foo</b>', 'text/html');
    }

    public function testGetEncoderFromConstructor()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('base64');
        $entity = $this->_createEntity($this->_createHeaderSet(), $encoder,
            $this->_createCache()
=======
        $encoder = $this->createEncoder('base64');
        $entity = $this->createEntity($this->createHeaderSet(), $encoder,
            $this->createCache()
>>>>>>> dev
            );
        $this->assertSame($encoder, $entity->getEncoder());
    }

    public function testSetAndGetEncoder()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('base64');
        $headers = $this->_createHeaderSet();
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $encoder = $this->createEncoder('base64');
        $headers = $this->createHeaderSet();
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setEncoder($encoder);
        $this->assertSame($encoder, $entity->getEncoder());
    }

    public function testSettingEncoderUpdatesTransferEncoding()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('base64');
        $encoding = $this->_createHeader(
            'Content-Transfer-Encoding', '8bit', array(), false
            );
        $headers = $this->_createHeaderSet(array(
            'Content-Transfer-Encoding' => $encoding,
            ));
=======
        $encoder = $this->createEncoder('base64');
        $encoding = $this->createHeader(
            'Content-Transfer-Encoding', '8bit', [], false
            );
        $headers = $this->createHeaderSet([
            'Content-Transfer-Encoding' => $encoding,
            ]);
>>>>>>> dev
        $encoding->shouldReceive('setFieldBodyModel')
                 ->once()
                 ->with('base64');
        $encoding->shouldReceive('setFieldBodyModel')
                 ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setEncoder($encoder);
    }

    public function testSettingEncoderAddsEncodingHeaderIfNonePresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('Content-Transfer-Encoding', 'something');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
            );
        $entity->setEncoder($this->_createEncoder('something'));
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
            );
        $entity->setEncoder($this->createEncoder('something'));
>>>>>>> dev
    }

    public function testIdIsReturnedFromHeader()
    {
        /* -- RFC 2045, 7.
        In constructing a high-level user agent, it may be desirable to allow
        one body to make reference to another.  Accordingly, bodies may be
        labelled using the "Content-ID" header field, which is syntactically
        identical to the "Message-ID" header field
        */

<<<<<<< HEAD
        $cid = $this->_createHeader('Content-ID', 'zip@button');
        $headers = $this->_createHeaderSet(array('Content-ID' => $cid));
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $cid = $this->createHeader('Content-ID', 'zip@button');
        $headers = $this->createHeaderSet(['Content-ID' => $cid]);
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('zip@button', $entity->getId());
    }

    public function testIdIsSetInHeader()
    {
<<<<<<< HEAD
        $cid = $this->_createHeader('Content-ID', 'zip@button', array(), false);
        $headers = $this->_createHeaderSet(array('Content-ID' => $cid));
=======
        $cid = $this->createHeader('Content-ID', 'zip@button', [], false);
        $headers = $this->createHeaderSet(['Content-ID' => $cid]);
>>>>>>> dev

        $cid->shouldReceive('setFieldBodyModel')
            ->once()
            ->with('foo@bar');
        $cid->shouldReceive('setFieldBodyModel')
            ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setId('foo@bar');
    }

    public function testIdIsAutoGenerated()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertRegExp('/^.*?@.*?$/D', $entity->getId());
    }

    public function testGenerateIdCreatesNewId()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet();
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet();
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $id1 = $entity->generateId();
        $id2 = $entity->generateId();
        $this->assertNotEquals($id1, $id2);
    }

    public function testGenerateIdSetsNewId()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet();
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet();
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $id = $entity->generateId();
        $this->assertEquals($id, $entity->getId());
    }

    public function testDescriptionIsReadFromHeader()
    {
        /* -- RFC 2045, 8.
        The ability to associate some descriptive information with a given
        body is often desirable.  For example, it may be useful to mark an
        "image" body as "a picture of the Space Shuttle Endeavor."  Such text
        may be placed in the Content-Description header field.  This header
        field is always optional.
        */

<<<<<<< HEAD
        $desc = $this->_createHeader('Content-Description', 'something');
        $headers = $this->_createHeaderSet(array('Content-Description' => $desc));
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $desc = $this->createHeader('Content-Description', 'something');
        $headers = $this->createHeaderSet(['Content-Description' => $desc]);
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('something', $entity->getDescription());
    }

    public function testDescriptionIsSetInHeader()
    {
<<<<<<< HEAD
        $desc = $this->_createHeader('Content-Description', '', array(), false);
        $desc->shouldReceive('setFieldBodyModel')->once()->with('whatever');

        $headers = $this->_createHeaderSet(array('Content-Description' => $desc));

        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $desc = $this->createHeader('Content-Description', '', [], false);
        $desc->shouldReceive('setFieldBodyModel')->once()->with('whatever');

        $headers = $this->createHeaderSet(['Content-Description' => $desc]);

        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setDescription('whatever');
    }

    public function testDescriptionHeaderIsAddedIfNotPresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('Content-Description', 'whatever');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setDescription('whatever');
    }

    public function testSetAndGetMaxLineLength()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $entity->setMaxLineLength(60);
        $this->assertEquals(60, $entity->getMaxLineLength());
    }

    public function testEncoderIsUsedForStringGeneration()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('base64', false);
=======
        $encoder = $this->createEncoder('base64', false);
>>>>>>> dev
        $encoder->expects($this->once())
                ->method('encodeString')
                ->with('blah');

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $encoder, $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $encoder, $this->createCache()
>>>>>>> dev
            );
        $entity->setBody('blah');
        $entity->toString();
    }

    public function testMaxLineLengthIsProvidedWhenEncoding()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('base64', false);
=======
        $encoder = $this->createEncoder('base64', false);
>>>>>>> dev
        $encoder->expects($this->once())
                ->method('encodeString')
                ->with('blah', 0, 65);

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $encoder, $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $encoder, $this->createCache()
>>>>>>> dev
            );
        $entity->setBody('blah');
        $entity->setMaxLineLength(65);
        $entity->toString();
    }

    public function testHeadersAppearInString()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->once()
                ->andReturn(
                    "Content-Type: text/plain; charset=utf-8\r\n".
                    "X-MyHeader: foobar\r\n"
                );

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals(
            "Content-Type: text/plain; charset=utf-8\r\n".
            "X-MyHeader: foobar\r\n",
            $entity->toString()
            );
    }

    public function testSetAndGetBody()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $entity->setBody("blah\r\nblah!");
        $this->assertEquals("blah\r\nblah!", $entity->getBody());
    }

    public function testBodyIsAppended()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->once()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setBody("blah\r\nblah!");
        $this->assertEquals(
            "Content-Type: text/plain; charset=utf-8\r\n".
            "\r\n".
            "blah\r\nblah!",
            $entity->toString()
            );
    }

    public function testGetBodyReturnsStringFromByteStream()
    {
<<<<<<< HEAD
        $os = $this->_createOutputStream('byte stream string');
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $os = $this->createOutputStream('byte stream string');
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $entity->setBody($os);
        $this->assertEquals('byte stream string', $entity->getBody());
    }

    public function testByteStreamBodyIsAppended()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $os = $this->_createOutputStream('streamed');
=======
        $headers = $this->createHeaderSet([], false);
        $os = $this->createOutputStream('streamed');
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->once()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $entity->setBody($os);
        $this->assertEquals(
            "Content-Type: text/plain; charset=utf-8\r\n".
            "\r\n".
            'streamed',
            $entity->toString()
            );
    }

    public function testBoundaryCanBeRetrieved()
    {
        /* -- RFC 2046, 5.1.1.
     boundary := 0*69<bchars> bcharsnospace

     bchars := bcharsnospace / " "

     bcharsnospace := DIGIT / ALPHA / "'" / "(" / ")" /
                                            "+" / "_" / "," / "-" / "." /
                                            "/" / ":" / "=" / "?"
        */

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertRegExp(
            '/^[a-zA-Z0-9\'\(\)\+_\-,\.\/:=\?\ ]{0,69}[a-zA-Z0-9\'\(\)\+_\-,\.\/:=\?]$/D',
            $entity->getBoundary()
            );
    }

    public function testBoundaryNeverChanges()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $firstBoundary = $entity->getBoundary();
        for ($i = 0; $i < 10; ++$i) {
            $this->assertEquals($firstBoundary, $entity->getBoundary());
        }
    }

    public function testBoundaryCanBeSet()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $entity->setBoundary('foobar');
        $this->assertEquals('foobar', $entity->getBoundary());
    }

    public function testAddingChildrenGeneratesBoundaryInHeaders()
    {
<<<<<<< HEAD
        $child = $this->_createChild();
        $cType = $this->_createHeader('Content-Type', 'text/plain', array(), false);
=======
        $child = $this->createChild();
        $cType = $this->createHeader('Content-Type', 'text/plain', [], false);
>>>>>>> dev
        $cType->shouldReceive('setParameter')
              ->once()
              ->with('boundary', \Mockery::any());
        $cType->shouldReceive('setParameter')
              ->zeroOrMoreTimes();

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(array(
            'Content-Type' => $cType,
            )),
            $this->_createEncoder(), $this->_createCache()
            );
        $entity->setChildren(array($child));
=======
        $entity = $this->createEntity($this->createHeaderSet([
            'Content-Type' => $cType,
            ]),
            $this->createEncoder(), $this->createCache()
            );
        $entity->setChildren([$child]);
>>>>>>> dev
    }

    public function testChildrenOfLevelAttachmentAndLessCauseMultipartMixed()
    {
<<<<<<< HEAD
        for ($level = Swift_Mime_MimeEntity::LEVEL_MIXED;
            $level > Swift_Mime_MimeEntity::LEVEL_TOP; $level /= 2) {
            $child = $this->_createChild($level);
            $cType = $this->_createHeader(
                'Content-Type', 'text/plain', array(), false
=======
        for ($level = Swift_Mime_SimpleMimeEntity::LEVEL_MIXED;
            $level > Swift_Mime_SimpleMimeEntity::LEVEL_TOP; $level /= 2) {
            $child = $this->createChild($level);
            $cType = $this->createHeader(
                'Content-Type', 'text/plain', [], false
>>>>>>> dev
                );
            $cType->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with('multipart/mixed');
            $cType->shouldReceive('setFieldBodyModel')
                  ->zeroOrMoreTimes();

<<<<<<< HEAD
            $entity = $this->_createEntity($this->_createHeaderSet(array(
                'Content-Type' => $cType, )),
                $this->_createEncoder(), $this->_createCache()
                );
            $entity->setChildren(array($child));
=======
            $entity = $this->createEntity($this->createHeaderSet([
                'Content-Type' => $cType, ]),
                $this->createEncoder(), $this->createCache()
                );
            $entity->setChildren([$child]);
>>>>>>> dev
        }
    }

    public function testChildrenOfLevelAlternativeAndLessCauseMultipartAlternative()
    {
<<<<<<< HEAD
        for ($level = Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE;
            $level > Swift_Mime_MimeEntity::LEVEL_MIXED; $level /= 2) {
            $child = $this->_createChild($level);
            $cType = $this->_createHeader(
                'Content-Type', 'text/plain', array(), false
=======
        for ($level = Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE;
            $level > Swift_Mime_SimpleMimeEntity::LEVEL_MIXED; $level /= 2) {
            $child = $this->createChild($level);
            $cType = $this->createHeader(
                'Content-Type', 'text/plain', [], false
>>>>>>> dev
                );
            $cType->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with('multipart/alternative');
            $cType->shouldReceive('setFieldBodyModel')
                  ->zeroOrMoreTimes();

<<<<<<< HEAD
            $entity = $this->_createEntity($this->_createHeaderSet(array(
                'Content-Type' => $cType, )),
                $this->_createEncoder(), $this->_createCache()
                );
            $entity->setChildren(array($child));
=======
            $entity = $this->createEntity($this->createHeaderSet([
                'Content-Type' => $cType, ]),
                $this->createEncoder(), $this->createCache()
                );
            $entity->setChildren([$child]);
>>>>>>> dev
        }
    }

    public function testChildrenOfLevelRelatedAndLessCauseMultipartRelated()
    {
<<<<<<< HEAD
        for ($level = Swift_Mime_MimeEntity::LEVEL_RELATED;
            $level > Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE; $level /= 2) {
            $child = $this->_createChild($level);
            $cType = $this->_createHeader(
                'Content-Type', 'text/plain', array(), false
=======
        for ($level = Swift_Mime_SimpleMimeEntity::LEVEL_RELATED;
            $level > Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE; $level /= 2) {
            $child = $this->createChild($level);
            $cType = $this->createHeader(
                'Content-Type', 'text/plain', [], false
>>>>>>> dev
                );
            $cType->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with('multipart/related');
            $cType->shouldReceive('setFieldBodyModel')
                  ->zeroOrMoreTimes();

<<<<<<< HEAD
            $entity = $this->_createEntity($this->_createHeaderSet(array(
                'Content-Type' => $cType, )),
                $this->_createEncoder(), $this->_createCache()
                );
            $entity->setChildren(array($child));
=======
            $entity = $this->createEntity($this->createHeaderSet([
                'Content-Type' => $cType, ]),
                $this->createEncoder(), $this->createCache()
                );
            $entity->setChildren([$child]);
>>>>>>> dev
        }
    }

    public function testHighestLevelChildDeterminesContentType()
    {
<<<<<<< HEAD
        $combinations = array(
            array('levels' => array(Swift_Mime_MimeEntity::LEVEL_MIXED,
                Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
                Swift_Mime_MimeEntity::LEVEL_RELATED,
                ),
                'type' => 'multipart/mixed',
                ),
            array('levels' => array(Swift_Mime_MimeEntity::LEVEL_MIXED,
                Swift_Mime_MimeEntity::LEVEL_RELATED,
                ),
                'type' => 'multipart/mixed',
                ),
            array('levels' => array(Swift_Mime_MimeEntity::LEVEL_MIXED,
                Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
                ),
                'type' => 'multipart/mixed',
                ),
            array('levels' => array(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
                Swift_Mime_MimeEntity::LEVEL_RELATED,
                ),
                'type' => 'multipart/alternative',
                ),
            );

        foreach ($combinations as $combination) {
            $children = array();
            foreach ($combination['levels'] as $level) {
                $children[] = $this->_createChild($level);
            }

            $cType = $this->_createHeader(
                'Content-Type', 'text/plain', array(), false
=======
        $combinations = [
            ['levels' => [Swift_Mime_SimpleMimeEntity::LEVEL_MIXED,
                Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
                Swift_Mime_SimpleMimeEntity::LEVEL_RELATED,
                ],
                'type' => 'multipart/mixed',
                ],
            ['levels' => [Swift_Mime_SimpleMimeEntity::LEVEL_MIXED,
                Swift_Mime_SimpleMimeEntity::LEVEL_RELATED,
                ],
                'type' => 'multipart/mixed',
                ],
            ['levels' => [Swift_Mime_SimpleMimeEntity::LEVEL_MIXED,
                Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
                ],
                'type' => 'multipart/mixed',
                ],
            ['levels' => [Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
                Swift_Mime_SimpleMimeEntity::LEVEL_RELATED,
                ],
                'type' => 'multipart/alternative',
                ],
            ];

        foreach ($combinations as $combination) {
            $children = [];
            foreach ($combination['levels'] as $level) {
                $children[] = $this->createChild($level);
            }

            $cType = $this->createHeader(
                'Content-Type', 'text/plain', [], false
>>>>>>> dev
                );
            $cType->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with($combination['type']);

<<<<<<< HEAD
            $headerSet = $this->_createHeaderSet(array('Content-Type' => $cType));
=======
            $headerSet = $this->createHeaderSet(['Content-Type' => $cType]);
>>>>>>> dev
            $headerSet->shouldReceive('newInstance')
                      ->zeroOrMoreTimes()
                      ->andReturnUsing(function () use ($headerSet) {
                          return $headerSet;
                      });
<<<<<<< HEAD
            $entity = $this->_createEntity($headerSet,
                $this->_createEncoder(), $this->_createCache()
=======
            $entity = $this->createEntity($headerSet,
                $this->createEncoder(), $this->createCache()
>>>>>>> dev
                );
            $entity->setChildren($children);
        }
    }

    public function testChildrenAppearNestedInString()
    {
        /* -- RFC 2046, 5.1.1.
     (excerpt too verbose to paste here)
     */

<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);

        $child1 = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $headers = $this->createHeaderSet([], false);

        $child1 = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/plain\r\n".
            "\r\n".
            'foobar', 'text/plain'
            );

<<<<<<< HEAD
        $child2 = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $child2 = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/html\r\n".
            "\r\n".
            '<b>foobar</b>', 'text/html'
            );

        $headers->shouldReceive('toString')
              ->zeroOrMoreTimes()
              ->andReturn("Content-Type: multipart/alternative; boundary=\"xxx\"\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren(array($child1, $child2));
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren([$child1, $child2]);
>>>>>>> dev

        $this->assertEquals(
            "Content-Type: multipart/alternative; boundary=\"xxx\"\r\n".
            "\r\n".
            "\r\n--xxx\r\n".
            "Content-Type: text/plain\r\n".
            "\r\n".
            "foobar\r\n".
            "\r\n--xxx\r\n".
            "Content-Type: text/html\r\n".
            "\r\n".
            "<b>foobar</b>\r\n".
            "\r\n--xxx--\r\n",
            $entity->toString()
            );
    }

    public function testMixingLevelsIsHierarchical()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $newHeaders = $this->_createHeaderSet(array(), false);

        $part = $this->_createChild(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $headers = $this->createHeaderSet([], false);
        $newHeaders = $this->createHeaderSet([], false);

        $part = $this->createChild(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/plain\r\n".
            "\r\n".
            'foobar'
            );

<<<<<<< HEAD
        $attachment = $this->_createChild(Swift_Mime_MimeEntity::LEVEL_MIXED,
=======
        $attachment = $this->createChild(Swift_Mime_SimpleMimeEntity::LEVEL_MIXED,
>>>>>>> dev
            "Content-Type: application/octet-stream\r\n".
            "\r\n".
            'data'
            );

        $headers->shouldReceive('toString')
              ->zeroOrMoreTimes()
              ->andReturn("Content-Type: multipart/mixed; boundary=\"xxx\"\r\n");
        $headers->shouldReceive('newInstance')
              ->zeroOrMoreTimes()
              ->andReturn($newHeaders);
        $newHeaders->shouldReceive('toString')
              ->zeroOrMoreTimes()
              ->andReturn("Content-Type: multipart/alternative; boundary=\"yyy\"\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren(array($part, $attachment));
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren([$part, $attachment]);
>>>>>>> dev

        $this->assertRegExp(
            '~^'.
            "Content-Type: multipart/mixed; boundary=\"xxx\"\r\n".
            "\r\n\r\n--xxx\r\n".
            "Content-Type: multipart/alternative; boundary=\"yyy\"\r\n".
            "\r\n\r\n--(.*?)\r\n".
            "Content-Type: text/plain\r\n".
            "\r\n".
            'foobar'.
            "\r\n\r\n--\\1--\r\n".
            "\r\n\r\n--xxx\r\n".
            "Content-Type: application/octet-stream\r\n".
            "\r\n".
            'data'.
            "\r\n\r\n--xxx--\r\n".
            '$~',
            $entity->toString()
            );
    }

    public function testSettingEncoderNotifiesChildren()
    {
<<<<<<< HEAD
        $child = $this->_createChild(0, '', false);
        $encoder = $this->_createEncoder('base64');
=======
        $child = $this->createChild(0, '', false);
        $encoder = $this->createEncoder('base64');
>>>>>>> dev

        $child->shouldReceive('encoderChanged')
              ->once()
              ->with($encoder);

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $entity->setChildren(array($child));
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $entity->setChildren([$child]);
>>>>>>> dev
        $entity->setEncoder($encoder);
    }

    public function testReceiptOfEncoderChangeNotifiesChildren()
    {
<<<<<<< HEAD
        $child = $this->_createChild(0, '', false);
        $encoder = $this->_createEncoder('base64');
=======
        $child = $this->createChild(0, '', false);
        $encoder = $this->createEncoder('base64');
>>>>>>> dev

        $child->shouldReceive('encoderChanged')
              ->once()
              ->with($encoder);

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $entity->setChildren(array($child));
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $entity->setChildren([$child]);
>>>>>>> dev
        $entity->encoderChanged($encoder);
    }

    public function testReceiptOfCharsetChangeNotifiesChildren()
    {
<<<<<<< HEAD
        $child = $this->_createChild(0, '', false);
=======
        $child = $this->createChild(0, '', false);
>>>>>>> dev
        $child->shouldReceive('charsetChanged')
              ->once()
              ->with('windows-874');

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $entity->setChildren(array($child));
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $entity->setChildren([$child]);
>>>>>>> dev
        $entity->charsetChanged('windows-874');
    }

    public function testEntityIsWrittenToByteStream()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $is = $this->_createInputStream(false);
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $is = $this->createInputStream(false);
>>>>>>> dev
        $is->expects($this->atLeastOnce())
           ->method('write');

        $entity->toByteStream($is);
    }

    public function testEntityHeadersAreComittedToByteStream()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $is = $this->_createInputStream(false);
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $is = $this->createInputStream(false);
>>>>>>> dev
        $is->expects($this->atLeastOnce())
           ->method('write');
        $is->expects($this->atLeastOnce())
           ->method('commit');

        $entity->toByteStream($is);
    }

    public function testOrderingTextBeforeHtml()
    {
<<<<<<< HEAD
        $htmlChild = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $htmlChild = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/html\r\n".
            "\r\n".
            'HTML PART',
            'text/html'
            );
<<<<<<< HEAD
        $textChild = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $textChild = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/plain\r\n".
            "\r\n".
            'TEXT PART',
            'text/plain'
            );
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: multipart/alternative; boundary=\"xxx\"\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren(array($htmlChild, $textChild));
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
            );
        $entity->setBoundary('xxx');
        $entity->setChildren([$htmlChild, $textChild]);
>>>>>>> dev

        $this->assertEquals(
            "Content-Type: multipart/alternative; boundary=\"xxx\"\r\n".
            "\r\n\r\n--xxx\r\n".
            "Content-Type: text/plain\r\n".
            "\r\n".
            'TEXT PART'.
            "\r\n\r\n--xxx\r\n".
            "Content-Type: text/html\r\n".
            "\r\n".
            'HTML PART'.
            "\r\n\r\n--xxx--\r\n",
            $entity->toString()
            );
    }

    public function testOrderingEqualContentTypesMaintainsOriginalOrdering()
    {
<<<<<<< HEAD
        $firstChild = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $firstChild = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/plain\r\n".
            "\r\n".
            'PART 1',
            'text/plain'
        );
<<<<<<< HEAD
        $secondChild = new MimeEntityFixture(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE,
=======
        $secondChild = new MimeEntityFixture(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE,
>>>>>>> dev
            "Content-Type: text/plain\r\n".
            "\r\n".
            'PART 2',
            'text/plain'
        );
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
            ->zeroOrMoreTimes()
            ->andReturn("Content-Type: multipart/alternative; boundary=\"xxx\"\r\n");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
            $this->_createCache()
        );
        $entity->setBoundary('xxx');
        $entity->setChildren(array($firstChild, $secondChild));
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
            $this->createCache()
        );
        $entity->setBoundary('xxx');
        $entity->setChildren([$firstChild, $secondChild]);
>>>>>>> dev

        $this->assertEquals(
            "Content-Type: multipart/alternative; boundary=\"xxx\"\r\n".
            "\r\n\r\n--xxx\r\n".
            "Content-Type: text/plain\r\n".
            "\r\n".
            'PART 1'.
            "\r\n\r\n--xxx\r\n".
            "Content-Type: text/plain\r\n".
            "\r\n".
            'PART 2'.
            "\r\n\r\n--xxx--\r\n",
            $entity->toString()
        );
    }

    public function testUnsettingChildrenRestoresContentType()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain', array(), false);
        $child = $this->_createChild(Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE);
=======
        $cType = $this->createHeader('Content-Type', 'text/plain', [], false);
        $child = $this->createChild(Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE);
>>>>>>> dev

        $cType->shouldReceive('setFieldBodyModel')
              ->twice()
              ->with('image/jpeg');
        $cType->shouldReceive('setFieldBodyModel')
              ->once()
              ->with('multipart/alternative');
        $cType->shouldReceive('setFieldBodyModel')
              ->zeroOrMoreTimes()
              ->with(\Mockery::not('multipart/alternative', 'image/jpeg'));

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(array(
            'Content-Type' => $cType,
            )),
            $this->_createEncoder(), $this->_createCache()
            );

        $entity->setContentType('image/jpeg');
        $entity->setChildren(array($child));
        $entity->setChildren(array());
=======
        $entity = $this->createEntity($this->createHeaderSet([
            'Content-Type' => $cType,
            ]),
            $this->createEncoder(), $this->createCache()
            );

        $entity->setContentType('image/jpeg');
        $entity->setChildren([$child]);
        $entity->setChildren([]);
>>>>>>> dev
    }

    public function testBodyIsReadFromCacheWhenUsingToStringIfPresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $cache = $this->_createCache(false);
=======
        $cache = $this->createCache(false);
>>>>>>> dev
        $cache->shouldReceive('hasKey')
              ->once()
              ->with(\Mockery::any(), 'body')
              ->andReturn(true);
        $cache->shouldReceive('getString')
              ->once()
              ->with(\Mockery::any(), 'body')
              ->andReturn("\r\ncache\r\ncache!");

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
>>>>>>> dev
            $cache
            );

        $entity->setBody("blah\r\nblah!");
        $this->assertEquals(
            "Content-Type: text/plain; charset=utf-8\r\n".
            "\r\n".
            "cache\r\ncache!",
            $entity->toString()
            );
    }

    public function testBodyIsAddedToCacheWhenUsingToString()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $cache = $this->_createCache(false);
=======
        $cache = $this->createCache(false);
>>>>>>> dev
        $cache->shouldReceive('hasKey')
              ->once()
              ->with(\Mockery::any(), 'body')
              ->andReturn(false);
        $cache->shouldReceive('setString')
              ->once()
              ->with(\Mockery::any(), 'body', "\r\nblah\r\nblah!", Swift_KeyCache::MODE_WRITE);

<<<<<<< HEAD
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
=======
        $entity = $this->createEntity($headers, $this->createEncoder(),
>>>>>>> dev
            $cache
            );

        $entity->setBody("blah\r\nblah!");
        $entity->toString();
    }

    public function testBodyIsClearedFromCacheIfNewBodySet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $cache = $this->_createCache(false);
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
=======
        $cache = $this->createCache(false);
        $entity = $this->createEntity($headers, $this->createEncoder(),
>>>>>>> dev
            $cache
            );

        $entity->setBody("blah\r\nblah!");
        $entity->toString();

        // We set the expectation at this point because we only care what happens when calling setBody()
        $cache->shouldReceive('clearKey')
              ->once()
              ->with(\Mockery::any(), 'body');

        $entity->setBody("new\r\nnew!");
    }

    public function testBodyIsNotClearedFromCacheIfSameBodySet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $cache = $this->_createCache(false);
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
=======
        $cache = $this->createCache(false);
        $entity = $this->createEntity($headers, $this->createEncoder(),
>>>>>>> dev
            $cache
            );

        $entity->setBody("blah\r\nblah!");
        $entity->toString();

        // We set the expectation at this point because we only care what happens when calling setBody()
        $cache->shouldReceive('clearKey')
              ->never();

        $entity->setBody("blah\r\nblah!");
    }

    public function testBodyIsClearedFromCacheIfNewEncoderSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('toString')
                ->zeroOrMoreTimes()
                ->andReturn("Content-Type: text/plain; charset=utf-8\r\n");

<<<<<<< HEAD
        $cache = $this->_createCache(false);
        $otherEncoder = $this->_createEncoder();
        $entity = $this->_createEntity($headers, $this->_createEncoder(),
=======
        $cache = $this->createCache(false);
        $otherEncoder = $this->createEncoder();
        $entity = $this->createEntity($headers, $this->createEncoder(),
>>>>>>> dev
            $cache
            );

        $entity->setBody("blah\r\nblah!");
        $entity->toString();

        // We set the expectation at this point because we only care what happens when calling setEncoder()
        $cache->shouldReceive('clearKey')
              ->once()
              ->with(\Mockery::any(), 'body');

        $entity->setEncoder($otherEncoder);
    }

    public function testBodyIsReadFromCacheWhenUsingToByteStreamIfPresent()
    {
<<<<<<< HEAD
        $is = $this->_createInputStream();
        $cache = $this->_createCache(false);
=======
        $is = $this->createInputStream();
        $cache = $this->createCache(false);
>>>>>>> dev
        $cache->shouldReceive('hasKey')
              ->once()
              ->with(\Mockery::any(), 'body')
              ->andReturn(true);
        $cache->shouldReceive('exportToByteStream')
              ->once()
              ->with(\Mockery::any(), 'body', $is);

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $cache
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $cache
>>>>>>> dev
            );
        $entity->setBody('foo');

        $entity->toByteStream($is);
    }

    public function testBodyIsAddedToCacheWhenUsingToByteStream()
    {
<<<<<<< HEAD
        $is = $this->_createInputStream();
        $cache = $this->_createCache(false);
=======
        $is = $this->createInputStream();
        $cache = $this->createCache(false);
>>>>>>> dev
        $cache->shouldReceive('hasKey')
              ->once()
              ->with(\Mockery::any(), 'body')
              ->andReturn(false);
        $cache->shouldReceive('getInputByteStream')
              ->once()
              ->with(\Mockery::any(), 'body');

<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $cache
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $cache
>>>>>>> dev
            );
        $entity->setBody('foo');

        $entity->toByteStream($is);
    }

    public function testFluidInterface()
    {
<<<<<<< HEAD
        $entity = $this->_createEntity($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $entity = $this->createEntity($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $this->assertSame($entity,
            $entity
            ->setContentType('text/plain')
<<<<<<< HEAD
            ->setEncoder($this->_createEncoder())
=======
            ->setEncoder($this->createEncoder())
>>>>>>> dev
            ->setId('foo@bar')
            ->setDescription('my description')
            ->setMaxLineLength(998)
            ->setBody('xx')
            ->setBoundary('xyz')
<<<<<<< HEAD
            ->setChildren(array())
            );
    }

    abstract protected function _createEntity($headers, $encoder, $cache);

    protected function _createChild($level = null, $string = '', $stub = true)
    {
        $child = $this->getMockery('Swift_Mime_MimeEntity')->shouldIgnoreMissing();
=======
            ->setChildren([])
            );
    }

    abstract protected function createEntity($headers, $encoder, $cache);

    protected function createChild($level = null, $string = '', $stub = true)
    {
        $child = $this->getMockery('Swift_Mime_SimpleMimeEntity')->shouldIgnoreMissing();
>>>>>>> dev
        if (isset($level)) {
            $child->shouldReceive('getNestingLevel')
                  ->zeroOrMoreTimes()
                  ->andReturn($level);
        }
        $child->shouldReceive('toString')
              ->zeroOrMoreTimes()
              ->andReturn($string);

        return $child;
    }

<<<<<<< HEAD
    protected function _createEncoder($name = 'quoted-printable', $stub = true)
=======
    protected function createEncoder($name = 'quoted-printable', $stub = true)
>>>>>>> dev
    {
        $encoder = $this->getMockBuilder('Swift_Mime_ContentEncoder')->getMock();
        $encoder->expects($this->any())
                ->method('getName')
                ->will($this->returnValue($name));
        $encoder->expects($this->any())
                ->method('encodeString')
                ->will($this->returnCallback(function () {
                    $args = func_get_args();

                    return array_shift($args);
                }));

        return $encoder;
    }

<<<<<<< HEAD
    protected function _createCache($stub = true)
=======
    protected function createCache($stub = true)
>>>>>>> dev
    {
        return $this->getMockery('Swift_KeyCache')->shouldIgnoreMissing();
    }

<<<<<<< HEAD
    protected function _createHeaderSet($headers = array(), $stub = true)
    {
        $set = $this->getMockery('Swift_Mime_HeaderSet')->shouldIgnoreMissing();
=======
    protected function createHeaderSet($headers = [], $stub = true)
    {
        $set = $this->getMockery('Swift_Mime_SimpleHeaderSet')->shouldIgnoreMissing();
>>>>>>> dev
        $set->shouldReceive('get')
            ->zeroOrMoreTimes()
            ->andReturnUsing(function ($key) use ($headers) {
                return $headers[$key];
            });
        $set->shouldReceive('has')
            ->zeroOrMoreTimes()
            ->andReturnUsing(function ($key) use ($headers) {
                return array_key_exists($key, $headers);
            });

        return $set;
    }

<<<<<<< HEAD
    protected function _createHeader($name, $model = null, $params = array(), $stub = true)
    {
        $header = $this->getMockery('Swift_Mime_ParameterizedHeader')->shouldIgnoreMissing();
=======
    protected function createHeader($name, $model = null, $params = [], $stub = true)
    {
        $header = $this->getMockery('Swift_Mime_Headers_ParameterizedHeader')->shouldIgnoreMissing();
>>>>>>> dev
        $header->shouldReceive('getFieldName')
               ->zeroOrMoreTimes()
               ->andReturn($name);
        $header->shouldReceive('getFieldBodyModel')
               ->zeroOrMoreTimes()
               ->andReturn($model);
        $header->shouldReceive('getParameter')
               ->zeroOrMoreTimes()
               ->andReturnUsing(function ($key) use ($params) {
                   return $params[$key];
               });

        return $header;
    }

<<<<<<< HEAD
    protected function _createOutputStream($data = null, $stub = true)
=======
    protected function createOutputStream($data = null, $stub = true)
>>>>>>> dev
    {
        $os = $this->getMockery('Swift_OutputByteStream');
        if (isset($data)) {
            $os->shouldReceive('read')
               ->zeroOrMoreTimes()
               ->andReturnUsing(function () use ($data) {
                   static $first = true;
                   if (!$first) {
                       return false;
                   }

                   $first = false;

                   return $data;
               });
            $os->shouldReceive('setReadPointer')
              ->zeroOrMoreTimes();
        }

        return $os;
    }

<<<<<<< HEAD
    protected function _createInputStream($stub = true)
=======
    protected function createInputStream($stub = true)
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_InputByteStream')->getMock();
    }
}
