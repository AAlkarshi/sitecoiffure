<?php

namespace App\Entity;

use App\Repository\CoiffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: CoiffeurRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['Email_coiffeur'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Coiffeur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id] /* Indique que c'est une CLE PRIMAIRE */
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Email_coiffeur = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Avatar_coiffeur = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_coiffeur = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_coiffeur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateNaissanceCoiffeur = null;

    #[ORM\Column(length: 255)]
    private ?string $passwordCoiffeur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DispoHeureTravail = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'Id_Coiffeur', orphanRemoval: true)]
    private Collection $Id_Coiffeur;

    /**
     * @var Collection<int, Service>
     */
    #[ORM\ManyToMany(targetEntity: Service::class)]
    private Collection $Id_service;

    #[ORM\Column]
    private bool $isVerified = false;



  





    

    
    public function __construct()
    {
        $this->Id_Coiffeur = new ArrayCollection();
        $this->Id_service = new ArrayCollection();
    }



    public function getid(): ?int
    {
        return $this->id;
    }

    public function getEmailcoiffeur(): ?string
    {
        return $this->Email_coiffeur;
    }

    public function setEmailcoiffeur(string $Email_coiffeur): static
    {
        $this->Email_coiffeur = $Email_coiffeur;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->Email_coiffeur;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAvatarCoiffeur(): ?string
    {
        return $this->Avatar_coiffeur;
    }

    public function setAvatarCoiffeur(?string $Avatar_coiffeur): static
    {
        $this->Avatar_coiffeur = $Avatar_coiffeur;
        return $this;
    }

    public function getNomCoiffeur(): ?string
    {
        return $this->Nom_coiffeur;
    }

    public function setNomCoiffeur(string $Nom_coiffeur): static
    {
        $this->Nom_coiffeur = $Nom_coiffeur;
        return $this;
    }

    public function getPrenomCoiffeur(): ?string
    {
        return $this->Prenom_coiffeur;
    }

    public function setPrenomCoiffeur(string $Prenom_coiffeur): static
    {
        $this->Prenom_coiffeur = $Prenom_coiffeur;
        return $this;
    }

    public function getDateNaissanceCoiffeur(): ?\DateTimeInterface
    {
        return $this->DateNaissanceCoiffeur;
    }

    public function setDateNaissanceCoiffeur(\DateTimeInterface $DateNaissanceCoiffeur): static
    {
        $this->DateNaissanceCoiffeur = $DateNaissanceCoiffeur;
        return $this;
    }





    public function getpassword (): ?string
    {
        return $this->passwordCoiffeur;
    }

    public function setpassword (string $passwordCoiffeur ): static
    {
        $this->passwordCoiffeur  = $passwordCoiffeur;
        return $this;
    }





    public function getDispoHeureTravail(): ?\DateTimeInterface
    {
        return $this->DispoHeureTravail;
    }

    public function setDispoHeureTravail(\DateTimeInterface $DispoHeureTravail): static
    {
        $this->DispoHeureTravail = $DispoHeureTravail;
        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setIdCoiffeur($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getIdCoiffeur() === $this) {
                $client->setIdCoiffeur(null);
            }
        }

        return $this;
    }

    public function getCoiffeurRDV(): ?RendezVous
    {
        return $this->CoiffeurRDV;
    }

    public function setCoiffeurRDV(?RendezVous $CoiffeurRDV): static
    {
        $this->CoiffeurRDV = $CoiffeurRDV;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->Service;
    }

    public function setService(?Service $Service): static
    {
        $this->Service = $Service;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getIdCoiffeur(): Collection
    {
        return $this->Id_Coiffeur;
    }

    public function addIdCoiffeur(Service $idCoiffeur): static
    {
        if (!$this->Id_Coiffeur->contains($idCoiffeur)) {
            $this->Id_Coiffeur->add($idCoiffeur);
        }

        return $this;
    }

    public function removeIdCoiffeur(Service $idCoiffeur): static
    {
        $this->Id_Coiffeur->removeElement($idCoiffeur);
        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getIdService(): Collection
    {
        return $this->Id_service;
    }

    public function addIdService(Service $idService): static
    {
        if (!$this->Id_service->contains($idService)) {
            $this->Id_service->add($idService);
        }

        return $this;
    }

    public function removeIdService(Service $idService): static
    {
        $this->Id_service->removeElement($idService);

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
