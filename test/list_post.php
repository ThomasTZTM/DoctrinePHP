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

echo "Le post dont le titre est : (VDI - Episode 460) : \n";
$post = $postRepository->findOneBy(['titre'=> "VDI - Episode 460"]); // SELECT * FROM posts WHERE id_post=1
if ($post) {
    echo "- ".$post->getTitre()."\n \n";
}else{
    echo "Aucun post n'existe pour ce titre \n";
}
echo PHP_EOL;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////// Lister les post ou le nombre de like est superieur à X ////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// Méthode peu recommander car trés couteuse

echo "Le post dont le nb de like est > à 10.000 \n";
$postRepository = $entityManager->getRepository(Post::class);
$posts = $postRepository->findAll(); // Chaque element sera un objet de la classe post (le mapping se fera automatiquement) SELECT * FROM posts
foreach ($posts as $post) {
    if ($post->getNbLikes()>10000){ // 10.000 est le nombre X
        echo "- ".$post->getTitre() . " | ". $post->getNbLikes() . " likes\n";
    }
}
echo PHP_EOL;