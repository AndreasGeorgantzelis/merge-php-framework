<?php

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
    ]
];