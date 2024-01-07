<?php

namespace App\Repository;

use App\Entity\ThirdStep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThirdStep>
 *
 * @method ThirdStep|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThirdStep|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThirdStep[]    findAll()
 * @method ThirdStep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThirdStepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThirdStep::class);
    }

//    /**
//     * @return ThirdStep[] Returns an array of ThirdStep objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ThirdStep
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
