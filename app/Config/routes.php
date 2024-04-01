<?php


use Controllers\MainController;
use Controllers\ResponseController;
use Controllers\UserController;

return [
    '/registration' => [
        'class' => UserController::class,
        'method' => 'registration',
    ],
    '/login' => [
        'class' => UserController::class,
        'method' => 'login',
    ],
    '/main' => [
        'class' => MainController::class,
        'method' => 'main',
    ],
    '/response' => [
      'class' => ResponseController::class,
        'method' => 'getResponse',
    ],
    '/logout' => [
        'class' => UserController::class,
        'method' => 'logout',
    ],
];