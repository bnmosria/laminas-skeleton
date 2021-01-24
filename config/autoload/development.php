<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Mezzio\Container;
use Mezzio\Middleware\ErrorResponseGenerator;

return [
    'debug'                        => true,
    ConfigAggregator::ENABLE_CACHE => false,
    'dependencies'                 => [
        'invokables' => [
        ],
        'factories'  => [
            ErrorResponseGenerator::class => Container\WhoopsErrorResponseGeneratorFactory::class,
            'Mezzio\Whoops'               => Container\WhoopsFactory::class,
            'Mezzio\WhoopsPageHandler'    => Container\WhoopsPageHandlerFactory::class,
        ],
    ],
    'whoops'                       => [
        'json_exceptions' => [
            'display'    => true,
            'show_trace' => true,
            'ajax_only'  => true,
        ],
    ],
    'doctrine'                     => [
        'configuration' => [
            'orm_default' => [
                'query_cache'    => 'array',
                'metadata_cache' => 'array',
                'proxy_dir'      => __DIR__ . '/../../data/cache/DoctrineProxy',
            ],
        ],
        'connection'    => [
            'orm_default' => [
                'eventmanager' => 'orm_default',
                'params'       => []
            ],
        ],
        'driver'        => [
            'orm_default' => [
                'class'   => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    'Database\Entity' => 'entities',
                ],
            ],
            'entities'    => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../../src/Database/src/Entity'],
            ],
        ],
    ],
];
