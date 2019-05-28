<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * An author.
<<<<<<< HEAD
 *
 * @since      Class available since Release 3.6.0
=======
>>>>>>> dev
 */
class Author
{
    // the order of properties is important for testing the cycle!
<<<<<<< HEAD
    public $books = array();
=======
    public $books = [];
>>>>>>> dev

    private $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }
}
