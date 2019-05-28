<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Catalogue;

<<<<<<< HEAD
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;

abstract class AbstractOperationTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;

abstract class AbstractOperationTest extends TestCase
>>>>>>> dev
{
    public function testGetEmptyDomains()
    {
        $this->assertEquals(
<<<<<<< HEAD
            array(),
=======
            [],
>>>>>>> dev
            $this->createOperation(
                new MessageCatalogue('en'),
                new MessageCatalogue('en')
            )->getDomains()
        );
    }

    public function testGetMergedDomains()
    {
        $this->assertEquals(
<<<<<<< HEAD
            array('a', 'b', 'c'),
            $this->createOperation(
                new MessageCatalogue('en', array('a' => array(), 'b' => array())),
                new MessageCatalogue('en', array('b' => array(), 'c' => array()))
=======
            ['a', 'b', 'c'],
            $this->createOperation(
                new MessageCatalogue('en', ['a' => [], 'b' => []]),
                new MessageCatalogue('en', ['b' => [], 'c' => []])
>>>>>>> dev
            )->getDomains()
        );
    }

    public function testGetMessagesFromUnknownDomain()
    {
<<<<<<< HEAD
        $this->setExpectedException('InvalidArgumentException');
=======
        $this->{method_exists($this, $_ = 'expectException') ? $_ : 'setExpectedException'}('InvalidArgumentException');
>>>>>>> dev
        $this->createOperation(
            new MessageCatalogue('en'),
            new MessageCatalogue('en')
        )->getMessages('domain');
    }

    public function testGetEmptyMessages()
    {
        $this->assertEquals(
<<<<<<< HEAD
            array(),
            $this->createOperation(
                new MessageCatalogue('en', array('a' => array())),
=======
            [],
            $this->createOperation(
                new MessageCatalogue('en', ['a' => []]),
>>>>>>> dev
                new MessageCatalogue('en')
            )->getMessages('a')
        );
    }

    public function testGetEmptyResult()
    {
        $this->assertEquals(
            new MessageCatalogue('en'),
            $this->createOperation(
                new MessageCatalogue('en'),
                new MessageCatalogue('en')
            )->getResult()
        );
    }

    abstract protected function createOperation(MessageCatalogueInterface $source, MessageCatalogueInterface $target);
}
