<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Configuration de l'entité POST /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'posts')]
class Post
{

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// Configuration des attributs ////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    #[ORM\Id] // Clé primaire
    #[ORM\Column(name: "id_post", type: 'integer')] // On dit ou ce trouve la clé primaire et le nom associer dans la BDD
    #[ORM\GeneratedValue]
    private int $id;


    #[ORM\Column(name: "titre_post", type: 'string', length: 200, nullable: false)]
    private string $titre;


    #[ORM\Column(name: "contenu_post", type: "text", nullable: false)]
    private string $contenu;


    #[ORM\Column(name: "date_creation_post", type: 'datetime', nullable: false)]
    private \DateTime $createdAt;

    #[ORM\Column(name: "nblike_post", type: 'integer')]
    private int $nbLikes;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// Configuration des Getters Setters //////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getNbLikes(): int
    {
        return $this->nbLikes;
    }

    public function setNbLikes(int $nbLikes): void
    {
        $this->nbLikes = $nbLikes;
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// Configuration du reste des fontions ////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

}