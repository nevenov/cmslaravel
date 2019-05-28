<?php

<<<<<<< HEAD
class Swift_Plugins_PopBeforeSmtpPluginTest extends \PHPUnit_Framework_TestCase
{
    public function testPluginConnectsToPop3HostBeforeTransportStarts()
    {
        $connection = $this->_createConnection();
        $connection->expects($this->once())
                   ->method('connect');

        $plugin = $this->_createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);

        $transport = $this->_createTransport();
        $evt = $this->_createTransportChangeEvent($transport);
=======
class Swift_Plugins_PopBeforeSmtpPluginTest extends \PHPUnit\Framework\TestCase
{
    public function testPluginConnectsToPop3HostBeforeTransportStarts()
    {
        $connection = $this->createConnection();
        $connection->expects($this->once())
                   ->method('connect');

        $plugin = $this->createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);

        $transport = $this->createTransport();
        $evt = $this->createTransportChangeEvent($transport);
>>>>>>> dev

        $plugin->beforeTransportStarted($evt);
    }

    public function testPluginDisconnectsFromPop3HostBeforeTransportStarts()
    {
<<<<<<< HEAD
        $connection = $this->_createConnection();
        $connection->expects($this->once())
                   ->method('disconnect');

        $plugin = $this->_createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);

        $transport = $this->_createTransport();
        $evt = $this->_createTransportChangeEvent($transport);
=======
        $connection = $this->createConnection();
        $connection->expects($this->once())
                   ->method('disconnect');

        $plugin = $this->createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);

        $transport = $this->createTransport();
        $evt = $this->createTransportChangeEvent($transport);
>>>>>>> dev

        $plugin->beforeTransportStarted($evt);
    }

    public function testPluginDoesNotConnectToSmtpIfBoundToDifferentTransport()
    {
<<<<<<< HEAD
        $connection = $this->_createConnection();
=======
        $connection = $this->createConnection();
>>>>>>> dev
        $connection->expects($this->never())
                   ->method('disconnect');
        $connection->expects($this->never())
                   ->method('connect');

<<<<<<< HEAD
        $smtp = $this->_createTransport();

        $plugin = $this->_createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);
        $plugin->bindSmtp($smtp);

        $transport = $this->_createTransport();
        $evt = $this->_createTransportChangeEvent($transport);
=======
        $smtp = $this->createTransport();

        $plugin = $this->createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);
        $plugin->bindSmtp($smtp);

        $transport = $this->createTransport();
        $evt = $this->createTransportChangeEvent($transport);
>>>>>>> dev

        $plugin->beforeTransportStarted($evt);
    }

    public function testPluginCanBindToSpecificTransport()
    {
<<<<<<< HEAD
        $connection = $this->_createConnection();
        $connection->expects($this->once())
                   ->method('connect');

        $smtp = $this->_createTransport();

        $plugin = $this->_createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);
        $plugin->bindSmtp($smtp);

        $evt = $this->_createTransportChangeEvent($smtp);
=======
        $connection = $this->createConnection();
        $connection->expects($this->once())
                   ->method('connect');

        $smtp = $this->createTransport();

        $plugin = $this->createPlugin('pop.host.tld', 110);
        $plugin->setConnection($connection);
        $plugin->bindSmtp($smtp);

        $evt = $this->createTransportChangeEvent($smtp);
>>>>>>> dev

        $plugin->beforeTransportStarted($evt);
    }

<<<<<<< HEAD
    private function _createTransport()
=======
    private function createTransport()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Transport')->getMock();
    }

<<<<<<< HEAD
    private function _createTransportChangeEvent($transport)
=======
    private function createTransportChangeEvent($transport)
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_TransportChangeEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getSource')
            ->will($this->returnValue($transport));
        $evt->expects($this->any())
            ->method('getTransport')
            ->will($this->returnValue($transport));

        return $evt;
    }

<<<<<<< HEAD
    public function _createConnection()
=======
    public function createConnection()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Plugins_Pop_Pop3Connection')->getMock();
    }

<<<<<<< HEAD
    public function _createPlugin($host, $port, $crypto = null)
=======
    public function createPlugin($host, $port, $crypto = null)
>>>>>>> dev
    {
        return new Swift_Plugins_PopBeforeSmtpPlugin($host, $port, $crypto);
    }
}
