<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: "datetime")]
    #[Assert\NotNull(message: "La date de création est requise.")]
    private ?\DateTimeInterface $dateCreation = null;




    #[ORM\Column(type: "string", length: 20)]
    #[Assert\Choice(choices: ["En attente", "Préparée", "Expédiée", "Livrée", "Annulée"], message: "Statut invalide.")]
    private string $status = "En attente";

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "L'adresse de livraison est requise.")]
    private ?string $deliveryAddress = null;

    #[ORM\Column(type: "string", length: 15)]
    #[Assert\NotBlank(message: "Le numéro de téléphone est requis.")]
    #[Assert\Regex(pattern: "/^[0-9]+$/", message: "Numéro de téléphone invalide.")]
    private ?string $phone = null;

    #[ORM\Column(type: "string", length: 50)]
    #[Assert\Choice(choices: ["Carte", "Espèces", "Paypal"], message: "Mode de paiement invalide.")]
    private ?string $paymentMethod = null;

    #[ORM\Column(type: "float")]
    #[Assert\Positive(message: "Le prix total doit être positif.")]
    private ?float $totalPrice = null;

    #[ORM\OneToOne(targetEntity: Livraison::class, mappedBy: "commande", cascade: ["persist", "remove"])]
    private ?Livraison $delivery = null;


    public function __construct()
    {
        $this->dateCreation = new \DateTime(); // ✅ Set the default to current date/time
    }
    // 🛠 Getters & Setters
    public function getId(): ?int { return $this->id; }
    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self { $this->user = $user; return $this; }
    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function setDateCreation(\DateTimeInterface $dateCreation): self { $this->dateCreation = $dateCreation; return $this; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $status): self { $this->status = $status; return $this; }
    public function getDeliveryAddress(): ?string { return $this->deliveryAddress; }
    public function setDeliveryAddress(string $deliveryAddress): self { $this->deliveryAddress = $deliveryAddress; return $this; }
    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(string $phone): self { $this->phone = $phone; return $this; }
    public function getPaymentMethod(): ?string { return $this->paymentMethod; }
    public function setPaymentMethod(string $paymentMethod): self { $this->paymentMethod = $paymentMethod; return $this; }
    public function getTotalPrice(): ?float { return $this->totalPrice; }
    public function setTotalPrice(float $totalPrice): self { $this->totalPrice = $totalPrice; return $this; }
    public function getDelivery(): ?Livraison { return $this->delivery; }
    public function setDelivery(?Livraison $delivery): self { $this->delivery = $delivery; return $this; }
}
