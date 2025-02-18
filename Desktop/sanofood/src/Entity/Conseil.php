<?php
// src/Entity/Conseil.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ConseilRepository;
#[ORM\Entity(repositoryClass: ConseilRepository::class)]
class Conseil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idC = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le contenu ne doit pas être vide.')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le contenu ne doit pas dépasser {{ limit }} caractères.'
    )]
    private ?string $contenu = null;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank(message: 'La date du conseil est obligatoire.')]
    #[Assert\Type(
        type: \DateTimeInterface::class,
        message: 'La date doit être au format valide (YYYY-MM-DD HH:MM:SS).'
    )]
    #[Assert\GreaterThanOrEqual(
        value: 'today',
        message: 'La date du conseil ne peut pas être antérieure à aujourd\'hui.'
    )]
    private ?\DateTimeInterface $dateConseil = null;

    #[ORM\ManyToOne(targetEntity: Demande::class, inversedBy: 'conseils')]
    #[ORM\JoinColumn(name: 'id_demande', referencedColumnName: 'id')]
    private ?Demande $demande = null;

    // Getters et Setters
    public function getIdC(): ?int
    {
        return $this->idC;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getDateConseil(): ?\DateTimeInterface
    {
        return $this->dateConseil;
    }

    public function setDateConseil(\DateTimeInterface $dateConseil): self
    {
        $this->dateConseil = $dateConseil;
        return $this;
    }

    public function getDemande(): ?Demande
    {
        return $this->demande;
    }

    public function setDemande(?Demande $demande): self
    {
        $this->demande = $demande;
        return $this;
    }
}