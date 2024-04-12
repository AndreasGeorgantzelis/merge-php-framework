<?php

namespace app\Application\Interfaces;

use app\Application\Service\Request;

interface MiddlewareInterface
{
    public function setNext(MiddlewareInterface $handler): MiddlewareInterface;

    public function handle(Request $request);
}