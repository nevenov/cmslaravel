<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
<<<<<<< HEAD
use Symfony\Component\Console\Tests\Style\SymfonyStyleWithForcedLineLength;

//Ensure has single blank line between two titles
return function (InputInterface $input, OutputInterface $output) {
    $output = new SymfonyStyleWithForcedLineLength($input, $output);
=======
use Symfony\Component\Console\Style\SymfonyStyle;

//Ensure has single blank line between two titles
return function (InputInterface $input, OutputInterface $output) {
    $output = new SymfonyStyle($input, $output);
>>>>>>> dev
    $output->title('First title');
    $output->title('Second title');
};
