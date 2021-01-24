<?php

declare(strict_types=1);

namespace Task\Service;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Category\Services
 */
class TaskService
{
    public function getAll(): array
    {
        return [
            'task1' => [
                'title' => 'Shopping',
                'description' => 'Buy Jeans and shirts'
            ],
            'task2' => [
                'title' => 'Cook',
                'description' => 'Cook the food for the guests tomorrow',
            ],
        ];
    }
}
