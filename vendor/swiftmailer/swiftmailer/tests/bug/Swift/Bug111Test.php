<?php

<<<<<<< HEAD
class Swift_Bug111Test extends \PHPUnit_Framework_TestCase
{
    public function testUnstructuredHeaderSlashesShouldNotBeEscaped()
    {
        $complicated_header = array(
            'to' => array(
=======
class Swift_Bug111Test extends \PHPUnit\Framework\TestCase
{
    public function testUnstructuredHeaderSlashesShouldNotBeEscaped()
    {
        $complicated_header = [
            'to' => [
>>>>>>> dev
                'email1@example.com',
                'email2@example.com',
                'email3@example.com',
                'email4@example.com',
                'email5@example.com',
<<<<<<< HEAD
            ),
            'sub' => array(
                '-name-' => array(
=======
            ],
            'sub' => [
                '-name-' => [
>>>>>>> dev
                    'email1',
                    '"email2"',
                    'email3\\',
                    'email4',
                    'email5',
<<<<<<< HEAD
                ),
                '-url-' => array(
=======
                ],
                '-url-' => [
>>>>>>> dev
                    'http://google.com',
                    'http://yahoo.com',
                    'http://hotmail.com',
                    'http://aol.com',
                    'http://facebook.com',
<<<<<<< HEAD
                ),
            ),
        );
=======
                ],
            ],
        ];
>>>>>>> dev
        $json = json_encode($complicated_header);

        $message = new Swift_Message();
        $headers = $message->getHeaders();
        $headers->addTextHeader('X-SMTPAPI', $json);
        $header = $headers->get('X-SMTPAPI');

        $this->assertEquals('Swift_Mime_Headers_UnstructuredHeader', get_class($header));
        $this->assertEquals($json, $header->getFieldBody());
    }
}
