<?php

namespace MovieDB\Schema\Types\Enumerations;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class RoleEnumType extends AbstractEnumType
{
    const ROLE_ACTOR = 1;
    const ROLE_WRITER = 2;
    const ROLE_DIRECTOR = 3;

    public function getValues()
    {
        return [
            ['value' => self::ROLE_ACTOR, 'name' => 'actor'],
            ['value' => self::ROLE_WRITER, 'name' => 'writer'],
            ['value' => self::ROLE_DIRECTOR, 'name' => 'director']
        ];
    }
}