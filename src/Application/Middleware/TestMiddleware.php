<?php

namespace app\Application\Middleware;

use app\Application\Service\Request;

class TestMiddleware extends Middleware
{
    public function handle(Request $request): void
    {
       var_dump('test');
        parent::handle($request);
    }
}
