<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateHeureRDV = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $DureeRDV = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'RendezVousListes')]
    private Collection $Id_Rendez_Vous;

    /**
     * @var Collection<int, Coiffeur>
     */
    #[ORM\ManyToMany(targetEntity: Coiffeur::class)]
    private Collection $Id_Coiffeur;

    
    

    public function __construct()
    {
        $this->Id_Rendez_Vous = new ArrayCollection();
        $this->Id_Coiffeur = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureRDV(): ?\DateTimeInterface
    {
        return $this->DateHeureRDV;
    }

    public function setDateHeureRDV(\DateTimeInterface $DateHeureRDV): static
    {
        $this->DateHeureRDV = $DateHeureRDV;
        return $this;
    }

    public function getDureeRDV(): ?\DateTimeInterface
    {
        return $this->DureeRDV;
    }

    public function setDureeRDV(\DateTimeInterface $DureeRDV): static
    {
        $this->DureeRDV = $DureeRDV;
        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getIdRendezVous(): Collection
    {
        return $this->Id_Rendez_Vous;
    }

    public function addIdRendezVous(Client $idRendezVous): static
    {
        if (!$this->Id_Rendez_Vous->contains($idRendezVous)) {
            $this->Id_Rendez_Vous->add($idRendezVous);
        }

        return $this;
    }

    public function removeIdRendezVou(Client $idRendezVous): static
    {
        $this->Id_Rendez_Vous->removeElement($idRendezVous);

        return $this;
    }

    /**
     * @return Collection<int, Coiffeur>
     */
    public function getIdCoiffeur(): Collection
    {
        return $this->Id_Coiffeur;
    }

    public function addIdCoiffeur(Coiffeur $idCoiffeur): static
    {
        if (!$this->Id_Coiffeur->contains($idCoiffeur)) {
            $this->Id_Coiffeur->add($idCoiffeur);
        }

        return $this;
    }

    public function removeIdCoiffeur(Coiffeur $idCoiffeur): static
    {
        $this->Id_Coiffeur->removeElement($idCoiffeur);

        return $this;
    }

    
}
