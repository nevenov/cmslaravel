<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests;

<<<<<<< HEAD
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\Translation\Loader\ArrayLoader;

class DataCollectorTranslatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;

class DataCollectorTranslatorTest extends TestCase
>>>>>>> dev
{
    public function testCollectMessages()
    {
        $collector = $this->createCollector();
<<<<<<< HEAD
        $collector->setFallbackLocales(array('fr', 'ru'));

        $collector->trans('foo');
        $collector->trans('bar');
        $collector->transChoice('choice', 0);
        $collector->trans('bar_ru');
        $collector->trans('bar_ru', array('foo' => 'bar'));

        $expectedMessages = array();
        $expectedMessages[] = array(
              'id' => 'foo',
              'translation' => 'foo (en)',
              'locale' => 'en',
              'domain' => 'messages',
              'state' => DataCollectorTranslator::MESSAGE_DEFINED,
              'parameters' => array(),
              'transChoiceNumber' => null,
        );
        $expectedMessages[] = array(
              'id' => 'bar',
              'translation' => 'bar (fr)',
              'locale' => 'fr',
              'domain' => 'messages',
              'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
              'parameters' => array(),
              'transChoiceNumber' => null,
        );
        $expectedMessages[] = array(
=======
        $collector->setFallbackLocales(['fr', 'ru']);

        $collector->trans('foo');
        $collector->trans('bar');
        $collector->trans('choice', ['%count%' => 0]);
        $collector->trans('bar_ru');
        $collector->trans('bar_ru', ['foo' => 'bar']);

        $expectedMessages = [];
        $expectedMessages[] = [
            'id' => 'foo',
            'translation' => 'foo (en)',
            'locale' => 'en',
            'domain' => 'messages',
            'state' => DataCollectorTranslator::MESSAGE_DEFINED,
            'parameters' => [],
            'transChoiceNumber' => null,
        ];
        $expectedMessages[] = [
            'id' => 'bar',
            'translation' => 'bar (fr)',
            'locale' => 'fr',
            'domain' => 'messages',
            'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
            'parameters' => [],
            'transChoiceNumber' => null,
        ];
        $expectedMessages[] = [
            'id' => 'choice',
            'translation' => 'choice',
            'locale' => 'en',
            'domain' => 'messages',
            'state' => DataCollectorTranslator::MESSAGE_MISSING,
            'parameters' => ['%count%' => 0],
            'transChoiceNumber' => 0,
        ];
        $expectedMessages[] = [
            'id' => 'bar_ru',
            'translation' => 'bar (ru)',
            'locale' => 'ru',
            'domain' => 'messages',
            'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
            'parameters' => [],
            'transChoiceNumber' => null,
        ];
        $expectedMessages[] = [
            'id' => 'bar_ru',
            'translation' => 'bar (ru)',
            'locale' => 'ru',
            'domain' => 'messages',
            'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
            'parameters' => ['foo' => 'bar'],
            'transChoiceNumber' => null,
        ];

        $this->assertEquals($expectedMessages, $collector->getCollectedMessages());
    }

    /**
     * @group legacy
     */
    public function testCollectMessagesTransChoice()
    {
        $collector = $this->createCollector();
        $collector->setFallbackLocales(['fr', 'ru']);
        $collector->transChoice('choice', 0);

        $expectedMessages = [];

        $expectedMessages[] = [
>>>>>>> dev
              'id' => 'choice',
              'translation' => 'choice',
              'locale' => 'en',
              'domain' => 'messages',
              'state' => DataCollectorTranslator::MESSAGE_MISSING,
<<<<<<< HEAD
              'parameters' => array(),
              'transChoiceNumber' => 0,
        );
        $expectedMessages[] = array(
              'id' => 'bar_ru',
              'translation' => 'bar (ru)',
              'locale' => 'ru',
              'domain' => 'messages',
              'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
              'parameters' => array(),
              'transChoiceNumber' => null,
        );
        $expectedMessages[] = array(
              'id' => 'bar_ru',
              'translation' => 'bar (ru)',
              'locale' => 'ru',
              'domain' => 'messages',
              'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
              'parameters' => array('foo' => 'bar'),
              'transChoiceNumber' => null,
        );
=======
              'parameters' => ['%count%' => 0],
              'transChoiceNumber' => 0,
        ];
>>>>>>> dev

        $this->assertEquals($expectedMessages, $collector->getCollectedMessages());
    }

    private function createCollector()
    {
        $translator = new Translator('en');
        $translator->addLoader('array', new ArrayLoader());
<<<<<<< HEAD
        $translator->addResource('array', array('foo' => 'foo (en)'), 'en');
        $translator->addResource('array', array('bar' => 'bar (fr)'), 'fr');
        $translator->addResource('array', array('bar_ru' => 'bar (ru)'), 'ru');

        $collector = new DataCollectorTranslator($translator);

        return $collector;
=======
        $translator->addResource('array', ['foo' => 'foo (en)'], 'en');
        $translator->addResource('array', ['bar' => 'bar (fr)'], 'fr');
        $translator->addResource('array', ['bar_ru' => 'bar (ru)'], 'ru');

        return new DataCollectorTranslator($translator);
>>>>>>> dev
    }
}
