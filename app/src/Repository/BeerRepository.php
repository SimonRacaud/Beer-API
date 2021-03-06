<?php

namespace App\Repository;

use App\Entity\Beer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Beer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beer[]    findAll()
 * @method Beer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Beer::class);
    }

    // /**
    //  * @return Beer[] Returns an array of Beer objects
    //  */

    public function getByABV(int $nb_value)
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.abv', 'DESC')
            ->setMaxResults($nb_value)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getByIBU(int $nb_value)
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.ibu', 'DESC')
            ->setMaxResults($nb_value)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Beer
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
