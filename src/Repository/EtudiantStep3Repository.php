<?php

namespace App\Repository;

use App\Entity\EtudiantStep3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtudiantStep3>
 *
 * @method EtudiantStep3|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtudiantStep3|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtudiantStep3[]    findAll()
 * @method EtudiantStep3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantStep3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtudiantStep3::class);
    }

//    /**
//     * @return EtudiantStep3[] Returns an array of EtudiantStep3 objects
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

//    public function findOneBySomeField($value): ?EtudiantStep3
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
