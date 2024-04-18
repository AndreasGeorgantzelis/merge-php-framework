<?php

namespace app\Application\Middleware;

use app\Application\Service\Request;

class AuthMiddleware
{
    public function handle(Request $request)
    {
        if ($request->getBody() <= 200) {
            return "hello world";
        }

        return $request;
    }
}