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

use PHPUnit_Framework_TestCase;

/**
 */
class BlacklistTest extends PHPUnit_Framework_TestCase
=======
declare(strict_types=1);

namespace SebastianBergmann\GlobalState;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;

/**
 * @covers \SebastianBergmann\GlobalState\Blacklist
 */
class BlacklistTest extends TestCase
>>>>>>> dev
{
    /**
     * @var \SebastianBergmann\GlobalState\Blacklist
     */
    private $blacklist;

    protected function setUp()
    {
        $this->blacklist = new Blacklist;
    }

    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
    {
        $this->assertFalse($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

    public function testGlobalVariableCanBeBlacklisted()
    {
        $this->blacklist->addGlobalVariable('variable');

        $this->assertTrue($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
    {
        $this->assertFalse(
            $this->blacklist->isStaticAttributeBlacklisted(
<<<<<<< HEAD
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
=======
                BlacklistedClass::class,
>>>>>>> dev
                'attribute'
            )
        );
    }

    public function testClassCanBeBlacklisted()
    {
<<<<<<< HEAD
        $this->blacklist->addClass('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
=======
        $this->blacklist->addClass(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
>>>>>>> dev
                'attribute'
            )
        );
    }

    public function testSubclassesCanBeBlacklisted()
    {
<<<<<<< HEAD
        $this->blacklist->addSubclassesOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass',
=======
        $this->blacklist->addSubclassesOf(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedChildClass::class,
>>>>>>> dev
                'attribute'
            )
        );
    }

    public function testImplementorsCanBeBlacklisted()
    {
<<<<<<< HEAD
        $this->blacklist->addImplementorsOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor',
=======
        $this->blacklist->addImplementorsOf(BlacklistedInterface::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedImplementor::class,
>>>>>>> dev
                'attribute'
            )
        );
    }

    public function testClassNamePrefixesCanBeBlacklisted()
    {
        $this->blacklist->addClassNamePrefix('SebastianBergmann\GlobalState');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
<<<<<<< HEAD
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
=======
                BlacklistedClass::class,
>>>>>>> dev
                'attribute'
            )
        );
    }

    public function testStaticAttributeCanBeBlacklisted()
    {
        $this->blacklist->addStaticAttribute(
<<<<<<< HEAD
            'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
=======
            BlacklistedClass::class,
>>>>>>> dev
            'attribute'
        );

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
<<<<<<< HEAD
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
=======
                BlacklistedClass::class,
>>>>>>> dev
                'attribute'
            )
        );
    }
}
