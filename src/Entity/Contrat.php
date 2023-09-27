<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateContrat = null;

    #[ORM\Column(length: 100)]
    private ?string $noImmartriculation = null;
    

    public function __construct()
    {
        $this->usagers = new ArrayCollection();
        $this->modeleBatteries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContrat(): ?\DateTimeInterface
    {
        return $this->dateContrat;
    }

    public function setDateContrat(\DateTimeInterface $dateContrat): static
    {
        $this->dateContrat = $dateContrat;

        return $this;
    }

    public function getNoImmartriculation(): ?string
    {
        return $this->noImmartriculation;
    }

    public function setNoImmartriculation(string $noImmartriculation): static
    {
        $this->noImmartriculation = $noImmartriculation;

        return $this;
    }

    public function getUsager(): ?usager
    {
        return $this->usager;
    }

    public function setUsager(?usager $usager): static
    {
        $this->usager = $usager;

        return $this;
    }

    /**
     * @return Collection<int, Usager>
     */
    public function getUsagers(): Collection
    {
        return $this->usagers;
    }

    public function addUsager(Usager $usager): static
    {
        if (!$this->usagers->contains($usager)) {
            $this->usagers->add($usager);
            $usager->setUsager($this);
        }

        return $this;
    }

    public function removeUsager(Usager $usager): static
    {
        if ($this->usagers->removeElement($usager)) {
            // set the owning side to null (unless already changed)
            if ($usager->getUsager() === $this) {
                $usager->setUsager(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ModeleBatterie>
     */
    public function getModeleBatteries(): Collection
    {
        return $this->modeleBatteries;
    }

    public function addModeleBattery(ModeleBatterie $modeleBattery): static
    {
        if (!$this->modeleBatteries->contains($modeleBattery)) {
            $this->modeleBatteries->add($modeleBattery);
            $modeleBattery->setModeleBatterie($this);
        }

        return $this;
    }

    public function removeModeleBattery(ModeleBatterie $modeleBattery): static
    {
        if ($this->modeleBatteries->removeElement($modeleBattery)) {
            // set the owning side to null (unless already changed)
            if ($modeleBattery->getModeleBatterie() === $this) {
                $modeleBattery->setModeleBatterie(null);
            }
        }

        return $this;
    }
}
