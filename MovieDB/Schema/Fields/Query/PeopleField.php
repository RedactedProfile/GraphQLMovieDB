<?php

namespace MovieDB\Schema\Fields\Query;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\Pagination\Paginator;
use MovieDB\Entity\Person;
use MovieDB\Schema\Types\PersonType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IntType;

class PeopleField extends AbstractField
{
    public function getType()
    {
        return new ListType(new PersonType());
    }

    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'offset' => new IntType(),
            'limit' => new IntType()
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        global $entityManager;

        $repo = $entityManager->getRepository(Person::class);

        $query = $repo->createQueryBuilder('p');

        $limit = 20;
        if(isset($args['limit']))
            $limit = $args['limit'];

        $offset = 0;
        if(isset($args['offset']))
            $offset = $args['offset'];

        $query->setFirstResult($offset)
              ->setMaxResults($limit);

        $paginator = new Paginator($query, true);

        $results = new ArrayCollection();
        foreach($paginator as $item)
            $results->add($item);

        return $results->toArray();
    }
}