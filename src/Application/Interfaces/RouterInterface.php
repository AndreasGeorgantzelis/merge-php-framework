<?php

namespace app\Application\Interfaces;

interface RouterInterface
{
    public function mapRoutes() : void;
    public function resolve() : void;

}
