# Slim

Slim example.

Created by: Gustavo Vinicius

```sh
composer require slim/slim:"4.*"

composer require slim/psr7
```

### ./public/index.php
```php
<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->run();
```

```
http://localhost/

Result: Gustavo Slim version 4
```
