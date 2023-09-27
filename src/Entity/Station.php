<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $latitude = null;

    #[ORM\Column(length: 255)]
    private ?string $longitude = null;

    #[ORM\Column(length: 255)]
    private ?string $adresserue = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseVille = null;

    #[ORM\Column]
    private ?float $codePostal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAdresserue(): ?string
    {
        return $this->adresserue;
    }

    public function setAdresserue(string $adresserue): static
    {
        $this->adresserue = $adresserue;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresseVille;
    }

    public function setAdresseVille(string $adresseVille): static
    {
        $this->adresseVille = $adresseVille;

        return $this;
    }

    public function getCodePostal(): ?float
    {
        return $this->codePostal;
    }

    public function setCodePostal(float $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
