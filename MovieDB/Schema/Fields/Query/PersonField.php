<?php

namespace MovieDB\Schema\Fields\Query;

use MovieDB\Entity\Person;
use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PersonField extends AbstractField
{
    public function getType()
    {
        return new PersonType();
    }

    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'id' => new IntType(),
            'name' => new StringType()
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        global $entityManager;

        $repo = $entityManager->getRepository(Person::class);

        if(isset($args['id']))
            return $repo->find($args['id']);
        elseif(isset($args['name']))
            return $repo->findOneBy(['name' => $args['name']]);
        else
            throw new \Exception("argument id or name not provided.");
    }
}