<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
<<<<<<< HEAD
 * UnsupportedMediaTypeHttpException.
 *
=======
>>>>>>> dev
 * @author Ben Ramsey <ben@benramsey.com>
 */
class UnsupportedMediaTypeHttpException extends HttpException
{
    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
     */
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct(415, $message, $previous, array(), $code);
=======
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
     * @param array      $headers
     */
    public function __construct(string $message = null, \Exception $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct(415, $message, $previous, $headers, $code);
>>>>>>> dev
    }
}
