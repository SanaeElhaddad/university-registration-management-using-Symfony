<?php

namespace App\Controller;

use App\Entity\EtudiantStep3;
use App\Form\EtudiantStep3Type;
use App\Repository\EtudiantStep3Repository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/step3')]
class Step3Controller extends AbstractController
{
    #[Route('/', name: 'app_step3_index', methods: ['GET'])]
    public function index(EtudiantStep3Repository $etudiantStep3Repository): Response
    {
        return $this->render('step3/index.html.twig', [
            'etudiant_step3s' => $etudiantStep3Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_step3_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etudiantStep3 = new EtudiantStep3();
        $form = $this->createForm(EtudiantStep3Type::class, $etudiantStep3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($etudiantStep3);
            $entityManager->flush();

            return $this->redirectToRoute('app_step3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('step3/new.html.twig', [
            'etudiant_step3' => $etudiantStep3,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_step3_show', methods: ['GET'])]
    public function show(EtudiantStep3 $etudiantStep3): Response
    {
        return $this->render('step3/show.html.twig', [
            'etudiant_step3' => $etudiantStep3,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_step3_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtudiantStep3 $etudiantStep3, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtudiantStep3Type::class, $etudiantStep3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_step3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('step3/edit.html.twig', [
            'etudiant_step3' => $etudiantStep3,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_step3_delete', methods: ['POST'])]
    public function delete(Request $request, EtudiantStep3 $etudiantStep3, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudiantStep3->getId(), $request->request->get('_token'))) {
            $entityManager->remove($etudiantStep3);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_step3_index', [], Response::HTTP_SEE_OTHER);
    }
}
