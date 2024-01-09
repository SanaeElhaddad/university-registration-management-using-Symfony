<?php

namespace App\Controller;

use App\Repository\FaculteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function dashboard_responsable(FaculteRepository $faculteRepository): Response
    {
        
        // Appel de la fonction countStudentsByFaculty du FaculteRepository
        $resultats = $faculteRepository->countStudentsByFaculty();

        // Transforme les résultats en un tableau associatif pour faciliter le passage à la vue
        $data = [];
        foreach ($resultats as $resultat) {
            $data['faculte'][] = $resultat['nom_faculte'];
            $data['etudiants'][] = $resultat['nombre_etudiants'];
        }

        $resultats2 = $faculteRepository->getPercentageStudentsByFaculty();

        return $this->render('responsable/index.html.twig', ['data' => $data,'resultats' => $resultats2]);
    }
}
