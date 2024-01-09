<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EtudiantRepository; 
use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ListDattente;



class SecretaireController extends AbstractController
{
    #[Route('/secretaire', name: 'app_secretaire')]
    public function index(): Response
    {
        return $this->render('secretaire/index.html.twig', [
            'controller_name' => 'SecretaireController',
        ]);
    }
    #[Route('/secretaire/etudiants', name:'etudiants')] 
   public function ListEtudiant(EtudiantRepository $etudiantRepository): Response
    {
        $etudiants = $etudiantRepository->findAll();
        
        return $this->render('secretaire/etudiants.html.twig', ['etudiants' => $etudiants]);
    }
    #[Route('/detail_etudiant/{id}', name: 'view_etudiant')]
    public function DetailEtudiant(EtudiantRepository $etudiantRepository, $id): Response
    {
        $etudiant = $etudiantRepository->find($id);
        return $this->render('secretaire/Etudiant.html.twig', ['etudiant' => $etudiant]);
    }
    #[Route('/etudiants/FSI', name: 'etudiants_FSI')]
    public function etudiantsSciencesIngenieur(EtudiantRepository $etudiantRepository): Response
    {
         $etudiants = $etudiantRepository->findEtudiantsByFaculte('FSI');
        return $this->render('secretaire/FSI.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/etudiants/FBS', name: 'etudiants_FBS')]
    public function etudiantsFBS(EtudiantRepository $etudiantRepository): Response
    {
         $etudiants = $etudiantRepository->findEtudiantsByFaculteFBS('FBS');
        return $this->render('secretaire/FBS.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/etudiants/FMD', name: 'etudiants_FMD')]
    public function etudiantsFMD(EtudiantRepository $etudiantRepository): Response
    {
         $etudiants = $etudiantRepository->findEtudiantsByFaculteFMD('FMD');
        return $this->render('secretaire/FMD.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/etudiants/FSPTS', name: 'etudiants_FSPTS')]
    public function etudiantsFSPTS(EtudiantRepository $etudiantRepository): Response
    {
         $etudiants = $etudiantRepository->findEtudiantsByFaculteFSPTS('FSPTS');
        return $this->render('secretaire/FSPTS.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/etudiants/ESMAB', name: 'etudiants_ESMAB')]
    public function etudiantsESMAB(EtudiantRepository $etudiantRepository): Response
    {
         $etudiants = $etudiantRepository->findEtudiantsByFaculteESMAB('ESMAB');
        return $this->render('secretaire/ESMAB.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/valider_etudiant/{id}', name: 'valider_etudiant')]
    public function validerEtudiant($id, EtudiantRepository $etudiantRepository, EntityManagerInterface $entityManager): Response
    {
        $etudiant = $etudiantRepository->find($id);
        $etudiant->setStatus(true);
    
        // Enregistrez les modifications dans la base de données
        $entityManager->flush();
    
        return $this->render('secretaire/Etudiant.html.twig', ['etudiant' => $etudiant]);
    }
    #[Route('/ajouter_liste_attente/{id}', name: 'ajouter_liste_attente')]
    public function ajouterListeAttente($id, EtudiantRepository $etudiantRepository, EntityManagerInterface $entityManager): Response
    {
        $etudiant = $etudiantRepository->find($id);
    
        $listeDattente = new ListDattente();
        $listeDattente->setCne($etudiant->getCne());
        $listeDattente->setCin($etudiant->getCin());
        $listeDattente->setNom($etudiant->getNom());
        $listeDattente->setPrenom($etudiant->getPrenom());
        $listeDattente->setDateNaissance($etudiant->getDateNaissance());
        $listeDattente->setTelephone($etudiant->getTelephone());
        $listeDattente->setEmail($etudiant->getEmail());
        $listeDattente->setGenre($etudiant->getGenre());
        $listeDattente->setVille($etudiant->getVille());
        $listeDattente->setAdressePostale($etudiant->getAdressePostale());
        $listeDattente->setNationalite($etudiant->getNationalite());
        $listeDattente->setProfessionPere($etudiant->getProfessionPere());
        $listeDattente->setProfessionMere($etudiant->getProfessionMere());
        $listeDattente->setGsmMere($etudiant->getGsmMere());
        $listeDattente->setMotPasse($etudiant->getMotPasse());
        $listeDattente->setConfirmPass($etudiant->getConfirmPass() ?? 'valeur_par_defaut');
        $listeDattente->setStatus($etudiant->isStatus());
        $listeDattente->setFiliere($etudiant->getFiliere());
        $listeDattente->setNiveau($etudiant->getNiveau());
        $listeDattente->setNoteMath($etudiant->getNoteMath());
        $listeDattente->setNoteFranc($etudiant->getNoteFranc());
        $listeDattente->setNote6eme($etudiant->getNote6eme());
        $listeDattente->setNoteBa($etudiant->getNoteBac()); // Correction ici
        $listeDattente->setAttestationReussite($etudiant->getAttestationReussite());
        $listeDattente->setCarteNationale($etudiant->getCarteNationale());
        $listeDattente->setAttestationReussite1($etudiant->getAttestationReussite1());
        $listeDattente->setAttestationReussite2($etudiant->getAttestationReussite2() ?? 'valeur_par_defaut');
        $listeDattente->setAttestationReussite4($etudiant->getAttestationReussite4() ?? 'valeur_par_defaut');        
        $entityManager->persist($listeDattente);
        $entityManager->flush();
    
        return $this->render('secretaire/Etudiant.html.twig', ['etudiant' => $etudiant]);
    }
    
}
