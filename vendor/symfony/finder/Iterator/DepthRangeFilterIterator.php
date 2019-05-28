<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

/**
 * DepthRangeFilterIterator limits the directory depth.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
class DepthRangeFilterIterator extends FilterIterator
=======
class DepthRangeFilterIterator extends \FilterIterator
>>>>>>> dev
{
    private $minDepth = 0;

    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> dev
     * @param \RecursiveIteratorIterator $iterator The Iterator to filter
     * @param int                        $minDepth The min depth
     * @param int                        $maxDepth The max depth
     */
<<<<<<< HEAD
    public function __construct(\RecursiveIteratorIterator $iterator, $minDepth = 0, $maxDepth = PHP_INT_MAX)
=======
    public function __construct(\RecursiveIteratorIterator $iterator, int $minDepth = 0, int $maxDepth = PHP_INT_MAX)
>>>>>>> dev
    {
        $this->minDepth = $minDepth;
        $iterator->setMaxDepth(PHP_INT_MAX === $maxDepth ? -1 : $maxDepth);

        parent::__construct($iterator);
    }

    /**
     * Filters the iterator values.
     *
     * @return bool true if the value should be kept, false otherwise
     */
    public function accept()
    {
        return $this->getInnerIterator()->getDepth() >= $this->minDepth;
    }
}
