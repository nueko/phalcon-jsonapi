<?php namespace Phalcon\JsonApi\Schema;

use Phalcon\JsonApi\Model\Comment;

/**
 * Class CommentBaseSchema
 * @package Phalcon\JsonApi\BaseSchema
 */
class CommentSchema extends BaseSchema
{
    protected $resourceType = 'comments';
    protected $selfSubUrl  = '/comments/';

    protected $isShowSelfInIncluded = true;

    public function getId($comment)
    {
        /** @var Comment $comment */
        return $comment->getId();
    }

    public function getAttributes($comment)
    {
        /** @var Comment $comment */
        return [
            'body' => $comment->getBody(),
        ];
    }

    public function getRelationships($comment)
    {
        /** @var Comment $comment */
        return [
            'post' => [self::DATA => $comment->getRelated('Post')],
        ];
    }
}
