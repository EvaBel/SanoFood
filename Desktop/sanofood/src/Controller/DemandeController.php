<?php
// src/Controller/DemandeController.php
namespace App\Controller;

use App\Entity\Conseil;
use App\Entity\Demande;
use App\Form\ConseilType;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; // <-- Ajoutez cette ligne
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DemandeController extends AbstractController
{
    #[Route('/demande', name: 'app_demande')]
public function index(DemandeRepository $repository, Request $request, PaginatorInterface $paginator): Response
{
    // Récupérer le terme de recherche
    $searchTerm = $request->query->get('search');

    // Récupérer toutes les demande ou filtrer par recherche
    $query = $repository->createQueryBuilder('p')
        ->where('p.nom LIKE :searchTerm OR p.content LIKE :searchTerm')
        ->setParameter('searchTerm', '%' . $searchTerm . '%')
        ->getQuery();

    // Paginer les résultats
    $demande = $paginator->paginate(
        $query, // Requête à paginer
        $request->query->getInt('page', 1), // Numéro de page par défaut
        2 // Nombre d'éléments par page
    );

    // Calculer les variables pour la pagination
    $currentPage = $demande->getCurrentPageNumber();
    $previous = $currentPage > 1 ? $currentPage - 1 : null;
    $next = $currentPage < $demande->getPageCount() ? $currentPage + 1 : null;

    return $this->render('demande/index.html.twig', [
        'demande' => $demande,
        'currentPage' => $currentPage,
        'previous' => $previous,
        'next' => $next,
    ]);
}

#[Route('/demandeAdmin', name: 'app_demandeAdmin')]
public function indexAdmin(DemandeRepository $repository, Request $request, PaginatorInterface $paginator): Response
{
    // Récupérer le terme de recherche
    $searchTerm = $request->query->get('search');

    // Récupérer toutes les demande ou filtrer par recherche
    $query = $repository->createQueryBuilder('p')
        ->where('p.nom LIKE :searchTerm OR p.content LIKE :searchTerm')
        ->setParameter('searchTerm', '%' . $searchTerm . '%')
        ->getQuery();

    // Paginer les résultats
    $demande = $paginator->paginate(
        $query, // Requête à paginer
        $request->query->getInt('page', 1), // Numéro de page par défaut
        2 // Nombre d'éléments par page
    );

    // Calculer les variables pour la pagination
    $currentPage = $demande->getCurrentPageNumber();
    $previous = $currentPage > 1 ? $currentPage - 1 : null;
    $next = $currentPage < $demande->getPageCount() ? $currentPage + 1 : null;

    return $this->render('demande/indexAdmin.html.twig', [
        'demande' => $demande,
        'currentPage' => $currentPage,
        'previous' => $previous,
        'next' => $next,
    ]);
}

#[Route('/add_demande', name: 'add_demande')]
public function add(Request $request, ManagerRegistry $doctrine): Response
{
    $demande = new Demande();
    $form = $this->createForm(DemandeType::class, $demande);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em = $doctrine->getManager();
        $em->persist($demande);
        $em->flush();
        return $this->redirectToRoute('app_demande');
    }

    return $this->render('demande/add.html.twig', [
        'form' => $form->createView(),
    ]);
}

    #[Route('/update_demande/{id}', name: 'update_demande')]
    public function update(DemandeRepository $repository, int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $demande = $repository->find($id);
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_demande');
        }

        return $this->render('demande/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete_demande/{id}', name: 'delete_demande')]
public function delete(DemandeRepository $repository, int $id, ManagerRegistry $doctrine): Response
{
    // Debugging: Check if id is received
    if (!$id) {
        throw new \Exception('id parameter is missing');
    }

    $demande = $repository->find($id);
    if (!$demande) {
        throw $this->createNotFoundException('Demande not found');
    }

    $em = $doctrine->getManager();
    $em->remove($demande);
    $em->flush();

    return $this->redirectToRoute('app_demande');
}
#[Route('/conseiller/{id}', name: 'conseiller')]
public function conseiller(Request $request, ManagerRegistry $doctrine, int $id): Response
{
    $Conseil = new Conseil();
    $form = $this->createForm(ConseilType::class, $Conseil);
    $form->add('Ajouter', SubmitType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $Livraison = $form->getData();
        $em = $doctrine->getManager();
        
        // Associer le livraison au commande correspondant
        $demande = $em->getRepository(Demande::class)->find($id);
        if (!$demande) {
            throw $this->createNotFoundException('Commande non trouvé');
        }

        $Conseil->setDemande($demande);
        $em->persist($Conseil);
        $em->flush();

        // Rediriger vers la page d'affichage des livraisons de ce commande
        return $this->redirectToRoute('app_conseil', ['id' => $id]);
    }

    return $this->render('conseil/add.html.twig', [
        'form' => $form->createView(),
        'commandeId' => $id
    ]);
}
}