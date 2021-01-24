#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;

(static function () {
    require_once __DIR__.'/../vendor/autoload.php';

    use Symfony\Component\Console\Application;

    $app = new Application('Laminas Skeleton', '1.0.0');

    $app->addCommands([]);
    $app->run();

})();
