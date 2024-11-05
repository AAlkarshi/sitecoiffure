<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomAbonnement = null;


    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $Tarifs_abonnement = null;

    #[ORM\Column]
    private ?bool $Choix_Abonnement = null;



   
    public function getid(): ?int
    {
        return $this->id;
    }


    public function getNomAbonnement(): ?string
    {
        return $this->NomAbonnement;
    }

    public function setNomAbonnement(string $NomAbonnement): static
    {
        $this->NomAbonnement = $NomAbonnement;
        return $this;
    }





    public function getTarifsAbonnement(): ?string
    {
        return $this->Tarifs_abonnement;
    }

    public function setTarifsAbonnement(string $Tarifs_abonnement): static
    {
        $this->Tarifs_abonnement = $Tarifs_abonnement;
        return $this;
    }

    public function isChoixAbonnement(): ?bool
    {
        return $this->Choix_Abonnement;
    }

    public function setChoixAbonnement(bool $Choix_Abonnement): static
    {
        $this->Choix_Abonnement = $Choix_Abonnement;
        return $this;
    }

   
}
