<?php
/**
 * Services are globally registered in this file
 *
 * @globally \Phalcon\Config $config
 */

use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Sqlite as DbAdapter;

$di = new FactoryDefault();

$di->set('config', $config);

/**
 * The URL component is used to generate all kind of urls in the application
 */


/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter($config->database->toArray());
});
