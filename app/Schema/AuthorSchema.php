<?php namespace Phalcon\JsonApi\Schema;

use Phalcon\JsonApi\Model\Author;

/**
 * Class AuthorBaseSchema
 * @package Phalcon\JsonApi\BaseSchema
 */
class AuthorSchema extends BaseSchema
{
    protected $resourceType = 'people';
    protected $selfSubUrl = '/people/';

    public function getId($author)
    {
        /** @var Author $author */
        return $author->getId();
    }

    public function getAttributes($author)
    {
        /** @var Author $author */
        return [
            'first_name' => $author->getFirstName(),
            'last_name'  => $author->getLastName(),
        ];
    }
}
