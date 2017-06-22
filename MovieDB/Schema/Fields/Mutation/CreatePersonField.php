<?php

namespace MovieDB\Schema\Fields\Mutation;

use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;

class CreatePersonField extends AbstractField
{
    public function getType()
    {
        return new PersonType();
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