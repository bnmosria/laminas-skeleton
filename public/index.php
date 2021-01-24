<?php

declare(strict_types=1);

if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

(function () {
    $container = require 'config/container.php';

    $app = $container->get(\Mezzio\Application::class);

    $factory = $container->get(\Mezzio\MiddlewareFactory::class);

    (require 'config/pipeline.php')($app, $factory, $container);

    $app->run();
})();
