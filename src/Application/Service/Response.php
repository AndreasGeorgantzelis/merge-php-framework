<?php

namespace app\Application\Service;

class Response
{
    private array $headers = [];

    /**
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code) {
        http_response_code($code);
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function addHeader($name, $value){
        $this->headers[$name][] = $value;
    }
}
