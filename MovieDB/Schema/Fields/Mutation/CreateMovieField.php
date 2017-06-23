<?php

namespace MovieDB\Schema\Fields\Mutation;

use MovieDB\Entity\Movie;
use MovieDB\Schema\Types\MovieType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CreateMovieField extends AbstractField
{
    public function getType()
    {
        return new MovieType();
    }

    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'name' => new NonNullType(new StringType())
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        global $entityManager;

        $movie = new Movie();
        $movie->setName($args['name']);

        $entityManager->persist($movie);
        $entityManager->flush();

        return $movie;
    }

}