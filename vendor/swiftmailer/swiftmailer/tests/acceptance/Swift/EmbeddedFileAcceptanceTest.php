<?php

require_once 'swift_required.php';
require_once __DIR__.'/Mime/EmbeddedFileAcceptanceTest.php';

class Swift_EmbeddedFileAcceptanceTest extends Swift_Mime_EmbeddedFileAcceptanceTest
{
<<<<<<< HEAD
    protected function _createEmbeddedFile()
    {
        return Swift_EmbeddedFile::newInstance();
=======
    protected function createEmbeddedFile()
    {
        return new Swift_EmbeddedFile();
>>>>>>> dev
    }
}
