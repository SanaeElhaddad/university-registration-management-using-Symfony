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
}
