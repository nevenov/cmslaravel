<?php
/*
<<<<<<< HEAD
 * This file is part of the Comparator package.
=======
 * This file is part of sebastian/comparator.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Comparator;

<<<<<<< HEAD
use DOMNode;
use DOMDocument;
=======
use DOMDocument;
use DOMNode;
use PHPUnit\Framework\TestCase;
>>>>>>> dev

/**
 * @coversDefaultClass SebastianBergmann\Comparator\DOMNodeComparator
 *
<<<<<<< HEAD
 */
class DOMNodeComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class DOMNodeComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new DOMNodeComparator;
    }

    public function acceptsSucceedsProvider()
    {
        $document = new DOMDocument;
<<<<<<< HEAD
        $node = new DOMNode;

        return array(
          array($document, $document),
          array($node, $node),
          array($document, $node),
          array($node, $document)
        );
=======
        $node     = new DOMNode;

        return [
          [$document, $document],
          [$node, $node],
          [$document, $node],
          [$node, $document]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
        $document = new DOMDocument;

<<<<<<< HEAD
        return array(
          array($document, null),
          array(null, $document),
          array(null, null)
        );
=======
        return [
          [$document, null],
          [null, $document],
          [null, null]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<root/>')
          ),
          array(
            $this->createDOMDocument('<root attr="bar"></root>'),
            $this->createDOMDocument('<root attr="bar"/>')
          ),
          array(
            $this->createDOMDocument('<root><foo attr="bar"></foo></root>'),
            $this->createDOMDocument('<root><foo attr="bar"/></root>')
          ),
          array(
            $this->createDOMDocument("<root>\n  <child/>\n</root>"),
            $this->createDOMDocument('<root><child/></root>')
          ),
        );
=======
        return [
          [
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<root/>')
          ],
          [
            $this->createDOMDocument('<root attr="bar"></root>'),
            $this->createDOMDocument('<root attr="bar"/>')
          ],
          [
            $this->createDOMDocument('<root><foo attr="bar"></foo></root>'),
            $this->createDOMDocument('<root><foo attr="bar"/></root>')
          ],
          [
            $this->createDOMDocument("<root>\n  <child/>\n</root>"),
            $this->createDOMDocument('<root><child/></root>')
          ],
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<bar/>')
          ),
          array(
            $this->createDOMDocument('<foo attr1="bar"/>'),
            $this->createDOMDocument('<foo attr1="foobar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo />')
          ),
          array(
            $this->createDOMDocument('<foo xmlns="urn:myns:bar"/>'),
            $this->createDOMDocument('<foo xmlns="urn:notmyns:bar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo> bir </foo>')
          )
        );
=======
        return [
          [
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<bar/>')
          ],
          [
            $this->createDOMDocument('<foo attr1="bar"/>'),
            $this->createDOMDocument('<foo attr1="foobar"/>')
          ],
          [
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo />')
          ],
          [
            $this->createDOMDocument('<foo xmlns="urn:myns:bar"/>'),
            $this->createDOMDocument('<foo xmlns="urn:notmyns:bar"/>')
          ],
          [
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo> bir </foo>')
          ]
        ];
>>>>>>> dev
    }

    private function createDOMDocument($content)
    {
<<<<<<< HEAD
        $document = new DOMDocument;
=======
        $document                     = new DOMDocument;
>>>>>>> dev
        $document->preserveWhiteSpace = false;
        $document->loadXML($content);

        return $document;
    }

    /**
     * @covers       ::accepts
     * @dataProvider acceptsSucceedsProvider
     */
    public function testAcceptsSucceeds($expected, $actual)
    {
        $this->assertTrue(
          $this->comparator->accepts($expected, $actual)
        );
    }

    /**
     * @covers       ::accepts
     * @dataProvider acceptsFailsProvider
     */
    public function testAcceptsFails($expected, $actual)
    {
        $this->assertFalse(
          $this->comparator->accepts($expected, $actual)
        );
    }

    /**
     * @covers       ::assertEquals
     * @dataProvider assertEqualsSucceedsProvider
     */
    public function testAssertEqualsSucceeds($expected, $actual)
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual);
<<<<<<< HEAD
        }

        catch (ComparisonFailure $exception) {
=======
        } catch (ComparisonFailure $exception) {
>>>>>>> dev
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @covers       ::assertEquals
     * @dataProvider assertEqualsFailsProvider
     */
    public function testAssertEqualsFails($expected, $actual)
    {
<<<<<<< HEAD
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two DOM'
        );
=======
        $this->expectException(ComparisonFailure::class);
        $this->expectExceptionMessage('Failed asserting that two DOM');

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual);
    }
}
