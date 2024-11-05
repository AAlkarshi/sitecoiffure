<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_client = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_client = null;

    #[ORM\Column(length: 255)]
    private ?string $Email_client = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Avatar_client = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateNaissanceClient = null;

    #[ORM\Column(length: 255)]
    private ?string $Password_client = null;

   

    /**
     * @var Collection<int, RendezVous>
     */
    #[ORM\ManyToMany(targetEntity: RendezVous::class, mappedBy: 'Id_Rendez_Vous')]
    private Collection $RendezVousListes;

    #[ORM\ManyToOne(inversedBy: 'Id_Coiffeur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Coiffeur $Id_Coiffeur = null;

    /**
     * @var Collection<int, Abonnement>
     */
    #[ORM\ManyToMany(targetEntity: Abonnement::class)]
    private Collection $Id_abonnement;

    

    public function __construct()
    {
        $this->RendezVousListes = new ArrayCollection();
        $this->Id_abonnement = new ArrayCollection();
    }

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->Nom_client;
    }

    public function setNomClient(string $Nom_client): static
    {
        $this->Nom_client = $Nom_client;
        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->Prenom_client;
    }

    public function setPrenomClient(string $Prenom_client): static
    {
        $this->Prenom_client = $Prenom_client;
        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->Email_client;
    }

    public function setEmailClient(string $Email_client): static
    {
        $this->Email_client = $Email_client;
        return $this;
    }

    public function getAvatarClient(): ?string
    {
        return $this->Avatar_client;
    }

    public function setAvatarClient(?string $Avatar_client): static
    {
        $this->Avatar_client = $Avatar_client;
        return $this;
    }

    public function getDateNaissanceClient(): ?\DateTimeInterface
    {
        return $this->DateNaissanceClient;
    }

    public function setDateNaissanceClient(\DateTimeInterface $DateNaissanceClient): static
    {
        $this->DateNaissanceClient = $DateNaissanceClient;
        return $this;
    }

    public function getPasswordClient(): ?string
    {
        return $this->Password_client;
    }

    public function setPasswordClient(string $Password_client): static
    {
        $this->Password_client = $Password_client;
        return $this;
    }

   
    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVousListes(): Collection
    {
        return $this->RendezVousListes;
    }

    public function addRendezVousListe(RendezVous $rendezVousListe): static
    {
        if (!$this->RendezVousListes->contains($rendezVousListe)) {
            $this->RendezVousListes->add($rendezVousListe);
            $rendezVousListe->addIdRendezVou($this);
        }

        return $this;
    }

    public function removeRendezVousListe(RendezVous $rendezVousListe): static
    {
        if ($this->RendezVousListes->removeElement($rendezVousListe)) {
            $rendezVousListe->removeIdRendezVou($this);
        }

        return $this;
    }

    public function getIdCoiffeur(): ?Coiffeur
    {
        return $this->Id_Coiffeur;
    }

    public function setIdCoiffeur(?Coiffeur $Id_Coiffeur): static
    {
        $this->Id_Coiffeur = $Id_Coiffeur;

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getIdAbonnement(): Collection
    {
        return $this->Id_abonnement;
    }

    public function addIdAbonnement(Abonnement $idAbonnement): static
    {
        if (!$this->Id_abonnement->contains($idAbonnement)) {
            $this->Id_abonnement->add($idAbonnement);
        }

        return $this;
    }

    public function removeIdAbonnement(Abonnement $idAbonnement): static
    {
        $this->Id_abonnement->removeElement($idAbonnement);

        return $this;
    }

   
}
