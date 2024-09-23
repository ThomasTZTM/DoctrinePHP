<?php

// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// Liste des postes //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Liste des posts : \n";
// Récupérer un PostRepository généré automatiquement par Doctrine
$postRepository = $entityManager->getRepository(Post::class);
$posts = $postRepository->findAll(); // Chaque element sera un objet de la classe post (le mapping se fera automatiquement) SELECT * FROM posts
foreach ($posts as $post) {
    echo "- ".$post->getTitre() . "\n";
}
echo PHP_EOL;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// Lister un post recherché via son ID ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Le post dont l'ID est 1 : \n";
$post = $postRepository->find(1); // SELECT * FROM posts WHERE id_post=1
if ($post) {
    echo "- ".$post->getTitre()."\n \n";
}else{
    echo "Aucun post n'existe pour cet ID \n";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////// Lister un post recherché via son titre //////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Le post dont le titre est : (VDI - Je vais voir PIDI) : \n";
$post = $postRepository->findOneBy(['titre'=> "VDI - Je vais voir PIDI"]); // SELECT * FROM posts WHERE id_post=1
if ($post) {
    echo "- ".$post->getTitre()."\n \n";
}else{
    echo "Aucun post n'existe pour cet ID \n";
}