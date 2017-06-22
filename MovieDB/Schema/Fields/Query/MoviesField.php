<?php

namespace MovieDB\Schema\Fields\Query;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\Pagination\Paginator;
use MovieDB\Entity\Movie;
use MovieDB\Schema\Types\MovieType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class MoviesField extends AbstractField
{
    public function getType()
    {
        return new ListType(new MovieType());
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

        $repo = $entityManager->getRepository(Movie::class);

        $query = $repo->createQueryBuilder('m');

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