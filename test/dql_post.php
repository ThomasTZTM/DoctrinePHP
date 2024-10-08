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

echo "\n Les posts qui ont plus de 10.000 likes sont : ";

$nblikex = 10000;
$dql = "SELECT p FROM App\Entity\Post p WHERE p.nbLikes >= :nblikex";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
// Donner une valeur au parametre ":nbLikex)
$query->setParameter("nblikex", $nblikex);
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
foreach ($LesPosts as $post) {
    echo "- ".$post->getTitre() . " | Le post à ". $post->getNbLikes() . " likes\n";
}

echo PHP_EOL;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// Lister les post parue à partir d'une date donner //////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les posts parue à partir de juillet 2024 : \n";

$DateChoisie = DateTime::createFromFormat("d/m/Y", "01/07/2024" );
$dql = "SELECT p FROM App\Entity\Post p WHERE p.createdAt > :DateChoisie ORDER BY p.createdAt ASC";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
// Donner une valeur au parametre ":DateChoisie)
$query->setParameter(":DateChoisie", $DateChoisie);
//echo $query->getSQL(); // Pour afficher la requete SQL
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
foreach ($LesPosts as $post) {
    echo "- ".$post->getTitre(). "\n";
}
echo PHP_EOL;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Lister les 3 posts les plus récent /////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les 3 posts les plus récent sont : \n";

$dql = "SELECT p FROM App\Entity\Post p ORDER BY p.createdAt DESC";
// Création d'un objet "Requête" de la classe Query
$query = $entityManager->createQuery($dql);
$query->setMaxResults(3);
//echo $query->getSQL(); // Pour afficher la requete SQL
// Execution de la requete avec le mapping des enregistrement en objet Post
$LesPosts=$query->getResult();
foreach ($LesPosts as $post) {
    echo "- ".$post->getTitre(). "\n";
}
echo PHP_EOL;
