<?php

declare(strict_types=1);


namespace Task\QueryHandler;


use Task\Service\TaskService;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Task\QueryHandler
 */
class GetTasksQueryHandler
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function execute(): array
    {
        return $this->taskService->getAll();
    }
}
