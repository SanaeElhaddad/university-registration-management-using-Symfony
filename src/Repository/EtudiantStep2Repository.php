<?php

namespace App\Repository;

use App\Entity\EtudiantStep2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtudiantStep2>
 *
 * @method EtudiantStep2|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtudiantStep2|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtudiantStep2[]    findAll()
 * @method EtudiantStep2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantStep2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtudiantStep2::class);
    }

//    /**
//     * @return EtudiantStep2[] Returns an array of EtudiantStep2 objects
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

//    public function findOneBySomeField($value): ?EtudiantStep2
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
