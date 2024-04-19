<?php
declare(strict_types=1);

namespace app\Application\Service;
use AltoRouter;
use app\Application\Interfaces\RouterInterface;

class MergeRouter implements RouterInterface
{
    protected array $routes;
    public AltoRouter $router;
    public Response $response;
    public function __construct() {
        $this->response = new Response();
        $this->router = new AltoRouter();
        $this->routes = require_once __DIR__ . '/../../../public/routes.php';
    }

    /**
     * @param string $method
     * @param string $pattern
     * @param $target
     * @param string $name
     * @return void
     */
    public function addRoute(string $method, string $pattern, $target, string $name) : void {
        $this->routes[] = [ $method , $pattern, $target , $name ];
    }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function resolve() : void {
        $match = $this->router->match();
        if( is_array($match) && is_callable( $match['target'] ) ) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            // no route was matched
            $this->response->setStatusCode(404);
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}