<?php

namespace app\Application\Controller;

class ContactController
{
    public function __construct()
    {}

    public function __invoke() : int
    {
        return require_once __DIR__ . '/../../../views/contact.php';
    }
}