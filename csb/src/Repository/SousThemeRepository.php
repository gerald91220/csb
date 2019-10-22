<?php

namespace App\Repository;

use App\Entity\SousTheme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SousTheme|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousTheme|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousTheme[]    findAll()
 * @method SousTheme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousThemeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousTheme::class);
    }

    // /**
    //  * @return SousTheme[] Returns an array of SousTheme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SousTheme
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
