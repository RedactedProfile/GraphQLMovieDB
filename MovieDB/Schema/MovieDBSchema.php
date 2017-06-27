<?php

namespace MovieDB\Schema;

use MovieDB\Schema\Fields\Mutation\AssociatePersonToMovie;
use MovieDB\Schema\Fields\Mutation\CreateMovieField;
use MovieDB\Schema\Fields\Mutation\CreatePersonField;
use MovieDB\Schema\Fields\Query\MovieField;
use MovieDB\Schema\Fields\Query\MoviesField;
use MovieDB\Schema\Fields\Query\PeopleField;
use MovieDB\Schema\Fields\Query\PersonField;
use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Schema\AbstractSchema;

class MovieDBSchema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config->getQuery()->addFields([
            new MovieField(),
            new MoviesField(),
            new PersonField(),
            new PeopleField()
        ]);

        $config->getMutation()->addFields([
            new CreateMovieField(),
            new CreatePersonField(),
            new AssociatePersonToMovie()
        ]);
    }
}