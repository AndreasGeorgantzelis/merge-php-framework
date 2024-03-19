<?php

namespace App\src\Application;

 final class Framework
{
    public function __construct(private MergeRouter $router)
    {}

    public function __invoke(): void
    {
        $this->router->route();
    }
}
