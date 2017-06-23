<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("MovieDB");
$isDevMode = true;
die(var_dump($_ENV));
$connectionParams = [];


// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_pgsql',
//    'user'     => 'postgres',
//    'password' => 'toor',
//    'dbname'   => 'moviedb',
    'dbname' => 'da6e552ga9mq1u',
    'host' => 'ec2-107-21-108-204.compute-1.amazonaws.com',
    'port' => 5432,
    'user' => 'njiwaijeffjqdy',
    'password' => 'fe669d9ca7c743068e82b6cea32c4c98ccf7f88d4d9084f911ff3fbd5ae21b72'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
