<?php

namespace app\Controllers;

class DummyController
{
    public function __invoke(): void
    {
        echo 'Hello world';
    }
}