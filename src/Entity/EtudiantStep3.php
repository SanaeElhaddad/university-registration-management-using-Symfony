<?php

namespace App\Entity;

use App\Repository\EtudiantStep3Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantStep3Repository::class)]
class EtudiantStep3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $note_6eme = null;

    #[ORM\Column(length: 255)]
    private ?string $note_bac = null;

    #[ORM\Column(length: 255)]
    private ?string $Attestation_reussite = null;

    #[ORM\Column(length: 255)]
    private ?string $carte_nationale = null;

    #[ORM\OneToOne(inversedBy: 'etudiantStep3', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $E_step3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote6eme(): ?string
    {
        return $this->note_6eme;
    }

    public function setNote6eme(string $note_6eme): static
    {
        $this->note_6eme = $note_6eme;

        return $this;
    }

    public function getNoteBac(): ?string
    {
        return $this->note_bac;
    }

    public function setNoteBac(string $note_bac): static
    {
        $this->note_bac = $note_bac;

        return $this;
    }

    public function getAttestationReussite(): ?string
    {
        return $this->Attestation_reussite;
    }

    public function setAttestationReussite(string $Attestation_reussite): static
    {
        $this->Attestation_reussite = $Attestation_reussite;

        return $this;
    }

    public function getCarteNationale(): ?string
    {
        return $this->carte_nationale;
    }

    public function setCarteNationale(string $carte_nationale): static
    {
        $this->carte_nationale = $carte_nationale;

        return $this;
    }

    public function getEStep3(): ?Etudiant
    {
        return $this->E_step3;
    }

    public function setEStep3(Etudiant $E_step3): static
    {
        $this->E_step3 = $E_step3;

        return $this;
    }
}
