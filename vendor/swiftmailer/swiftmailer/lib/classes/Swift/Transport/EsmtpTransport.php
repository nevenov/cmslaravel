<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Sends Messages over SMTP with ESMTP support.
 *
 * @author Chris Corbyn
 */
class Swift_Transport_EsmtpTransport extends Swift_Transport_AbstractSmtpTransport implements Swift_Transport_SmtpAgent
{
    /**
     * ESMTP extension handlers.
     *
     * @var Swift_Transport_EsmtpHandler[]
     */
<<<<<<< HEAD
    private $_handlers = array();
=======
    private $handlers = [];
>>>>>>> dev

    /**
     * ESMTP capabilities.
     *
     * @var string[]
     */
<<<<<<< HEAD
    private $_capabilities = array();
=======
    private $capabilities = [];
>>>>>>> dev

    /**
     * Connection buffer parameters.
     *
     * @var array
     */
<<<<<<< HEAD
    private $_params = array(
=======
    private $params = [
>>>>>>> dev
        'protocol' => 'tcp',
        'host' => 'localhost',
        'port' => 25,
        'timeout' => 30,
        'blocking' => 1,
        'tls' => false,
        'type' => Swift_Transport_IoBuffer::TYPE_SOCKET,
<<<<<<< HEAD
        'stream_context_options' => array(),
        );
=======
        'stream_context_options' => [],
        ];
>>>>>>> dev

    /**
     * Creates a new EsmtpTransport using the given I/O buffer.
     *
<<<<<<< HEAD
     * @param Swift_Transport_IoBuffer       $buf
     * @param Swift_Transport_EsmtpHandler[] $extensionHandlers
     * @param Swift_Events_EventDispatcher   $dispatcher
     */
    public function __construct(Swift_Transport_IoBuffer $buf, array $extensionHandlers, Swift_Events_EventDispatcher $dispatcher)
    {
        parent::__construct($buf, $dispatcher);
=======
     * @param Swift_Transport_EsmtpHandler[] $extensionHandlers
     * @param string                         $localDomain
     */
    public function __construct(Swift_Transport_IoBuffer $buf, array $extensionHandlers, Swift_Events_EventDispatcher $dispatcher, $localDomain = '127.0.0.1', Swift_AddressEncoder $addressEncoder = null)
    {
        parent::__construct($buf, $dispatcher, $localDomain, $addressEncoder);
>>>>>>> dev
        $this->setExtensionHandlers($extensionHandlers);
    }

    /**
     * Set the host to connect to.
     *
<<<<<<< HEAD
=======
     * Literal IPv6 addresses should be wrapped in square brackets.
     *
>>>>>>> dev
     * @param string $host
     *
     * @return $this
     */
    public function setHost($host)
    {
<<<<<<< HEAD
        $this->_params['host'] = $host;
=======
        $this->params['host'] = $host;
>>>>>>> dev

        return $this;
    }

    /**
     * Get the host to connect to.
     *
     * @return string
     */
    public function getHost()
    {
<<<<<<< HEAD
        return $this->_params['host'];
=======
        return $this->params['host'];
>>>>>>> dev
    }

    /**
     * Set the port to connect to.
     *
     * @param int $port
     *
     * @return $this
     */
    public function setPort($port)
    {
<<<<<<< HEAD
        $this->_params['port'] = (int) $port;
=======
        $this->params['port'] = (int) $port;
>>>>>>> dev

        return $this;
    }

    /**
     * Get the port to connect to.
     *
     * @return int
     */
    public function getPort()
    {
<<<<<<< HEAD
        return $this->_params['port'];
=======
        return $this->params['port'];
>>>>>>> dev
    }

    /**
     * Set the connection timeout.
     *
     * @param int $timeout seconds
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
<<<<<<< HEAD
        $this->_params['timeout'] = (int) $timeout;
        $this->_buffer->setParam('timeout', (int) $timeout);
=======
        $this->params['timeout'] = (int) $timeout;
        $this->buffer->setParam('timeout', (int) $timeout);
>>>>>>> dev

        return $this;
    }

    /**
     * Get the connection timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
<<<<<<< HEAD
        return $this->_params['timeout'];
=======
        return $this->params['timeout'];
>>>>>>> dev
    }

    /**
     * Set the encryption type (tls or ssl).
     *
     * @param string $encryption
     *
     * @return $this
     */
    public function setEncryption($encryption)
    {
        $encryption = strtolower($encryption);
        if ('tls' == $encryption) {
<<<<<<< HEAD
            $this->_params['protocol'] = 'tcp';
            $this->_params['tls'] = true;
        } else {
            $this->_params['protocol'] = $encryption;
            $this->_params['tls'] = false;
=======
            $this->params['protocol'] = 'tcp';
            $this->params['tls'] = true;
        } else {
            $this->params['protocol'] = $encryption;
            $this->params['tls'] = false;
>>>>>>> dev
        }

        return $this;
    }

    /**
     * Get the encryption type.
     *
     * @return string
     */
    public function getEncryption()
    {
<<<<<<< HEAD
        return $this->_params['tls'] ? 'tls' : $this->_params['protocol'];
=======
        return $this->params['tls'] ? 'tls' : $this->params['protocol'];
>>>>>>> dev
    }

    /**
     * Sets the stream context options.
     *
     * @param array $options
     *
     * @return $this
     */
    public function setStreamOptions($options)
    {
<<<<<<< HEAD
        $this->_params['stream_context_options'] = $options;
=======
        $this->params['stream_context_options'] = $options;
>>>>>>> dev

        return $this;
    }

    /**
     * Returns the stream context options.
     *
     * @return array
     */
    public function getStreamOptions()
    {
<<<<<<< HEAD
        return $this->_params['stream_context_options'];
=======
        return $this->params['stream_context_options'];
>>>>>>> dev
    }

    /**
     * Sets the source IP.
     *
<<<<<<< HEAD
=======
     * IPv6 addresses should be wrapped in square brackets.
     *
>>>>>>> dev
     * @param string $source
     *
     * @return $this
     */
    public function setSourceIp($source)
    {
<<<<<<< HEAD
        $this->_params['sourceIp'] = $source;
=======
        $this->params['sourceIp'] = $source;
>>>>>>> dev

        return $this;
    }

    /**
     * Returns the IP used to connect to the destination.
     *
     * @return string
     */
    public function getSourceIp()
    {
<<<<<<< HEAD
        return isset($this->_params['sourceIp']) ? $this->_params['sourceIp'] : null;
=======
        return $this->params['sourceIp'] ?? null;
    }

    /**
     * Sets whether SMTP pipelining is enabled.
     *
     * By default, support is auto-detected using the PIPELINING SMTP extension.
     * Use this function to override that in the unlikely event of compatibility
     * issues.
     *
     * @param bool $enabled
     *
     * @return $this
     */
    public function setPipelining($enabled)
    {
        $this->pipelining = $enabled;

        return $this;
    }

    /**
     * Returns whether SMTP pipelining is enabled.
     *
     * @return bool|null a boolean if pipelining is explicitly enabled or disabled,
     *                   or null if support is auto-detected.
     */
    public function getPipelining()
    {
        return $this->pipelining;
>>>>>>> dev
    }

    /**
     * Set ESMTP extension handlers.
     *
     * @param Swift_Transport_EsmtpHandler[] $handlers
     *
     * @return $this
     */
    public function setExtensionHandlers(array $handlers)
    {
<<<<<<< HEAD
        $assoc = array();
        foreach ($handlers as $handler) {
            $assoc[$handler->getHandledKeyword()] = $handler;
        }

        @uasort($assoc, array($this, '_sortHandlers'));
        $this->_handlers = $assoc;
        $this->_setHandlerParams();
=======
        $assoc = [];
        foreach ($handlers as $handler) {
            $assoc[$handler->getHandledKeyword()] = $handler;
        }
        uasort($assoc, function ($a, $b) {
            return $a->getPriorityOver($b->getHandledKeyword());
        });
        $this->handlers = $assoc;
        $this->setHandlerParams();
>>>>>>> dev

        return $this;
    }

    /**
     * Get ESMTP extension handlers.
     *
     * @return Swift_Transport_EsmtpHandler[]
     */
    public function getExtensionHandlers()
    {
<<<<<<< HEAD
        return array_values($this->_handlers);
=======
        return array_values($this->handlers);
>>>>>>> dev
    }

    /**
     * Run a command against the buffer, expecting the given response codes.
     *
     * If no response codes are given, the response will not be validated.
     * If codes are given, an exception will be thrown on an invalid response.
     *
     * @param string   $command
     * @param int[]    $codes
     * @param string[] $failures An array of failures by-reference
<<<<<<< HEAD
     *
     * @return string
     */
    public function executeCommand($command, $codes = array(), &$failures = null)
=======
     * @param bool     $pipeline Do not wait for response
     * @param string   $address  The address, if command is RCPT TO.
     *
     * @return string|null The server response, or null if pipelining is enabled
     */
    public function executeCommand($command, $codes = [], &$failures = null, $pipeline = false, $address = null)
>>>>>>> dev
    {
        $failures = (array) $failures;
        $stopSignal = false;
        $response = null;
<<<<<<< HEAD
        foreach ($this->_getActiveHandlers() as $handler) {
=======
        foreach ($this->getActiveHandlers() as $handler) {
>>>>>>> dev
            $response = $handler->onCommand(
                $this, $command, $codes, $failures, $stopSignal
                );
            if ($stopSignal) {
                return $response;
            }
        }

<<<<<<< HEAD
        return parent::executeCommand($command, $codes, $failures);
=======
        return parent::executeCommand($command, $codes, $failures, $pipeline, $address);
>>>>>>> dev
    }

    /** Mixin handling method for ESMTP handlers */
    public function __call($method, $args)
    {
<<<<<<< HEAD
        foreach ($this->_handlers as $handler) {
            if (in_array(strtolower($method),
                array_map('strtolower', (array) $handler->exposeMixinMethods())
                )) {
                $return = call_user_func_array(array($handler, $method), $args);
                // Allow fluid method calls
                if (null === $return && substr($method, 0, 3) == 'set') {
=======
        foreach ($this->handlers as $handler) {
            if (in_array(strtolower($method),
                array_map('strtolower', (array) $handler->exposeMixinMethods())
                )) {
                $return = call_user_func_array([$handler, $method], $args);
                // Allow fluid method calls
                if (null === $return && 'set' == substr($method, 0, 3)) {
>>>>>>> dev
                    return $this;
                } else {
                    return $return;
                }
            }
        }
        trigger_error('Call to undefined method '.$method, E_USER_ERROR);
    }

    /** Get the params to initialize the buffer */
<<<<<<< HEAD
    protected function _getBufferParams()
    {
        return $this->_params;
    }

    /** Overridden to perform EHLO instead */
    protected function _doHeloCommand()
    {
        try {
            $response = $this->executeCommand(
                sprintf("EHLO %s\r\n", $this->_domain), array(250)
                );
        } catch (Swift_TransportException $e) {
            return parent::_doHeloCommand();
        }

        if ($this->_params['tls']) {
            try {
                $this->executeCommand("STARTTLS\r\n", array(220));

                if (!$this->_buffer->startTLS()) {
=======
    protected function getBufferParams()
    {
        return $this->params;
    }

    /** Overridden to perform EHLO instead */
    protected function doHeloCommand()
    {
        try {
            $response = $this->executeCommand(
                sprintf("EHLO %s\r\n", $this->domain), [250]
                );
        } catch (Swift_TransportException $e) {
            return parent::doHeloCommand();
        }

        if ($this->params['tls']) {
            try {
                $this->executeCommand("STARTTLS\r\n", [220]);

                if (!$this->buffer->startTLS()) {
>>>>>>> dev
                    throw new Swift_TransportException('Unable to connect with TLS encryption');
                }

                try {
                    $response = $this->executeCommand(
<<<<<<< HEAD
                        sprintf("EHLO %s\r\n", $this->_domain), array(250)
                        );
                } catch (Swift_TransportException $e) {
                    return parent::_doHeloCommand();
                }
            } catch (Swift_TransportException $e) {
                $this->_throwException($e);
            }
        }

        $this->_capabilities = $this->_getCapabilities($response);
        $this->_setHandlerParams();
        foreach ($this->_getActiveHandlers() as $handler) {
=======
                        sprintf("EHLO %s\r\n", $this->domain), [250]
                        );
                } catch (Swift_TransportException $e) {
                    return parent::doHeloCommand();
                }
            } catch (Swift_TransportException $e) {
                $this->throwException($e);
            }
        }

        $this->capabilities = $this->getCapabilities($response);
        if (!isset($this->pipelining)) {
            $this->pipelining = isset($this->capabilities['PIPELINING']);
        }

        $this->setHandlerParams();
        foreach ($this->getActiveHandlers() as $handler) {
>>>>>>> dev
            $handler->afterEhlo($this);
        }
    }

    /** Overridden to add Extension support */
<<<<<<< HEAD
    protected function _doMailFromCommand($address)
    {
        $handlers = $this->_getActiveHandlers();
        $params = array();
=======
    protected function doMailFromCommand($address)
    {
        $address = $this->addressEncoder->encodeString($address);
        $handlers = $this->getActiveHandlers();
        $params = [];
>>>>>>> dev
        foreach ($handlers as $handler) {
            $params = array_merge($params, (array) $handler->getMailParams());
        }
        $paramStr = !empty($params) ? ' '.implode(' ', $params) : '';
        $this->executeCommand(
<<<<<<< HEAD
            sprintf("MAIL FROM:<%s>%s\r\n", $address, $paramStr), array(250)
=======
            sprintf("MAIL FROM:<%s>%s\r\n", $address, $paramStr), [250], $failures, true
>>>>>>> dev
            );
    }

    /** Overridden to add Extension support */
<<<<<<< HEAD
    protected function _doRcptToCommand($address)
    {
        $handlers = $this->_getActiveHandlers();
        $params = array();
=======
    protected function doRcptToCommand($address)
    {
        $address = $this->addressEncoder->encodeString($address);
        $handlers = $this->getActiveHandlers();
        $params = [];
>>>>>>> dev
        foreach ($handlers as $handler) {
            $params = array_merge($params, (array) $handler->getRcptParams());
        }
        $paramStr = !empty($params) ? ' '.implode(' ', $params) : '';
        $this->executeCommand(
<<<<<<< HEAD
            sprintf("RCPT TO:<%s>%s\r\n", $address, $paramStr), array(250, 251, 252)
=======
            sprintf("RCPT TO:<%s>%s\r\n", $address, $paramStr), [250, 251, 252], $failures, true, $address
>>>>>>> dev
            );
    }

    /** Determine ESMTP capabilities by function group */
<<<<<<< HEAD
    private function _getCapabilities($ehloResponse)
    {
        $capabilities = array();
=======
    private function getCapabilities($ehloResponse)
    {
        $capabilities = [];
>>>>>>> dev
        $ehloResponse = trim($ehloResponse);
        $lines = explode("\r\n", $ehloResponse);
        array_shift($lines);
        foreach ($lines as $line) {
            if (preg_match('/^[0-9]{3}[ -]([A-Z0-9-]+)((?:[ =].*)?)$/Di', $line, $matches)) {
                $keyword = strtoupper($matches[1]);
                $paramStr = strtoupper(ltrim($matches[2], ' ='));
<<<<<<< HEAD
                $params = !empty($paramStr) ? explode(' ', $paramStr) : array();
=======
                $params = !empty($paramStr) ? explode(' ', $paramStr) : [];
>>>>>>> dev
                $capabilities[$keyword] = $params;
            }
        }

        return $capabilities;
    }

    /** Set parameters which are used by each extension handler */
<<<<<<< HEAD
    private function _setHandlerParams()
    {
        foreach ($this->_handlers as $keyword => $handler) {
            if (array_key_exists($keyword, $this->_capabilities)) {
                $handler->setKeywordParams($this->_capabilities[$keyword]);
=======
    private function setHandlerParams()
    {
        foreach ($this->handlers as $keyword => $handler) {
            if (array_key_exists($keyword, $this->capabilities)) {
                $handler->setKeywordParams($this->capabilities[$keyword]);
>>>>>>> dev
            }
        }
    }

    /** Get ESMTP handlers which are currently ok to use */
<<<<<<< HEAD
    private function _getActiveHandlers()
    {
        $handlers = array();
        foreach ($this->_handlers as $keyword => $handler) {
            if (array_key_exists($keyword, $this->_capabilities)) {
=======
    private function getActiveHandlers()
    {
        $handlers = [];
        foreach ($this->handlers as $keyword => $handler) {
            if (array_key_exists($keyword, $this->capabilities)) {
>>>>>>> dev
                $handlers[] = $handler;
            }
        }

        return $handlers;
    }
<<<<<<< HEAD

    /** Custom sort for extension handler ordering */
    private function _sortHandlers($a, $b)
    {
        return $a->getPriorityOver($b->getHandledKeyword());
    }
=======
>>>>>>> dev
}
