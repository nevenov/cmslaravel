<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests\Fixtures;

<<<<<<< HEAD
use Symfony\Component\Routing\Loader\XmlFileLoader;
use Symfony\Component\Config\Util\XmlUtils;
=======
use Symfony\Component\Config\Util\XmlUtils;
use Symfony\Component\Routing\Loader\XmlFileLoader;
>>>>>>> dev

/**
 * XmlFileLoader with schema validation turned off.
 */
class CustomXmlFileLoader extends XmlFileLoader
{
    protected function loadFile($file)
    {
        return XmlUtils::loadFile($file, function () { return true; });
    }
}
