<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Gustavovinicius\Example\ExampleFacade;
use Gustavovinicius\Example\Controllers\PostController;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Gustavo Slim version 4");
    return $response;
});

$app->get('/example', function (Request $request, Response $response, $args) {
    $example = new ExampleFacade();
    $result = $example->test1();
    $response->getBody()->write($result);
    return $response;
});

$app->get('/posts', function (Request $request, Response $response, $args) {
    $postController = new PostController();
    return $postController->index();
});

$app->run();
