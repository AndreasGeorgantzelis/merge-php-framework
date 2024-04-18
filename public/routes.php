<?php

return [
    [
        "GET",
        "/",
        new \app\Application\Controller\HomeController,
        'home'
    ],
    [
        "GET",
        "/contact",
         new \app\Application\Controller\ContactController,
        'contact'
    ],
    [
        "GET",
        "/user/[i:id]",
        function ($id) {
            echo 'Hello user' . $id;
        },
        'dynamic rout'
    ],
    [
        "POST",
        "/createuser",
        new \app\Application\Controller\UserController,
        'user'
    ],
];
