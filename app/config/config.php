<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(

    'database' => array(
        'adapter'    => 'Sqlite',
        'dbname' => __DIR__ . "/../migrations/database.sqlite"
    ),

    'application' => array(
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'baseUri'        => '/',
    )
));
