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
    public function setHeader($name, $value){
        $this->headers[$name] = [
            (string) $value,
        ];
    }
    public function redirect($url){
        $this->setHeader('Location', $url);
    }

}