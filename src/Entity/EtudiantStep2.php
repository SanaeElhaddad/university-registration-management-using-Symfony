<?php

namespace App\Entity;

use App\Repository\EtudiantStep2Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantStep2Repository::class)]
class EtudiantStep2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $note_math = null;

    #[ORM\Column(length: 255)]
    private ?string $note_franc = null;

    #[ORM\OneToOne(inversedBy: 'etudiantStep2', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiantstep2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getNoteMath(): ?string
    {
        return $this->note_math;
    }

    public function setNoteMath(string $note_math): static
    {
        $this->note_math = $note_math;

        return $this;
    }

    public function getNoteFranc(): ?string
    {
        return $this->note_franc;
    }

    public function setNoteFranc(string $note_franc): static
    {
        $this->note_franc = $note_franc;

        return $this;
    }

    public function getEtudiantstep2(): ?Etudiant
    {
        return $this->etudiantstep2;
    }

    public function setEtudiantstep2(Etudiant $etudiantstep2): static
    {
        $this->etudiantstep2 = $etudiantstep2;

        return $this;
    }
}
