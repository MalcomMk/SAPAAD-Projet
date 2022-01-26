<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation;

    /**
     * @ORM\ManyToMany(targetEntity=Service::class, inversedBy="demandes")
     */
    private $demandes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="demande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $precisions;

    /**
     * @ORM\ManyToOne(targetEntity=Devis::class, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devis;

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Service $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
        }

        return $this;
    }

    public function removeDemande(Service $demande): self
    {
        $this->demandes->removeElement($demande);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPrecisions(): ?string
    {
        return $this->precisions;
    }

    public function setPrecisions(?string $precisions): self
    {
        $this->precisions = $precisions;

        return $this;
    }

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(?Devis $devis): self
    {
        $this->devis = $devis;

        return $this;
    }
}
