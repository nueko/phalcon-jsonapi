<?php

use Phalcon\Mvc\Micro;

error_reporting(E_ALL);

try {

    /**
     * Read the autoloader
     */
    require __DIR__ . "/../vendor/autoload.php";

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../config/config.php";

    /**
     * Include Services
     */
    include __DIR__ . "/../config/services.php";

    /**
     * Starting the application
     * Assign service locator to the application
     */
    $app = new \Phalcon\JsonApi\Application($di);

    /**
     * Include Application
     */
    include __DIR__ . "/../routes.php";

    /**
     * Handle the request
     */
    $app->handle();

} catch (\Exception $e) {
    echo $e->getMessage();
}
