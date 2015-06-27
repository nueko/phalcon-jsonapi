<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;

$app->setService('encoder', function ($schemas = null, EncoderOptions $options = null) {

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

//-----------------------------------------------
// Begin Routing
//-----------------------------------------------

$app->get('/', function () use ($app) {
    echo "Hello, world";
});

$app->get('/posts', function () use ($app) {
    echo $app->encoder->encode(Post::find());
});

$app->get('/authors', function () use ($app) {
    echo $app->encoder->encode(Author::find());
});

$app->get('/sites', function () use ($app) {
    echo $app->encoder->encode(Site::find());
});

$app->get('/comments', function () use ($app) {
    echo $app->encoder->encode(Comment::find());
});

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
