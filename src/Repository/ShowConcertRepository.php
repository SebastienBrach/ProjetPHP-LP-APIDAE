<?php

namespace App\Repository;

use App\Entity\ShowConcert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShowConcert|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShowConcert|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShowConcert[]    findAll()
 * @method ShowConcert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShowConcert::class);
    }

    // /**
    //  * @return ShowConcert[] Returns an array of ShowConcert objects
    //  */
    
    public function findNextConcert() {
        return $this->createQueryBuilder('s')
            ->andWhere('s.date > :now')
            ->setParameter('now', new Datetime('now'))
            ->orderBy('s.date', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
    

    /*
    public function findOneBySomeField($value): ?ShowConcert
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
