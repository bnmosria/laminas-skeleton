<?php

return [
    [
        'path'            => '/',
        'middleware'      => [
            \Home\Handler\HomeHandler::class,
        ],
        'allowed_methods' => ['GET'],
    ],
];
