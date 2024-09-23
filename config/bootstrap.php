<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Configuration de l'entityManager ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Configuration de Autoload
use Doctrine\DBAL\DriverManager;

require_once __DIR__.'/../vendor/autoload.php';
// Définir l'emplacement des entiter
$path = [__DIR__.'/../src/Entity'];
$isDevMode = true;
// Définition de la configuration des entités
$configuration = \Doctrine\ORM\ORMSetup::createAttributeMetadataConfiguration($path, $isDevMode);
// Définir les éléments de connexion à la BDD
$configurationBD = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'db_posts',
    'host' => 'localhost'
];
// Création de la connexion à la BDD
$connexionBD = \Doctrine\DBAL\DriverManager::getConnection($configurationBD, $configuration);
// Créer l'entityManager
$entityManager = new \Doctrine\ORM\EntityManager($connexionBD, $configuration);
return $entityManager;