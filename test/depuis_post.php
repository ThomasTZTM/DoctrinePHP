<?php
// Utilisation de queryBuilder pour construire des requete dynamique
// Récupération de l'EntityManager


use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";


echo PHP_EOL; // Pour de l'affichage

///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////// DateMin ////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

$datemin = DateTime::createFromFormat("Y/m/d", "-2 month" );

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Obtenir les posts parue depuis moins de 2 mois ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Les post paré après $datemin sont : \n";
// Création d'un objet de la classe queryBuilder
$qb = $entityManager->createQueryBuilder();
$qb->select('p')
    ->from('App\Entity\Post', 'p')
    ->where('p.createdAt >= :datemin')
    ->setParameter("datemin", $datemin); // idrecherche est le nombre 2
// Création d'un objet query à partir du queryBuilder
$query = $qb->getQuery(); // $query est un objet qui contient mtn la requete en DQL
// Execution de la requete
$posts = $query->getResult();
foreach ($posts as $post) {
    echo "- " . $post->getTitre() . " \n";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Obtenir les posts parue depuis moins de 2 mois ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "\n Les posts parue à partir de juillet 2024 : \n";

$DateChoisie = DateTime::createFromFormat("Y/m/d", "-2 month" );
$dql = "
        SELECT p 
        FROM App\Entity\Post p 
        WHERE p.createdAt > :DateChoisie 
        ORDER BY p.createdAt ASC";
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



