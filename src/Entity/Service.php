<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomService = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $TarifService = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\ManyToMany(targetEntity: Client::class)]
    private Collection $Id_service;

    

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->Id_service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->NomService;
    }

    public function setNomService(string $NomService): static
    {
        $this->NomService = $NomService;

        return $this;
    }

    public function getTarifService(): ?string
    {
        return $this->TarifService;
    }

    public function setTarifService(string $TarifService): static
    {
        $this->TarifService = $TarifService;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getIdService(): Collection
    {
        return $this->Id_service;
    }

    public function addIdService(Client $idService): static
    {
        if (!$this->Id_service->contains($idService)) {
            $this->Id_service->add($idService);
        }

        return $this;
    }

    public function removeIdService(Client $idService): static
    {
        $this->Id_service->removeElement($idService);

        return $this;
    }

   
}
