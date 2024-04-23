<?php
declare(strict_types=1);

namespace app\Application\Service;
use AltoRouter;
use app\Application\Interfaces\RouterInterface;
use app\Application\Middleware\MiddlewareManagement;

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
                $middlewares = $routeDefinition[4];
                $this->router->map($method, $routePattern, $target, $name, $middlewares);
            }
        } catch (\Exception $e) {
            // Handle or log the exception
            echo "Error mapping routes: " . $e->getMessage();
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function resolve(Request $request) : void {

        $match = $this->router->match();
        $this->runMiddlewares($request,$match);

        if( is_array($match) && is_callable( $match['target'] ) ) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            $this->response->setStatusCode(404);
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }

    /**
     * @param Request $request
     * @param $match
     * @return void
     */
    public function runMiddlewares(Request $request,$match) {
        $middleware = new MiddlewareManagement($request);
        $middleware->run( $match['middlewares']);
    }
}