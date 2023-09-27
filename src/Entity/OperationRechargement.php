<?php

namespace App\Entity;

use App\Repository\OperationRechargementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRechargementRepository::class)]
class OperationRechargement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureDébut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureFin = null;

    #[ORM\Column]
    private ?int $nbKwHeures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureDébut(): ?\DateTimeInterface
    {
        return $this->dateHeureDébut;
    }

    public function setDateHeureDébut(\DateTimeInterface $dateHeureDébut): static
    {
        $this->dateHeureDébut = $dateHeureDébut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $dateHeureFin): static
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getNbKwHeures(): ?int
    {
        return $this->nbKwHeures;
    }

    public function setNbKwHeures(int $nbKwHeures): static
    {
        $this->nbKwHeures = $nbKwHeures;

        return $this;
    }
}
