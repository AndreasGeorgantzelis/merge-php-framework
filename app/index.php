<?php

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';
use Bramus\Router\Router;

$router = new Router();

$router->get('/', function() {
    echo 'Hello World!';
});

$router->run();