<?php

declare(strict_types=1);

namespace Home\Handler\Factory;

use Home\Handler\HomeHandler;
use Psr\Container\ContainerInterface;

/**
 * @author Benjamin Osoria Peralta <bnmosria@hotmail.com>
 */
class HomeHandlerFactory
{
    public function __invoke(ContainerInterface $container): HomeHandler
    {
        return new HomeHandler();
    }
}
