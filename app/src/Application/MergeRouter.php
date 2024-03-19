<?php

namespace App\src\Application;
use Bramus\Router\Router;
class MergeRouter
{
    public function __construct(public Router $router) {

    }
    public function route(): void {

        $this->router->get('/', function() {
            echo 'Hello World!';
        });

        $this->router->run();
    }
}