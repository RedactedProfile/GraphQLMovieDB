<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("MovieDB");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_pgsql',
    'user'     => 'postgres',
    'password' => 'toor',
    'dbname'   => 'moviedb',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
