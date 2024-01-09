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
    public function dashboard_responsable(): Response
    {
        return $this->render('responsable/index.html.twig');
    }
}
