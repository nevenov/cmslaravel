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
 * MethodNotAllowedHttpException.
 *
=======
>>>>>>> dev
 * @author Kris Wallsmith <kris@symfony.com>
 */
class MethodNotAllowedHttpException extends HttpException
{
    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> dev
     * @param array      $allow    An array of allowed methods
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
<<<<<<< HEAD
     */
    public function __construct(array $allow, $message = null, \Exception $previous = null, $code = 0)
    {
        $headers = array('Allow' => strtoupper(implode(', ', $allow)));
=======
     * @param array      $headers
     */
    public function __construct(array $allow, string $message = null, \Exception $previous = null, ?int $code = 0, array $headers = [])
    {
        $headers['Allow'] = strtoupper(implode(', ', $allow));
>>>>>>> dev

        parent::__construct(405, $message, $previous, $headers, $code);
    }
}
