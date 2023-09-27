<?php

namespace App\Entity;

use App\Repository\ModeleBatterieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleBatterieRepository::class)]
class ModeleBatterie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $capacité = null;

    #[ORM\Column(length: 255)]
    private ?string $fabricant = null;

    #[ORM\JoinColumn(nullable: false)]
    private ?contrat $modeleBatterie = null;

    #[ORM\OneToMany(mappedBy: 'modeleBatterie', targetEntity: Contrat::class, orphanRemoval: true)]
    private Collection $contrats;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacité(): ?string
    {
        return $this->capacité;
    }

    public function setCapacité(string $capacité): static
    {
        $this->capacité = $capacité;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    public function getModeleBatterie(): ?contrat
    {
        return $this->modeleBatterie;
    }

    public function setModeleBatterie(?contrat $modeleBatterie): static
    {
        $this->modeleBatterie = $modeleBatterie;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): static
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setModeleBatterie($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): static
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getModeleBatterie() === $this) {
                $contrat->setModeleBatterie(null);
            }
        }

        return $this;
    }
}
