<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
     Private $passwordHash ;

    public function __construct(UserPasswordHasherInterface $passwordHash){
        $this->passwordHash = $passwordHash;
    }
    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $plainPassword = "admin1234";
        $hashPassword = $this->passwordHash->hashPassword($admin,$plainPassword);
        $admin->setCin("CD666206");

        $admin->setNom("admin");
        $admin->setPrenom("admin");
        $admin->setEmail("admin@admin.com");
        $admin->setNumero("0612347590");
        $admin->setPassword($hashPassword);
                
        $manager->persist($admin);

        $manager->flush();
    }
}
