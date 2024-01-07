<?php

namespace App\Controller;

use App\Entity\EtudiantStep2;
use App\Form\EtudiantStep2Type;
use App\Repository\EtudiantStep2Repository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudiantstep2')]
class EtudiantStep2Controller extends AbstractController
{
    #[Route('/', name: 'app_etudiant_step2_index', methods: ['GET'])]
    public function index(EtudiantStep2Repository $etudiantStep2Repository): Response
    {
        return $this->render('etudiant_step2/index.html.twig', [
            'etudiant_step2s' => $etudiantStep2Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etudiant_step2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etudiantStep2 = new EtudiantStep2();
        $form = $this->createForm(EtudiantStep2Type::class, $etudiantStep2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($etudiantStep2);
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiant_step2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiant_step2/new.html.twig', [
            'etudiant_step2' => $etudiantStep2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiant_step2_show', methods: ['GET'])]
    public function show(EtudiantStep2 $etudiantStep2): Response
    {
        return $this->render('etudiant_step2/show.html.twig', [
            'etudiant_step2' => $etudiantStep2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etudiant_step2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtudiantStep2 $etudiantStep2, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtudiantStep2Type::class, $etudiantStep2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiant_step2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiant_step2/edit.html.twig', [
            'etudiant_step2' => $etudiantStep2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiant_step2_delete', methods: ['POST'])]
    public function delete(Request $request, EtudiantStep2 $etudiantStep2, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudiantStep2->getId(), $request->request->get('_token'))) {
            $entityManager->remove($etudiantStep2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_etudiant_step2_index', [], Response::HTTP_SEE_OTHER);
    }
}
