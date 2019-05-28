<?php
/*
<<<<<<< HEAD
 * This file is part of the GlobalState package.
=======
 * This file is part of sebastian/global-state.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
namespace SebastianBergmann\GlobalState;

use ArrayObject;
use PHPUnit_Framework_TestCase;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;

/**
 */
class SnapshotTest extends PHPUnit_Framework_TestCase
{
    public function testStaticAttributes()
    {
        $blacklist = $this->getBlacklist();
        $blacklist->method('isStaticAttributeBlacklisted')->willReturnCallback(function ($class) {
            return $class !== 'SebastianBergmann\GlobalState\TestFixture\SnapshotClass';
        });

        SnapshotClass::init();

        $snapshot = new Snapshot($blacklist, false, true, false, false, false, false, false, false, false);
        $expected = array('SebastianBergmann\GlobalState\TestFixture\SnapshotClass' => array(
            'string' => 'snapshot',
            'arrayObject' => new ArrayObject(array(1, 2, 3)),
            'stdClass' => new \stdClass(),
        ));
=======
declare(strict_types=1);

namespace SebastianBergmann\GlobalState;

use ArrayObject;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;
use SebastianBergmann\GlobalState\TestFixture\SnapshotTrait;

/**
 * @covers \SebastianBergmann\GlobalState\Snapshot
 */
class SnapshotTest extends TestCase
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    protected function setUp()
    {
        $this->blacklist = $this->createMock(Blacklist::class);
    }

    public function testStaticAttributes()
    {
        $this->blacklist->method('isStaticAttributeBlacklisted')->willReturnCallback(
            function ($class) {
                return $class !== SnapshotClass::class;
            }
        );

        SnapshotClass::init();

        $snapshot = new Snapshot($this->blacklist, false, true, false, false, false, false, false, false, false);

        $expected = [
            SnapshotClass::class => [
                'string'      => 'snapshot',
                'arrayObject' => new ArrayObject([1, 2, 3]),
                'stdClass'    => new \stdClass(),
            ]
        ];
>>>>>>> dev

        $this->assertEquals($expected, $snapshot->staticAttributes());
    }

    public function testConstants()
    {
<<<<<<< HEAD
        $snapshot = new Snapshot($this->getBlacklist(), false, false, true, false, false, false, false, false, false);
=======
        $snapshot = new Snapshot($this->blacklist, false, false, true, false, false, false, false, false, false);

>>>>>>> dev
        $this->assertArrayHasKey('GLOBALSTATE_TESTSUITE', $snapshot->constants());
    }

    public function testFunctions()
    {
<<<<<<< HEAD
        require_once __DIR__.'/_fixture/SnapshotFunctions.php';

        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, true, false, false, false, false, false);
        $functions = $snapshot->functions();

        $this->assertThat(
            $functions,
            $this->logicalOr(
                // Zend
                $this->contains('sebastianbergmann\globalstate\testfixture\snapshotfunction'),
                // HHVM
                $this->contains('SebastianBergmann\GlobalState\TestFixture\snapshotFunction')
            )
        );

=======
        $snapshot  = new Snapshot($this->blacklist, false, false, false, true, false, false, false, false, false);
        $functions = $snapshot->functions();

        $this->assertContains('sebastianbergmann\globalstate\testfixture\snapshotfunction', $functions);
>>>>>>> dev
        $this->assertNotContains('assert', $functions);
    }

    public function testClasses()
    {
<<<<<<< HEAD
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, true, false, false, false, false);
        $classes = $snapshot->classes();

        $this->assertContains('PHPUnit_Framework_TestCase', $classes);
        $this->assertNotContains('Exception', $classes);
=======
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, true, false, false, false, false);
        $classes  = $snapshot->classes();

        $this->assertContains(TestCase::class, $classes);
        $this->assertNotContains(Exception::class, $classes);
>>>>>>> dev
    }

    public function testInterfaces()
    {
<<<<<<< HEAD
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, true, false, false, false);
        $interfaces = $snapshot->interfaces();

        $this->assertContains('PHPUnit_Framework_Test', $interfaces);
        $this->assertNotContains('Countable', $interfaces);
    }

    /**
     * @requires PHP 5.4
     */
    public function testTraits()
    {
        spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, true, false, false);
        $this->assertContains('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait', $snapshot->traits());
=======
        $snapshot   = new Snapshot($this->blacklist, false, false, false, false, false, true, false, false, false);
        $interfaces = $snapshot->interfaces();

        $this->assertContains(BlacklistedInterface::class, $interfaces);
        $this->assertNotContains(\Countable::class, $interfaces);
    }

    public function testTraits()
    {
        \spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, true, false, false);

        $this->assertContains(SnapshotTrait::class, $snapshot->traits());
>>>>>>> dev
    }

    public function testIniSettings()
    {
<<<<<<< HEAD
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, true, false);
=======
        $snapshot    = new Snapshot($this->blacklist, false, false, false, false, false, false, false, true, false);
>>>>>>> dev
        $iniSettings = $snapshot->iniSettings();

        $this->assertArrayHasKey('date.timezone', $iniSettings);
        $this->assertEquals('Etc/UTC', $iniSettings['date.timezone']);
    }

    public function testIncludedFiles()
    {
<<<<<<< HEAD
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $snapshot->includedFiles());
    }

    /**
     * @return \SebastianBergmann\GlobalState\Blacklist
     */
    private function getBlacklist()
    {
        return $this->getMockBuilder('SebastianBergmann\GlobalState\Blacklist')
                    ->disableOriginalConstructor()
                    ->getMock();
    }
=======
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $snapshot->includedFiles());
    }
>>>>>>> dev
}
