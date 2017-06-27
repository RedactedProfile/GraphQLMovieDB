<?php

namespace MovieDB\Schema\Types;

use MovieDB\Entity\Person;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PersonType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id' => new StringType(),
            'name' => new StringType(),
            'acted' => [
                'type' => new ListType(new MovieType()),
                'resolve' => function(Person $source) {
                    return $source->getActorOf();
                }
            ],
            'written' => [
                'type' => new ListType(new MovieType()),
                'resolve' => function(Person $source) {
                    return $source->getWriterOf();
                }
            ],
            'directed' => [
                'type' => new ListType(new MovieType()),
                'resolve' => function(Person $source) {
                    return $source->getDirectorOf();
                }
            ]
        ]);
    }
}