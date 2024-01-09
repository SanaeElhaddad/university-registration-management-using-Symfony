<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EtudiantRepository; 
use App\Entity\Etudiant;



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
}
