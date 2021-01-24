<?php

declare(strict_types=1);

namespace Task;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'routes'       => $this->getRoutes(),
        ];
    }

    public function getDependencies(): array
    {
        return require __DIR__ . '/../config/service_manager.config.php';
    }

    public function getRoutes(): array
    {
        return require __DIR__ . '/../config/routes.config.php';
    }
}
