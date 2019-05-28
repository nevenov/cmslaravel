<?php

<<<<<<< HEAD
=======

>>>>>>> dev
class Swift_Mime_MimePartTest extends Swift_Mime_AbstractMimeEntityTest
{
    public function testNestingLevelIsSubpart()
    {
<<<<<<< HEAD
        $part = $this->_createMimePart($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(
            Swift_Mime_MimeEntity::LEVEL_ALTERNATIVE, $part->getNestingLevel()
=======
        $part = $this->createMimePart($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(
            Swift_Mime_SimpleMimeEntity::LEVEL_ALTERNATIVE, $part->getNestingLevel()
>>>>>>> dev
            );
    }

    public function testCharsetIsReturnedFromHeader()
    {
        /* -- RFC 2046, 4.1.2.
        A critical parameter that may be specified in the Content-Type field
        for "text/plain" data is the character set.  This is specified with a
        "charset" parameter, as in:

     Content-type: text/plain; charset=iso-8859-1

        Unlike some other parameter values, the values of the charset
        parameter are NOT case sensitive.  The default character set, which
        must be assumed in the absence of a charset parameter, is US-ASCII.
        */

<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('charset' => 'iso-8859-1')
            );
        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['charset' => 'iso-8859-1']
            );
        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('iso-8859-1', $part->getCharset());
    }

    public function testCharsetIsSetInHeader()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('charset' => 'iso-8859-1'), false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['charset' => 'iso-8859-1'], false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $part->setCharset('utf-8');
    }

    public function testCharsetIsSetInHeaderIfPassedToSetBody()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('charset' => 'iso-8859-1'), false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['charset' => 'iso-8859-1'], false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $part->setBody('', 'text/plian', 'utf-8');
    }

    public function testSettingCharsetNotifiesEncoder()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoder('quoted-printable', false);
=======
        $encoder = $this->createEncoder('quoted-printable', false);
>>>>>>> dev
        $encoder->expects($this->once())
                ->method('charsetChanged')
                ->with('utf-8');

<<<<<<< HEAD
        $part = $this->_createMimePart($this->_createHeaderSet(),
            $encoder, $this->_createCache()
=======
        $part = $this->createMimePart($this->createHeaderSet(),
            $encoder, $this->createCache()
>>>>>>> dev
            );
        $part->setCharset('utf-8');
    }

    public function testSettingCharsetNotifiesHeaders()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('charsetChanged')
                ->zeroOrMoreTimes()
                ->with('utf-8');

<<<<<<< HEAD
        $part = $this->_createMimePart($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $part = $this->createMimePart($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $part->setCharset('utf-8');
    }

    public function testSettingCharsetNotifiesChildren()
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
        $part = $this->_createMimePart($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $part->setChildren(array($child));
=======
        $part = $this->createMimePart($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $part->setChildren([$child]);
>>>>>>> dev
        $part->setCharset('windows-874');
    }

    public function testCharsetChangeUpdatesCharset()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('charset' => 'iso-8859-1'), false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['charset' => 'iso-8859-1'], false
            );
        $cType->shouldReceive('setParameter')->once()->with('charset', 'utf-8');

        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $part->charsetChanged('utf-8');
    }

    public function testSettingCharsetClearsCache()
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

        // Initialize the expectation here because we only care about what happens in setCharset()
        $cache->shouldReceive('clearKey')
                ->once()
                ->with(\Mockery::any(), 'body');

        $entity->setCharset('iso-2022');
    }

    public function testFormatIsReturnedFromHeader()
    {
        /* -- RFC 3676.
     */

<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('format' => 'flowed')
            );
        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['format' => 'flowed']
            );
        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('flowed', $part->getFormat());
    }

    public function testFormatIsSetInHeader()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain', array(), false);
        $cType->shouldReceive('setParameter')->once()->with('format', 'fixed');

        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain', [], false);
        $cType->shouldReceive('setParameter')->once()->with('format', 'fixed');

        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $part->setFormat('fixed');
    }

    public function testDelSpIsReturnedFromHeader()
    {
        /* -- RFC 3676.
     */

<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array('delsp' => 'no')
            );
        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            ['delsp' => 'no']
            );
        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertFalse($part->getDelSp());
    }

    public function testDelSpIsSetInHeader()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain', array(), false);
        $cType->shouldReceive('setParameter')->once()->with('delsp', 'yes');

        $part = $this->_createMimePart($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $cType = $this->createHeader('Content-Type', 'text/plain', [], false);
        $cType->shouldReceive('setParameter')->once()->with('delsp', 'yes');

        $part = $this->createMimePart($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $part->setDelSp(true);
    }

    public function testFluidInterface()
    {
<<<<<<< HEAD
        $part = $this->_createMimePart($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $part = $this->createMimePart($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $this->assertSame($part,
            $part
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
=======
            ->setChildren([])
>>>>>>> dev
            ->setCharset('utf-8')
            ->setFormat('flowed')
            ->setDelSp(true)
            );
    }

    //abstract
<<<<<<< HEAD
    protected function _createEntity($headers, $encoder, $cache)
    {
        return $this->_createMimePart($headers, $encoder, $cache);
    }

    protected function _createMimePart($headers, $encoder, $cache)
    {
        return new Swift_Mime_MimePart($headers, $encoder, $cache, new Swift_Mime_Grammar());
=======
    protected function createEntity($headers, $encoder, $cache)
    {
        return $this->createMimePart($headers, $encoder, $cache);
    }

    protected function createMimePart($headers, $encoder, $cache)
    {
        $idGenerator = new Swift_Mime_IdGenerator('example.com');

        return new Swift_Mime_MimePart($headers, $encoder, $cache, $idGenerator);
>>>>>>> dev
    }
}
