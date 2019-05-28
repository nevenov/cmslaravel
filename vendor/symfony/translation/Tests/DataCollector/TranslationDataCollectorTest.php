<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\DataCollector;

<<<<<<< HEAD
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\Translation\DataCollector\TranslationDataCollector;

class TranslationDataCollectorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\DataCollector\TranslationDataCollector;
use Symfony\Component\Translation\DataCollectorTranslator;

class TranslationDataCollectorTest extends TestCase
>>>>>>> dev
{
    protected function setUp()
    {
        if (!class_exists('Symfony\Component\HttpKernel\DataCollector\DataCollector')) {
            $this->markTestSkipped('The "DataCollector" is not available');
        }
    }

    public function testCollectEmptyMessages()
    {
        $translator = $this->getTranslator();
<<<<<<< HEAD
        $translator->expects($this->any())->method('getCollectedMessages')->will($this->returnValue(array()));
=======
        $translator->expects($this->any())->method('getCollectedMessages')->will($this->returnValue([]));
>>>>>>> dev

        $dataCollector = new TranslationDataCollector($translator);
        $dataCollector->lateCollect();

        $this->assertEquals(0, $dataCollector->getCountMissings());
        $this->assertEquals(0, $dataCollector->getCountFallbacks());
        $this->assertEquals(0, $dataCollector->getCountDefines());
<<<<<<< HEAD
        $this->assertEquals(array(), $dataCollector->getMessages());
=======
        $this->assertEquals([], $dataCollector->getMessages()->getValue());
>>>>>>> dev
    }

    public function testCollect()
    {
<<<<<<< HEAD
        $collectedMessages = array(
            array(
                  'id' => 'foo',
                  'translation' => 'foo (en)',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_DEFINED,
                  'parameters' => array(),
                  'transChoiceNumber' => null,
            ),
            array(
                  'id' => 'bar',
                  'translation' => 'bar (fr)',
                  'locale' => 'fr',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
                  'parameters' => array(),
                  'transChoiceNumber' => null,
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
                  'parameters' => array('%count%' => 3),
                  'transChoiceNumber' => 3,
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
                  'parameters' => array('%count%' => 3),
                  'transChoiceNumber' => 3,
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
                  'parameters' => array('%count%' => 4, '%foo%' => 'bar'),
                  'transChoiceNumber' => 4,
            ),
        );
        $expectedMessages = array(
            array(
                  'id' => 'foo',
                  'translation' => 'foo (en)',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_DEFINED,
                  'count' => 1,
                  'parameters' => array(),
                  'transChoiceNumber' => null,
            ),
            array(
                  'id' => 'bar',
                  'translation' => 'bar (fr)',
                  'locale' => 'fr',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
                  'count' => 1,
                  'parameters' => array(),
                  'transChoiceNumber' => null,
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
                  'count' => 3,
                  'parameters' => array(
                      array('%count%' => 3),
                      array('%count%' => 3),
                      array('%count%' => 4, '%foo%' => 'bar'),
                  ),
                  'transChoiceNumber' => 3,
            ),
        );
=======
        $collectedMessages = [
            [
                'id' => 'foo',
                'translation' => 'foo (en)',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_DEFINED,
                'parameters' => [],
                'transChoiceNumber' => null,
            ],
            [
                'id' => 'bar',
                'translation' => 'bar (fr)',
                'locale' => 'fr',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
                'parameters' => [],
                'transChoiceNumber' => null,
            ],
            [
                'id' => 'choice',
                'translation' => 'choice',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_MISSING,
                'parameters' => ['%count%' => 3],
                'transChoiceNumber' => 3,
            ],
            [
                'id' => 'choice',
                'translation' => 'choice',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_MISSING,
                'parameters' => ['%count%' => 3],
                'transChoiceNumber' => 3,
            ],
            [
                'id' => 'choice',
                'translation' => 'choice',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_MISSING,
                'parameters' => ['%count%' => 4, '%foo%' => 'bar'],
                'transChoiceNumber' => 4,
            ],
        ];
        $expectedMessages = [
            [
                'id' => 'foo',
                'translation' => 'foo (en)',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_DEFINED,
                'count' => 1,
                'parameters' => [],
                'transChoiceNumber' => null,
            ],
            [
                'id' => 'bar',
                'translation' => 'bar (fr)',
                'locale' => 'fr',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
                'count' => 1,
                'parameters' => [],
                'transChoiceNumber' => null,
            ],
            [
                'id' => 'choice',
                'translation' => 'choice',
                'locale' => 'en',
                'domain' => 'messages',
                'state' => DataCollectorTranslator::MESSAGE_MISSING,
                'count' => 3,
                'parameters' => [
                    ['%count%' => 3],
                    ['%count%' => 3],
                    ['%count%' => 4, '%foo%' => 'bar'],
                ],
                'transChoiceNumber' => 3,
            ],
        ];
>>>>>>> dev

        $translator = $this->getTranslator();
        $translator->expects($this->any())->method('getCollectedMessages')->will($this->returnValue($collectedMessages));

        $dataCollector = new TranslationDataCollector($translator);
        $dataCollector->lateCollect();

        $this->assertEquals(1, $dataCollector->getCountMissings());
        $this->assertEquals(1, $dataCollector->getCountFallbacks());
        $this->assertEquals(1, $dataCollector->getCountDefines());
<<<<<<< HEAD
        $this->assertEquals($expectedMessages, array_values($dataCollector->getMessages()));
=======

        $this->assertEquals($expectedMessages, array_values($dataCollector->getMessages()->getValue(true)));
>>>>>>> dev
    }

    private function getTranslator()
    {
        $translator = $this
            ->getMockBuilder('Symfony\Component\Translation\DataCollectorTranslator')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        return $translator;
    }
}
