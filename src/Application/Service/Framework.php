<?php
declare(strict_types=1);

namespace app\Application\Service;

final class Framework
{
    public $factory;
    public $router;

    public function __construct()
    {
        $this->factory = new RouterFactory();
        $this->router =  $this->factory::create();
    }

    /**
     * @return void
     */
    public function run(Request $request): void
    {
        $this->router->mapRoutes();
        $this->router->resolve($request);
    }
}
