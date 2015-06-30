<?php
/**
 * Services are globally registered in this file
 *
 * @globally \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Sqlite as DbAdapter;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Phalcon\JsonApi\Model\Author;
use Phalcon\JsonApi\Model\Comment;
use Phalcon\JsonApi\Model\Post;
use Phalcon\JsonApi\Model\Site;
use Phalcon\JsonApi\Schema\AuthorSchema;
use Phalcon\JsonApi\Schema\CommentSchema;
use Phalcon\JsonApi\Schema\PostSchema;
use Phalcon\JsonApi\Schema\SiteSchema;

$di = new FactoryDefault();

$di->set('config', $config);

$di->set('encoder', function ($schemas = null, EncoderOptions $options = null) {

    if(!$schemas) {
        $schemas = [
            Author::class  => AuthorSchema::class,
            Comment::class => CommentSchema::class,
            Post::class    => PostSchema::class,
            Site::class    => SiteSchema::class
        ];
    }
    return Encoder::instance($schemas, $options);
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter($config->database->toArray());
});
