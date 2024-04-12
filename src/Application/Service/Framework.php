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

    public function run(): void
    {
        $this->router->mapRoutes();
        $this->router->resolve();
    }
}
