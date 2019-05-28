<?php

require_once 'swift_required.php';

//This is more of a "cross your fingers and hope it works" test!

<<<<<<< HEAD
class Swift_DependencyContainerAcceptanceTest extends \PHPUnit_Framework_TestCase
=======
class Swift_DependencyContainerAcceptanceTest extends PHPUnit\Framework\TestCase
>>>>>>> dev
{
    public function testNoLookupsFail()
    {
        $di = Swift_DependencyContainer::getInstance();
        foreach ($di->listItems() as $itemName) {
            try {
<<<<<<< HEAD
                // to be removed in 6.0
                if ('transport.mail' === $itemName) {
                    continue;
                }
=======
>>>>>>> dev
                $di->lookup($itemName);
            } catch (Swift_DependencyException $e) {
                $this->fail($e->getMessage());
            }
        }
<<<<<<< HEAD
=======
        // previous loop would fail if there is an issue
        $this->addToAssertionCount(1);
>>>>>>> dev
    }
}
