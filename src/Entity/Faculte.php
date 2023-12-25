<?php

namespace App\Entity;

use App\Repository\FaculteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaculteRepository::class)]
class Faculte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'Faculte', targetEntity: Filiere::class)]
    private Collection $filieres;

    #[ORM\OneToMany(mappedBy: 'faculte', targetEntity: Responsable::class)]
    private Collection $responsables;

    #[ORM\OneToMany(mappedBy: 'faculte', targetEntity: Secretaire::class)]
    private Collection $secretaires;

    public function __construct()
    {
        $this->filieres = new ArrayCollection();
        $this->responsables = new ArrayCollection();
        $this->secretaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Filiere>
     */
    public function getFilieres(): Collection
    {
        return $this->filieres;
    }

    public function addFiliere(Filiere $filiere): static
    {
        if (!$this->filieres->contains($filiere)) {
            $this->filieres->add($filiere);
            $filiere->setFaculte($this);
        }

        return $this;
    }

    public function removeFiliere(Filiere $filiere): static
    {
        if ($this->filieres->removeElement($filiere)) {
            // set the owning side to null (unless already changed)
            if ($filiere->getFaculte() === $this) {
                $filiere->setFaculte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Responsable>
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(Responsable $responsable): static
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables->add($responsable);
            $responsable->setFaculte($this);
        }

        return $this;
    }

    public function removeResponsable(Responsable $responsable): static
    {
        if ($this->responsables->removeElement($responsable)) {
            // set the owning side to null (unless already changed)
            if ($responsable->getFaculte() === $this) {
                $responsable->setFaculte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Secretaire>
     */
    public function getSecretaires(): Collection
    {
        return $this->secretaires;
    }

    public function addSecretaire(Secretaire $secretaire): static
    {
        if (!$this->secretaires->contains($secretaire)) {
            $this->secretaires->add($secretaire);
            $secretaire->setFaculte($this);
        }

        return $this;
    }

    public function removeSecretaire(Secretaire $secretaire): static
    {
        if ($this->secretaires->removeElement($secretaire)) {
            // set the owning side to null (unless already changed)
            if ($secretaire->getFaculte() === $this) {
                $secretaire->setFaculte(null);
            }
        }

        return $this;
    }
}
