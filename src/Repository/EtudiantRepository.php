<?php

namespace App\Repository;

use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etudiant>
 *
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

//    /**
//     * @return Etudiant[] Returns an array of Etudiant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Etudiant
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function findEtudiantsByFaculte($faculteName)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->setParameter('faculteName', $faculteName)
            ->getQuery()
            ->getResult();
    }
    public function findEtudiantsByFaculteFBS($faculteName)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->setParameter('faculteName', $faculteName)
            ->getQuery()
            ->getResult();
    }
    public function findEtudiantsByFaculteFMD($faculteName)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->setParameter('faculteName', $faculteName)
            ->getQuery()
            ->getResult();
    }
    public function findEtudiantsByFaculteFSPTS($faculteName)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->setParameter('faculteName', $faculteName)
            ->getQuery()
            ->getResult();
    }
    public function findEtudiantsByFaculteESMAB($faculteName)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->setParameter('faculteName', $faculteName)
            ->getQuery()
            ->getResult();
    }
    public function findEtudiantsByFaculteAndAnnee($faculteName, $niveau)
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.filiere', 'f')
            ->leftJoin('f.faculte', 'fa')
            ->where('fa.nom = :faculteName')
            ->andWhere('e.niveau = :niveau') // Utilisez :niveau au lieu de :annee
            ->setParameter('faculteName', $faculteName)
            ->setParameter('niveau', $niveau) // Utilisez le même nom ici
            ->getQuery()
            ->getResult();
    }
}
