<?php

namespace MovieDB\Schema\Fields\Mutation;

use MovieDB\Entity\Person;
use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CreatePersonField extends AbstractField
{
    public function getType()
    {
        return new PersonType();
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

        $person = new Person();
        $person->setName($args['name']);

        $entityManager->persist($person);
        $entityManager->flush();

        return $person;
    }

}