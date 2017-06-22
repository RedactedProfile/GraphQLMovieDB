<?php

namespace MovieDB\Schema\Fields\Query;

use MovieDB\Schema\Types\MovieType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class MoviesField extends AbstractField
{
    public function getType()
    {
        return new ListType(new MovieType());
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