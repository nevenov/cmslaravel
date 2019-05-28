<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A CharacterStream implementation which stores characters in an internal array.
 *
 * @author Chris Corbyn
 */
class Swift_CharacterStream_ArrayCharacterStream implements Swift_CharacterStream
{
    /** A map of byte values and their respective characters */
<<<<<<< HEAD
    private static $_charMap;

    /** A map of characters and their derivative byte values */
    private static $_byteMap;

    /** The char reader (lazy-loaded) for the current charset */
    private $_charReader;

    /** A factory for creating CharacterReader instances */
    private $_charReaderFactory;

    /** The character set this stream is using */
    private $_charset;

    /** Array of characters */
    private $_array = array();

    /** Size of the array of character */
    private $_array_size = array();

    /** The current character offset in the stream */
    private $_offset = 0;
=======
    private static $charMap;

    /** A map of characters and their derivative byte values */
    private static $byteMap;

    /** The char reader (lazy-loaded) for the current charset */
    private $charReader;

    /** A factory for creating CharacterReader instances */
    private $charReaderFactory;

    /** The character set this stream is using */
    private $charset;

    /** Array of characters */
    private $array = [];

    /** Size of the array of character */
    private $array_size = [];

    /** The current character offset in the stream */
    private $offset = 0;
>>>>>>> dev

    /**
     * Create a new CharacterStream with the given $chars, if set.
     *
     * @param Swift_CharacterReaderFactory $factory for loading validators
     * @param string                       $charset used in the stream
     */
    public function __construct(Swift_CharacterReaderFactory $factory, $charset)
    {
<<<<<<< HEAD
        self::_initializeMaps();
=======
        self::initializeMaps();
>>>>>>> dev
        $this->setCharacterReaderFactory($factory);
        $this->setCharacterSet($charset);
    }

    /**
     * Set the character set used in this CharacterStream.
     *
     * @param string $charset
     */
    public function setCharacterSet($charset)
    {
<<<<<<< HEAD
        $this->_charset = $charset;
        $this->_charReader = null;
=======
        $this->charset = $charset;
        $this->charReader = null;
>>>>>>> dev
    }

    /**
     * Set the CharacterReaderFactory for multi charset support.
<<<<<<< HEAD
     *
     * @param Swift_CharacterReaderFactory $factory
     */
    public function setCharacterReaderFactory(Swift_CharacterReaderFactory $factory)
    {
        $this->_charReaderFactory = $factory;
=======
     */
    public function setCharacterReaderFactory(Swift_CharacterReaderFactory $factory)
    {
        $this->charReaderFactory = $factory;
>>>>>>> dev
    }

    /**
     * Overwrite this character stream using the byte sequence in the byte stream.
     *
     * @param Swift_OutputByteStream $os output stream to read from
     */
    public function importByteStream(Swift_OutputByteStream $os)
    {
<<<<<<< HEAD
        if (!isset($this->_charReader)) {
            $this->_charReader = $this->_charReaderFactory
                ->getReaderFor($this->_charset);
        }

        $startLength = $this->_charReader->getInitialByteSize();
        while (false !== $bytes = $os->read($startLength)) {
            $c = array();
            for ($i = 0, $len = strlen($bytes); $i < $len; ++$i) {
                $c[] = self::$_byteMap[$bytes[$i]];
            }
            $size = count($c);
            $need = $this->_charReader
=======
        if (!isset($this->charReader)) {
            $this->charReader = $this->charReaderFactory
                ->getReaderFor($this->charset);
        }

        $startLength = $this->charReader->getInitialByteSize();
        while (false !== $bytes = $os->read($startLength)) {
            $c = [];
            for ($i = 0, $len = strlen($bytes); $i < $len; ++$i) {
                $c[] = self::$byteMap[$bytes[$i]];
            }
            $size = count($c);
            $need = $this->charReader
>>>>>>> dev
                ->validateByteSequence($c, $size);
            if ($need > 0 &&
                false !== $bytes = $os->read($need)) {
                for ($i = 0, $len = strlen($bytes); $i < $len; ++$i) {
<<<<<<< HEAD
                    $c[] = self::$_byteMap[$bytes[$i]];
                }
            }
            $this->_array[] = $c;
            ++$this->_array_size;
=======
                    $c[] = self::$byteMap[$bytes[$i]];
                }
            }
            $this->array[] = $c;
            ++$this->array_size;
>>>>>>> dev
        }
    }

    /**
     * Import a string a bytes into this CharacterStream, overwriting any existing
     * data in the stream.
     *
     * @param string $string
     */
    public function importString($string)
    {
        $this->flushContents();
        $this->write($string);
    }

    /**
     * Read $length characters from the stream and move the internal pointer
     * $length further into the stream.
     *
     * @param int $length
     *
     * @return string
     */
    public function read($length)
    {
<<<<<<< HEAD
        if ($this->_offset == $this->_array_size) {
=======
        if ($this->offset == $this->array_size) {
>>>>>>> dev
            return false;
        }

        // Don't use array slice
<<<<<<< HEAD
        $arrays = array();
        $end = $length + $this->_offset;
        for ($i = $this->_offset; $i < $end; ++$i) {
            if (!isset($this->_array[$i])) {
                break;
            }
            $arrays[] = $this->_array[$i];
        }
        $this->_offset += $i - $this->_offset; // Limit function calls
=======
        $arrays = [];
        $end = $length + $this->offset;
        for ($i = $this->offset; $i < $end; ++$i) {
            if (!isset($this->array[$i])) {
                break;
            }
            $arrays[] = $this->array[$i];
        }
        $this->offset += $i - $this->offset; // Limit function calls
>>>>>>> dev
        $chars = false;
        foreach ($arrays as $array) {
            $chars .= implode('', array_map('chr', $array));
        }

        return $chars;
    }

    /**
     * Read $length characters from the stream and return a 1-dimensional array
     * containing there octet values.
     *
     * @param int $length
     *
     * @return int[]
     */
    public function readBytes($length)
    {
<<<<<<< HEAD
        if ($this->_offset == $this->_array_size) {
            return false;
        }
        $arrays = array();
        $end = $length + $this->_offset;
        for ($i = $this->_offset; $i < $end; ++$i) {
            if (!isset($this->_array[$i])) {
                break;
            }
            $arrays[] = $this->_array[$i];
        }
        $this->_offset += ($i - $this->_offset); // Limit function calls

        return call_user_func_array('array_merge', $arrays);
=======
        if ($this->offset == $this->array_size) {
            return false;
        }
        $arrays = [];
        $end = $length + $this->offset;
        for ($i = $this->offset; $i < $end; ++$i) {
            if (!isset($this->array[$i])) {
                break;
            }
            $arrays[] = $this->array[$i];
        }
        $this->offset += ($i - $this->offset); // Limit function calls

        return array_merge(...$arrays);
>>>>>>> dev
    }

    /**
     * Write $chars to the end of the stream.
     *
     * @param string $chars
     */
    public function write($chars)
    {
<<<<<<< HEAD
        if (!isset($this->_charReader)) {
            $this->_charReader = $this->_charReaderFactory->getReaderFor(
                $this->_charset);
        }

        $startLength = $this->_charReader->getInitialByteSize();
=======
        if (!isset($this->charReader)) {
            $this->charReader = $this->charReaderFactory->getReaderFor(
                $this->charset);
        }

        $startLength = $this->charReader->getInitialByteSize();
>>>>>>> dev

        $fp = fopen('php://memory', 'w+b');
        fwrite($fp, $chars);
        unset($chars);
        fseek($fp, 0, SEEK_SET);

<<<<<<< HEAD
        $buffer = array(0);
=======
        $buffer = [0];
>>>>>>> dev
        $buf_pos = 1;
        $buf_len = 1;
        $has_datas = true;
        do {
<<<<<<< HEAD
            $bytes = array();
            // Buffer Filing
            if ($buf_len - $buf_pos < $startLength) {
                $buf = array_splice($buffer, $buf_pos);
                $new = $this->_reloadBuffer($fp, 100);
=======
            $bytes = [];
            // Buffer Filing
            if ($buf_len - $buf_pos < $startLength) {
                $buf = array_splice($buffer, $buf_pos);
                $new = $this->reloadBuffer($fp, 100);
>>>>>>> dev
                if ($new) {
                    $buffer = array_merge($buf, $new);
                    $buf_len = count($buffer);
                    $buf_pos = 0;
                } else {
                    $has_datas = false;
                }
            }
            if ($buf_len - $buf_pos > 0) {
                $size = 0;
                for ($i = 0; $i < $startLength && isset($buffer[$buf_pos]); ++$i) {
                    ++$size;
                    $bytes[] = $buffer[$buf_pos++];
                }
<<<<<<< HEAD
                $need = $this->_charReader->validateByteSequence(
                    $bytes, $size);
                if ($need > 0) {
                    if ($buf_len - $buf_pos < $need) {
                        $new = $this->_reloadBuffer($fp, $need);
=======
                $need = $this->charReader->validateByteSequence(
                    $bytes, $size);
                if ($need > 0) {
                    if ($buf_len - $buf_pos < $need) {
                        $new = $this->reloadBuffer($fp, $need);
>>>>>>> dev

                        if ($new) {
                            $buffer = array_merge($buffer, $new);
                            $buf_len = count($buffer);
                        }
                    }
                    for ($i = 0; $i < $need && isset($buffer[$buf_pos]); ++$i) {
                        $bytes[] = $buffer[$buf_pos++];
                    }
                }
<<<<<<< HEAD
                $this->_array[] = $bytes;
                ++$this->_array_size;
=======
                $this->array[] = $bytes;
                ++$this->array_size;
>>>>>>> dev
            }
        } while ($has_datas);

        fclose($fp);
    }

    /**
     * Move the internal pointer to $charOffset in the stream.
     *
     * @param int $charOffset
     */
    public function setPointer($charOffset)
    {
<<<<<<< HEAD
        if ($charOffset > $this->_array_size) {
            $charOffset = $this->_array_size;
        } elseif ($charOffset < 0) {
            $charOffset = 0;
        }
        $this->_offset = $charOffset;
=======
        if ($charOffset > $this->array_size) {
            $charOffset = $this->array_size;
        } elseif ($charOffset < 0) {
            $charOffset = 0;
        }
        $this->offset = $charOffset;
>>>>>>> dev
    }

    /**
     * Empty the stream and reset the internal pointer.
     */
    public function flushContents()
    {
<<<<<<< HEAD
        $this->_offset = 0;
        $this->_array = array();
        $this->_array_size = 0;
    }

    private function _reloadBuffer($fp, $len)
    {
        if (!feof($fp) && ($bytes = fread($fp, $len)) !== false) {
            $buf = array();
            for ($i = 0, $len = strlen($bytes); $i < $len; ++$i) {
                $buf[] = self::$_byteMap[$bytes[$i]];
=======
        $this->offset = 0;
        $this->array = [];
        $this->array_size = 0;
    }

    private function reloadBuffer($fp, $len)
    {
        if (!feof($fp) && false !== ($bytes = fread($fp, $len))) {
            $buf = [];
            for ($i = 0, $len = strlen($bytes); $i < $len; ++$i) {
                $buf[] = self::$byteMap[$bytes[$i]];
>>>>>>> dev
            }

            return $buf;
        }

        return false;
    }

<<<<<<< HEAD
    private static function _initializeMaps()
    {
        if (!isset(self::$_charMap)) {
            self::$_charMap = array();
            for ($byte = 0; $byte < 256; ++$byte) {
                self::$_charMap[$byte] = chr($byte);
            }
            self::$_byteMap = array_flip(self::$_charMap);
=======
    private static function initializeMaps()
    {
        if (!isset(self::$charMap)) {
            self::$charMap = [];
            for ($byte = 0; $byte < 256; ++$byte) {
                self::$charMap[$byte] = chr($byte);
            }
            self::$byteMap = array_flip(self::$charMap);
>>>>>>> dev
        }
    }
}
