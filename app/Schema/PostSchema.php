<?php namespace Phalcon\JsonApi\Schema;

use Phalcon\JsonApi\Model\Post;

/**
 * Class PostBaseSchema
 * @package Phalcon\JsonApi\BaseSchema
 */
class PostSchema extends BaseSchema
{
    protected $resourceType = 'posts';
    protected $selfSubUrl  = '/posts/';

    public function getId($post)
    {
        /** @var Post $post */
        return $post->getId();
    }

    public function getAttributes($post)
    {
        /** @var Post $post */
        return [
            'title' => $post->getTitle(),
            'body'  => $post->getBody(),
        ];
    }

    public function getRelationships($post, array $includeRelationships = [])
    {
        /** @var Post $post */
        return [
            'author'   => [self::DATA => $post->getRelated('Author')],
            'comments' => [self::DATA => $post->getRelated('Comment')],
        ];
    }
}
