<?php

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
    #[ORM\column(name: "id_post", type: 'integer')] // On dit ou ce trouve la clé primaire et le nom associer dans la BDD
    #[ORM\GeneratedValue(strategy: 'AUTO')] // Et on la met en autoIncrement
    private int $id;


    #[ORM\Column(name: "titre_post", type: 'string', length: 200, nullable: false)]
    private string $titre;


    #[ORM\Column(name: "contenu_post", type: "text", nullable: false)]
    private string $contenu;


    #[ORM\Column(name: "date_post", type: 'datetime', nullable: false)]
    private \DateTime $createdAt;

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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// Configuration du reste des fontions ////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

}