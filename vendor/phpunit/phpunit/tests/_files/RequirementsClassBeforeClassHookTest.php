<?php
<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev

/**
 * @requires extension nonExistingExtension
 */
<<<<<<< HEAD
class RequirementsClassBeforeClassHookTest extends PHPUnit_Framework_TestCase
=======
class RequirementsClassBeforeClassHookTest extends TestCase
>>>>>>> dev
{
    public static function setUpBeforeClass()
    {
        throw new Exception(__METHOD__ . ' should not be called because of class requirements.');
    }
}
