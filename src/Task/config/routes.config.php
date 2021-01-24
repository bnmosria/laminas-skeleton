<?php

return [
    [
        'path'            => '/api/v1/tasks',
        'middleware'      => [
            \Task\Handler\GetTasksHandler::class,
        ],
        'allowed_methods' => ['GET'],
    ],
];
