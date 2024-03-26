<?php
declare(strict_types=1);

namespace app\Application\Controller;

final class HomeController
{
    public function __construct()
    {}

    public function __invoke() : int
    {
       return require_once __DIR__ . '/../../../views/home.php';
    }
}