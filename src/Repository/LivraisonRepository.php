<?php

namespace App\Repository;

use App\Entity\Livraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Livraison>
 *
 * @method Livraison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livraison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livraison[]    findAll()
 * @method Livraison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livraison::class);
    }

    public function save(Livraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Livraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
    public function findByCommandeId($commandeId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->orderBy('c.dateCreation', 'DESC') // Trie les livraisons par date de création, du plus récent au plus ancien
            ->getQuery()
            ->getResult();
    }

    public function getTopLivreurs()
    {
        return $this->createQueryBuilder('l')
            ->select('l.livreur as livreur, COUNT(l.id) as totalLivraisons')
            ->where('LOWER(l.statut) = LOWER(:status)') // Case-insensitive check
            ->setParameter('status', 'livré')
            ->groupBy('l.livreur')
            ->orderBy('totalLivraisons', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }




//    /**
//     * @return Livraison[] Returns an array of Livraison objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Livraison
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
