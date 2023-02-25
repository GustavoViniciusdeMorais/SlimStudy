<?php

namespace Gustavovinicius\Crm\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(name: 'crm:migrate')]
class DatabaseMigrationCommand extends Command
{
    private $migrations  = [
        Gustavovinicius\Crm\Database\Migrations\CreateProductsTable::class
    ];

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach ($this->migrations as $class) {
            if (class_exists($class)) {
                $command = new $class();
                $command->up();
            }
        }
    }
}
