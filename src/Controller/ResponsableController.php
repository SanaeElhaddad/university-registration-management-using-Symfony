<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use App\Repository\FaculteRepository;
use App\Repository\ListDattenteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/responsable')]
class ResponsableController extends AbstractController
{
    #[Route('/', name: 'app_responsable')]
    public function index(): Response
    {
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }
    #[Route('/dashboard', name: 'dahsboard_responsable')]
    public function dashboard_responsable(FaculteRepository $faculteRepository, ListDattenteRepository $listDattenteRepository): Response
    {
        
        $totalStudentsWithEtatZero = $listDattenteRepository->countStudentsWithEtatZero();

        // Appel de la fonction countStudentsByFaculty du FaculteRepository
        $resultats = $faculteRepository->countStudentsByFaculty();

        // Transforme les résultats en un tableau associatif pour faciliter le passage à la vue
        $data = [];
        foreach ($resultats as $resultat) {
            $data['faculte'][] = $resultat['nom_faculte'];
            $data['etudiants'][] = $resultat['nombre_etudiants'];
        }

        $resultats2 = $faculteRepository->getPercentageStudentsByFaculty();

        return $this->render('responsable/index.html.twig', ['data' => $data,'resultats' => $resultats2, 'totalStudentsWithEtatZero' => $totalStudentsWithEtatZero]);
    }

    #[Route('/dossier_etudiants', name: 'dossierAvalider_responsable')]
    public function dossierAvalider_responsable(ListDattenteRepository $listDattenteRepository): Response
    {
        $totalStudentsWithEtatZero = $listDattenteRepository->countStudentsWithEtatZero();
        $etudiantNonValider = $listDattenteRepository->findBy(['status' => 0]);

        return $this->render('responsable/dossierAtraiter.html.twig', ['totalStudentsWithEtatZero' => $totalStudentsWithEtatZero, 'etudiants' => $etudiantNonValider]);
    }

    #[Route('/detail_etudiant/{id}', name: 'detailEtudiant_responsable')]
    public function DetailEtudiant(ListDattenteRepository $listDattenteRepository, $id): Response
    {
        $totalStudentsWithEtatZero = $listDattenteRepository->countStudentsWithEtatZero();
        $etudiant = $listDattenteRepository->find($id);

        return $this->render('responsable/etudiant.html.twig', ['totalStudentsWithEtatZero' => $totalStudentsWithEtatZero, 'etudiant' => $etudiant]);
    }

    #[Route('/ajouter_liste_principale/{cin}', name: 'ajouterListePrincipale')]
    public function ajouterListePrincipale($cin, EtudiantRepository $etudiantRepository, EntityManagerInterface $entityManager, ListDattenteRepository $listDattenteRepository): Response
    {
        // Récupérer l'étudiant par son CIN
        $etudiant = $etudiantRepository->findOneBy(['cin' => $cin]);
        $etudiantDattente = $listDattenteRepository->findOneBy(['cin' => $cin]);

        if ($etudiant) {
            $etudiant->setStatus(true);

            $entityManager->persist($etudiant);
            $entityManager->flush();

        }

        if ($etudiantDattente) {
            $etudiantDattente->setStatus(true);

            $entityManager->persist($etudiant);
            $entityManager->flush();

        }

        // Redirection vers l'URL souhaitée
        return new RedirectResponse($this->generateUrl('dossierAvalider_responsable'));

        // $totalStudentsWithEtatZero = $listDattenteRepository->countStudentsWithEtatZero();
        // $etudiants = $listDattenteRepository->findAll(['status' => 0]);

        // return $this->render('responsable/dossierAtraiter.html.twig', ['totalStudentsWithEtatZero' => $totalStudentsWithEtatZero, 'etudiants' => $etudiants]);
    }
    
}
