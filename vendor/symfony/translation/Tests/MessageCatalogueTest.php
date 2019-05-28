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
use Symfony\Component\Translation\MessageCatalogue;

class MessageCatalogueTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\MessageCatalogue;

class MessageCatalogueTest extends TestCase
>>>>>>> dev
{
    public function testGetLocale()
    {
        $catalogue = new MessageCatalogue('en');

        $this->assertEquals('en', $catalogue->getLocale());
    }

    public function testGetDomains()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', array('domain1' => array(), 'domain2' => array()));

        $this->assertEquals(array('domain1', 'domain2'), $catalogue->getDomains());
=======
        $catalogue = new MessageCatalogue('en', ['domain1' => [], 'domain2' => [], 'domain2+intl-icu' => [], 'domain3+intl-icu' => []]);

        $this->assertEquals(['domain1', 'domain2', 'domain3'], $catalogue->getDomains());
>>>>>>> dev
    }

    public function testAll()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', $messages = array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));

        $this->assertEquals(array('foo' => 'foo'), $catalogue->all('domain1'));
        $this->assertEquals(array(), $catalogue->all('domain88'));
=======
        $catalogue = new MessageCatalogue('en', $messages = ['domain1' => ['foo' => 'foo'], 'domain2' => ['bar' => 'bar']]);

        $this->assertEquals(['foo' => 'foo'], $catalogue->all('domain1'));
        $this->assertEquals([], $catalogue->all('domain88'));
        $this->assertEquals($messages, $catalogue->all());

        $messages = ['domain1+intl-icu' => ['foo' => 'bar']] + $messages + [
            'domain2+intl-icu' => ['bar' => 'foo'],
            'domain3+intl-icu' => ['biz' => 'biz'],
        ];
        $catalogue = new MessageCatalogue('en', $messages);

        $this->assertEquals(['foo' => 'bar'], $catalogue->all('domain1'));
        $this->assertEquals(['bar' => 'foo'], $catalogue->all('domain2'));
        $this->assertEquals(['biz' => 'biz'], $catalogue->all('domain3'));

        $messages = [
            'domain1' => ['foo' => 'bar'],
            'domain2' => ['bar' => 'foo'],
            'domain3' => ['biz' => 'biz'],
        ];
>>>>>>> dev
        $this->assertEquals($messages, $catalogue->all());
    }

    public function testHas()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));

        $this->assertTrue($catalogue->has('foo', 'domain1'));
=======
        $catalogue = new MessageCatalogue('en', ['domain1' => ['foo' => 'foo'], 'domain2+intl-icu' => ['bar' => 'bar']]);

        $this->assertTrue($catalogue->has('foo', 'domain1'));
        $this->assertTrue($catalogue->has('bar', 'domain2'));
>>>>>>> dev
        $this->assertFalse($catalogue->has('bar', 'domain1'));
        $this->assertFalse($catalogue->has('foo', 'domain88'));
    }

    public function testGetSet()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));
=======
        $catalogue = new MessageCatalogue('en', ['domain1' => ['foo' => 'foo'], 'domain2' => ['bar' => 'bar'], 'domain2+intl-icu' => ['bar' => 'foo']]);
>>>>>>> dev
        $catalogue->set('foo1', 'foo1', 'domain1');

        $this->assertEquals('foo', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));
<<<<<<< HEAD
=======
        $this->assertEquals('foo', $catalogue->get('bar', 'domain2'));
>>>>>>> dev
    }

    public function testAdd()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));
        $catalogue->add(array('foo1' => 'foo1'), 'domain1');
=======
        $catalogue = new MessageCatalogue('en', ['domain1' => ['foo' => 'foo'], 'domain2' => ['bar' => 'bar']]);
        $catalogue->add(['foo1' => 'foo1'], 'domain1');
>>>>>>> dev

        $this->assertEquals('foo', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));

<<<<<<< HEAD
        $catalogue->add(array('foo' => 'bar'), 'domain1');
        $this->assertEquals('bar', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));

        $catalogue->add(array('foo' => 'bar'), 'domain88');
=======
        $catalogue->add(['foo' => 'bar'], 'domain1');
        $this->assertEquals('bar', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));

        $catalogue->add(['foo' => 'bar'], 'domain88');
>>>>>>> dev
        $this->assertEquals('bar', $catalogue->get('foo', 'domain88'));
    }

    public function testReplace()
    {
<<<<<<< HEAD
        $catalogue = new MessageCatalogue('en', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));
        $catalogue->replace($messages = array('foo1' => 'foo1'), 'domain1');
=======
        $catalogue = new MessageCatalogue('en', ['domain1' => ['foo' => 'foo'], 'domain1+intl-icu' => ['bar' => 'bar']]);
        $catalogue->replace($messages = ['foo1' => 'foo1'], 'domain1');
>>>>>>> dev

        $this->assertEquals($messages, $catalogue->all('domain1'));
    }

    public function testAddCatalogue()
    {
<<<<<<< HEAD
        $r = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));

        $r1 = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));

        $catalogue = new MessageCatalogue('en', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));
        $catalogue->addResource($r);

        $catalogue1 = new MessageCatalogue('en', array('domain1' => array('foo1' => 'foo1')));
=======
        $r = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));

        $r1 = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));

        $catalogue = new MessageCatalogue('en', ['domain1' => ['foo' => 'foo']]);
        $catalogue->addResource($r);

        $catalogue1 = new MessageCatalogue('en', ['domain1' => ['foo1' => 'foo1'], 'domain2+intl-icu' => ['bar' => 'bar']]);
>>>>>>> dev
        $catalogue1->addResource($r1);

        $catalogue->addCatalogue($catalogue1);

        $this->assertEquals('foo', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));
<<<<<<< HEAD

        $this->assertEquals(array($r, $r1), $catalogue->getResources());
=======
        $this->assertEquals('bar', $catalogue->get('bar', 'domain2'));
        $this->assertEquals('bar', $catalogue->get('bar', 'domain2+intl-icu'));

        $this->assertEquals([$r, $r1], $catalogue->getResources());
>>>>>>> dev
    }

    public function testAddFallbackCatalogue()
    {
<<<<<<< HEAD
        $r = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));

        $r1 = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));

        $catalogue = new MessageCatalogue('en_US', array('domain1' => array('foo' => 'foo'), 'domain2' => array('bar' => 'bar')));
        $catalogue->addResource($r);

        $catalogue1 = new MessageCatalogue('en', array('domain1' => array('foo' => 'bar', 'foo1' => 'foo1')));
        $catalogue1->addResource($r1);

        $catalogue->addFallbackCatalogue($catalogue1);
=======
        $r = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));

        $r1 = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));

        $r2 = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r2->expects($this->any())->method('__toString')->will($this->returnValue('r2'));

        $catalogue = new MessageCatalogue('fr_FR', ['domain1' => ['foo' => 'foo'], 'domain2' => ['bar' => 'bar']]);
        $catalogue->addResource($r);

        $catalogue1 = new MessageCatalogue('fr', ['domain1' => ['foo' => 'bar', 'foo1' => 'foo1']]);
        $catalogue1->addResource($r1);

        $catalogue2 = new MessageCatalogue('en');
        $catalogue2->addResource($r2);

        $catalogue->addFallbackCatalogue($catalogue1);
        $catalogue1->addFallbackCatalogue($catalogue2);
>>>>>>> dev

        $this->assertEquals('foo', $catalogue->get('foo', 'domain1'));
        $this->assertEquals('foo1', $catalogue->get('foo1', 'domain1'));

<<<<<<< HEAD
        $this->assertEquals(array($r, $r1), $catalogue->getResources());
    }

    /**
     * @expectedException \LogicException
=======
        $this->assertEquals([$r, $r1, $r2], $catalogue->getResources());
    }

    /**
     * @expectedException \Symfony\Component\Translation\Exception\LogicException
>>>>>>> dev
     */
    public function testAddFallbackCatalogueWithParentCircularReference()
    {
        $main = new MessageCatalogue('en_US');
        $fallback = new MessageCatalogue('fr_FR');

        $fallback->addFallbackCatalogue($main);
        $main->addFallbackCatalogue($fallback);
    }

    /**
<<<<<<< HEAD
     * @expectedException \LogicException
=======
     * @expectedException \Symfony\Component\Translation\Exception\LogicException
>>>>>>> dev
     */
    public function testAddFallbackCatalogueWithFallbackCircularReference()
    {
        $fr = new MessageCatalogue('fr');
        $en = new MessageCatalogue('en');
        $es = new MessageCatalogue('es');

        $fr->addFallbackCatalogue($en);
        $es->addFallbackCatalogue($en);
        $en->addFallbackCatalogue($fr);
    }

    /**
<<<<<<< HEAD
     * @expectedException \LogicException
=======
     * @expectedException \Symfony\Component\Translation\Exception\LogicException
>>>>>>> dev
     */
    public function testAddCatalogueWhenLocaleIsNotTheSameAsTheCurrentOne()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $catalogue->addCatalogue(new MessageCatalogue('fr', array()));
=======
        $catalogue->addCatalogue(new MessageCatalogue('fr', []));
>>>>>>> dev
    }

    public function testGetAddResource()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $r = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));
        $catalogue->addResource($r);
        $catalogue->addResource($r);
        $r1 = $this->getMock('Symfony\Component\Config\Resource\ResourceInterface');
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));
        $catalogue->addResource($r1);

        $this->assertEquals(array($r, $r1), $catalogue->getResources());
=======
        $r = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r->expects($this->any())->method('__toString')->will($this->returnValue('r'));
        $catalogue->addResource($r);
        $catalogue->addResource($r);
        $r1 = $this->getMockBuilder('Symfony\Component\Config\Resource\ResourceInterface')->getMock();
        $r1->expects($this->any())->method('__toString')->will($this->returnValue('r1'));
        $catalogue->addResource($r1);

        $this->assertEquals([$r, $r1], $catalogue->getResources());
>>>>>>> dev
    }

    public function testMetadataDelete()
    {
        $catalogue = new MessageCatalogue('en');
<<<<<<< HEAD
        $this->assertEquals(array(), $catalogue->getMetadata('', ''), 'Metadata is empty');
=======
        $this->assertEquals([], $catalogue->getMetadata('', ''), 'Metadata is empty');
>>>>>>> dev
        $catalogue->deleteMetadata('key', 'messages');
        $catalogue->deleteMetadata('', 'messages');
        $catalogue->deleteMetadata();
    }

    public function testMetadataSetGetDelete()
    {
        $catalogue = new MessageCatalogue('en');
        $catalogue->setMetadata('key', 'value');
        $this->assertEquals('value', $catalogue->getMetadata('key', 'messages'), "Metadata 'key' = 'value'");

<<<<<<< HEAD
        $catalogue->setMetadata('key2', array());
        $this->assertEquals(array(), $catalogue->getMetadata('key2', 'messages'), 'Metadata key2 is array');
=======
        $catalogue->setMetadata('key2', []);
        $this->assertEquals([], $catalogue->getMetadata('key2', 'messages'), 'Metadata key2 is array');
>>>>>>> dev

        $catalogue->deleteMetadata('key2', 'messages');
        $this->assertNull($catalogue->getMetadata('key2', 'messages'), 'Metadata key2 should is deleted.');

        $catalogue->deleteMetadata('key2', 'domain');
        $this->assertNull($catalogue->getMetadata('key2', 'domain'), 'Metadata key2 should is deleted.');
    }

    public function testMetadataMerge()
    {
        $cat1 = new MessageCatalogue('en');
        $cat1->setMetadata('a', 'b');
<<<<<<< HEAD
        $this->assertEquals(array('messages' => array('a' => 'b')), $cat1->getMetadata('', ''), 'Cat1 contains messages metadata.');

        $cat2 = new MessageCatalogue('en');
        $cat2->setMetadata('b', 'c', 'domain');
        $this->assertEquals(array('domain' => array('b' => 'c')), $cat2->getMetadata('', ''), 'Cat2 contains domain metadata.');

        $cat1->addCatalogue($cat2);
        $this->assertEquals(array('messages' => array('a' => 'b'), 'domain' => array('b' => 'c')), $cat1->getMetadata('', ''), 'Cat1 contains merged metadata.');
=======
        $this->assertEquals(['messages' => ['a' => 'b']], $cat1->getMetadata('', ''), 'Cat1 contains messages metadata.');

        $cat2 = new MessageCatalogue('en');
        $cat2->setMetadata('b', 'c', 'domain');
        $this->assertEquals(['domain' => ['b' => 'c']], $cat2->getMetadata('', ''), 'Cat2 contains domain metadata.');

        $cat1->addCatalogue($cat2);
        $this->assertEquals(['messages' => ['a' => 'b'], 'domain' => ['b' => 'c']], $cat1->getMetadata('', ''), 'Cat1 contains merged metadata.');
>>>>>>> dev
    }
}
