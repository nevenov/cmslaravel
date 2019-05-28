<?php

<<<<<<< HEAD
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tests\Style\SymfonyStyleWithForcedLineLength;
use Symfony\Component\Console\Helper\TableCell;

//Ensure formatting tables when using multiple headers with TableCell
return function (InputInterface $input, OutputInterface $output) {
    $headers = array(
        array(new TableCell('Main table title', array('colspan' => 3))),
        array('ISBN', 'Title', 'Author'),
    );

    $rows = array(
        array(
            '978-0521567817',
            'De Monarchia',
            new TableCell("Dante Alighieri\nspans multiple rows", array('rowspan' => 2)),
        ),
        array('978-0804169127', 'Divine Comedy'),
    );

    $output = new SymfonyStyleWithForcedLineLength($input, $output);
=======
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

//Ensure formatting tables when using multiple headers with TableCell
return function (InputInterface $input, OutputInterface $output) {
    $headers = [
        [new TableCell('Main table title', ['colspan' => 3])],
        ['ISBN', 'Title', 'Author'],
    ];

    $rows = [
        [
            '978-0521567817',
            'De Monarchia',
            new TableCell("Dante Alighieri\nspans multiple rows", ['rowspan' => 2]),
        ],
        ['978-0804169127', 'Divine Comedy'],
    ];

    $output = new SymfonyStyle($input, $output);
>>>>>>> dev
    $output->table($headers, $rows);
};
