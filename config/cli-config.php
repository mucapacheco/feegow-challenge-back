<?php

chdir((dirname(__DIR__)));

require_once getcwd() . "/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = Setup::createXMLMetadataConfiguration(array(getcwd() . '/src/Infrastructure/Repository/config/mapping'), true);
//
//$dbParams = array(
//    'driver' => 'pdo_mysql',
//    'user' => 'root',
//    'password' => '',
//    'dbname' => 'foo',
//);

$dbParams = array(
    'driver' => 'pdo_sqlite',
    'path' => getcwd() . '/data/db.sqlite',
);

$entityManager = EntityManager::create($dbParams, $config);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
