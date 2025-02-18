<?php



// src/Repository/ConseilRepository.php
namespace App\Repository;

use App\Entity\Conseil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Conseil>
 *
 * @method Conseil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conseil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conseil[]    findAll()
 * @method Conseil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conseil::class);
    }

    /**
     * Sauvegarde une entité Conseil.
     *
     * @param Conseil $entity L'entité à sauvegarder
     * @param bool $flush Si true, exécute un flush après la persistance
     */
    public function save(Conseil $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Supprime une entité Conseil.
     *
     * @param Conseil $entity L'entité à supprimer
     * @param bool $flush Si true, exécute un flush après la suppression
     */
    public function remove(Conseil $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Trouve tous les conseils associés à une demande spécifique.
     *
     * @param int $demandeId L'ID de la demande
     * @return Conseil[] Retourne un tableau de conseils
     */
    public function findByDemandeId(int $demandeId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.demande = :demandeId')
            ->setParameter('demandeId', $demandeId)
            ->orderBy('c.dateConseil', 'DESC') // Trie les conseils par date, du plus récent au plus ancien
            ->getQuery()
            ->getResult();
    }

    // Vous pouvez ajouter d'autres méthodes personnalisées ici selon vos besoins
}