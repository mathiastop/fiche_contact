<?php

namespace App\Repository;

use App\Entity\Developpement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Developpement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Developpement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Developpement[]    findAll()
 * @method Developpement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeveloppementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Developpement::class);
    }

    // /**
    //  * @return Developpement[] Returns an array of Developpement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Developpement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
