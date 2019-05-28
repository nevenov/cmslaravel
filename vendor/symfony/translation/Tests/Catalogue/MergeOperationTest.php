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

use Symfony\Component\Translation\Catalogue\MergeOperation;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;

class MergeOperationTest extends AbstractOperationTest
{
    public function testGetMessagesFromSingleDomain()
    {
        $operation = $this->createOperation(
<<<<<<< HEAD
            new MessageCatalogue('en', array('messages' => array('a' => 'old_a', 'b' => 'old_b'))),
            new MessageCatalogue('en', array('messages' => array('a' => 'new_a', 'c' => 'new_c')))
        );

        $this->assertEquals(
            array('a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c'),
=======
            new MessageCatalogue('en', ['messages' => ['a' => 'old_a', 'b' => 'old_b']]),
            new MessageCatalogue('en', ['messages' => ['a' => 'new_a', 'c' => 'new_c']])
        );

        $this->assertEquals(
            ['a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c'],
>>>>>>> dev
            $operation->getMessages('messages')
        );

        $this->assertEquals(
<<<<<<< HEAD
            array('c' => 'new_c'),
=======
            ['c' => 'new_c'],
>>>>>>> dev
            $operation->getNewMessages('messages')
        );

        $this->assertEquals(
<<<<<<< HEAD
            array(),
=======
            [],
>>>>>>> dev
            $operation->getObsoleteMessages('messages')
        );
    }

    public function testGetResultFromSingleDomain()
    {
        $this->assertEquals(
<<<<<<< HEAD
            new MessageCatalogue('en', array(
                'messages' => array('a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c'),
            )),
            $this->createOperation(
                new MessageCatalogue('en', array('messages' => array('a' => 'old_a', 'b' => 'old_b'))),
                new MessageCatalogue('en', array('messages' => array('a' => 'new_a', 'c' => 'new_c')))
=======
            new MessageCatalogue('en', [
                'messages' => ['a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c'],
            ]),
            $this->createOperation(
                new MessageCatalogue('en', ['messages' => ['a' => 'old_a', 'b' => 'old_b']]),
                new MessageCatalogue('en', ['messages' => ['a' => 'new_a', 'c' => 'new_c']])
            )->getResult()
        );
    }

    public function testGetResultFromIntlDomain()
    {
        $this->assertEquals(
            new MessageCatalogue('en', [
                'messages' => ['a' => 'old_a', 'b' => 'old_b'],
                'messages+intl-icu' => ['d' => 'old_d', 'c' => 'new_c'],
            ]),
            $this->createOperation(
                new MessageCatalogue('en', ['messages' => ['a' => 'old_a', 'b' => 'old_b'], 'messages+intl-icu' => ['d' => 'old_d']]),
                new MessageCatalogue('en', ['messages+intl-icu' => ['a' => 'new_a', 'c' => 'new_c']])
>>>>>>> dev
            )->getResult()
        );
    }

    public function testGetResultWithMetadata()
    {
<<<<<<< HEAD
        $leftCatalogue = new MessageCatalogue('en', array('messages' => array('a' => 'old_a', 'b' => 'old_b')));
        $leftCatalogue->setMetadata('a', 'foo', 'messages');
        $leftCatalogue->setMetadata('b', 'bar', 'messages');
        $rightCatalogue = new MessageCatalogue('en', array('messages' => array('b' => 'new_b', 'c' => 'new_c')));
        $rightCatalogue->setMetadata('b', 'baz', 'messages');
        $rightCatalogue->setMetadata('c', 'qux', 'messages');

        $mergedCatalogue = new MessageCatalogue('en', array('messages' => array('a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c')));
=======
        $leftCatalogue = new MessageCatalogue('en', ['messages' => ['a' => 'old_a', 'b' => 'old_b']]);
        $leftCatalogue->setMetadata('a', 'foo', 'messages');
        $leftCatalogue->setMetadata('b', 'bar', 'messages');
        $rightCatalogue = new MessageCatalogue('en', ['messages' => ['b' => 'new_b', 'c' => 'new_c']]);
        $rightCatalogue->setMetadata('b', 'baz', 'messages');
        $rightCatalogue->setMetadata('c', 'qux', 'messages');

        $mergedCatalogue = new MessageCatalogue('en', ['messages' => ['a' => 'old_a', 'b' => 'old_b', 'c' => 'new_c']]);
>>>>>>> dev
        $mergedCatalogue->setMetadata('a', 'foo', 'messages');
        $mergedCatalogue->setMetadata('b', 'bar', 'messages');
        $mergedCatalogue->setMetadata('c', 'qux', 'messages');

        $this->assertEquals(
            $mergedCatalogue,
            $this->createOperation(
                $leftCatalogue,
                $rightCatalogue
            )->getResult()
        );
    }

    protected function createOperation(MessageCatalogueInterface $source, MessageCatalogueInterface $target)
    {
        return new MergeOperation($source, $target);
    }
}
