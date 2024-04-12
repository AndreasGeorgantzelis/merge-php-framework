<?php

namespace app\Application\Service;

class Response
{
    private array $headers = [];

    public function setStatusCode(int $code) {
        http_response_code($code);
    }
    public function addHeader($name, $value){
        $this->headers[$name][] = $value;
    }
}
