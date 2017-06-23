<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("MovieDB");

if(isset($_ENV['DYNO']) && $_ENV['DYNO'])
    $isDevMode = false;
else
    $isDevMode = true;

if(isset($_ENV['DATABASE_URL'])) {
    $dbParams = ['url' => $_ENV['DATABASE_URL']];
} else {
    $dbParams = array(
        'driver'   => 'pdo_pgsql',
        'user'     => 'postgres',
        'password' => 'toor',
        'dbname'   => 'moviedb',
    );
}

// the connection configuration
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
