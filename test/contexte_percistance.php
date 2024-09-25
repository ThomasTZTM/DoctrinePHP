<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Récuperer des postes //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$post = $entityManager
    ->getRepository(Post::class)
    ->find(1); // On choisi de victime l'id 1 ici

$contextePercistance = $entityManager->getUnitOfWork();
echo $contextePercistance->getEntityState($post)."\n"; // 1 MANAGED
$entityManager->remove($post);
echo $contextePercistance->getEntityState($post)."\n"; // 4 REMOVED

// Créer un post
$nvPost = new Post();
$nvPost->setTitre("VDI - GMK est mort");
$nvPost->setContenu("Je récupère toute ces voiture");
$nvPost->setCreatedAt(new \DateTime());
echo $contextePercistance->getEntityState($nvPost)."\n"; // 2 NEW

$entityManager->persist($nvPost);
echo $contextePercistance->getEntityState($nvPost)."\n"; // 1 MANAGED

//$entityManager->flush(); j'ai pas envie d'exécuter