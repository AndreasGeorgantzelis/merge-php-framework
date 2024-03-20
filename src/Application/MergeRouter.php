<?php

namespace app\Application;
use Bramus\Router\Router;
class MergeRouter
{
    protected array $routes;
    public Router $router;
    public function __construct() {
        $this->router = new Router();
        $this->routes = require_once __DIR__ . '/../../public/routes.php';
    }
    public function addRoute(string $method, string $pattern, callable $callable): void {
        $this->router->$method($pattern, $callable);
    }

    public function resolve() : void {
        foreach ($this->routes as $route) {
            $method = $route[0] ?: "get";
            $pattern = $route[1];
            $callable = $route[2];

            $this->router->$method($pattern, $callable);
        }
        $this->router->run();
    }
}