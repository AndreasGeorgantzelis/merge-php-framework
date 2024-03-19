<?php

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

use \app\src\Application\Framework;
$app = new Framework();

$app->router();
