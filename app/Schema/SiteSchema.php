<?php namespace Phalcon\JsonApi\Schema;

use Phalcon\JsonApi\Model\Site;

/**
 * Class SiteBaseSchema
 * @package Phalcon\JsonApi\BaseSchema
 */
class SiteSchema extends BaseSchema
{
    protected $resourceType = 'sites';
    protected $selfSubUrl  = '/sites/';

    public function getId($site)
    {
        /** @var Site $site */
        return $site->getId();
    }

    public function getAttributes($site)
    {
        /** @var Site $site */
        return [
            'name' => $site->getName(),
        ];
    }

    public function getRelationships($site, array $includeRelationships = [])
    {
        /** @var Site $site */
        return [
            'posts' => [self::DATA => $site->getRelated('Post')],
        ];
    }

    public function getIncludePaths()
    {
        return [
            'posts',
            'posts.author',
            'posts.comments',
        ];
    }
}
