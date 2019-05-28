<?php

<<<<<<< HEAD
class Swift_Bug34Test extends \PHPUnit_Framework_TestCase
=======
class Swift_Bug34Test extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    protected function setUp()
    {
        Swift_Preferences::getInstance()->setCharset('utf-8');
    }

    public function testEmbeddedFilesWithMultipartDataCreateMultipartRelatedContentAsAnAlternative()
    {
<<<<<<< HEAD
        $message = Swift_Message::newInstance();
=======
        $message = new Swift_Message();
>>>>>>> dev
        $message->setCharset('utf-8');
        $message->setSubject('test subject');
        $message->addPart('plain part', 'text/plain');

<<<<<<< HEAD
        $image = Swift_Image::newInstance('<image data>', 'image.gif', 'image/gif');
=======
        $image = new Swift_Image('<image data>', 'image.gif', 'image/gif');
>>>>>>> dev
        $cid = $message->embed($image);

        $message->setBody('<img src="'.$cid.'" />', 'text/html');

<<<<<<< HEAD
        $message->setTo(array('user@domain.tld' => 'User'));

        $message->setFrom(array('other@domain.tld' => 'Other'));
        $message->setSender(array('other@domain.tld' => 'Other'));

        $id = $message->getId();
        $date = preg_quote(date('r', $message->getDate()), '~');
=======
        $message->setTo(['user@domain.tld' => 'User']);

        $message->setFrom(['other@domain.tld' => 'Other']);
        $message->setSender(['other@domain.tld' => 'Other']);

        $id = $message->getId();
        $date = preg_quote($message->getDate()->format('r'), '~');
>>>>>>> dev
        $boundary = $message->getBoundary();
        $cidVal = $image->getId();

        $this->assertRegExp(
        '~^'.
        'Sender: Other <other@domain.tld>'."\r\n".
        'Message-ID: <'.$id.'>'."\r\n".
        'Date: '.$date."\r\n".
        'Subject: test subject'."\r\n".
        'From: Other <other@domain.tld>'."\r\n".
        'To: User <user@domain.tld>'."\r\n".
        'MIME-Version: 1.0'."\r\n".
        'Content-Type: multipart/alternative;'."\r\n".
        ' boundary="'.$boundary.'"'."\r\n".
        "\r\n\r\n".
        '--'.$boundary."\r\n".
        'Content-Type: text/plain; charset=utf-8'."\r\n".
        'Content-Transfer-Encoding: quoted-printable'."\r\n".
        "\r\n".
        'plain part'.
        "\r\n\r\n".
        '--'.$boundary."\r\n".
        'Content-Type: multipart/related;'."\r\n".
        ' boundary="(.*?)"'."\r\n".
        "\r\n\r\n".
        '--\\1'."\r\n".
        'Content-Type: text/html; charset=utf-8'."\r\n".
        'Content-Transfer-Encoding: quoted-printable'."\r\n".
        "\r\n".
        '<img.*?/>'.
        "\r\n\r\n".
        '--\\1'."\r\n".
        'Content-Type: image/gif; name=image.gif'."\r\n".
        'Content-Transfer-Encoding: base64'."\r\n".
        'Content-ID: <'.$cidVal.'>'."\r\n".
        'Content-Disposition: inline; filename=image.gif'."\r\n".
        "\r\n".
        preg_quote(base64_encode('<image data>'), '~').
        "\r\n\r\n".
        '--\\1--'."\r\n".
        "\r\n\r\n".
        '--'.$boundary.'--'."\r\n".
        '$~D',
        $message->toString()
        );
    }
}
