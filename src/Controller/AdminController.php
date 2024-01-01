<?php

namespace App\Controller;

use App\Entity\Faculte;
use App\Entity\Responsable;
use App\Form\FaculteType;
use App\Form\ResponsableType;
use App\Repository\FaculteRepository;
use App\Repository\FiliereRepository;
use App\Repository\ResponsableRepository;
use App\Repository\SecretaireRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Filesystem\Filesystem;

class AdminController extends AbstractController
{
    private $faculteRepository;
    private $entityManager;
    private $filiereRepository;
    private $responsableRepository;
    private $secretaireRepository;
    Private $passwordHash ;

    public function __construct(UserPasswordHasherInterface $passwordHash,SecretaireRepository $secretaireRepository,ResponsableRepository $responsableRepository,FaculteRepository $faculteRepository,FiliereRepository $filiereRepository, ManagerRegistry $doctrine)
    {
        
        $this->faculteRepository = $faculteRepository;
        $this->filiereRepository = $filiereRepository;
        $this->responsableRepository = $responsableRepository;
        $this->secretaireRepository = $secretaireRepository;
        $this->passwordHash = $passwordHash;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/admin', name: 'home_admin')]
    public function index(): Response
    {
        $admin = $this->getUser();

          return $this->render('admin/index.html.twig', [
            'admin' => $admin,
         ]);
    }

    #[Route('/', name: 'app_logout')]
    public function deconnexionAction(){
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin/faculte', name: 'admin_Faculte')]
    public function faculte(Request $request): Response
    {
        $facultes = $this->faculteRepository->findAll();
    
        $faculte = new Faculte();
        
        $form = $this->createForm(FaculteType::class, $faculte);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $faculte = $form->getData();
            $this->entityManager->persist($faculte);
            $this->entityManager->flush();
    
            return $this->redirectToRoute('admin_Faculte');
        }
    
        return $this->render('admin/faculte.html.twig', [
            'facultes' => $facultes,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/responsable', name: 'admin_responsable')]
    public function Responsable(Request $request): Response
    {

        $responsable = new Responsable();
        
        $form = $this->createForm(ResponsableType::class, $responsable);
    
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $responsable = $form->getData();

            $hashPassword = $this->passwordHash->hashPassword($responsable,$responsable->getPassword());
            $responsable->setPassword($hashPassword);
            
            if($request->files->get('responsable')['image']){
                $image = $request->files->get('responsable')['image'];
                $image_name= time().'_' . $image->getClientOriginalName();
                $image->move($this->getParameter('image_directory'),$image_name);
                $responsable->setImage($image_name);
            } 
            $this->entityManager->persist($responsable);
            $this->entityManager->flush();
    
            return $this->redirectToRoute('admin_responsable');
        }
        $responsables = $this->responsableRepository->findAll();
        return $this->render('admin/responsable.html.twig', [
            'responsables' => $responsables,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/faculteDelete/{id}', name: 'faculte_delete')]
    public function deleteFaculte($id): Response
    {        
        $faculte = $this->entityManager->getRepository(Faculte::class)->find($id);
        
        $this->entityManager->remove($faculte);
        $this->entityManager->flush();
            
        return $this->redirectToRoute('admin_Faculte');
    }

    #[Route('/admin/editFaculte/{id}', name: 'faculte_edit')]
    public function editFaculte(Request $request, $id): Response
    {
        
        $faculte = $this->entityManager->getRepository(Faculte::class)->find($id);
    
    
        $form = $this->createForm(FaculteType::class, $faculte);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $faculte = $form->getData();

            $this->entityManager->persist($faculte);
            $this->entityManager->flush();
    
    
            return $this->redirectToRoute('admin_Faculte');
        }
    
        return $this->renderForm('admin/editFaculte.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/admin/responsableDelete/{id}', name: 'responsable_delete')]
    public function deleteResponsable($id): Response
    {
   
        $responsable = $this->entityManager->getRepository(Responsable::class)->find($id);
        $fileSystem = new Filesystem();
        $imagePath = './uploads/' . $responsable->getImage();
        if ($fileSystem->exists($imagePath)) {
            $fileSystem->remove($imagePath);
        }
    
        $this->entityManager->remove($responsable);
        $this->entityManager->flush();
            
        return $this->redirectToRoute('admin_responsable');
    }

    #[Route('/admin/editResponsable/{id}', name: 'responsable_edit')]
    public function editResponsable(Request $request, $id): Response
    {

        $responsable = $this->entityManager->getRepository(Responsable::class)->find($id);

        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $responsable = $form->getData();
            $hashPassword = $this->passwordHash->hashPassword($responsable,$responsable->getPassword());
            $responsable->setPassword($hashPassword);
            if ($request->files->get('responsable')['image']) {
                $image = $request->files->get('responsable')['image'];
                $image_name = time() . '_' . $image->getClientOriginalName();
                $image->move($this->getParameter('image_directory'), $image_name);
                $responsable->setImage($image_name);
            }
            $this->entityManager->persist($responsable);
            $this->entityManager->flush();
    
    
            return $this->redirectToRoute('admin_responsable');
        }
    
        return $this->renderForm('admin/editResponsable.html.twig', [
            'form' => $form,
        ]);
    }
}
