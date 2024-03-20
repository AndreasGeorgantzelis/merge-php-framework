<?php

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';


$app = new \app\Application\Framework();

// the code below is for testing purposes

//$router = new \app\Application\MergeRouter();
//$router->addRoute('get',  '/topg',  function () {
//    echo 'hi';
//});

$app->run();
