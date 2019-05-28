<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Makes sure a connection to a POP3 host has been established prior to connecting to SMTP.
 *
<<<<<<< HEAD
 * @author Chris Corbyn
=======
 * @author     Chris Corbyn
>>>>>>> dev
 */
class Swift_Plugins_PopBeforeSmtpPlugin implements Swift_Events_TransportChangeListener, Swift_Plugins_Pop_Pop3Connection
{
    /** A delegate connection to use (mostly a test hook) */
<<<<<<< HEAD
    private $_connection;

    /** Hostname of the POP3 server */
    private $_host;

    /** Port number to connect on */
    private $_port;

    /** Encryption type to use (if any) */
    private $_crypto;

    /** Username to use (if any) */
    private $_username;

    /** Password to use (if any) */
    private $_password;

    /** Established connection via TCP socket */
    private $_socket;

    /** Connect timeout in seconds */
    private $_timeout = 10;

    /** SMTP Transport to bind to */
    private $_transport;
=======
    private $connection;

    /** Hostname of the POP3 server */
    private $host;

    /** Port number to connect on */
    private $port;

    /** Encryption type to use (if any) */
    private $crypto;

    /** Username to use (if any) */
    private $username;

    /** Password to use (if any) */
    private $password;

    /** Established connection via TCP socket */
    private $socket;

    /** Connect timeout in seconds */
    private $timeout = 10;

    /** SMTP Transport to bind to */
    private $transport;
>>>>>>> dev

    /**
     * Create a new PopBeforeSmtpPlugin for $host and $port.
     *
<<<<<<< HEAD
     * @param string $host
=======
     * @param string $host   Hostname or IP. Literal IPv6 addresses should be
     *                       wrapped in square brackets.
>>>>>>> dev
     * @param int    $port
     * @param string $crypto as "tls" or "ssl"
     */
    public function __construct($host, $port = 110, $crypto = null)
    {
<<<<<<< HEAD
        $this->_host = $host;
        $this->_port = $port;
        $this->_crypto = $crypto;
    }

    /**
     * Create a new PopBeforeSmtpPlugin for $host and $port.
     *
     * @param string $host
     * @param int    $port
     * @param string $crypto as "tls" or "ssl"
     *
     * @return self
     */
    public static function newInstance($host, $port = 110, $crypto = null)
    {
        return new self($host, $port, $crypto);
=======
        $this->host = $host;
        $this->port = $port;
        $this->crypto = $crypto;
>>>>>>> dev
    }

    /**
     * Set a Pop3Connection to delegate to instead of connecting directly.
     *
<<<<<<< HEAD
     * @param Swift_Plugins_Pop_Pop3Connection $connection
     *
=======
>>>>>>> dev
     * @return $this
     */
    public function setConnection(Swift_Plugins_Pop_Pop3Connection $connection)
    {
<<<<<<< HEAD
        $this->_connection = $connection;
=======
        $this->connection = $connection;
>>>>>>> dev

        return $this;
    }

    /**
     * Bind this plugin to a specific SMTP transport instance.
<<<<<<< HEAD
     *
     * @param Swift_Transport
     */
    public function bindSmtp(Swift_Transport $smtp)
    {
        $this->_transport = $smtp;
=======
     */
    public function bindSmtp(Swift_Transport $smtp)
    {
        $this->transport = $smtp;
>>>>>>> dev
    }

    /**
     * Set the connection timeout in seconds (default 10).
     *
     * @param int $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
<<<<<<< HEAD
        $this->_timeout = (int) $timeout;
=======
        $this->timeout = (int) $timeout;
>>>>>>> dev

        return $this;
    }

    /**
     * Set the username to use when connecting (if needed).
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
<<<<<<< HEAD
        $this->_username = $username;
=======
        $this->username = $username;
>>>>>>> dev

        return $this;
    }

    /**
     * Set the password to use when connecting (if needed).
     *
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
<<<<<<< HEAD
        $this->_password = $password;
=======
        $this->password = $password;
>>>>>>> dev

        return $this;
    }

    /**
     * Connect to the POP3 host and authenticate.
     *
     * @throws Swift_Plugins_Pop_Pop3Exception if connection fails
     */
    public function connect()
    {
<<<<<<< HEAD
        if (isset($this->_connection)) {
            $this->_connection->connect();
        } else {
            if (!isset($this->_socket)) {
                if (!$socket = fsockopen(
                    $this->_getHostString(), $this->_port, $errno, $errstr, $this->_timeout)) {
                    throw new Swift_Plugins_Pop_Pop3Exception(
                        sprintf('Failed to connect to POP3 host [%s]: %s', $this->_host, $errstr)
                    );
                }
                $this->_socket = $socket;

                if (false === $greeting = fgets($this->_socket)) {
=======
        if (isset($this->connection)) {
            $this->connection->connect();
        } else {
            if (!isset($this->socket)) {
                if (!$socket = fsockopen(
                    $this->getHostString(), $this->port, $errno, $errstr, $this->timeout)) {
                    throw new Swift_Plugins_Pop_Pop3Exception(
                        sprintf('Failed to connect to POP3 host [%s]: %s', $this->host, $errstr)
                    );
                }
                $this->socket = $socket;

                if (false === $greeting = fgets($this->socket)) {
>>>>>>> dev
                    throw new Swift_Plugins_Pop_Pop3Exception(
                        sprintf('Failed to connect to POP3 host [%s]', trim($greeting))
                    );
                }

<<<<<<< HEAD
                $this->_assertOk($greeting);

                if ($this->_username) {
                    $this->_command(sprintf("USER %s\r\n", $this->_username));
                    $this->_command(sprintf("PASS %s\r\n", $this->_password));
=======
                $this->assertOk($greeting);

                if ($this->username) {
                    $this->command(sprintf("USER %s\r\n", $this->username));
                    $this->command(sprintf("PASS %s\r\n", $this->password));
>>>>>>> dev
                }
            }
        }
    }

    /**
     * Disconnect from the POP3 host.
     */
    public function disconnect()
    {
<<<<<<< HEAD
        if (isset($this->_connection)) {
            $this->_connection->disconnect();
        } else {
            $this->_command("QUIT\r\n");
            if (!fclose($this->_socket)) {
                throw new Swift_Plugins_Pop_Pop3Exception(
                    sprintf('POP3 host [%s] connection could not be stopped', $this->_host)
                );
            }
            $this->_socket = null;
=======
        if (isset($this->connection)) {
            $this->connection->disconnect();
        } else {
            $this->command("QUIT\r\n");
            if (!fclose($this->socket)) {
                throw new Swift_Plugins_Pop_Pop3Exception(
                    sprintf('POP3 host [%s] connection could not be stopped', $this->host)
                );
            }
            $this->socket = null;
>>>>>>> dev
        }
    }

    /**
     * Invoked just before a Transport is started.
<<<<<<< HEAD
     *
     * @param Swift_Events_TransportChangeEvent $evt
     */
    public function beforeTransportStarted(Swift_Events_TransportChangeEvent $evt)
    {
        if (isset($this->_transport)) {
            if ($this->_transport !== $evt->getTransport()) {
=======
     */
    public function beforeTransportStarted(Swift_Events_TransportChangeEvent $evt)
    {
        if (isset($this->transport)) {
            if ($this->transport !== $evt->getTransport()) {
>>>>>>> dev
                return;
            }
        }

        $this->connect();
        $this->disconnect();
    }

    /**
     * Not used.
     */
    public function transportStarted(Swift_Events_TransportChangeEvent $evt)
    {
    }

    /**
     * Not used.
     */
    public function beforeTransportStopped(Swift_Events_TransportChangeEvent $evt)
    {
    }

    /**
     * Not used.
     */
    public function transportStopped(Swift_Events_TransportChangeEvent $evt)
    {
    }

<<<<<<< HEAD
    private function _command($command)
    {
        if (!fwrite($this->_socket, $command)) {
=======
    private function command($command)
    {
        if (!fwrite($this->socket, $command)) {
>>>>>>> dev
            throw new Swift_Plugins_Pop_Pop3Exception(
                sprintf('Failed to write command [%s] to POP3 host', trim($command))
            );
        }

<<<<<<< HEAD
        if (false === $response = fgets($this->_socket)) {
=======
        if (false === $response = fgets($this->socket)) {
>>>>>>> dev
            throw new Swift_Plugins_Pop_Pop3Exception(
                sprintf('Failed to read from POP3 host after command [%s]', trim($command))
            );
        }

<<<<<<< HEAD
        $this->_assertOk($response);
=======
        $this->assertOk($response);
>>>>>>> dev

        return $response;
    }

<<<<<<< HEAD
    private function _assertOk($response)
    {
        if (substr($response, 0, 3) != '+OK') {
=======
    private function assertOk($response)
    {
        if ('+OK' != substr($response, 0, 3)) {
>>>>>>> dev
            throw new Swift_Plugins_Pop_Pop3Exception(
                sprintf('POP3 command failed [%s]', trim($response))
            );
        }
    }

<<<<<<< HEAD
    private function _getHostString()
    {
        $host = $this->_host;
        switch (strtolower($this->_crypto)) {
=======
    private function getHostString()
    {
        $host = $this->host;
        switch (strtolower($this->crypto)) {
>>>>>>> dev
            case 'ssl':
                $host = 'ssl://'.$host;
                break;

            case 'tls':
                $host = 'tls://'.$host;
                break;
        }

        return $host;
    }
}
