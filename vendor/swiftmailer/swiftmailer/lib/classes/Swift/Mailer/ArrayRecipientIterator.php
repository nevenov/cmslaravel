<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Wraps a standard PHP array in an iterator.
 *
 * @author Chris Corbyn
 */
class Swift_Mailer_ArrayRecipientIterator implements Swift_Mailer_RecipientIterator
{
    /**
     * The list of recipients.
     *
     * @var array
     */
<<<<<<< HEAD
    private $_recipients = array();

    /**
     * Create a new ArrayRecipientIterator from $recipients.
     *
     * @param array $recipients
     */
    public function __construct(array $recipients)
    {
        $this->_recipients = $recipients;
=======
    private $recipients = [];

    /**
     * Create a new ArrayRecipientIterator from $recipients.
     */
    public function __construct(array $recipients)
    {
        $this->recipients = $recipients;
>>>>>>> dev
    }

    /**
     * Returns true only if there are more recipients to send to.
     *
     * @return bool
     */
    public function hasNext()
    {
<<<<<<< HEAD
        return !empty($this->_recipients);
=======
        return !empty($this->recipients);
>>>>>>> dev
    }

    /**
     * Returns an array where the keys are the addresses of recipients and the
     * values are the names. e.g. ('foo@bar' => 'Foo') or ('foo@bar' => NULL).
     *
     * @return array
     */
    public function nextRecipient()
    {
<<<<<<< HEAD
        return array_splice($this->_recipients, 0, 1);
=======
        return array_splice($this->recipients, 0, 1);
>>>>>>> dev
    }
}
