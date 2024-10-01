<?php
// Utilisation de queryBuilder pour construire des requete dynamique
// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage


///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Obtenir les posts parue depuis moins de 2 mois ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les posts parue en 2024 : \n";

$dql = "
        SELECT COUNT(p) as nbPosts, SUBSTRING(p.createdAt, 6, 2) as mois
        FROM App\Entity\Post p 
        WHERE SUBSTRING(p.createdAt, 1, 4) = 2024
        GROUP BY mois 
        ";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
// Donner une valeur au parametre ":DateChoisie)
//echo $query->getSQL(); // Pour afficher la requete SQL
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
print_r($LesPosts);
echo PHP_EOL;



