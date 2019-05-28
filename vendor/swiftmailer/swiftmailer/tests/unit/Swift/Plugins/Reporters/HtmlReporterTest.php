<?php

<<<<<<< HEAD
class Swift_Plugins_Reporters_HtmlReporterTest extends \PHPUnit_Framework_TestCase
{
    private $_html;
    private $_message;

    protected function setUp()
    {
        $this->_html = new Swift_Plugins_Reporters_HtmlReporter();
        $this->_message = $this->getMockBuilder('Swift_Mime_Message')->getMock();
=======
class Swift_Plugins_Reporters_HtmlReporterTest extends \PHPUnit\Framework\TestCase
{
    private $html;
    private $message;

    protected function setUp()
    {
        $this->html = new Swift_Plugins_Reporters_HtmlReporter();
        $this->message = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();
>>>>>>> dev
    }

    public function testReportingPass()
    {
        ob_start();
<<<<<<< HEAD
        $this->_html->notify($this->_message, 'foo@bar.tld',
=======
        $this->html->notify($this->message, 'foo@bar.tld',
>>>>>>> dev
            Swift_Plugins_Reporter::RESULT_PASS
            );
        $html = ob_get_clean();

        $this->assertRegExp('~ok|pass~i', $html, '%s: Reporter should indicate pass');
        $this->assertRegExp('~foo@bar\.tld~', $html, '%s: Reporter should show address');
    }

    public function testReportingFail()
    {
        ob_start();
<<<<<<< HEAD
        $this->_html->notify($this->_message, 'zip@button',
=======
        $this->html->notify($this->message, 'zip@button',
>>>>>>> dev
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $html = ob_get_clean();

        $this->assertRegExp('~fail~i', $html, '%s: Reporter should indicate fail');
        $this->assertRegExp('~zip@button~', $html, '%s: Reporter should show address');
    }

    public function testMultipleReports()
    {
        ob_start();
<<<<<<< HEAD
        $this->_html->notify($this->_message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_PASS
            );
        $this->_html->notify($this->_message, 'zip@button',
=======
        $this->html->notify($this->message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_PASS
            );
        $this->html->notify($this->message, 'zip@button',
>>>>>>> dev
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $html = ob_get_clean();

        $this->assertRegExp('~ok|pass~i', $html, '%s: Reporter should indicate pass');
        $this->assertRegExp('~foo@bar\.tld~', $html, '%s: Reporter should show address');
        $this->assertRegExp('~fail~i', $html, '%s: Reporter should indicate fail');
        $this->assertRegExp('~zip@button~', $html, '%s: Reporter should show address');
    }
}
