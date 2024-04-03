<?php
use Bramus\Router\Router;

return [
    [
        "get",
        "/",
        new \app\Application\Controller\HomeController
    ],
    [
        "get",
        "/contact",
        new \app\Application\Controller\ContactController
    ],
    [
        "get",
        "/hello/(\w+)",
        function ($name) {
            echo 'Hello ' . htmlentities($name);
        }
    ],
    [
        "post",
        "/createuser",
        new \app\Application\Controller\UserController
    ],
    [
        "get",
        "/([a-z0-9-]+)",
        function()  {
            echo 404;
        }
    ]
];
