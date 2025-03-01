<?php
// src/Controller/DemandeController.php
namespace App\Controller;
use App\Repository\ConseilRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
    public function indexAdmin(DemandeRepository $repository, Request $request): Response
    {
        // Récupérer le terme de recherche
        $searchTerm = $request->query->get('search');

        // Récupérer toutes les demandes ou filtrer par recherche
        $demandes = $repository->createQueryBuilder('p')
            ->where('p.nom LIKE :searchTerm OR p.content LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();

        return $this->render('demande/indexAdmin.html.twig', [
            'demande' => $demandes,
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

    return $this->redirectToRoute('app_demandeAdmin');
}
//#[Route('/conseiller/{id}', name: 'conseiller')]
//public function conseiller(Request $request, ManagerRegistry $doctrine, int $id): Response
//{
//    $Conseil = new Conseil();
//    $form = $this->createForm(ConseilType::class, $Conseil);
//    $form->add('Ajouter', SubmitType::class);
//    $form->handleRequest($request);
//
//    if ($form->isSubmitted() && $form->isValid()) {
//        $Livraison = $form->getData();
//        $em = $doctrine->getManager();
//
//        // Associer le livraison au commande correspondant
//        $demande = $em->getRepository(Demande::class)->find($id);
//        if (!$demande) {
//            throw $this->createNotFoundException('Commande non trouvé');
//        }
//
//        $Conseil->setDemande($demande);
//        $em->persist($Conseil);
//        $em->flush();
//
//        // Rediriger vers la page d'affichage des livraisons de ce commande
//        return $this->redirectToRoute('app_conseil', ['id' => $id]);
//    }
//
//    return $this->render('conseil/add.html.twig', [
//        'form' => $form->createView(),
//        'commandeId' => $id
//    ]);
//}


    #[Route('/demande/{id}/conseils', name: 'app_conseil')]
    public function viewConseils(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $demande = $em->getRepository(Demande::class)->find($id);

        if (!$demande) {
            throw $this->createNotFoundException('Demande introuvable.');
        }

        // Retrieve conseils related to this demande
        $conseils = $demande->getConseils();

        return $this->render('demande/view_conseil_list_by_demand.html.twig', [
            'demande' => $demande,
            'conseils' => $conseils
        ]);
    }


    #[Route('/demande/{id<\d+>}/ajouter-conseil', name: 'ajouter_conseilbydemande')]
    public function ajouterConseil(int|string $id, Request $request, ManagerRegistry $doctrine, MailerInterface $mailer): Response
    {
        $id = (int) $id; // 🔥 Convert to integer if needed

        $em = $doctrine->getManager();
        $demande = $em->getRepository(Demande::class)->find($id);

        if (!$demande) {
            throw $this->createNotFoundException('❌ Erreur: Demande introuvable.');
        }

        $conseil = new Conseil();
        $conseil->setDemande($demande);
        $conseil->setDateConseil(new \DateTime());

        $form = $this->createForm(ConseilType::class, $conseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($conseil);
            $em->flush();

            // ✅ Send Email Notification
            $email = (new Email())
                ->from('hassanjebri99@gmail.com')  // ✅ Your Email
                ->to('hassanjebri123@gmail.com')  // ✅ Receiver's Email
                ->subject('🆕 Nouveau Conseil Ajouté')
                ->html("
                <h2>📢 Nouveau Conseil Ajouté</h2>
                <p><strong>📌 Contenu :</strong> {$conseil->getContenu()}</p>
                <p><strong>📅 Date :</strong> " . date('Y-m-d H:i:s') . "</p>
                <p>Merci !</p>
            ");

            try {
                $mailer->send($email);
                $this->addFlash('success', '✔ Conseil ajouté et email envoyé avec succès !');
            } catch (\Exception $e) {
                $this->addFlash('danger', '❌ Échec de l\'envoi de l\'email: ' . $e->getMessage());
                error_log("❌ Twilio Mail Error: " . $e->getMessage()); // Log error
            }

            $this->addFlash('success', '✔ Conseil ajouté avec succès et email envoyé !');

            return $this->redirectToRoute('app_conseil', ['id' => $id]);
        }

        return $this->render('conseil/addconseilbyid_demande.html.twig', [
            'form' => $form->createView(),
            'demande' => $demande
        ]);
    }



    #[Route('/demande/search', name: 'app_demande_search', methods: ['GET'])]
    public function search(Request $request, DemandeRepository $repository): Response
    {
        $searchTerm = $request->query->get('search', '');

        $query = $repository->createQueryBuilder('d')
            ->where('d.nom LIKE :searchTerm OR d.content LIKE :searchTerm OR d.specialite LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();

        return $this->json([
            'demandes' => array_map(fn($demande) => [
                'id' => $demande->getId(),
                'nom' => $demande->getNom(),
                'content' => $demande->getContent(),
                'email' => $demande->getEmail(),
                'specialite' => $demande->getSpecialite(),
                'dateInscription' => $demande->getDateInscription()->format('d-m-Y')
            ], $query)
        ]);
    }

    #[Route('/demande/stats', name: 'app_demande_stats', methods: ['GET'])]
    public function stats(ConseilRepository $conseilRepository): Response
    {
        $stats = $conseilRepository->getDemandeConseilStats();
        $ratio = $conseilRepository->getDemandeRatio();
        $timeline = $conseilRepository->getConseilTimeline();

        return $this->render('demande/demande_stats.html.twig', [
            'stats' => $stats,
            'ratio' => $ratio,
            'timeline' => $timeline
        ]);
    }


    #[Route('/demandeAdmin/pdf/{id}', name: 'app_demandeAdmin_pdf', methods: ['GET'])]
    public function generatePdf(DemandeRepository $repository, int $id): Response
    {
        error_log("🔍 Fetching Demande with ID: " . $id); // ✅ Debug Log

        // ✅ Fetch Demande from the database
        $demande = $repository->find($id);

        if (!$demande) {
            error_log("🚨 Demande introuvable! ID: " . $id);
            throw $this->createNotFoundException('Demande introuvable. ID: ' . $id);
        }

        // ✅ Render the HTML for PDF
        $html = $this->renderView('demande/pdf_template.html.twig', [
            'demande' => $demande,
        ]);

        // ✅ Configure Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // ✅ Initialize Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // ✅ Return PDF as a Downloadable Response
        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="demande_'.$id.'.pdf"'
            ]
        );
    }


}