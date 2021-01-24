<?php

declare(strict_types=1);

namespace Task\Repository;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @author  Benjamin Osoria Peralta <bnmosria@hotmail.com>
 * @package Category\Repository
 */
class SaveTaskRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Task $task): void
    {
         $this->entityManager->persist($task);
         $this->entityManager->flush();
    }
}
