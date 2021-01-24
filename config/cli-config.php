<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Interop\Container\ContainerInterface;

require __DIR__ . '/../bootstrap.php';

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

$entityManager = $container->get(EntityManager::class);

return ConsoleRunner::createHelperSet($entityManager);
