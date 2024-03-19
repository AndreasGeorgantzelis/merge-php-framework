<?php

namespace app\Application;
use Bramus\Router\Router;
class MergeRouter
{
    public Router $router;
    public function __construct() {
        $this->router = new Router();
    }
    public function route(): void {

        $this->router->get('/', function() {
            echo 'Hello World!';
        });

        $this->router->run();
    }
}