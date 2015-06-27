<?php

/**
 * Registering auto loader
 */
$loader = new \Phalcon\Loader();

$loader->registerDirs([
    $config->application->modelsDir,
    __DIR__ . "/../schemas/",
]);

$loader->registerNamespaces([
    'Neomerx\JsonApi' => __DIR__ . "/../../modules/json-api/src/",
]);

$loader->register();
