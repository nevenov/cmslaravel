<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * StreamedResponse represents a streamed HTTP response.
 *
 * A StreamedResponse uses a callback for its content.
 *
 * The callback should use the standard PHP functions like echo
<<<<<<< HEAD
 * to stream the response back to the client. The flush() method
=======
 * to stream the response back to the client. The flush() function
>>>>>>> dev
 * can also be used if needed.
 *
 * @see flush()
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StreamedResponse extends Response
{
    protected $callback;
    protected $streamed;
<<<<<<< HEAD

    /**
     * Constructor.
     *
=======
    private $headersSent;

    /**
>>>>>>> dev
     * @param callable|null $callback A valid PHP callback or null to set it later
     * @param int           $status   The response status code
     * @param array         $headers  An array of response headers
     */
<<<<<<< HEAD
    public function __construct(callable $callback = null, $status = 200, $headers = array())
=======
    public function __construct(callable $callback = null, int $status = 200, array $headers = [])
>>>>>>> dev
    {
        parent::__construct(null, $status, $headers);

        if (null !== $callback) {
            $this->setCallback($callback);
        }
        $this->streamed = false;
<<<<<<< HEAD
=======
        $this->headersSent = false;
>>>>>>> dev
    }

    /**
     * Factory method for chainability.
     *
     * @param callable|null $callback A valid PHP callback or null to set it later
     * @param int           $status   The response status code
     * @param array         $headers  An array of response headers
     *
<<<<<<< HEAD
     * @return StreamedResponse
     */
    public static function create($callback = null, $status = 200, $headers = array())
=======
     * @return static
     */
    public static function create($callback = null, $status = 200, $headers = [])
>>>>>>> dev
    {
        return new static($callback, $status, $headers);
    }

    /**
     * Sets the PHP callback associated with this Response.
     *
     * @param callable $callback A valid PHP callback
<<<<<<< HEAD
=======
     *
     * @return $this
>>>>>>> dev
     */
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
<<<<<<< HEAD
=======

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the headers once.
     *
     * @return $this
     */
    public function sendHeaders()
    {
        if ($this->headersSent) {
            return $this;
        }

        $this->headersSent = true;

        return parent::sendHeaders();
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the content once.
<<<<<<< HEAD
=======
     *
     * @return $this
>>>>>>> dev
     */
    public function sendContent()
    {
        if ($this->streamed) {
<<<<<<< HEAD
            return;
=======
            return $this;
>>>>>>> dev
        }

        $this->streamed = true;

        if (null === $this->callback) {
            throw new \LogicException('The Response callback must not be null.');
        }

<<<<<<< HEAD
        call_user_func($this->callback);
=======
        ($this->callback)();

        return $this;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     *
     * @throws \LogicException when the content is not null
<<<<<<< HEAD
=======
     *
     * @return $this
>>>>>>> dev
     */
    public function setContent($content)
    {
        if (null !== $content) {
            throw new \LogicException('The content cannot be set on a StreamedResponse instance.');
        }
<<<<<<< HEAD
=======

        $this->streamed = true;

        return $this;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     *
     * @return false
     */
    public function getContent()
    {
        return false;
    }
}
