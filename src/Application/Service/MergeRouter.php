<?php
declare(strict_types=1);

namespace app\Application\Service;
use AltoRouter;

class MergeRouter
{
    protected array $routes;
    public AltoRouter $router;
    public function __construct() {
        $this->router = new AltoRouter();
        $this->routes = require_once __DIR__ . '/../../../public/routes.php';
    }

    //todo : maybe split the following to matchRout and resolve
    public function mapRoutes() : void {
        try {
            foreach ($this->routes as $routeDefinition) {
                $method = $routeDefinition[0] ?: "GET";
                $routePattern = $routeDefinition[1];
                $target = $routeDefinition[2];
                $name = $routeDefinition[3];
                $this->router->map($method, $routePattern, $target, $name);
            }
        } catch (\Exception $e) {
            // Handle or log the exception
            echo "Error mapping routes: " . $e->getMessage();
        }
    }
    public function resolve() : void {
        $match = $this->router->match();
        if( is_array($match) && is_callable( $match['target'] ) ) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            // no route was matched
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}