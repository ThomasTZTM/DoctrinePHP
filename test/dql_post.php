<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////// Lister les post ou le nombre de like est superieur à X ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$nblikex = 10000;
$dql = "SELECT p FROM App\Entity\Post p WHERE p.nbLikes >= :nblikex";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
// Donner une valeur au parametre ":nbLikex)
$query->setParameter("nblikex", $nblikex);
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
foreach ($LesPosts as $post) {
    echo "- ".$post->getTitre() . " | Le post comptablise ". $post->getNbLikes() . " likes\n";
}