<?php
/*
<<<<<<< HEAD
 * This file is part of the PHP_CodeCoverage package.
=======
 * This file is part of the php-code-coverage package.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
=======
namespace SebastianBergmann\CodeCoverage;

use SebastianBergmann\CodeCoverage\Driver\Xdebug;

>>>>>>> dev
/**
 * Abstract base class for test case classes.
 *
 * @since Class available since Release 1.0.0
 */
<<<<<<< HEAD
abstract class PHP_CodeCoverage_TestCase extends PHPUnit_Framework_TestCase
{
    protected function getXdebugDataForBankAccount()
    {
        return array(
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
=======
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected static $TEST_TMP_PATH;

    public static function setUpBeforeClass()
    {
        self::$TEST_TMP_PATH = TEST_FILES_PATH . 'tmp';
    }

    protected function getXdebugDataForBankAccount()
    {
        return [
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
>>>>>>> dev
                    8  => 1,
                    9  => -2,
                    13 => -1,
                    14 => -1,
                    15 => -1,
                    16 => -1,
                    18 => -1,
                    22 => -1,
                    24 => -1,
                    25 => -2,
                    29 => -1,
                    31 => -1,
                    32 => -2
<<<<<<< HEAD
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
=======
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
>>>>>>> dev
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    29 => 1,
<<<<<<< HEAD
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
=======
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
>>>>>>> dev
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    22 => 1,
<<<<<<< HEAD
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
=======
                ]
            ],
            [
                TEST_FILES_PATH . 'BankAccount.php' => [
>>>>>>> dev
                    8  => 1,
                    13 => 1,
                    14 => 1,
                    15 => 1,
                    18 => 1,
                    22 => 1,
                    24 => 1,
                    29 => 1,
                    31 => 1,
<<<<<<< HEAD
                )
            )
        );
=======
                ]
            ]
        ];
>>>>>>> dev
    }

    protected function getCoverageForBankAccount()
    {
        $data = $this->getXdebugDataForBankAccount();
<<<<<<< HEAD

        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
=======
        require_once TEST_FILES_PATH . '/BankAccountTest.php';

        $stub = $this->createMock(Xdebug::class);

>>>>>>> dev
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[0],
                $data[1],
                $data[2],
                $data[3]
            ));

<<<<<<< HEAD
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
=======
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceIsInitiallyZero'),
>>>>>>> dev
            true
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(6, 9)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(27, 32)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative2')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $coverage->start(
            new BankAccountTest('testDepositWithdrawMoney')
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(20, 25)]
        );

        $coverage->start(
            new \BankAccountTest('testDepositWithdrawMoney')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(
=======
            [
>>>>>>> dev
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
<<<<<<< HEAD
            )
=======
            ]
>>>>>>> dev
        );

        return $coverage;
    }

    protected function getCoverageForBankAccountForFirstTwoTests()
    {
        $data = $this->getXdebugDataForBankAccount();

<<<<<<< HEAD
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
=======
        $stub = $this->createMock(Xdebug::class);

>>>>>>> dev
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[0],
                $data[1]
            ));

<<<<<<< HEAD
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
=======
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceIsInitiallyZero'),
>>>>>>> dev
            true
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(6, 9)]
        );

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(27, 32)]
>>>>>>> dev
        );

        return $coverage;
    }

    protected function getCoverageForBankAccountForLastTwoTests()
    {
        $data = $this->getXdebugDataForBankAccount();

<<<<<<< HEAD
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
=======
        $stub = $this->createMock(Xdebug::class);

>>>>>>> dev
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $data[2],
                $data[3]
            ));

<<<<<<< HEAD
        $coverage = new PHP_CodeCoverage($stub, new PHP_CodeCoverage_Filter);

        $coverage->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
=======
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'BankAccount.php');

        $coverage = new CodeCoverage($stub, $filter);

        $coverage->start(
            new \BankAccountTest('testBalanceCannotBecomeNegative2')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $coverage->start(
            new BankAccountTest('testDepositWithdrawMoney')
=======
            [TEST_FILES_PATH . 'BankAccount.php' => range(20, 25)]
        );

        $coverage->start(
            new \BankAccountTest('testDepositWithdrawMoney')
>>>>>>> dev
        );

        $coverage->stop(
            true,
<<<<<<< HEAD
            array(
=======
            [
>>>>>>> dev
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
<<<<<<< HEAD
            )
=======
            ]
>>>>>>> dev
        );

        return $coverage;
    }

    protected function getExpectedDataArrayForBankAccount()
    {
<<<<<<< HEAD
        return array(
            TEST_FILES_PATH . 'BankAccount.php' => array(
                8 => array(
                    0 => 'BankAccountTest::testBalanceIsInitiallyZero',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                9  => null,
                13 => array(),
                14 => array(),
                15 => array(),
                16 => array(),
                18 => array(),
                22 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                24 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ),
                25 => null,
                29 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                31 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                32 => null
            )
        );
=======
        return [
            TEST_FILES_PATH . 'BankAccount.php' => [
                8 => [
                    0 => 'BankAccountTest::testBalanceIsInitiallyZero',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                9  => null,
                13 => [],
                14 => [],
                15 => [],
                16 => [],
                18 => [],
                22 => [
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                24 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ],
                25 => null,
                29 => [
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                31 => [
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ],
                32 => null
            ]
        ];
>>>>>>> dev
    }

    protected function getCoverageForFileWithIgnoredLines()
    {
<<<<<<< HEAD
        $coverage = new PHP_CodeCoverage(
            $this->setUpXdebugStubForFileWithIgnoredLines(),
            new PHP_CodeCoverage_Filter
=======
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'source_with_ignore.php');

        $coverage = new CodeCoverage(
            $this->setUpXdebugStubForFileWithIgnoredLines(),
            $filter
>>>>>>> dev
        );

        $coverage->start('FileWithIgnoredLines', true);
        $coverage->stop();

        return $coverage;
    }

    protected function setUpXdebugStubForFileWithIgnoredLines()
    {
<<<<<<< HEAD
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_ignore.php' => array(
=======
        $stub = $this->createMock(Xdebug::class);

        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                [
                    TEST_FILES_PATH . 'source_with_ignore.php' => [
>>>>>>> dev
                        2 => 1,
                        4 => -1,
                        6 => -1,
                        7 => 1
<<<<<<< HEAD
                    )
                )
=======
                    ]
                ]
>>>>>>> dev
            ));

        return $stub;
    }

    protected function getCoverageForClassWithAnonymousFunction()
    {
<<<<<<< HEAD
        $coverage = new PHP_CodeCoverage(
            $this->setUpXdebugStubForClassWithAnonymousFunction(),
            new PHP_CodeCoverage_Filter
=======
        $filter = new Filter;
        $filter->addFileToWhitelist(TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php');

        $coverage = new CodeCoverage(
            $this->setUpXdebugStubForClassWithAnonymousFunction(),
            $filter
>>>>>>> dev
        );

        $coverage->start('ClassWithAnonymousFunction', true);
        $coverage->stop();

        return $coverage;
    }

    protected function setUpXdebugStubForClassWithAnonymousFunction()
    {
<<<<<<< HEAD
        $stub = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php' => array(
=======
        $stub = $this->createMock(Xdebug::class);

        $stub->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                [
                    TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php' => [
>>>>>>> dev
                        7  => 1,
                        9  => 1,
                        10 => -1,
                        11 => 1,
                        12 => 1,
                        13 => 1,
                        14 => 1,
                        17 => 1,
                        18 => 1
<<<<<<< HEAD
                    )
                )
=======
                    ]
                ]
>>>>>>> dev
            ));

        return $stub;
    }
}
