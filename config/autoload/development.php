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
                'types'          => [
                   // \Ramsey\Uuid\Doctrine\UuidType::NAME => \Ramsey\Uuid\Doctrine\UuidType::class,
                ]
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
        'fixture' => [
            'jobs_fixtures' => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'invokables'     => [
                    \Database\Fixture\JobTypeFixture::class     => \Database\Fixture\JobTypeFixture::class,
                    \Database\Fixture\LocationFixture::class    => \Database\Fixture\LocationFixture::class,
                    \Database\Fixture\JobCategoryFixture::class => \Database\Fixture\JobCategoryFixture::class,
                    \Database\Fixture\UsersFixture::class       => \Database\Fixture\UsersFixture::class,

                    // must be always the last config item
                    \Database\Fixture\JobPostFixture::class     => \Database\Fixture\JobPostFixture::class,
                ]
            ],
        ],
    ],
];
