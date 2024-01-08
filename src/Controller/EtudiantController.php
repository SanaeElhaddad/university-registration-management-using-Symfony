<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudiant')]
class EtudiantController extends AbstractController
{
    #[Route('/', name: 'app_etudiant_index', methods: ['GET'])]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiantRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_etudiant_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $etudiant = new Etudiant();
    //     $form = $this->createForm(EtudiantType::class, $etudiant);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($etudiant);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_etudiant_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('etudiant/new.html.twig', [
    //         'etudiant' => $etudiant,
    //         'form' => $form,
    //     ]);
    // }

    #[Route('/new', name: 'app_etudiant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Attestation de Réussite
            $this->handleFileUpload($form, 'Attestation_reussite', 'setAttestationReussite', $etudiant);

            // Carte Nationale
            $this->handleFileUpload($form, 'carte_nationale', 'setCarteNationale', $etudiant);

            // Attestation de Réussite 1
            $this->handleFileUpload($form, 'Attestation_reussite1', 'setAttestationReussite1', $etudiant);

            // Attestation de Réussite 2
            $this->handleFileUpload($form, 'Attestation_reussite2', 'setAttestationReussite2', $etudiant);

            // Licence
            $this->handleFileUpload($form, 'licence', 'setLicence', $etudiant);

            // Attestation de Réussite 4
            $this->handleFileUpload($form, 'Attestation_reussite4', 'setAttestationReussite4', $etudiant);

            $entityManager->persist($etudiant);
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiant/new.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form,
        ]);
    }

    private function handleFileUpload($form, $fieldName, $setterMethod, $etudiant)
    {
        $file = $form->get($fieldName)->getData();
        if ($file instanceof UploadedFile) {
            $uploadsDirectory=$this->getParameter('kernel.project_dir') . '/public/uploads';
            $file->move($uploadsDirectory,$file->getClientOriginalName());
            $etudiant->$setterMethod($uploadsDirectory . '/' . $file->getClientOriginalName());
            
        }
    }

    #[Route('/{id}', name: 'app_etudiant_show', methods: ['GET'])]
    public function show(Etudiant $etudiant): Response
    {
        return $this->render('etudiant/show.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etudiant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etudiant $etudiant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('etudiant/edit.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiant_delete', methods: ['POST'])]
    public function delete(Request $request, Etudiant $etudiant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudiant->getId(), $request->request->get('_token'))) {
            $entityManager->remove($etudiant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_etudiant_index', [], Response::HTTP_SEE_OTHER);
    }
}
