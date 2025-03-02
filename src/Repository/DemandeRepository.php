<?php
// src/Repository/DemandeRepository.php
namespace App\Repository;

use App\Entity\Demande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DemandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demande::class);
    }

    

    public function save(Demande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function searchByNomOrType($searchTerm)
    {
        $qb = $this->createQueryBuilder('p');
        if ($searchTerm) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('p.nom', ':searchTerm'),
                $qb->expr()->like('p.content', ':searchTerm')
            ))
            ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
        return $qb->getQuery()->getResult();
    }
}