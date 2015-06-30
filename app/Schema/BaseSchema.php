<?php namespace Phalcon\JsonApi\Schema;

use Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * Class BaseSchema
 * @package Phalcon\JsonApi\BaseSchema
 */
class BaseSchema extends SchemaProvider
{

    /**
     * Get resource identity.
     *
     * @param object $resource
     *
     * @return string
     */
    public function getId($resource)
    {
        return $resource->getId();
    }

    /**
     * Get resource attributes.
     *
     * @param object $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return $resource->getJsonApiAttributes();
    }
}