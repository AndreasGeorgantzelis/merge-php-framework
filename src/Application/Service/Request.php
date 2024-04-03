<?php

namespace app\Application\Service;

class Request
{
    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody() : array {
        $body = [];
        if ($this->getMethod() === 'post') {
             foreach ($_POST as $key => $value) {
                 $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             }
        }
        return $body;
    }
}