<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

/**
 * @since Class available since Release 3.6.0
 */
class PHPUnit_Framework_Constraint_SameSize extends PHPUnit_Framework_Constraint_Count
=======
namespace PHPUnit\Framework\Constraint;

class SameSize extends Count
>>>>>>> dev
{
    /**
     * @var int
     */
    protected $expectedCount;

    /**
<<<<<<< HEAD
     * @param int $expected
=======
     * @param \Countable|\Traversable|array $expected
>>>>>>> dev
     */
    public function __construct($expected)
    {
        parent::__construct($this->getCountOf($expected));
    }
}
