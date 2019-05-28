<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A KeyCache which streams to and from disk.
 *
 * @author Chris Corbyn
 */
class Swift_KeyCache_DiskKeyCache implements Swift_KeyCache
{
    /** Signal to place pointer at start of file */
    const POSITION_START = 0;

    /** Signal to place pointer at end of file */
    const POSITION_END = 1;

    /** Signal to leave pointer in whatever position it currently is */
    const POSITION_CURRENT = 2;

    /**
     * An InputStream for cloning.
     *
     * @var Swift_KeyCache_KeyCacheInputStream
     */
<<<<<<< HEAD
    private $_stream;
=======
    private $stream;
>>>>>>> dev

    /**
     * A path to write to.
     *
     * @var string
     */
<<<<<<< HEAD
    private $_path;
=======
    private $path;
>>>>>>> dev

    /**
     * Stored keys.
     *
     * @var array
     */
<<<<<<< HEAD
    private $_keys = array();

    /**
     * Will be true if magic_quotes_runtime is turned on.
     *
     * @var bool
     */
    private $_quotes = false;
=======
    private $keys = [];
>>>>>>> dev

    /**
     * Create a new DiskKeyCache with the given $stream for cloning to make
     * InputByteStreams, and the given $path to save to.
     *
<<<<<<< HEAD
     * @param Swift_KeyCache_KeyCacheInputStream $stream
     * @param string                             $path   to save to
     */
    public function __construct(Swift_KeyCache_KeyCacheInputStream $stream, $path)
    {
        $this->_stream = $stream;
        $this->_path = $path;

        if (function_exists('get_magic_quotes_runtime') && @get_magic_quotes_runtime() == 1) {
            $this->_quotes = true;
        }
=======
     * @param string $path to save to
     */
    public function __construct(Swift_KeyCache_KeyCacheInputStream $stream, $path)
    {
        $this->stream = $stream;
        $this->path = $path;
>>>>>>> dev
    }

    /**
     * Set a string into the cache under $itemKey for the namespace $nsKey.
     *
     * @see MODE_WRITE, MODE_APPEND
     *
     * @param string $nsKey
     * @param string $itemKey
     * @param string $string
     * @param int    $mode
     *
     * @throws Swift_IoException
     */
    public function setString($nsKey, $itemKey, $string, $mode)
    {
<<<<<<< HEAD
        $this->_prepareCache($nsKey);
        switch ($mode) {
            case self::MODE_WRITE:
                $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_START);
                break;
            case self::MODE_APPEND:
                $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_END);
=======
        $this->prepareCache($nsKey);
        switch ($mode) {
            case self::MODE_WRITE:
                $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
                break;
            case self::MODE_APPEND:
                $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_END);
>>>>>>> dev
                break;
            default:
                throw new Swift_SwiftException(
                    'Invalid mode ['.$mode.'] used to set nsKey='.
                    $nsKey.', itemKey='.$itemKey
                    );
                break;
        }
        fwrite($fp, $string);
<<<<<<< HEAD
        $this->_freeHandle($nsKey, $itemKey);
=======
        $this->freeHandle($nsKey, $itemKey);
>>>>>>> dev
    }

    /**
     * Set a ByteStream into the cache under $itemKey for the namespace $nsKey.
     *
     * @see MODE_WRITE, MODE_APPEND
     *
<<<<<<< HEAD
     * @param string                 $nsKey
     * @param string                 $itemKey
     * @param Swift_OutputByteStream $os
     * @param int                    $mode
=======
     * @param string $nsKey
     * @param string $itemKey
     * @param int    $mode
>>>>>>> dev
     *
     * @throws Swift_IoException
     */
    public function importFromByteStream($nsKey, $itemKey, Swift_OutputByteStream $os, $mode)
    {
<<<<<<< HEAD
        $this->_prepareCache($nsKey);
        switch ($mode) {
            case self::MODE_WRITE:
                $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_START);
                break;
            case self::MODE_APPEND:
                $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_END);
=======
        $this->prepareCache($nsKey);
        switch ($mode) {
            case self::MODE_WRITE:
                $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
                break;
            case self::MODE_APPEND:
                $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_END);
>>>>>>> dev
                break;
            default:
                throw new Swift_SwiftException(
                    'Invalid mode ['.$mode.'] used to set nsKey='.
                    $nsKey.', itemKey='.$itemKey
                    );
                break;
        }
        while (false !== $bytes = $os->read(8192)) {
            fwrite($fp, $bytes);
        }
<<<<<<< HEAD
        $this->_freeHandle($nsKey, $itemKey);
=======
        $this->freeHandle($nsKey, $itemKey);
>>>>>>> dev
    }

    /**
     * Provides a ByteStream which when written to, writes data to $itemKey.
     *
     * NOTE: The stream will always write in append mode.
     *
<<<<<<< HEAD
     * @param string                $nsKey
     * @param string                $itemKey
     * @param Swift_InputByteStream $writeThrough
=======
     * @param string $nsKey
     * @param string $itemKey
>>>>>>> dev
     *
     * @return Swift_InputByteStream
     */
    public function getInputByteStream($nsKey, $itemKey, Swift_InputByteStream $writeThrough = null)
    {
<<<<<<< HEAD
        $is = clone $this->_stream;
=======
        $is = clone $this->stream;
>>>>>>> dev
        $is->setKeyCache($this);
        $is->setNsKey($nsKey);
        $is->setItemKey($itemKey);
        if (isset($writeThrough)) {
            $is->setWriteThroughStream($writeThrough);
        }

        return $is;
    }

    /**
     * Get data back out of the cache as a string.
     *
     * @param string $nsKey
     * @param string $itemKey
     *
     * @throws Swift_IoException
     *
     * @return string
     */
    public function getString($nsKey, $itemKey)
    {
<<<<<<< HEAD
        $this->_prepareCache($nsKey);
        if ($this->hasKey($nsKey, $itemKey)) {
            $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_START);
            if ($this->_quotes) {
                ini_set('magic_quotes_runtime', 0);
            }
=======
        $this->prepareCache($nsKey);
        if ($this->hasKey($nsKey, $itemKey)) {
            $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
>>>>>>> dev
            $str = '';
            while (!feof($fp) && false !== $bytes = fread($fp, 8192)) {
                $str .= $bytes;
            }
<<<<<<< HEAD
            if ($this->_quotes) {
                ini_set('magic_quotes_runtime', 1);
            }
            $this->_freeHandle($nsKey, $itemKey);
=======
            $this->freeHandle($nsKey, $itemKey);
>>>>>>> dev

            return $str;
        }
    }

    /**
     * Get data back out of the cache as a ByteStream.
     *
     * @param string                $nsKey
     * @param string                $itemKey
     * @param Swift_InputByteStream $is      to write the data to
     */
    public function exportToByteStream($nsKey, $itemKey, Swift_InputByteStream $is)
    {
        if ($this->hasKey($nsKey, $itemKey)) {
<<<<<<< HEAD
            $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_START);
            if ($this->_quotes) {
                ini_set('magic_quotes_runtime', 0);
            }
            while (!feof($fp) && false !== $bytes = fread($fp, 8192)) {
                $is->write($bytes);
            }
            if ($this->_quotes) {
                ini_set('magic_quotes_runtime', 1);
            }
            $this->_freeHandle($nsKey, $itemKey);
=======
            $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
            while (!feof($fp) && false !== $bytes = fread($fp, 8192)) {
                $is->write($bytes);
            }
            $this->freeHandle($nsKey, $itemKey);
>>>>>>> dev
        }
    }

    /**
     * Check if the given $itemKey exists in the namespace $nsKey.
     *
     * @param string $nsKey
     * @param string $itemKey
     *
     * @return bool
     */
    public function hasKey($nsKey, $itemKey)
    {
<<<<<<< HEAD
        return is_file($this->_path.'/'.$nsKey.'/'.$itemKey);
=======
        return is_file($this->path.'/'.$nsKey.'/'.$itemKey);
>>>>>>> dev
    }

    /**
     * Clear data for $itemKey in the namespace $nsKey if it exists.
     *
     * @param string $nsKey
     * @param string $itemKey
     */
    public function clearKey($nsKey, $itemKey)
    {
        if ($this->hasKey($nsKey, $itemKey)) {
<<<<<<< HEAD
            $this->_freeHandle($nsKey, $itemKey);
            unlink($this->_path.'/'.$nsKey.'/'.$itemKey);
=======
            $this->freeHandle($nsKey, $itemKey);
            unlink($this->path.'/'.$nsKey.'/'.$itemKey);
>>>>>>> dev
        }
    }

    /**
     * Clear all data in the namespace $nsKey if it exists.
     *
     * @param string $nsKey
     */
    public function clearAll($nsKey)
    {
<<<<<<< HEAD
        if (array_key_exists($nsKey, $this->_keys)) {
            foreach ($this->_keys[$nsKey] as $itemKey => $null) {
                $this->clearKey($nsKey, $itemKey);
            }
            if (is_dir($this->_path.'/'.$nsKey)) {
                rmdir($this->_path.'/'.$nsKey);
            }
            unset($this->_keys[$nsKey]);
=======
        if (array_key_exists($nsKey, $this->keys)) {
            foreach ($this->keys[$nsKey] as $itemKey => $null) {
                $this->clearKey($nsKey, $itemKey);
            }
            if (is_dir($this->path.'/'.$nsKey)) {
                rmdir($this->path.'/'.$nsKey);
            }
            unset($this->keys[$nsKey]);
>>>>>>> dev
        }
    }

    /**
     * Initialize the namespace of $nsKey if needed.
     *
     * @param string $nsKey
     */
<<<<<<< HEAD
    private function _prepareCache($nsKey)
    {
        $cacheDir = $this->_path.'/'.$nsKey;
=======
    private function prepareCache($nsKey)
    {
        $cacheDir = $this->path.'/'.$nsKey;
>>>>>>> dev
        if (!is_dir($cacheDir)) {
            if (!mkdir($cacheDir)) {
                throw new Swift_IoException('Failed to create cache directory '.$cacheDir);
            }
<<<<<<< HEAD
            $this->_keys[$nsKey] = array();
=======
            $this->keys[$nsKey] = [];
>>>>>>> dev
        }
    }

    /**
     * Get a file handle on the cache item.
     *
     * @param string $nsKey
     * @param string $itemKey
     * @param int    $position
     *
     * @return resource
     */
<<<<<<< HEAD
    private function _getHandle($nsKey, $itemKey, $position)
    {
        if (!isset($this->_keys[$nsKey][$itemKey])) {
            $openMode = $this->hasKey($nsKey, $itemKey) ? 'r+b' : 'w+b';
            $fp = fopen($this->_path.'/'.$nsKey.'/'.$itemKey, $openMode);
            $this->_keys[$nsKey][$itemKey] = $fp;
        }
        if (self::POSITION_START == $position) {
            fseek($this->_keys[$nsKey][$itemKey], 0, SEEK_SET);
        } elseif (self::POSITION_END == $position) {
            fseek($this->_keys[$nsKey][$itemKey], 0, SEEK_END);
        }

        return $this->_keys[$nsKey][$itemKey];
    }

    private function _freeHandle($nsKey, $itemKey)
    {
        $fp = $this->_getHandle($nsKey, $itemKey, self::POSITION_CURRENT);
        fclose($fp);
        $this->_keys[$nsKey][$itemKey] = null;
=======
    private function getHandle($nsKey, $itemKey, $position)
    {
        if (!isset($this->keys[$nsKey][$itemKey])) {
            $openMode = $this->hasKey($nsKey, $itemKey) ? 'r+b' : 'w+b';
            $fp = fopen($this->path.'/'.$nsKey.'/'.$itemKey, $openMode);
            $this->keys[$nsKey][$itemKey] = $fp;
        }
        if (self::POSITION_START == $position) {
            fseek($this->keys[$nsKey][$itemKey], 0, SEEK_SET);
        } elseif (self::POSITION_END == $position) {
            fseek($this->keys[$nsKey][$itemKey], 0, SEEK_END);
        }

        return $this->keys[$nsKey][$itemKey];
    }

    private function freeHandle($nsKey, $itemKey)
    {
        $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_CURRENT);
        fclose($fp);
        $this->keys[$nsKey][$itemKey] = null;
>>>>>>> dev
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
<<<<<<< HEAD
        foreach ($this->_keys as $nsKey => $null) {
=======
        foreach ($this->keys as $nsKey => $null) {
>>>>>>> dev
            $this->clearAll($nsKey);
        }
    }
}
