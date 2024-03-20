<?php

return [
    [
        "get",
        "/",
        function () {
            echo "hello world";
        }
    ],
    [
        "get",
        "/hello/(\w+)",
        function ($name) {
            echo 'Hello ' . htmlentities($name);
        }
    ]
];