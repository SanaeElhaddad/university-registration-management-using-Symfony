<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginType;
use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\Responsable;


class LoginController extends AbstractController
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    #[Route('/login', name: 'app_login')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHash): Response
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $password = $form->get('password')->getData();

            // Try to find an Admin
            $admin = $entityManager->getRepository(Admin::class)->findOneBy(['email' => $email]);

            // If Admin is found and password is valid, authenticate as Admin
            if ($admin && $passwordHash->isPasswordValid($admin, $password)) {
                $token = new UsernamePasswordToken($admin, $admin->getPassword(), $admin->getRoles());
                $this->tokenStorage->setToken($token);

                return $this->redirectToRoute('home_admin');
            }

            // If Admin authentication fails, try to find a Responsable
            $responsable = $entityManager->getRepository(Responsable::class)->findOneBy(['email' => $email]);

            if ($responsable && $passwordHash->isPasswordValid($responsable, $password)) {
                $token = new UsernamePasswordToken($responsable, $responsable->getPassword(), $responsable->getRoles());
                $this->tokenStorage->setToken($token);

                return $this->redirectToRoute('home_responsable');
            } else {
                $this->addFlash('error', 'Email ou mot de passe incorrect.');
            }
        }

        return $this->renderForm('login/index.html.twig', [
            'form' => $form,
        ]);
    } 
}