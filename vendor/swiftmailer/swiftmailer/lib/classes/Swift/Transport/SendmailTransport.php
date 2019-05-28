<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * SendmailTransport for sending mail through a Sendmail/Postfix (etc..) binary.
 *
 * Supported modes are -bs and -t, with any additional flags desired.
 * It is advised to use -bs mode since error reporting with -t mode is not
 * possible.
 *
 * @author Chris Corbyn
 */
class Swift_Transport_SendmailTransport extends Swift_Transport_AbstractSmtpTransport
{
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
        'timeout' => 30,
        'blocking' => 1,
        'command' => '/usr/sbin/sendmail -bs',
        'type' => Swift_Transport_IoBuffer::TYPE_PROCESS,
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

    /**
     * Create a new SendmailTransport with $buf for I/O.
     *
<<<<<<< HEAD
     * @param Swift_Transport_IoBuffer     $buf
     * @param Swift_Events_EventDispatcher $dispatcher
     */
    public function __construct(Swift_Transport_IoBuffer $buf, Swift_Events_EventDispatcher $dispatcher)
    {
        parent::__construct($buf, $dispatcher);
=======
     * @param string $localDomain
     */
    public function __construct(Swift_Transport_IoBuffer $buf, Swift_Events_EventDispatcher $dispatcher, $localDomain = '127.0.0.1', Swift_AddressEncoder $addressEncoder = null)
    {
        parent::__construct($buf, $dispatcher, $localDomain, $addressEncoder);
>>>>>>> dev
    }

    /**
     * Start the standalone SMTP session if running in -bs mode.
     */
    public function start()
    {
        if (false !== strpos($this->getCommand(), ' -bs')) {
            parent::start();
        }
    }

    /**
     * Set the command to invoke.
     *
     * If using -t mode you are strongly advised to include -oi or -i in the flags.
     * For example: /usr/sbin/sendmail -oi -t
     * Swift will append a -f<sender> flag if one is not present.
     *
     * The recommended mode is "-bs" since it is interactive and failure notifications
     * are hence possible.
     *
     * @param string $command
     *
     * @return $this
     */
    public function setCommand($command)
    {
<<<<<<< HEAD
        $this->_params['command'] = $command;
=======
        $this->params['command'] = $command;
>>>>>>> dev

        return $this;
    }

    /**
     * Get the sendmail command which will be invoked.
     *
     * @return string
     */
    public function getCommand()
    {
<<<<<<< HEAD
        return $this->_params['command'];
=======
        return $this->params['command'];
>>>>>>> dev
    }

    /**
     * Send the given Message.
     *
     * Recipient/sender data will be retrieved from the Message API.
     *
     * The return value is the number of recipients who were accepted for delivery.
     * NOTE: If using 'sendmail -t' you will not be aware of any failures until
     * they bounce (i.e. send() will always return 100% success).
     *
<<<<<<< HEAD
     * @param Swift_Mime_Message $message
     * @param string[]           $failedRecipients An array of failures by-reference
     *
     * @return int
     */
    public function send(Swift_Mime_Message $message, &$failedRecipients = null)
=======
     * @param string[] $failedRecipients An array of failures by-reference
     *
     * @return int
     */
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
>>>>>>> dev
    {
        $failedRecipients = (array) $failedRecipients;
        $command = $this->getCommand();
        $buffer = $this->getBuffer();
        $count = 0;

        if (false !== strpos($command, ' -t')) {
<<<<<<< HEAD
            if ($evt = $this->_eventDispatcher->createSendEvent($this, $message)) {
                $this->_eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
=======
            if ($evt = $this->eventDispatcher->createSendEvent($this, $message)) {
                $this->eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
>>>>>>> dev
                if ($evt->bubbleCancelled()) {
                    return 0;
                }
            }

            if (false === strpos($command, ' -f')) {
<<<<<<< HEAD
                $command .= ' -f'.escapeshellarg($this->_getReversePath($message));
            }

            $buffer->initialize(array_merge($this->_params, array('command' => $command)));

            if (false === strpos($command, ' -i') && false === strpos($command, ' -oi')) {
                $buffer->setWriteTranslations(array("\r\n" => "\n", "\n." => "\n.."));
            } else {
                $buffer->setWriteTranslations(array("\r\n" => "\n"));
=======
                $command .= ' -f'.escapeshellarg($this->getReversePath($message));
            }

            $buffer->initialize(array_merge($this->params, ['command' => $command]));

            if (false === strpos($command, ' -i') && false === strpos($command, ' -oi')) {
                $buffer->setWriteTranslations(["\r\n" => "\n", "\n." => "\n.."]);
            } else {
                $buffer->setWriteTranslations(["\r\n" => "\n"]);
>>>>>>> dev
            }

            $count = count((array) $message->getTo())
                + count((array) $message->getCc())
                + count((array) $message->getBcc())
                ;
            $message->toByteStream($buffer);
            $buffer->flushBuffers();
<<<<<<< HEAD
            $buffer->setWriteTranslations(array());
=======
            $buffer->setWriteTranslations([]);
>>>>>>> dev
            $buffer->terminate();

            if ($evt) {
                $evt->setResult(Swift_Events_SendEvent::RESULT_SUCCESS);
                $evt->setFailedRecipients($failedRecipients);
<<<<<<< HEAD
                $this->_eventDispatcher->dispatchEvent($evt, 'sendPerformed');
=======
                $this->eventDispatcher->dispatchEvent($evt, 'sendPerformed');
>>>>>>> dev
            }

            $message->generateId();
        } elseif (false !== strpos($command, ' -bs')) {
            $count = parent::send($message, $failedRecipients);
        } else {
<<<<<<< HEAD
            $this->_throwException(new Swift_TransportException(
=======
            $this->throwException(new Swift_TransportException(
>>>>>>> dev
                'Unsupported sendmail command flags ['.$command.']. '.
                'Must be one of "-bs" or "-t" but can include additional flags.'
                ));
        }

        return $count;
    }

    /** Get the params to initialize the buffer */
<<<<<<< HEAD
    protected function _getBufferParams()
    {
        return $this->_params;
=======
    protected function getBufferParams()
    {
        return $this->params;
>>>>>>> dev
    }
}
