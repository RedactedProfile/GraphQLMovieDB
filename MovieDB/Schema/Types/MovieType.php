<?php

namespace MovieDB\Schema\Types;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class MovieType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id' => new StringType(),
            'name' => new StringType()
        ]);
    }
}