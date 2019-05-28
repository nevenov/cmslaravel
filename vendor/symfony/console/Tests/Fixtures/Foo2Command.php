<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Foo2Command extends Command
{
    protected function configure()
    {
        $this
            ->setName('foo1:bar')
            ->setDescription('The foo1:bar command')
<<<<<<< HEAD
            ->setAliases(array('afoobar2'))
=======
            ->setAliases(['afoobar2'])
>>>>>>> dev
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
