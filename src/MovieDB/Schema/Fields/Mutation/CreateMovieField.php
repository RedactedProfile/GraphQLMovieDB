<?php

namespace MovieDB\Schema\Fields\Mutation;

use MovieDB\Schema\Types\MovieType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;

class CreateMovieField extends AbstractField
{
    public function getType()
    {
        return new MovieType();
    }

    public function build(FieldConfig $config)
    {
        $config->addArguments([

        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
    }

}