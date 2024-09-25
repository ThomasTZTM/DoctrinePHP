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
/////////////////// Obtenir les post dont le nombre de like est inférieur à X /////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les posts dont le nb de likes sont inférieurs à 2000 sont : \n";
// Création d'un objet de la classe queryBuilder
$qb = $entityManager->createQueryBuilder();
$qb->select('p')
    ->from('App\Entity\Post', 'p')
    ->where('p.nbLikes < :nblikeX')
    ->setParameter("nblikeX", 2000); // 2000 est le nombre X
// Création d'un objet query à partir du queryBuilder
$query = $qb->getQuery(); // $query est un objet qui contient mtn la requete en DQL
// Execution de la requete
$posts = $query->getResult();
foreach ($posts as $post) {
    echo "- ".$post->getTitre() . " Qui à seulement ". $post->getNbLikes() . " likes\n";
}
