<?php


// src/Entity/Demande.php
namespace App\Entity;
use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le nom ne doit pas être vide.')]
    #[Assert\Length(max: 255, maxMessage: 'Le nom ne doit pas dépasser 255 caractères.')]
    private ?string $nom = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le contenu ne doit pas être vide.')]
    #[Assert\Length(max: 255, maxMessage: 'Le contenu ne doit pas dépasser 255 caractères.')]
    private ?string $content = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'L\'email ne doit pas être vide.')]
    #[Assert\Email(message: 'L\'adresse email n\'est pas valide.')]
    #[Assert\Length(max: 255, maxMessage: 'L\'email ne doit pas dépasser 255 caractères.')]
    private ?string $email = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'La spécialité ne doit pas être vide.')]
    #[Assert\Length(max: 15, maxMessage: 'La spécialité ne doit pas dépasser 15 caractères.')]
    private ?string $specialite = null;

    #[ORM\Column(type: 'date')]
    #[Assert\NotNull(message: 'La date d\'inscription est obligatoire.')]
    #[Assert\Type(type: '\DateTimeInterface', message: 'La date d\'inscription doit être une date valide.')]
    private ?\DateTimeInterface $dateInscription = null;

    
// Relation OneToMany vers l'entité Conseil
#[ORM\OneToMany(targetEntity: Conseil::class, mappedBy: 'demande', orphanRemoval: true)]
private Collection $conseils;
    

public function __construct()
{
    $this->conseils = new ArrayCollection();
    $this->dateInscription = new \DateTime();

}
    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

/**
     * @return Collection<int, Conseil>
     */
    public function getConseils(): Collection
    {
        return $this->conseils;
    }

    public function addConseil(Conseil $conseil): self
    {
        if (!$this->conseils->contains($conseil)) {
            $this->conseils[] = $conseil;
            $conseil->setDemande($this);
        }
        return $this;
    }

    public function removeConseil(Conseil $conseil): self
    {
        if ($this->conseils->removeElement($conseil)) {
            // Définir le côté propriétaire à null (sauf si déjà changé)
            if ($conseil->getDemande() === $this) {
                $conseil->setDemande(null);
            }
        }
        return $this;
    }


    
}