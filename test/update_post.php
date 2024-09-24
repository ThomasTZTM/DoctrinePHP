<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// Modifier des postes //////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$post = $entityManager // Une technique pour appliquer deux méthode à une class
->getRepository(\App\Entity\Post::class)
    ->find(4); // On choisi de modifier le post id 4

// On test si le post existe

if ($post) {
    // Modifie
    $post->setTitre("VDI - Je vais chez Pidi [ET VALOUZZZ]"); // On set ce qu'on veut modifier et ça le fait tout seul
    $entityManager->flush(); // On exécute la requete
    echo "Le poste à été modifier \n";
}else{
    echo "Le post n'existe pas !";
}