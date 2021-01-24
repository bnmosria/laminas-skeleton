<?php

declare(strict_types=1);

namespace Task\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Task\Model\Task;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Category\Repository
 */
class GetTaskRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function fetch(Task $task): Task
    {
         return $task;
    }
}
