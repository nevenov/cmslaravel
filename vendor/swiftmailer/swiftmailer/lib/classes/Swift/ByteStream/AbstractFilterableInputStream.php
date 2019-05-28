<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Provides the base functionality for an InputStream supporting filters.
 *
 * @author Chris Corbyn
 */
abstract class Swift_ByteStream_AbstractFilterableInputStream implements Swift_InputByteStream, Swift_Filterable
{
    /**
     * Write sequence.
     */
<<<<<<< HEAD
    protected $_sequence = 0;
=======
    protected $sequence = 0;
>>>>>>> dev

    /**
     * StreamFilters.
     *
     * @var Swift_StreamFilter[]
     */
<<<<<<< HEAD
    private $_filters = array();
=======
    private $filters = [];
>>>>>>> dev

    /**
     * A buffer for writing.
     */
<<<<<<< HEAD
    private $_writeBuffer = '';
=======
    private $writeBuffer = '';
>>>>>>> dev

    /**
     * Bound streams.
     *
     * @var Swift_InputByteStream[]
     */
<<<<<<< HEAD
    private $_mirrors = array();
=======
    private $mirrors = [];
>>>>>>> dev

    /**
     * Commit the given bytes to the storage medium immediately.
     *
     * @param string $bytes
     */
<<<<<<< HEAD
    abstract protected function _commit($bytes);
=======
    abstract protected function doCommit($bytes);
>>>>>>> dev

    /**
     * Flush any buffers/content with immediate effect.
     */
<<<<<<< HEAD
    abstract protected function _flush();
=======
    abstract protected function flush();
>>>>>>> dev

    /**
     * Add a StreamFilter to this InputByteStream.
     *
<<<<<<< HEAD
     * @param Swift_StreamFilter $filter
     * @param string             $key
     */
    public function addFilter(Swift_StreamFilter $filter, $key)
    {
        $this->_filters[$key] = $filter;
=======
     * @param string $key
     */
    public function addFilter(Swift_StreamFilter $filter, $key)
    {
        $this->filters[$key] = $filter;
>>>>>>> dev
    }

    /**
     * Remove an already present StreamFilter based on its $key.
     *
     * @param string $key
     */
    public function removeFilter($key)
    {
<<<<<<< HEAD
        unset($this->_filters[$key]);
=======
        unset($this->filters[$key]);
>>>>>>> dev
    }

    /**
     * Writes $bytes to the end of the stream.
     *
     * @param string $bytes
     *
     * @throws Swift_IoException
     *
     * @return int
     */
    public function write($bytes)
    {
<<<<<<< HEAD
        $this->_writeBuffer .= $bytes;
        foreach ($this->_filters as $filter) {
            if ($filter->shouldBuffer($this->_writeBuffer)) {
                return;
            }
        }
        $this->_doWrite($this->_writeBuffer);

        return ++$this->_sequence;
=======
        $this->writeBuffer .= $bytes;
        foreach ($this->filters as $filter) {
            if ($filter->shouldBuffer($this->writeBuffer)) {
                return;
            }
        }
        $this->doWrite($this->writeBuffer);

        return ++$this->sequence;
>>>>>>> dev
    }

    /**
     * For any bytes that are currently buffered inside the stream, force them
     * off the buffer.
     *
     * @throws Swift_IoException
     */
    public function commit()
    {
<<<<<<< HEAD
        $this->_doWrite($this->_writeBuffer);
=======
        $this->doWrite($this->writeBuffer);
>>>>>>> dev
    }

    /**
     * Attach $is to this stream.
     *
     * The stream acts as an observer, receiving all data that is written.
     * All {@link write()} and {@link flushBuffers()} operations will be mirrored.
<<<<<<< HEAD
     *
     * @param Swift_InputByteStream $is
     */
    public function bind(Swift_InputByteStream $is)
    {
        $this->_mirrors[] = $is;
=======
     */
    public function bind(Swift_InputByteStream $is)
    {
        $this->mirrors[] = $is;
>>>>>>> dev
    }

    /**
     * Remove an already bound stream.
     *
     * If $is is not bound, no errors will be raised.
     * If the stream currently has any buffered data it will be written to $is
     * before unbinding occurs.
<<<<<<< HEAD
     *
     * @param Swift_InputByteStream $is
     */
    public function unbind(Swift_InputByteStream $is)
    {
        foreach ($this->_mirrors as $k => $stream) {
            if ($is === $stream) {
                if ($this->_writeBuffer !== '') {
                    $stream->write($this->_writeBuffer);
                }
                unset($this->_mirrors[$k]);
=======
     */
    public function unbind(Swift_InputByteStream $is)
    {
        foreach ($this->mirrors as $k => $stream) {
            if ($is === $stream) {
                if ('' !== $this->writeBuffer) {
                    $stream->write($this->writeBuffer);
                }
                unset($this->mirrors[$k]);
>>>>>>> dev
            }
        }
    }

    /**
     * Flush the contents of the stream (empty it) and set the internal pointer
     * to the beginning.
     *
     * @throws Swift_IoException
     */
    public function flushBuffers()
    {
<<<<<<< HEAD
        if ($this->_writeBuffer !== '') {
            $this->_doWrite($this->_writeBuffer);
        }
        $this->_flush();

        foreach ($this->_mirrors as $stream) {
=======
        if ('' !== $this->writeBuffer) {
            $this->doWrite($this->writeBuffer);
        }
        $this->flush();

        foreach ($this->mirrors as $stream) {
>>>>>>> dev
            $stream->flushBuffers();
        }
    }

    /** Run $bytes through all filters */
<<<<<<< HEAD
    private function _filter($bytes)
    {
        foreach ($this->_filters as $filter) {
=======
    private function filter($bytes)
    {
        foreach ($this->filters as $filter) {
>>>>>>> dev
            $bytes = $filter->filter($bytes);
        }

        return $bytes;
    }

    /** Just write the bytes to the stream */
<<<<<<< HEAD
    private function _doWrite($bytes)
    {
        $this->_commit($this->_filter($bytes));

        foreach ($this->_mirrors as $stream) {
            $stream->write($bytes);
        }

        $this->_writeBuffer = '';
=======
    private function doWrite($bytes)
    {
        $this->doCommit($this->filter($bytes));

        foreach ($this->mirrors as $stream) {
            $stream->write($bytes);
        }

        $this->writeBuffer = '';
>>>>>>> dev
    }
}
