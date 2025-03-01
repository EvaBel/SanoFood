<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twilio\Rest\Client;

#[Route('/commande')]
final class CommandeController extends AbstractController
{
    #[Route(name: 'app_commande_index', methods: ['GET'])]
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }


    #[Route('/catalogue', name: 'app_commande_catalogue', methods: ['GET'])]
    public function catalogue(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/catalogueback.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande();
        $commande->setDateCreation(new \DateTime());
        $commande->setStatus("En attente");

        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commande);
            $entityManager->flush();

            // ✅ Send SMS Notification
            $this->sendCommandeSms($commande);

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }
    #[Route('/commande/pdf/{id}', name: 'app_commande_pdf', methods: ['GET'])]
    public function generatePdf(CommandeRepository $commandeRepository, int $id): Response
    {
        error_log("🔍 Fetching Commande with ID: " . $id); // ✅ Debug Log

        // ✅ Fetch Commande from the database
        $commande = $commandeRepository->find($id);

        if (!$commande) {
            error_log("🚨 Commande introuvable! ID: " . $id);
            throw $this->createNotFoundException('Commande introuvable. ID: ' . $id);
        }

        // ✅ Render the HTML for PDF
        $html = $this->renderView('commande/pdf_template.html.twig', [
            'commande' => $commande,
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
                'Content-Disposition' => 'attachment; filename="commande_'.$id.'.pdf"'
            ]
        );
    }



    /**
     * ✅ Send SMS using Twilio when a new Commande is added
     */
    private function sendCommandeSms(Commande $commande)
    {
        // ✅ Fetch Twilio Credentials from .env
        $sid = $_ENV['TWILIO_ACCOUNT_SID'];
        $token = $_ENV['TWILIO_AUTH_TOKEN'];
        $twilioNumber = $_ENV['TWILIO_PHONE_NUMBER'];

        // ✅ Initialize Twilio Client
        $client = new Client($sid, $token);

        // ✅ Prepare SMS message
        $message = "📦 Nouvelle Commande Confirmée!\n"
            . "🆔 ID: " . $commande->getId() . "\n"
            . "📅 Date: " . $commande->getDateCreation()->format('Y-m-d') . "\n"
            . "📍 Adresse: " . $commande->getDeliveryAddress() . "\n"
            . "☎️ Contact: " . $commande->getPhone() . "\n"
            . "💰 Total: " . $commande->getTotalPrice() . " TND";

        try {
            // ✅ Send SMS
            $client->messages->create(
                '+216981585363', // numrouk eli amlkt bih el compte
                [
                    'from' => $twilioNumber,
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            // ✅ Handle Errors (e.g., Invalid phone number)
            error_log("Twilio SMS Error: " . $e->getMessage());
        }
    }


    #[Route('/{id}', name: 'app_commande_show', methods: ['GET'])]
    public function show(Commande $commande): Response
    {
        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_delete', methods: ['POST'])]
    public function delete(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/commande/search', name: 'app_commande_search', methods: ['GET'])]
    public function search(Request $request, CommandeRepository $commandeRepository): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $searchTerm = $request->query->get('q', '');

        // Fetch commandes based on search term
        $commandes = $commandeRepository->createQueryBuilder('c')
            ->where('c.deliveryAddress LIKE :search OR c.phone LIKE :search OR c.status LIKE :search')
            ->setParameter('search', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();

        // Return JSON response
        return $this->json([
            'success' => true,
            'commandes' => array_map(function ($commande) {
                return [
                    'id' => $commande->getId(),
                    'dateCreation' => $commande->getDateCreation()->format('Y-m-d'),
                    'deliveryAddress' => $commande->getDeliveryAddress(),
                    'phone' => $commande->getPhone(),
                    'totalPrice' => $commande->getTotalPrice(),
                ];
            }, $commandes),
        ]);
    }

    #[Route('/panier/seee', name: 'app_panierr', methods: ['GET'])]
    public function indexpanier(CommandeRepository $commandeRepository): Response
    {
        $commandes = $commandeRepository->findAll(); // Récupérer toutes les commandes

        // Calculer la somme totale
        $totalPrice = 0;
        foreach ($commandes as $commande) {
            $totalPrice += $commande->getTotalPrice();
        }

        return $this->render('commande/panier.html.twig', [
            'commandes' => $commandes,
            'totalPrice' => $totalPrice, // Envoyer la somme totale au template
        ]);
    }


    #[Route('/{id}/deletepanier', name: 'app_commande_deletepanier', methods: ['POST'])]
    public function deletepanier(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_panierr');
    }
    #[Route('/checkout/go', name: 'app_checkoutt', methods: ['GET'])]
    public function checkout(): Response
    {
        return $this->render('commande/checkout.html.twig', []);
    }


}
