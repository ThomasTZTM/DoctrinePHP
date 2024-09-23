<?php

// Récupération de l'EntityManager
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */

use App\Entity\Post;

$entityManager = require_once __DIR__ . "/../config/bootstrap.php";

// Liste des postes
echo "Liste des posts \n";
// Récupérer un PostRepository généré automtquuement par Doctrine
$postRepository = $entityManager->getRepository(\App\Entity\Post::class);
$posts = $postRepository->findAll(); // Chaque element sera un objet de la classe post (le mapping se fera automatiquement)
foreach ($posts as $post) {
    echo $post->getTitle() . "\n";
}

