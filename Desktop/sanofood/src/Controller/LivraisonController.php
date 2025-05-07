<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use App\Repository\CommandeRepository;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Conseil;
use App\Form\ConseilType;
class LivraisonController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
   public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);
    }
    #[Route('/add_Livraison', name: 'add_Livraison')]

    public function Add(Request  $request , ManagerRegistry $doctrine ) : Response {
        $Livraison =  new Livraison() ;
        $form =  $this->createForm(LivraisonType::class,$Livraison) ;
        $form->add('Ajouter' , SubmitType::class) ;
        $form->handleRequest($request) ;
        if($form->isSubmitted()&& $form->isValid()){
            $Livraison = $form->getData();
            $em= $doctrine->getManager() ;
            $em->persist($Livraison);
            $em->flush();
            return $this ->redirectToRoute('add_Livraison') ;
        }
        return $this->render('livraison/frontadd.html.twig' , [
            'form' => $form->createView()
        ]) ;
    }

    #[Route('/afficher_livraison', name: 'afficher_livraison')]
    public function AfficheLivraison (LivraisonRepository $repo ,PaginatorInterface $paginator ,Request $request     ): Response
    {
        //$repo=$this ->getDoctrine()->getRepository(Livraison::class) ;
        $Livraison=$repo->findAll() ;
        $pagination = $paginator->paginate(
            $Livraison,
            $request->query->getInt('page', 1),
            3 // items per page
        );
        return $this->render('livraison/index.html.twig' , [
            'Livraison' => $pagination ,
            'ajoutA' => $Livraison
        ]) ;
    }

    #[Route('/delete_adh/{id}', name: 'delete_adh')]
    public function Delete($id,LivraisonRepository $repository , ManagerRegistry $doctrine) : Response {
        $Livraison=$repository->find($id) ;
        $em=$doctrine->getManager() ;
        $em->remove($Livraison);
        $em->flush();
        return $this->redirectToRoute("afficher_livraison") ;

    }
    #[Route('/update_adh/{id}', name: 'update_adh')]
    function update(LivraisonRepository $repo,$id,Request $request , ManagerRegistry $doctrine){
        $Livraison = $repo->find($id) ;
        $form=$this->createForm(LivraisonType::class,$Livraison) ;
        $form->add('update' , SubmitType::class) ;
        $form->handleRequest($request) ;
        if($form->isSubmitted()&& $form->isValid()){

            $Livraison = $form->getData();
            $em=$doctrine->getManager() ;
            $em->flush();
            return $this ->redirectToRoute('afficher_livraison') ;
        }
        return $this->render('livraison/update.html.twig' , [
            'form' => $form->createView()
        ]) ;

    }
    #[Route('/afficher_livraison1/{id}', name: 'afficher_livraison1')]
    public function AfficheLivraison1(LivraisonRepository $livraisonRepo, CommandeRepository $commandeRepo, int $id): Response
    {
        // Récupérer le commande complet
        $commande = $commandeRepo->find($id);
    
        // Récupérer les livraisons associés à ce commande en utilisant la propriété "commande"
        $livraisons = $livraisonRepo->findBy(['commande' => $commande]);
    
        return $this->render('livraison/livraisons_par_commande.html.twig', [
            'livraisons' => $livraisons,
            'commande' => $commande // Passer l'objet Commande complet
        ]);
    }

    
 
   
}
