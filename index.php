<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use MovieDB\Entity\Movie;
use MovieDB\Entity\Person;

$movieRepo = $entityManager->getRepository(Movie::class);
$personRepo = $entityManager->getRepository(Person::class);


foreach($movieRepo->findAll() as $movie) {
    var_dump($movie->getName());
}

foreach($personRepo->findAll() as $person) {
    var_dump($person->getName());
}

/*
$matrix = (new Movie())->setName('The Matrix');
$zootopia = (new Movie())->setName('Zootopia');

$wachowsky = (new Person())->setName('Wachowski');
$jaredBush = (new Person())->setName('Jared Bush');
$byronHoward = (new Person())->setName('Byron Howard');
$richMoor = (new Person())->setName('Rich Moore');
$ginniferGoodwin = (new Person())->setName('Ginnifer Goodwin');
$jasonBateman = (new Person())->setName('Ginnifer Goodwin');

$entityManager->persist($matrix);
$entityManager->persist($zootopia);

$entityManager->persist($wachowsky);
$entityManager->persist($jaredBush);
$entityManager->persist($byronHoward);
$entityManager->persist($richMoor);
$entityManager->persist($ginniferGoodwin);
$entityManager->persist($jasonBateman);

$entityManager->flush();
*/



echo "Still here!";