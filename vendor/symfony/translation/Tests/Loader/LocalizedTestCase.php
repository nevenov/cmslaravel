<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Loader;

<<<<<<< HEAD
abstract class LocalizedTestCase extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('intl')) {
=======
use PHPUnit\Framework\TestCase;

abstract class LocalizedTestCase extends TestCase
{
    protected function setUp()
    {
        if (!\extension_loaded('intl')) {
>>>>>>> dev
            $this->markTestSkipped('Extension intl is required.');
        }
    }
}
