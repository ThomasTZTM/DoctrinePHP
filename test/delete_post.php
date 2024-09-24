<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// Supprimer des postes //////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$post = $entityManager // Une technique pour appliquer deux méthode à une class
    ->getRepository(\App\Entity\Post::class)
    ->find(5); // On choisi de supprimer le post id 5

// On test si le post existe

if ($post) {
    // Supprimer
    $entityManager->remove($post);
    $entityManager->flush();
    echo "Le poste à été supprimer \n";
}else{
    echo "Le post n'existe pas !";
}