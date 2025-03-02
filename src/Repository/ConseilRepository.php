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
// src/Repository/ConseilRepository.php



    public function getDemandeConseilStats()
    {
        return $this->createQueryBuilder('c')
            ->select('d.id as demandeId, d.content as demandeContent, COUNT(c.idC) as totalConseils')
            ->join('c.demande', 'd')
            ->groupBy('d.id')
            ->orderBy('totalConseils', 'DESC')
            ->getQuery()
            ->getResult();
    }



    public function getDemandeRatio()
    {
        return $this->createQueryBuilder('c')
            ->select(
                '(SELECT COUNT(d.id) FROM App\Entity\Demande d) as totalDemandes',
                'COUNT(DISTINCT c.demande) as demandesAvecConseils'
            )
            ->getQuery()
            ->getSingleResult();
    }

    public function getConseilTimeline()
    {
        return $this->createQueryBuilder('c')
            ->select("SUBSTRING(c.dateConseil, 1, 10) as conseilDate, COUNT(c.idC) as total")
            ->groupBy('conseilDate')
            ->orderBy('conseilDate', 'ASC')
            ->getQuery()
            ->getResult();
    }


    // Vous pouvez ajouter d'autres méthodes personnalisées ici selon vos besoins
}