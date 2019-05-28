<?php

require_once 'swift_required.php';
require_once __DIR__.'/Mime/MimePartAcceptanceTest.php';

class Swift_MimePartAcceptanceTest extends Swift_Mime_MimePartAcceptanceTest
{
<<<<<<< HEAD
    protected function _createMimePart()
=======
    protected function createMimePart()
>>>>>>> dev
    {
        Swift_DependencyContainer::getInstance()
            ->register('properties.charset')->asValue(null);

<<<<<<< HEAD
        return Swift_MimePart::newInstance();
=======
        return new Swift_MimePart();
>>>>>>> dev
    }
}
