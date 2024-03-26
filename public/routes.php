<?php

return [
    [
        "get",
        "/",
        new \app\Application\Controller\DummyController
    ],
    [
        "get",
        "/hello/(\w+)",
        function ($name) {
            echo 'Hello ' . htmlentities($name);
        }
    ]
];