<?php

namespace App\Repository;

use App\Entity\Faculte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Faculte>
 *
 * @method Faculte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Faculte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Faculte[]    findAll()
 * @method Faculte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaculteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Faculte::class);
    }

    /**
     * Retourne le nombre d'étudiants par faculté.
     *
     * @return array
     */
    public function countStudentsByFaculty(): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.nom AS nom_faculte, COUNT(e.id) AS nombre_etudiants')
            ->join('f.filieres', 'fi')
            ->join('fi.etudiants', 'e')
            ->groupBy('f.id, f.nom')
            ->orderBy('f.id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Retourne le pourcentage d'étudiants par faculté.
     *
     * @return array
     */
    public function getPercentageStudentsByFaculty(): array
    {
        $subquery = $this->createQueryBuilder('e2')
            ->select('COUNT(e2.id) AS total_etudiants')
            ->getQuery()
            ->getSingleResult();

        return $this->createQueryBuilder('f')
            ->select('f.nom AS nom_faculte, (COUNT(e.id) * 100.0 / :totalEtudiants) AS pourcentage_etudiants_faculte')
            ->join('f.filieres', 'fi')
            ->join('fi.etudiants', 'e')
            ->setParameter('totalEtudiants', $subquery['total_etudiants'])
            ->groupBy('f.id')
            ->orderBy('f.id')
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Faculte[] Returns an array of Faculte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Faculte
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
