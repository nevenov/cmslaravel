<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Exception;

/**
 * Undefined Function Exception.
 *
 * @author Konstanton Myakshin <koc-dp@yandex.ru>
 */
class UndefinedFunctionException extends FatalErrorException
{
<<<<<<< HEAD
    public function __construct($message, \ErrorException $previous)
=======
    public function __construct(string $message, \ErrorException $previous)
>>>>>>> dev
    {
        parent::__construct(
            $message,
            $previous->getCode(),
            $previous->getSeverity(),
            $previous->getFile(),
            $previous->getLine(),
<<<<<<< HEAD
=======
            null,
            true,
            null,
>>>>>>> dev
            $previous->getPrevious()
        );
        $this->setTrace($previous->getTrace());
    }
}
