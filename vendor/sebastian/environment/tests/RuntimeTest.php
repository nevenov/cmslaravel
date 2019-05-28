<?php
/*
<<<<<<< HEAD
 * This file is part of the Environment package.
=======
 * This file is part of sebastian/environment.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
namespace SebastianBergmann\Environment;

use PHPUnit_Framework_TestCase;

class RuntimeTest extends PHPUnit_Framework_TestCase
=======
declare(strict_types=1);

namespace SebastianBergmann\Environment;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\Environment\Runtime
 */
final class RuntimeTest extends TestCase
>>>>>>> dev
{
    /**
     * @var \SebastianBergmann\Environment\Runtime
     */
    private $env;

<<<<<<< HEAD
    protected function setUp()
=======
    protected function setUp()/*: void*/
>>>>>>> dev
    {
        $this->env = new Runtime;
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::canCollectCodeCoverage
     * @uses   \SebastianBergmann\Environment\Runtime::hasXdebug
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testAbilityToCollectCodeCoverageCanBeAssessed()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testAbilityToCollectCodeCoverageCanBeAssessed()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->env->canCollectCodeCoverage());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::getBinary
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testBinaryCanBeRetrieved()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testBinaryCanBeRetrieved()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('string', $this->env->getBinary());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testCanBeDetected()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanBeDetected()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->env->isHHVM());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::isPHP
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testCanBeDetected2()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanBeDetected2()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->env->isPHP());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::hasXdebug
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testXdebugCanBeDetected()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testXdebugCanBeDetected()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->env->hasXdebug());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::getNameWithVersion
     * @uses   \SebastianBergmann\Environment\Runtime::getName
     * @uses   \SebastianBergmann\Environment\Runtime::getVersion
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testNameAndVersionCanBeRetrieved()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testNameAndVersionCanBeRetrieved()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('string', $this->env->getNameWithVersion());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::getName
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testNameCanBeRetrieved()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testNameCanBeRetrieved()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('string', $this->env->getName());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::getVersion
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testVersionCanBeRetrieved()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testVersionCanBeRetrieved()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('string', $this->env->getVersion());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Runtime::getVendorUrl
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testVendorUrlCanBeRetrieved()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testVendorUrlCanBeRetrieved()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('string', $this->env->getVendorUrl());
    }
}
