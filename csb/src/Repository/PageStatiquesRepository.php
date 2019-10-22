<?php

namespace App\Repository;

use App\Entity\PageStatiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PageStatiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageStatiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageStatiques[]    findAll()
 * @method PageStatiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageStatiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageStatiques::class);
    }

    // /**
    //  * @return PageStatiques[] Returns an array of PageStatiques objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PageStatiques
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
