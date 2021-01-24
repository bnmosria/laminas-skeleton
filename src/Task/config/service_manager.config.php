<?php

use Reinfi\DependencyInjection\Factory\AutoWiringFactory;

return [
    'factories' => [
        \Task\Service\TaskService::class => AutoWiringFactory::class,
        \Task\Handler\GetTasksHandler::class => AutoWiringFactory::class,
        \Task\QueryHandler\GetTasksQueryHandler::class => AutoWiringFactory::class,
    ],
];
