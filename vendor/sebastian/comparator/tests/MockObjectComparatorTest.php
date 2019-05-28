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
/**
 * @coversDefaultClass SebastianBergmann\Comparator\MockObjectComparator
 *
 */
class MockObjectComparatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @coversDefaultClass SebastianBergmann\Comparator\MockObjectComparator
 *
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class MockObjectComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new MockObjectComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        $testmock = $this->getMock('SebastianBergmann\\Comparator\\TestClass');
        $stdmock = $this->getMock('stdClass');

        return array(
          array($testmock, $testmock),
          array($stdmock, $stdmock),
          array($stdmock, $testmock)
        );
=======
        $testmock = $this->createMock(TestClass::class);
        $stdmock  = $this->createMock(stdClass::class);

        return [
          [$testmock, $testmock],
          [$stdmock, $stdmock],
          [$stdmock, $testmock]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        $stdmock = $this->getMock('stdClass');

        return array(
          array($stdmock, null),
          array(null, $stdmock),
          array(null, null)
        );
=======
        $stdmock = $this->createMock(stdClass::class);

        return [
          [$stdmock, null],
          [null, $stdmock],
          [null, null]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
        // cyclic dependencies
<<<<<<< HEAD
        $book1 = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $book1->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $book1->author->books[] = $book1;
        $book2 = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $book2->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $book2->author->books[] = $book2;

        $object1 = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));
        $object2 = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));

        return array(
          array($object1, $object1),
          array($object1, $object2),
          array($book1, $book1),
          array($book1, $book2),
          array(
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.3)),
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.5)),
            0.5
          )
        );
=======
        $book1                  = $this->getMockBuilder(Book::class)->setMethods(null)->getMock();
        $book1->author          = $this->getMockBuilder(Author::class)->setMethods(null)->setConstructorArgs(['Terry Pratchett'])->getMock();
        $book1->author->books[] = $book1;
        $book2                  = $this->getMockBuilder(Book::class)->setMethods(null)->getMock();
        $book2->author          = $this->getMockBuilder(Author::class)->setMethods(null)->setConstructorArgs(['Terry Pratchett'])->getMock();
        $book2->author->books[] = $book2;

        $object1 = $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([4, 8, 15])->getMock();
        $object2 = $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([4, 8, 15])->getMock();

        return [
          [$object1, $object1],
          [$object1, $object2],
          [$book1, $book1],
          [$book1, $book2],
          [
            $this->getMockBuilder(Struct::class)->setMethods(null)->setConstructorArgs([2.3])->getMock(),
            $this->getMockBuilder(Struct::class)->setMethods(null)->setConstructorArgs([2.5])->getMock(),
            0.5
          ]
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        $typeMessage = 'is not instance of expected class';
        $equalMessage = 'Failed asserting that two objects are equal.';

        // cyclic dependencies
        $book1 = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $book1->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratchett'));
        $book1->author->books[] = $book1;
        $book2 = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $book2->author = $this->getMock('SebastianBergmann\\Comparator\\Author', null, array('Terry Pratch'));
        $book2->author->books[] = $book2;

        $book3 = $this->getMock('SebastianBergmann\\Comparator\\Book', null);
        $book3->author = 'Terry Pratchett';
        $book4 = $this->getMock('stdClass');
        $book4->author = 'Terry Pratchett';

        $object1 = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15));
        $object2 = $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(16, 23, 42));

        return array(
          array(
            $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(4, 8, 15)),
            $this->getMock('SebastianBergmann\\Comparator\\SampleClass', null, array(16, 23, 42)),
            $equalMessage
          ),
          array($object1, $object2, $equalMessage),
          array($book1, $book2, $equalMessage),
          array($book3, $book4, $typeMessage),
          array(
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(2.3)),
            $this->getMock('SebastianBergmann\\Comparator\\Struct', null, array(4.2)),
            $equalMessage,
            0.5
          )
        );
=======
        $typeMessage  = 'is not instance of expected class';
        $equalMessage = 'Failed asserting that two objects are equal.';

        // cyclic dependencies
        $book1                  = $this->getMockBuilder(Book::class)->setMethods(null)->getMock();
        $book1->author          = $this->getMockBuilder(Author::class)->setMethods(null)->setConstructorArgs(['Terry Pratchett'])->getMock();
        $book1->author->books[] = $book1;
        $book2                  = $this->getMockBuilder(Book::class)->setMethods(null)->getMock();
        $book1->author          = $this->getMockBuilder(Author::class)->setMethods(null)->setConstructorArgs(['Terry Pratch'])->getMock();
        $book2->author->books[] = $book2;

        $book3         = $this->getMockBuilder(Book::class)->setMethods(null)->getMock();
        $book3->author = 'Terry Pratchett';
        $book4         = $this->createMock(stdClass::class);
        $book4->author = 'Terry Pratchett';

        $object1 = $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([4, 8, 15])->getMock();
        $object2 = $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([16, 23, 42])->getMock();

        return [
          [
            $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([4, 8, 15])->getMock(),
            $this->getMockBuilder(SampleClass::class)->setMethods(null)->setConstructorArgs([16, 23, 42])->getMock(),
            $equalMessage
          ],
          [$object1, $object2, $equalMessage],
          [$book1, $book2, $equalMessage],
          [$book3, $book4, $typeMessage],
          [
            $this->getMockBuilder(Struct::class)->setMethods(null)->setConstructorArgs([2.3])->getMock(),
            $this->getMockBuilder(Struct::class)->setMethods(null)->setConstructorArgs([4.2])->getMock(),
            $equalMessage,
            0.5
          ]
        ];
>>>>>>> dev
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
    public function testAssertEqualsSucceeds($expected, $actual, $delta = 0.0)
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, $delta);
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
    public function testAssertEqualsFails($expected, $actual, $message, $delta = 0.0)
    {
<<<<<<< HEAD
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $message
        );
=======
        $this->expectException(ComparisonFailure::class);
        $this->expectExceptionMessage($message);

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual, $delta);
    }
}
