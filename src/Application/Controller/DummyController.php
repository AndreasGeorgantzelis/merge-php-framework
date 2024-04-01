<?php
declare(strict_types=1);

namespace app\Application\Controller;

final class DummyController
{
    public function __construct()
    {}

    public function __invoke() : void
    {
       echo 'Hello world';
    }
}