<?php
// src/Controller/ConseilController.php
namespace App\Controller;

use App\Entity\Conseil;
use App\Form\ConseilType;
use App\Repository\ConseilRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;






class ConseilController extends AbstractController
{
    #[Route('/conseil', name: 'app_conseil')]
    public function index(ConseilRepository $repository): Response
    {
        $conseils = $repository->findAll();
        return $this->render('conseil/index.html.twig', [
            'conseils' => $conseils,
        ]);
    }

    #[Route('/add_conseil', name: 'add_conseil')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $conseil = new Conseil();
        $form = $this->createForm(ConseilType::class, $conseil);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder le conseil
            $entityManager = $doctrine->getManager();
            $entityManager->persist($conseil);
            $entityManager->flush();

            return $this->redirectToRoute('app_conseil');
        }

        return $this->render('conseil/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/update_conseil/{idC}', name: 'update_conseil')]
    public function update(ConseilRepository $repository, int $idC, Request $request, ManagerRegistry $doctrine): Response
    {
        $conseil = $repository->find($idC);
        $form = $this->createForm(ConseilType::class, $conseil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_conseil');
        }

        return $this->render('conseil/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete_conseil/{idC}', name: 'delete_conseil')]
    public function delete(ConseilRepository $repository, int $idC, ManagerRegistry $doctrine): Response
    {
        $conseil = $repository->find($idC);
        $em = $doctrine->getManager();
        $em->remove($conseil);
        $em->flush();
        return $this->redirectToRoute('app_conseil');
    }
}