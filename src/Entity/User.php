<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    #[Assert\NotBlank(message: "Le nom est requis.")]
    #[Assert\Length(min: 2, max: 100, minMessage: "Le nom doit avoir au moins 2 caractères.")]
    private ?string $nom = null;

    #[ORM\Column(type: "string", length: 100)]
    #[Assert\NotBlank(message: "Le prénom est requis.")]
    #[Assert\Length(min: 2, max: 100, minMessage: "Le prénom doit avoir au moins 2 caractères.")]
    private ?string $prenom = null;

    #[ORM\Column(type: "string", length: 180, unique: true)]
    #[Assert\NotBlank(message: "L'email est requis.")]
    #[Assert\Email(message: "L'email n'est pas valide.")]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 15)]
    #[Assert\NotBlank(message: "Le numéro est requis.")]
    #[Assert\Regex(pattern: "/^[0-9]+$/", message: "Le numéro doit contenir uniquement des chiffres.")]
    private ?string $num = null;

    public function __construct()
    {
        $this->id = uniqid(); // Auto-generate a unique ID
    }

    // 🛠 Getters & Setters
    public function getId(): ?string { return $this->id; }
    public function getNom(): ?string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): ?string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }
    public function getNum(): ?string { return $this->num; }
    public function setNum(string $num): self { $this->num = $num; return $this; }

    // 🛠 Functions from UML
    public function effectuerLivraison(): void
    {
        // Logique pour effectuer une livraison
        echo "Livraison effectuée avec succès.";
    }

    public function annulerLivraison($args): void
    {
        // Logique pour annuler une livraison
        echo "Livraison annulée.";
    }

    // 🛠 Required for Symfony Security
    public function getRoles(): array { return ['ROLE_USER']; }
    public function getPassword(): ?string { return null; }
    public function getSalt(): ?string { return null; }
    public function eraseCredentials(): void {}
    public function getUserIdentifier(): string { return $this->email; }}
