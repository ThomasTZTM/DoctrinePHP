<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";

// Liste des postes
echo "Liste des posts : \n";
// Récupérer un PostRepository généré automatiquement par Doctrine
$postRepository = $entityManager->getRepository(Post::class);
$posts = $postRepository->findAll(); // Chaque element sera un objet de la classe post (le mapping se fera automatiquement)
foreach ($posts as $post) {
    echo "- ".$post->getTitre() . "\n";
}

