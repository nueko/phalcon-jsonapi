<?php namespace Phalcon\JsonApi\Test;

use Phalcon\Config;
use Phalcon\Di;
use Phalcon\DiInterface;
use Phalcon\JsonApi\Model\Author;
use Phalcon\JsonApi\Model\Comment;
use Phalcon\JsonApi\Model\Post;
use Phalcon\JsonApi\Model\Site;
use Phalcon\JsonApi\Schema\AuthorSchema;
use Phalcon\JsonApi\Schema\CommentSchema;
use Phalcon\JsonApi\Schema\PostSchema;
use Phalcon\JsonApi\Schema\SiteSchema;
use Phalcon\Test\FunctionalTestCase;
use Phalcon\DI\FactoryDefault;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;

/**
 * Class UnitTestCase
 * @package Phalcon\JsonApi\Test
 */
abstract class UnitTestCase extends \Phalcon\Test\UnitTestCase
{

    /**
     * @var array
     */
    protected $schema = [
        Author::class  => AuthorSchema::class,
        Comment::class => CommentSchema::class,
        Post::class    => PostSchema::class,
        Site::class    => SiteSchema::class
    ];

    /**
     * @var EncoderOptions
     */
    protected $encoderOptions;

    /**
     * @var Encoder
     */
    protected $encoder;

    /**
     * @param DiInterface $di
     * @param Config $config
     */
    public function setUp(DiInterface $di = null, Config $config = null)
    {
        $config = include __DIR__ . "/../config/config.php";
        require __DIR__ . "/../config/services.php";

        $this->encoder = $di->get('encoder');

        parent::setUp($di, $config);
    }
}