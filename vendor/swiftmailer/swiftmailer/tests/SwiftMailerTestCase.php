<?php

<<<<<<< HEAD
=======
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

>>>>>>> dev
/**
 * A base test case with some custom expectations.
 *
 * @author Rouven Weßling
 */
<<<<<<< HEAD
class SwiftMailerTestCase extends \PHPUnit_Framework_TestCase
{
=======
class SwiftMailerTestCase extends \PHPUnit\Framework\TestCase
{
    use MockeryPHPUnitIntegration;

>>>>>>> dev
    public static function regExp($pattern)
    {
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

<<<<<<< HEAD
        return new PHPUnit_Framework_Constraint_PCREMatch($pattern);
=======
        return new \PHPUnit\Framework\Constraint\RegularExpression($pattern);
>>>>>>> dev
    }

    public function assertIdenticalBinary($expected, $actual, $message = '')
    {
        $constraint = new IdenticalBinaryConstraint($expected);
        self::assertThat($actual, $constraint, $message);
    }

    protected function tearDown()
    {
        \Mockery::close();
    }

    protected function getMockery($class)
    {
        return \Mockery::mock($class);
    }
}
