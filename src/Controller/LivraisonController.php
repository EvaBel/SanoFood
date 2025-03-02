<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/livraison')]
final class LivraisonController extends AbstractController
{
    #[Route(name: 'app_livraison_index', methods: ['GET'])]
    public function index(LivraisonRepository $livraisonRepository): Response
    {
        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_livraison_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livraison);
            $entityManager->flush();

            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livraison/new.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_livraison_show', methods: ['GET'])]
    public function show(Livraison $livraison): Response
    {
        return $this->render('livraison/show.html.twig', [
            'livraison' => $livraison,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_livraison_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Livraison $livraison, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livraison/edit.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_livraison_delete', methods: ['POST'])]
    public function delete(Request $request, Livraison $livraison, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livraison->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($livraison);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
    }



    #[Route('/new/{commandeId}', name: 'app_livraison_new', methods: ['GET', 'POST'])]
    public function new_livreur(Request $request, EntityManagerInterface $entityManager, int $commandeId): Response
    {
        // ✅ Fetch Commande using the provided ID
        $commande = $entityManager->getRepository(Commande::class)->find($commandeId);

        if (!$commande) {
            throw $this->createNotFoundException("❌ Commande introuvable !");
        }

        // ✅ Create Livraison and associate it with the Commande
        $livraison = new Livraison();
        $livraison->setCommande($commande);

        // ✅ Create form with pre-filled data
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ✅ Ensure `Commande` is always set before saving
            if (!$livraison->getCommande()) {
                throw new \Exception("❌ Impossible d'enregistrer une livraison sans commande associée !");
            }

            $entityManager->persist($livraison);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_catalogue');
        }

        return $this->render('livraison/new.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }
    #[Route('/livraison/stats', name: 'app_livraison_stats', methods: ['GET'])]
    public function stats(LivraisonRepository $livraisonRepository): Response
    {
        // Get top livreurs with their delivery counts
        $topLivreurs = $livraisonRepository->createQueryBuilder('l')
            ->select('l.livreur as livreur, COUNT(l.id) as totalLivraisons')
            ->where('LOWER(l.statut) = LOWER(:status)')
            ->setParameter('status', 'livré')
            ->groupBy('l.livreur')
            ->orderBy('totalLivraisons', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        return $this->render('livraison/livraison_stats.html.twig', [
            'topLivreurs' => $topLivreurs
        ]);
    }

}
