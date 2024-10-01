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

$idrecherche = 4;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Obtenir le post dont l'id de recherche est X /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Le nb de like dont ID post = $idrecherche est : \n";
// Création d'un objet de la classe queryBuilder
$qb = $entityManager->createQueryBuilder();
$qb->select('p.nbLikes')
    ->from('App\Entity\Post', 'p')
    ->where('p.id = :idrecherche')
    ->setParameter("idrecherche", $idrecherche); // idrecherche est le nombre 2
// Création d'un objet query à partir du queryBuilder
$query = $qb->getQuery(); // $query est un objet qui contient mtn la requete en DQL
// Execution de la requete
$posts = $query->getSingleScalarResult();
echo "Le post avec le plus grand nombre de like comptabilise ".$posts." likes.";

