<?php

namespace app\Application\Service;

class Request
{
    public function getPath() {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }
    public function getMethod() : string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody() : string {
        $body = [];
        if ($this->getMethod() === 'post') {
             $body = file_get_contents('php://input');
        }
        return $body;
    }
}