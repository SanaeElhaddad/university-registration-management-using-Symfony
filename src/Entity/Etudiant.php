<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Filiere $filiere = null;

    #[ORM\OneToOne(mappedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private ?Compte $compte = null;
    
   
    #[ORM\Column(length: 255)]
    private ?string $cne = null;

    #[ORM\Column(length: 255)]
    private ?string $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_Naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_postale = null;

    #[ORM\Column(length: 255)]
    private ?string $nationalite = null;

    #[ORM\Column(length: 255)]
    private ?string $profession_pere = null;

    #[ORM\Column(length: 255)]
    private ?string $profession_mere = null;

    #[ORM\Column(length: 255)]
    private ?string $gsm_mere = null;

    #[ORM\Column(length: 255)]
    private ?string $gsm_pere = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_passe = null;
    private ?string $confirmPass = null;

   
    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\OneToOne(mappedBy: 'etudiantstep2', cascade: ['persist', 'remove'])]
    private ?EtudiantStep2 $etudiantStep2 = null;


    public function getConfirmPass(): ?string
    {
        return $this->confirmPass;
    }
    public function setConfirmPass(string $confirmPass): void
    {
        $this->confirmPass = $confirmPass;
    }
    

    #[ORM\OneToOne(mappedBy: 'E_step3', cascade: ['persist', 'remove'])]
    private ?EtudiantStep3 $etudiantStep3 = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $note_math = null;

    #[ORM\Column(length: 255)]
    private ?string $note_franc = null;

    #[ORM\Column(length: 255)]
    private ?string $note_6eme = null;

    #[ORM\Column(length: 255)]
    private ?string $note_bac = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $Attestation_reussite = null;

    #[ORM\Column(length: 255)]
    private ?string $carte_nationale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Attestation_reussite1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Attestation_reussite2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $licence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Attestation_reussite4 = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): static
    {
        // unset the owning side of the relation if necessary
        if ($compte === null && $this->compte !== null) {
            $this->compte->setEtudiant(null);
        }

        // set the owning side of the relation if necessary
        if ($compte !== null && $compte->getEtudiant() !== $this) {
            $compte->setEtudiant($this);
        }

        $this->compte = $compte;

        return $this;
    }

   

    public function getCne(): ?string
    {
        return $this->cne;
    }

    public function setCne(string $cne): static
    {
        $this->cne = $cne;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
{
    return $this->date_Naissance;
}

public function setDateNaissance(?\DateTimeInterface $date_Naissance): static
{
    $this->date_Naissance = $date_Naissance;

    return $this;
}

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdressePostale(): ?string
    {
        return $this->adresse_postale;
    }

    public function setAdressePostale(string $adresse_postale): static
    {
        $this->adresse_postale = $adresse_postale;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getProfessionPere(): ?string
    {
        return $this->profession_pere;
    }

    public function setProfessionPere(string $profession_pere): static
    {
        $this->profession_pere = $profession_pere;

        return $this;
    }

    public function getProfessionMere(): ?string
    {
        return $this->profession_mere;
    }

    public function setProfessionMere(string $profession_mere): static
    {
        $this->profession_mere = $profession_mere;

        return $this;
    }

    public function getGsmMere(): ?string
    {
        return $this->gsm_mere;
    }

    public function setGsmMere(string $gsm_mere): static
    {
        $this->gsm_mere = $gsm_mere;

        return $this;
    }

    public function getGsmPere(): ?string
    {
        return $this->gsm_pere;
    }

    public function setGsmPere(string $gsm_pere): static
    {
        $this->gsm_pere = $gsm_pere;

        return $this;
    }

    public function getMotPasse(): ?string
    {
        return $this->mot_passe;
    }

    public function setMotPasse(string $mot_passe): static
    {
        $this->mot_passe = $mot_passe;

        return $this;
    }

   

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getEtudiantStep2(): ?EtudiantStep2
    {
        return $this->etudiantStep2;
    }

    public function setEtudiantStep2(EtudiantStep2 $etudiantStep2): static
    {
        // set the owning side of the relation if necessary
        if ($etudiantStep2->getEtudiantstep2() !== $this) {
            $etudiantStep2->setEtudiantstep2($this);
        }

        $this->etudiantStep2 = $etudiantStep2;

        return $this;
    }


    public function getEtudiantStep3(): ?EtudiantStep3
    {
        return $this->etudiantStep3;
    }

    public function setEtudiantStep3(EtudiantStep3 $etudiantStep3): static
    {
        // set the owning side of the relation if necessary
        if ($etudiantStep3->getEStep3() !== $this) {
            $etudiantStep3->setEStep3($this);
        }

        $this->etudiantStep3 = $etudiantStep3;

        return $this;
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

    public function getAttestationReussite1(): ?string
    {
        return $this->Attestation_reussite1;
    }

    public function setAttestationReussite1(?string $Attestation_reussite1): static
    {
        $this->Attestation_reussite1 = $Attestation_reussite1;

        return $this;
    }

    public function getAttestationReussite2(): ?string
    {
        return $this->Attestation_reussite2;
    }

    public function setAttestationReussite2(?string $Attestation_reussite2): static
    {
        $this->Attestation_reussite2 = $Attestation_reussite2;

        return $this;
    }

    public function getLicence(): ?string
    {
        return $this->licence;
    }

    public function setLicence(?string $licence): static
    {
        $this->licence = $licence;

        return $this;
    }

    public function getAttestationReussite4(): ?string
    {
        return $this->Attestation_reussite4;
    }

    public function setAttestationReussite4(?string $Attestation_reussite4): static
    {
        $this->Attestation_reussite4 = $Attestation_reussite4;

        return $this;
    }

}
