<?php

namespace app\Application\Interfaces;

use app\Application\Service\Request;

interface RouterInterface
{
    public function mapRoutes() : void;
    public function resolve(Request $request) : void;

}
