<?php

namespace App\Repository;

use App\Entity\TournamentEntry1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TournamentEntry1|null find($id, $lockMode = null, $lockVersion = null)
 * @method TournamentEntry1|null findOneBy(array $criteria, array $orderBy = null)
 * @method TournamentEntry1[]    findAll()
 * @method TournamentEntry1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TournamentEntry1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TournamentEntry1::class);
    }

    // /**
    //  * @return TournamentEntry1[] Returns an array of TournamentEntry1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TournamentEntry1
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
