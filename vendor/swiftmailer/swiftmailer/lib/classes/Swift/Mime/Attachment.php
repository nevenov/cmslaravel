<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * An attachment, in a multipart message.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_Attachment extends Swift_Mime_SimpleMimeEntity
{
    /** Recognized MIME types */
<<<<<<< HEAD
    private $_mimeTypes = array();
=======
    private $mimeTypes = [];
>>>>>>> dev

    /**
     * Create a new Attachment with $headers, $encoder and $cache.
     *
<<<<<<< HEAD
     * @param Swift_Mime_HeaderSet      $headers
     * @param Swift_Mime_ContentEncoder $encoder
     * @param Swift_KeyCache            $cache
     * @param Swift_Mime_Grammar        $grammar
     * @param array                     $mimeTypes optional
     */
    public function __construct(Swift_Mime_HeaderSet $headers, Swift_Mime_ContentEncoder $encoder, Swift_KeyCache $cache, Swift_Mime_Grammar $grammar, $mimeTypes = array())
    {
        parent::__construct($headers, $encoder, $cache, $grammar);
        $this->setDisposition('attachment');
        $this->setContentType('application/octet-stream');
        $this->_mimeTypes = $mimeTypes;
=======
     * @param array $mimeTypes
     */
    public function __construct(Swift_Mime_SimpleHeaderSet $headers, Swift_Mime_ContentEncoder $encoder, Swift_KeyCache $cache, Swift_IdGenerator $idGenerator, $mimeTypes = [])
    {
        parent::__construct($headers, $encoder, $cache, $idGenerator);
        $this->setDisposition('attachment');
        $this->setContentType('application/octet-stream');
        $this->mimeTypes = $mimeTypes;
>>>>>>> dev
    }

    /**
     * Get the nesting level used for this attachment.
     *
     * Always returns {@link LEVEL_MIXED}.
     *
     * @return int
     */
    public function getNestingLevel()
    {
        return self::LEVEL_MIXED;
    }

    /**
     * Get the Content-Disposition of this attachment.
     *
     * By default attachments have a disposition of "attachment".
     *
     * @return string
     */
    public function getDisposition()
    {
<<<<<<< HEAD
        return $this->_getHeaderFieldModel('Content-Disposition');
=======
        return $this->getHeaderFieldModel('Content-Disposition');
>>>>>>> dev
    }

    /**
     * Set the Content-Disposition of this attachment.
     *
     * @param string $disposition
     *
     * @return $this
     */
    public function setDisposition($disposition)
    {
<<<<<<< HEAD
        if (!$this->_setHeaderFieldModel('Content-Disposition', $disposition)) {
=======
        if (!$this->setHeaderFieldModel('Content-Disposition', $disposition)) {
>>>>>>> dev
            $this->getHeaders()->addParameterizedHeader('Content-Disposition', $disposition);
        }

        return $this;
    }

    /**
     * Get the filename of this attachment when downloaded.
     *
     * @return string
     */
    public function getFilename()
    {
<<<<<<< HEAD
        return $this->_getHeaderParameter('Content-Disposition', 'filename');
=======
        return $this->getHeaderParameter('Content-Disposition', 'filename');
>>>>>>> dev
    }

    /**
     * Set the filename of this attachment.
     *
     * @param string $filename
     *
     * @return $this
     */
    public function setFilename($filename)
    {
<<<<<<< HEAD
        $this->_setHeaderParameter('Content-Disposition', 'filename', $filename);
        $this->_setHeaderParameter('Content-Type', 'name', $filename);
=======
        $this->setHeaderParameter('Content-Disposition', 'filename', $filename);
        $this->setHeaderParameter('Content-Type', 'name', $filename);
>>>>>>> dev

        return $this;
    }

    /**
     * Get the file size of this attachment.
     *
     * @return int
     */
    public function getSize()
    {
<<<<<<< HEAD
        return $this->_getHeaderParameter('Content-Disposition', 'size');
=======
        return $this->getHeaderParameter('Content-Disposition', 'size');
>>>>>>> dev
    }

    /**
     * Set the file size of this attachment.
     *
     * @param int $size
     *
     * @return $this
     */
    public function setSize($size)
    {
<<<<<<< HEAD
        $this->_setHeaderParameter('Content-Disposition', 'size', $size);
=======
        $this->setHeaderParameter('Content-Disposition', 'size', $size);
>>>>>>> dev

        return $this;
    }

    /**
     * Set the file that this attachment is for.
     *
<<<<<<< HEAD
     * @param Swift_FileStream $file
     * @param string           $contentType optional
=======
     * @param string $contentType optional
>>>>>>> dev
     *
     * @return $this
     */
    public function setFile(Swift_FileStream $file, $contentType = null)
    {
        $this->setFilename(basename($file->getPath()));
        $this->setBody($file, $contentType);
        if (!isset($contentType)) {
            $extension = strtolower(substr($file->getPath(), strrpos($file->getPath(), '.') + 1));

<<<<<<< HEAD
            if (array_key_exists($extension, $this->_mimeTypes)) {
                $this->setContentType($this->_mimeTypes[$extension]);
=======
            if (array_key_exists($extension, $this->mimeTypes)) {
                $this->setContentType($this->mimeTypes[$extension]);
>>>>>>> dev
            }
        }

        return $this;
    }
}
