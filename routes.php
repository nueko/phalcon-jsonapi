<?php
/**
 * Local variables
 * @var \Phalcon\JsonApi\Application $app
 */

use Phalcon\JsonApi\Controller\MainController;
use Phalcon\JsonApi\Model\Author;
use Phalcon\JsonApi\Model\Comment;
use Phalcon\JsonApi\Model\Post;
use Phalcon\JsonApi\Model\Site;

//-----------------------------------------------
// Begin Routing
//-----------------------------------------------

$app->get('/', function () use ($app) {
    return ["Hello, world"];
});

$app->resource('main', MainController::class);

$app->get('/posts', function () use ($app) {
    return $app->encoder->encode(Post::find());
});

$app->get('/authors', function () use ($app) {
    return $app->encoder->encode(Author::find());
});

$app->get('/sites', function () use ($app) {
    return $app->encoder->encode(Site::find());
});

$app->get('/comments', function () use ($app) {
    return $app->encoder->encode(Comment::find());
});

$app->options('*');

//-----------------------------------------------
// Begin Middleware
//-----------------------------------------------
$app->before(function () use ($app) {
    $app->response->setContentType('application/vnd.api+json')->sendHeaders();
});

$app->after(function () use ($app) {
    $content = $app->getReturnedValue();
    switch (true) {
        case is_string($content):
            $app->response->setContent($content);
            break;
        case is_array($content):
            $app->response->setJsonContent($content);
            break;
    }
});

$app->finish(function () use ($app) {
    if (!$app->response->isSent()) {
        $app->response->sendHeaders()->send();
    }
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, null)->sendHeaders();
    echo 'Not Found';
});

/**
 * Error handlers
 */
$app->error(function (\Exception $e) {
    // TODO: Implement error handler
    return true;
});