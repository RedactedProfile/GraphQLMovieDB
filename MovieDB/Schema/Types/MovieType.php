<?php

namespace MovieDB\Schema\Types;

use MovieDB\Entity\Movie;
use MovieDB\Entity\Person;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class MovieType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id' => new StringType(),
            'name' => new StringType(),
            'actors' => [
                'type' => new ListType(new PersonType()),
                'resolve' => function(Movie $source) {
                    return $source->getActors();
                }
            ],
            'writers' => [
                'type' => new ListType(new PersonType()),
                'resolve' => function(Movie $source) {
                    return $source->getWriters();
                }
            ],
            'directors' => [
                'type' => new ListType(new PersonType()),
                'resolve' => function(Movie $source) {
                    return $source->getDirectors();
                }
            ]
        ]);
    }
}