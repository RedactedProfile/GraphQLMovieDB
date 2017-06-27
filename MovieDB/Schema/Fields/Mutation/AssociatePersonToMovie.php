<?php

namespace MovieDB\Schema\Fields\Mutation;

use MovieDB\Entity\Movie;
use MovieDB\Entity\Person;
use MovieDB\Schema\Types\Enumerations\RoleEnumType;
use MovieDB\Schema\Types\MovieType;
use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Enum\EnumType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AssociatePersonToMovie extends AbstractField
{
    public function getType()
    {
        return new MovieType();
    }

    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'movie' => new NonNullType(new IntType()),
            'person' => new NonNullType(new IntType()),
            'role' => new NonNullType(new RoleEnumType())
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        global $entityManager;

        if(!$person = $entityManager->find(Person::class, $args['person']))
            throw new \Exception("Person not found");

        if(!$movie = $entityManager->find(Movie::class, $args['movie']))
            throw new \Exception("Movie not found");

        switch($args['role']) {
            case RoleEnumType::ROLE_ACTOR:
                $movie->addActor($person);
                $person->addActorOf($movie);
                break;
            case RoleEnumType::ROLE_WRITER:
                $movie->addWriter($person);
                $person->addWriterOf($movie);
                break;
            case RoleEnumType::ROLE_DIRECTOR:
                $movie->addDirector($person);
                $person->addDirectorOf($movie);
                break;
            default:
                throw new \Exception("Role not found in enum");
                break;
        }

        $entityManager->persist($movie);
        $entityManager->persist($person);
        $entityManager->flush();

        return $movie;
    }

}