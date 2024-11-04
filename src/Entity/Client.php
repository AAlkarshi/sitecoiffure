<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $Id_client = null;

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

    public function getIdClient(): ?int
    {
        return $this->Id_client;
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
}
