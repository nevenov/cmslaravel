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
 * @since Class available since Release 4.0.0
 */
class PHPUnit_Runner_Filter_Factory
=======
namespace PHPUnit\Runner\Filter;

use FilterIterator;
use InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestSuite;
use ReflectionClass;

class Factory
>>>>>>> dev
{
    /**
     * @var array
     */
<<<<<<< HEAD
    private $filters = array();
=======
    private $filters = [];
>>>>>>> dev

    /**
     * @param ReflectionClass $filter
     * @param mixed           $args
     */
    public function addFilter(ReflectionClass $filter, $args)
    {
<<<<<<< HEAD
        if (!$filter->isSubclassOf('RecursiveFilterIterator')) {
            throw new InvalidArgumentException(
                sprintf(
=======
        if (!$filter->isSubclassOf(\RecursiveFilterIterator::class)) {
            throw new InvalidArgumentException(
                \sprintf(
>>>>>>> dev
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $filter->name
                )
            );
        }

<<<<<<< HEAD
        $this->filters[] = array($filter, $args);
=======
        $this->filters[] = [$filter, $args];
>>>>>>> dev
    }

    /**
     * @return FilterIterator
     */
<<<<<<< HEAD
    public function factory(Iterator $iterator, PHPUnit_Framework_TestSuite $suite)
=======
    public function factory(Iterator $iterator, TestSuite $suite)
>>>>>>> dev
    {
        foreach ($this->filters as $filter) {
            list($class, $args) = $filter;
            $iterator           = $class->newInstance($iterator, $args, $suite);
        }

        return $iterator;
    }
}
