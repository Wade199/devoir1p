<?php

namespace App\Entity;

use App\Repository\TypeChargeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeChargeRepository::class)]
class TypeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleTypeCharge = null;

    #[ORM\Column(length: 255)]
    private ?string $puissanceTypeCharge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeCharge(): ?string
    {
        return $this->libelleTypeCharge;
    }

    public function setLibelleTypeCharge(string $libelleTypeCharge): static
    {
        $this->libelleTypeCharge = $libelleTypeCharge;

        return $this;
    }

    public function getPuissanceTypeCharge(): ?string
    {
        return $this->puissanceTypeCharge;
    }

    public function setPuissanceTypeCharge(string $puissanceTypeCharge): static
    {
        $this->puissanceTypeCharge = $puissanceTypeCharge;

        return $this;
    }
}
