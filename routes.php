<?php
/**
 * Local variables
 * @var \Phalcon\JsonApi\Application $app
 */

use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use \Phalcon\JsonApi\Model;
use \Phalcon\JsonApi\Controller;
use \Phalcon\JsonApi\Schema;

$app->setService('encoder', function ($schemas = null, EncoderOptions $options = null) {

    if(!$schemas) {
        $schemas = [
            Model\Author::class  => Schema\AuthorSchema::class,
            Model\Comment::class => Schema\CommentSchema::class,
            Model\Post::class    => Schema\PostSchema::class,
            Model\Site::class    => Schema\SiteSchema::class
        ];
    }
    return Encoder::instance($schemas, $options);
});

//-----------------------------------------------
// Begin Routing
//-----------------------------------------------
//

$app->before(function () use($app) {

});

$app->get('/', function () {
    echo "Hello, world";
});


$class = Controller\MainController::class;
$app->resource('main', $class);

$app->get('/posts', function () use ($app) {
    echo $app->encoder->encode(Model\Post::find());
});

$app->get('/authors', function () use ($app) {
    echo $app->encoder->encode(Model\Author::find());
});

$app->get('/sites', function () use ($app) {
    echo $app->encoder->encode(Model\Site::find());
});

$app->get('/comments', function () use ($app) {
    echo $app->encoder->encode(Model\Comment::find());
});

$app->options('*');

//-----------------------------------------------
// End Routing
//-----------------------------------------------

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, null)->sendHeaders();
    echo 'Not Found';
});
