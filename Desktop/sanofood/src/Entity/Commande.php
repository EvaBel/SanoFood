<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\CategorieRepository;
#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class   Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   


    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThan("now", message: "La date doit être commandeérieure à aujourd'hui")]
     
    private ?\DateTimeInterface $datecreation = null;
    

    #[ORM\Column(type: "integer")]
#[Assert\NotNull(message: "Il faut remplir ce champ")]
#[Assert\Positive(message: "Le total doit être un nombre positif")]
#[Assert\LessThan(value: 1000000, message: "Le total ne peut pas dépasser 1 000 000")]
private ?int $total = null;

#[ORM\Column(length: 255)]
#[Assert\NotBlank(message: "Le titre ne peut pas être vide")]
#[Assert\Length(min: 3, max: 255, minMessage: "Le titre doit contenir au moins 3 caractères", maxMessage: "Le titre ne peut pas dépasser 255 caractères")]
#[Assert\Regex(pattern: "/^[a-zA-ZÀ-ÿ\s'-]+$/", message: "Le titre ne peut contenir que des lettres, des espaces, des apostrophes et des tirets")]
private ?string $Titre = null;


    


   
  

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: Livraison::class, orphanRemoval: true)]
    private Collection $livraisons;


    

    

    #[ORM\Column(length: 255)]
    #[Assert\NotNull (message: "Il faut remplire ce chemp")]
    private ?string $image = null;

    public function __construct()
    {
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    
     
    

   
 public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }
   

   

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
    



    

    
    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addCLivraisonontrat( $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeCLivraisonontrat( $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


     

    

    
}
