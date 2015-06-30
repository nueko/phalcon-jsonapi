<?php

return new \Phalcon\Config([

    'database'    => [
        'adapter' => 'Sqlite',
        'dbname'  => __DIR__ . "/../migrations/database.sqlite"
    ],

    'application' => [
        'modelsDir'     => __DIR__ . '/../app/Model/',
        'migrationsDir' => __DIR__ . '/../migrations/',
        'baseUri'       => '/',
    ]
]);
