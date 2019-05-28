<?php
<<<<<<< HEAD
=======
use PHPUnit\Framework\TestSuite;

>>>>>>> dev
class DependencyTestSuite
{
    public static function suite()
    {
<<<<<<< HEAD
        $suite = new PHPUnit_Framework_TestSuite('Test Dependencies');

        $suite->addTestSuite('DependencySuccessTest');
        $suite->addTestSuite('DependencyFailureTest');
=======
        $suite = new TestSuite('Test Dependencies');

        $suite->addTestSuite(DependencySuccessTest::class);
        $suite->addTestSuite(DependencyFailureTest::class);
>>>>>>> dev

        return $suite;
    }
}
