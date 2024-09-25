<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// Créer des postes //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// On créer le post

$post = new Post();
$post->setTitre("VDI - Episode 461");
$post->setContenu("Un nouveau contenu");
$post->setCreatedAt(new \DateTime());
$post->setNbLikes(17563);

// Demander à l'entityManager de persister l'entité $post dans la table posts

$entityManager->persist($post); // n'existe pas directement le insert mais le prépare juste
$entityManager->flush(); // On valide le insert