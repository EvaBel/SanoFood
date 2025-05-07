<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Commande::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le adresse de l'évaluation ne peut pas être vide.")]
    private ?string $adresse = null;

    #[ORM\Column(type: "integer")]
    #[Assert\Range(min: 1, max: 100000000, notInRangeMessage: "La prix doit être entre 1 et 10.")]
    private ?int $prix = null;

    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull(message: "La date de création ne peut pas être vide.")]
    #[Assert\GreaterThan("now", message: "La date doit être commandeérieure à aujourd'hui")]
    private ?\DateTimeInterface $created = null;

    
    

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\Choice(choices: ['En attente', 'En cours', 'Livré','Annulé'], message: "Le statut est invalide.")]

    

    private string $statut = "en attente";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;
        return $this;
    }

   

    

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }
    public function getCommande(): ?Commande
{
    return $this->commande;
}

public function setCommande(?Commande $commande): self
{
    $this->commande = $commande;
    return $this;
}

}
