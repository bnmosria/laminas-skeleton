<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

$environment = 'development';

$cacheConfig = [
    'config_cache_path' => $environment === 'production' ? 'data/cache/config-cache.php' : null,
];

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(
    function ($className) {
        return class_exists($className);
    }
);

$aggregator = new ConfigAggregator(
    [
        \DoctrineORMModule\ConfigProvider::class,
        \Laminas\Form\ConfigProvider::class,
        \Laminas\InputFilter\ConfigProvider::class,
        \Laminas\Filter\ConfigProvider::class,
        \Laminas\Paginator\ConfigProvider::class,
        \Laminas\Hydrator\ConfigProvider::class,
        \Laminas\Cache\ConfigProvider::class,
        \Mezzio\Router\LaminasRouter\ConfigProvider::class,
        \Laminas\Router\ConfigProvider::class,
        \Laminas\Validator\ConfigProvider::class,
        \Laminas\HttpHandlerRunner\ConfigProvider::class,
        \Reinfi\DependencyInjection\ConfigProvider::class,
        new ArrayProvider($cacheConfig),
        new \Laminas\ConfigAggregatorModuleManager\LaminasModuleProvider(
            new Reinfi\DependencyInjection\Module()
        ),
        new \Laminas\ConfigAggregatorModuleManager\LaminasModuleProvider(
            new \DoctrineModule\Module()
        ),
        new \Laminas\ConfigAggregatorModuleManager\LaminasModuleProvider(
            new \DoctrineORMModule\Module()
        ),
        \Mezzio\Helper\ConfigProvider::class,
        \Mezzio\ConfigProvider::class,
        \Mezzio\Router\ConfigProvider::class,

        // Application modules
        \Home\ConfigProvider::class,
        \Task\ConfigProvider::class,

        new PhpFileProvider(sprintf(realpath(__DIR__) . '/autoload/{{,*.}global,%s,{,*.}){,*.}local}.php', $environment)),
    ],
    $cacheConfig['config_cache_path']
);

$mergedConfig = $aggregator->getMergedConfig();

return $mergedConfig;
