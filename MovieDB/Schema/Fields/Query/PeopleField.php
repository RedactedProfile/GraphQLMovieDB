<?php

namespace MovieDB\Schema\Fields\Query;

use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\ListType\ListType;

class PeopleField extends AbstractField
{
    public function getType()
    {
        return new ListType(new PersonType());
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