<?php

<<<<<<< HEAD
=======

>>>>>>> dev
class Swift_Mime_AttachmentTest extends Swift_Mime_AbstractMimeEntityTest
{
    public function testNestingLevelIsAttachment()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(
            Swift_Mime_MimeEntity::LEVEL_MIXED, $attachment->getNestingLevel()
=======
        $attachment = $this->createAttachment($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(
            Swift_Mime_SimpleMimeEntity::LEVEL_MIXED, $attachment->getNestingLevel()
>>>>>>> dev
            );
    }

    public function testDispositionIsReturnedFromHeader()
    {
        /* -- RFC 2183, 2.1, 2.2.
     */

<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment');
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment');
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('attachment', $attachment->getDisposition());
    }

    public function testDispositionIsSetInHeader()
    {
<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array(), false
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            [], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setFieldBodyModel')
                    ->once()
                    ->with('inline');
        $disposition->shouldReceive('setFieldBodyModel')
                    ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setDisposition('inline');
    }

    public function testDispositionIsAddedIfNonePresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addParameterizedHeader')
                ->once()
                ->with('Content-Disposition', 'inline');
        $headers->shouldReceive('addParameterizedHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $attachment = $this->createAttachment($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $attachment->setDisposition('inline');
    }

    public function testDispositionIsAutoDefaultedToAttachment()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addParameterizedHeader')
                ->once()
                ->with('Content-Disposition', 'attachment');
        $headers->shouldReceive('addParameterizedHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $attachment = $this->createAttachment($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
    }

    public function testDefaultContentTypeInitializedToOctetStream()
    {
<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', '',
            array(), false
=======
        $cType = $this->createHeader('Content-Type', '',
            [], false
>>>>>>> dev
            );
        $cType->shouldReceive('setFieldBodyModel')
              ->once()
              ->with('application/octet-stream');
        $cType->shouldReceive('setFieldBodyModel')
              ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
    }

    public function testFilenameIsReturnedFromHeader()
    {
        /* -- RFC 2183, 2.3.
     */

<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('filename' => 'foo.txt')
            );
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['filename' => 'foo.txt']
            );
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('foo.txt', $attachment->getFilename());
    }

    public function testFilenameIsSetInHeader()
    {
<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('filename' => 'foo.txt'), false
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['filename' => 'foo.txt'], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setParameter')
                    ->once()
                    ->with('filename', 'bar.txt');
        $disposition->shouldReceive('setParameter')
                    ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setFilename('bar.txt');
    }

    public function testSettingFilenameSetsNameInContentType()
    {
        /*
     This is a legacy requirement which isn't covered by up-to-date RFCs.
     */

<<<<<<< HEAD
        $cType = $this->_createHeader('Content-Type', 'text/plain',
            array(), false
=======
        $cType = $this->createHeader('Content-Type', 'text/plain',
            [], false
>>>>>>> dev
            );
        $cType->shouldReceive('setParameter')
              ->once()
              ->with('name', 'bar.txt');
        $cType->shouldReceive('setParameter')
              ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Type' => $cType, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Type' => $cType, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setFilename('bar.txt');
    }

    public function testSizeIsReturnedFromHeader()
    {
        /* -- RFC 2183, 2.7.
     */

<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('size' => 1234)
            );
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['size' => 1234]
            );
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals(1234, $attachment->getSize());
    }

    public function testSizeIsSetInHeader()
    {
<<<<<<< HEAD
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array(), false
=======
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            [], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setParameter')
                    ->once()
                    ->with('size', 12345);
        $disposition->shouldReceive('setParameter')
                    ->zeroOrMoreTimes();

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setSize(12345);
    }

    public function testFilnameCanBeReadFromFileStream()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream('/bar/file.ext', '');
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('filename' => 'foo.txt'), false
=======
        $file = $this->createFileStream('/bar/file.ext', '');
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['filename' => 'foo.txt'], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setParameter')
                    ->once()
                    ->with('filename', 'file.ext');

<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(array(
            'Content-Disposition' => $disposition, )),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet([
            'Content-Disposition' => $disposition, ]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setFile($file);
    }

    public function testContentTypeCanBeSetViaSetFile()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream('/bar/file.ext', '');
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('filename' => 'foo.txt'), false
=======
        $file = $this->createFileStream('/bar/file.ext', '');
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['filename' => 'foo.txt'], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setParameter')
                    ->once()
                    ->with('filename', 'file.ext');

<<<<<<< HEAD
        $ctype = $this->_createHeader('Content-Type', 'text/plain', array(), false);
=======
        $ctype = $this->createHeader('Content-Type', 'text/plain', [], false);
>>>>>>> dev
        $ctype->shouldReceive('setFieldBodyModel')
              ->once()
              ->with('text/html');
        $ctype->shouldReceive('setFieldBodyModel')
              ->zeroOrMoreTimes();

<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(
            'Content-Disposition' => $disposition,
            'Content-Type' => $ctype,
            ));

        $attachment = $this->_createAttachment($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([
            'Content-Disposition' => $disposition,
            'Content-Type' => $ctype,
            ]);

        $attachment = $this->createAttachment($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $attachment->setFile($file, 'text/html');
    }

    public function XtestContentTypeCanBeLookedUpFromCommonListIfNotProvided()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream('/bar/file.zip', '');
        $disposition = $this->_createHeader('Content-Disposition', 'attachment',
            array('filename' => 'foo.zip'), false
=======
        $file = $this->createFileStream('/bar/file.zip', '');
        $disposition = $this->createHeader('Content-Disposition', 'attachment',
            ['filename' => 'foo.zip'], false
>>>>>>> dev
            );
        $disposition->shouldReceive('setParameter')
                    ->once()
                    ->with('filename', 'file.zip');

<<<<<<< HEAD
        $ctype = $this->_createHeader('Content-Type', 'text/plain', array(), false);
=======
        $ctype = $this->createHeader('Content-Type', 'text/plain', [], false);
>>>>>>> dev
        $ctype->shouldReceive('setFieldBodyModel')
              ->once()
              ->with('application/zip');
        $ctype->shouldReceive('setFieldBodyModel')
              ->zeroOrMoreTimes();

<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(
            'Content-Disposition' => $disposition,
            'Content-Type' => $ctype,
            ));

        $attachment = $this->_createAttachment($headers, $this->_createEncoder(),
            $this->_createCache(), array('zip' => 'application/zip', 'txt' => 'text/plain')
=======
        $headers = $this->createHeaderSet([
            'Content-Disposition' => $disposition,
            'Content-Type' => $ctype,
            ]);

        $attachment = $this->createAttachment($headers, $this->createEncoder(),
            $this->createCache(), ['zip' => 'application/zip', 'txt' => 'text/plain']
>>>>>>> dev
            );
        $attachment->setFile($file);
    }

    public function testDataCanBeReadFromFile()
    {
<<<<<<< HEAD
        $file = $this->_createFileStream('/foo/file.ext', '<some data>');
        $attachment = $this->_createAttachment($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $file = $this->createFileStream('/foo/file.ext', '<some data>');
        $attachment = $this->createAttachment($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $attachment->setFile($file);
        $this->assertEquals('<some data>', $attachment->getBody());
    }

    public function testFluidInterface()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $attachment = $this->createAttachment($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertSame($attachment,
            $attachment
            ->setContentType('application/pdf')
<<<<<<< HEAD
            ->setEncoder($this->_createEncoder())
=======
            ->setEncoder($this->createEncoder())
>>>>>>> dev
            ->setId('foo@bar')
            ->setDescription('my pdf')
            ->setMaxLineLength(998)
            ->setBody('xx')
            ->setBoundary('xyz')
<<<<<<< HEAD
            ->setChildren(array())
            ->setDisposition('inline')
            ->setFilename('afile.txt')
            ->setSize(123)
            ->setFile($this->_createFileStream('foo.txt', ''))
            );
    }

    protected function _createEntity($headers, $encoder, $cache)
    {
        return $this->_createAttachment($headers, $encoder, $cache);
    }

    protected function _createAttachment($headers, $encoder, $cache, $mimeTypes = array())
    {
        return new Swift_Mime_Attachment($headers, $encoder, $cache, new Swift_Mime_Grammar(), $mimeTypes);
    }

    protected function _createFileStream($path, $data, $stub = true)
=======
            ->setChildren([])
            ->setDisposition('inline')
            ->setFilename('afile.txt')
            ->setSize(123)
            ->setFile($this->createFileStream('foo.txt', ''))
            );
    }

    protected function createEntity($headers, $encoder, $cache)
    {
        return $this->createAttachment($headers, $encoder, $cache);
    }

    protected function createAttachment($headers, $encoder, $cache, $mimeTypes = [])
    {
        $idGenerator = new Swift_Mime_IdGenerator('example.com');

        return new Swift_Mime_Attachment($headers, $encoder, $cache, $idGenerator, $mimeTypes);
    }

    protected function createFileStream($path, $data, $stub = true)
>>>>>>> dev
    {
        $file = $this->getMockery('Swift_FileStream');
        $file->shouldReceive('getPath')
             ->zeroOrMoreTimes()
             ->andReturn($path);
        $file->shouldReceive('read')
             ->zeroOrMoreTimes()
             ->andReturnUsing(function () use ($data) {
                 static $first = true;
                 if (!$first) {
                     return false;
                 }

                 $first = false;

                 return $data;
             });
        $file->shouldReceive('setReadPointer')
             ->zeroOrMoreTimes();

        return $file;
    }
}
