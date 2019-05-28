<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Tests\Iterator;

class MockFileListIterator extends \ArrayIterator
{
<<<<<<< HEAD
    public function __construct(array $filesArray = array())
=======
    public function __construct(array $filesArray = [])
>>>>>>> dev
    {
        $files = array_map(function ($file) { return new MockSplFileInfo($file); }, $filesArray);
        parent::__construct($files);
    }
}
