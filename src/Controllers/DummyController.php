<?php

namespace app\src\Controllers;

class DummyController
{
    public function __invoke(): void
    {
        echo 'Hello world';
    }
}