<?php

namespace App\Repository;

use App\Entity\ListDattente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListDattente>
 *
 * @method ListDattente|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListDattente|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListDattente[]    findAll()
 * @method ListDattente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListDattenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListDattente::class);
    }

//    /**
//     * @return ListDattente[] Returns an array of ListDattente objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListDattente
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
