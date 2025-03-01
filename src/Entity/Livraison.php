<?php

namespace App\Entity;
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\LivraisonRepository;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: Commande::class, inversedBy: "delivery")]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull(message: "La date de livraison est requise.")]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\Choice(choices: ["En attente", "En cours", "Livré", "Annulé"], message: "Statut invalide.")]
    private string $statut = "En attente";

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le nom du livreur est requis.")]
    private ?string $livreur = null;

    #[ORM\Column(type: "string", length: 15)]
    #[Assert\NotBlank(message: "Le numéro de téléphone du livreur est requis.")]
    #[Assert\Regex(pattern: "/^[0-9]+$/", message: "Numéro de téléphone invalide.")]
    private ?string $livreurPhone = null;

    #[ORM\Column(type: "string", length: 50, unique: true)]
    #[Assert\NotBlank(message: "Le numéro de suivi est requis.")]
    private ?string $trackingNumber = null;

    public function __construct()
    {
        $this->dateLivraison = new \DateTime();
        $this->trackingNumber = strtoupper(uniqid("LIV-")); // Generate unique tracking number
    }

    // 🛠 Getters & Setters
    public function getId(): ?int { return $this->id; }
    public function getCommande(): ?Commande { return $this->commande; }
    public function setCommande(?Commande $commande): self { $this->commande = $commande; return $this; }
    public function getDateLivraison(): ?\DateTimeInterface { return $this->dateLivraison; }
    public function setDateLivraison(\DateTimeInterface $dateLivraison): self { $this->dateLivraison = $dateLivraison; return $this; }
    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): self { $this->statut = $statut; return $this; }
    public function getLivreur(): ?string { return $this->livreur; }
    public function setLivreur(string $livreur): self { $this->livreur = $livreur; return $this; }
    public function getLivreurPhone(): ?string { return $this->livreurPhone; }
    public function setLivreurPhone(string $livreurPhone): self { $this->livreurPhone = $livreurPhone; return $this; }
    public function getTrackingNumber(): ?string { return $this->trackingNumber; }
    public function setTrackingNumber(string $trackingNumber): self { $this->trackingNumber = $trackingNumber; return $this; }
}
