# My Symfony Command

```
composer require symfony/console
# current using version 6.2

```

### ./src/bin/console
```php
#!/usr/bin/env php
<?php

require_once __DIR__ . '../../../vendor/autoload.php';
 
use Symfony\Component\Console\Application;

// load all commands here from an external php file
$commands  = [
    Gustavovinicius\Crm\Commands\ExampleCommand::class,
];

$application = new Application();

foreach ($commands as $class) {
    if (!class_exists($class)) {
        throw new RuntimeException(sprintf('Class %s does not exist', $class));
    }
    $command = new $class();
    $application->add($command);
}

$application->run();
```

### ./src/Commands/ExampleCommand.php
```php
<?php

namespace Gustavovinicius\Crm\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(name: 'crm:example')]
class ExampleCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        echo " Test Example Command \n\n";
    }
}
```

```
php src/bin/console crm:example
```


