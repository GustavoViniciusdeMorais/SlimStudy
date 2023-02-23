# Package Example

### Add the src of the package in the composer of the main project
```
{
    "require": {
        "slim/slim": "4.*",
        "slim/psr7": "^1.6"
    },
    "autoload": {
        "psr-4": {
            "Gustavovinicius\\Example\\": "src/packages/example/src"
        }
    }
}
```

### In the public index file of the slim project, call the desired class of the pakcage
```
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Gustavovinicius\Example\ExampleFacade;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/example', function (Request $request, Response $response, $args) {
    $example = new ExampleFacade();
    $result = $example->test1();
    $response->getBody()->write($result);
    return $response;
});

$app->run();
```

### Package Class
```
<?php

namespace Gustavovinicius\Example;

class ExampleFacade
{
    public function test1()
    {
        return "Example Package";
    }
}
```

### Package composer
```
{
    "name": "gustavovinicius/example",
    "description": "package",
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "Gustavovinicius\\Example\\": "src/"
        }
    },
    "authors": [{
        "name": "Gustavo"
    }],
    "require": {}
}
```
