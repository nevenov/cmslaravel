<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
<<<<<<< HEAD
use Symfony\Component\Console\Tests\Style\SymfonyStyleWithForcedLineLength;
=======
use Symfony\Component\Console\Style\SymfonyStyle;
>>>>>>> dev

// ensure that block() output is properly formatted (even padding lines)
return function (InputInterface $input, OutputInterface $output) {
    $output->setDecorated(true);
<<<<<<< HEAD
    $output = new SymfonyStyleWithForcedLineLength($input, $output);
=======
    $output = new SymfonyStyle($input, $output);
>>>>>>> dev
    $output->success(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
        'TEST'
    );
};
