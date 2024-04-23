<?php

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';
$request = new \app\Application\Service\Request();
$app = new \app\Application\Service\Framework();

$app->run($request);
