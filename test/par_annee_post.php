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
/////////////////////////////////////////// ID DU POST ////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$datemin = "2024/07/30"; // Date de aujd moins 2 mois

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Obtenir les posts parue depuis moins de 2 mois ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les posts parue en 2024 : \n";

$DateChoisie = DateTime::createFromFormat("Y/m/d", "2024/01/01" );
$dql = "
        SELECT p 
        FROM App\Entity\Post p 
        WHERE p.createdAt >= :DateChoisie 
        ORDER BY p.createdAt ASC
        ";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
// Donner une valeur au parametre ":DateChoisie)
$query->setParameter(":DateChoisie", $DateChoisie);
//echo $query->getSQL(); // Pour afficher la requete SQL
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
foreach ($LesPosts as $post) {
    echo "- ".$post->getTitre(). ". Le : ";
    echo ($post->getCreatedAt())->format("d/m/Y");
    echo "\n";
}
echo PHP_EOL;



