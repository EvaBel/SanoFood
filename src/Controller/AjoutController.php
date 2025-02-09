<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutController extends AbstractController
{
    #[Route('/form', name: 'form_show')]
    public function showForm(): Response
    {
        return $this->render('ajout/index.html.twig');
    }

    #[Route('/form/submit', name: 'form_submit', methods: ['POST'])]
    public function handleSubmit(Request $request): Response
    {
        $data = $request->request->all();

        // Vous pouvez ici enregistrer les données en base ou les traiter
        dump($data); // Affiche les données dans la barre de debug Symfony

        return $this->render('ajout/index.html.twig', [
            'data' => $data
        ]);
    }
}

