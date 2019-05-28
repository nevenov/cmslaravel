<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\File\Exception;

/**
 * Thrown when a file was not found.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class FileNotFoundException extends FileException
{
    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param string $path The path to the file that was not found
     */
    public function __construct($path)
=======
     * @param string $path The path to the file that was not found
     */
    public function __construct(string $path)
>>>>>>> dev
    {
        parent::__construct(sprintf('The file "%s" does not exist', $path));
    }
}
