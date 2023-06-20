<?php

namespace App\Repository;

use App\Entity\ProductoFinanciero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductoFinanciero>
 *
 * @method ProductoFinanciero|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductoFinanciero|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductoFinanciero[]    findAll()
 * @method ProductoFinanciero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoFinancieroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductoFinanciero::class);
    }

    public function save(ProductoFinanciero $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProductoFinanciero $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProductoFinanciero[] Returns an array of ProductoFinanciero objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProductoFinanciero
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
