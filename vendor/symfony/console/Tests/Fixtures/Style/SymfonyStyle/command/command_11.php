<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
<<<<<<< HEAD
use Symfony\Component\Console\Tests\Style\SymfonyStyleWithForcedLineLength;
=======
use Symfony\Component\Console\Style\SymfonyStyle;
>>>>>>> dev

// ensure long words are properly wrapped in blocks
return function (InputInterface $input, OutputInterface $output) {
    $word = 'Lopadotemachoselachogaleokranioleipsanodrimhypotrimmatosilphioparaomelitokatakechymenokichlepikossyphophattoperisteralektryonoptekephalliokigklopeleiolagoiosiraiobaphetraganopterygon';
<<<<<<< HEAD
    $sfStyle = new SymfonyStyleWithForcedLineLength($input, $output);
=======
    $sfStyle = new SymfonyStyle($input, $output);
>>>>>>> dev
    $sfStyle->block($word, 'CUSTOM', 'fg=white;bg=blue', ' § ', false);
};
