<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Form\CommandeType;
use App\Form\LivraisonType;
use App\Repository\CommandeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Dompdf\Dompdf;
use Dompdf\Options;

class CommandeController extends AbstractController
{



    #[Route('/indexx', name: 'app_indexx')]
    public function indexx(): Response
    {

        return $this->render('client/index.html.twig');
    }
    #[Route('/commande', name: 'app_commande')]
    public function index(): Response
    {
        return $this->render('admin.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
    #[Route('/add_commande', name: 'add_commande')]

    public function Add(Request  $request , ManagerRegistry $doctrine ,SluggerInterface $slugger, SessionInterface $session) : Response {

        $Commande =  new Commande() ;
        $form =  $this->createForm(CommandeType::class,$Commande) ;
        $form->add('Ajouter' , SubmitType::class) ;
        $form->handleRequest($request) ;


         // Les lignes de censure
   


        if($form->isSubmitted()&& $form->isValid()){
            $brochureFile = $form->get('image')->getData();
            //$file =$Commande->getImage();
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
            //$uploads_directory = $this->getParameter('upload_directory');
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
            //$fileName = md5(uniqid()).'.'.$file->guessExtension();
            $brochureFile->move(
                $this->getParameter('upload_directory'),
                $newFilename
            );
            $Commande->setImage(($newFilename));


              // Censure du contenu du livraison
        


            
            $em= $doctrine->getManager() ;
            $em->persist($Commande);
            $em->flush();
            $commandeName = $Commande->getTitre();

        // Créer le message de notification
        $notificationMessage = "L'ajout a été effectué pour cet utilisateur, nom de la commande : $commandeName";

        

            return $this ->redirectToRoute('add_commande') ;
        }
        return $this->render('commande/addcommande.html.twig' , [
            'form' => $form->createView()
        ]) ;
    }

    #[Route('/afficher_commande', name: 'afficher_commande')]
   
public function AfficheCommande(CommandeRepository $repo, PaginatorInterface $paginator, Request $request): Response
{
    $searchTerm = $request->query->get('search');
    $commande = $repo->searchByTypeOrNameOrComment($searchTerm);

    $pagination = $paginator->paginate(
        $commande,
        $request->query->getInt('page', 1),
        2    // items per page
    );

    return $this->render('commande/index.html.twig', [
        'Commande' => $pagination,
        'ajoutA' => $commande
    ]);
}
#[Route('/afficher_commandeAdmin', name: 'afficher_commandeAdmin')]
   
public function AfficheCommandeAdmin(CommandeRepository $repo, PaginatorInterface $paginator, Request $request): Response
{
    $searchTerm = $request->query->get('search');
    $commande = $repo->searchByTypeOrNameOrComment($searchTerm);

    $pagination = $paginator->paginate(
        $commande,
        $request->query->getInt('page', 1),
        2    // items per page
    );

    return $this->render('commande/listB.html.twig', [
        'Commande' => $pagination,
        'ajoutA' => $commande
    ]);
}

    #[Route('/delete_ab/{id}', name: 'delete_ab')]
    public function Delete($id,CommandeRepository $repository , ManagerRegistry $doctrine) : Response {
        $Commande=$repository->find($id) ;
        $em=$doctrine->getManager() ;
        $em->remove($Commande);
        $em->flush();
        return $this->redirectToRoute("afficher_commandeAdmin") ;

    }
    #[Route('/update_ab/{id}', name: 'update_ab')]
    function update(CommandeRepository $repo, $id, Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $Commande = $repo->find($id);
        $form = $this->createForm(CommandeType::class, $Commande);
        $form->add('update', SubmitType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $brochureFile = $form->get('image')->getData();
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
            $brochureFile->move(
                $this->getParameter('upload_directory'),
                $newFilename
            );
            $Commande->setImage($newFilename);
    
            $em = $doctrine->getManager();
            $em->flush();
    
            return $this->redirectToRoute('afficher_commandeAdmin');
        }
    
        return $this->render('commande/updatecommande.html.twig', [
            'form' => $form->createView()
        ]);
    }

  
    
    #[Route('/livrer/{id}', name: 'livrer')]
public function sendMessage(Request $request, ManagerRegistry $doctrine, int $id): Response
{
    $Livraison = new Livraison();
    $form = $this->createForm(LivraisonType::class, $Livraison);
    $form->add('Ajouter', SubmitType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $Livraison = $form->getData();
        $em = $doctrine->getManager();
        
        // Associer le livraison au commande correspondant
        $commande = $em->getRepository(Commande::class)->find($id);
        if (!$commande) {
            throw $this->createNotFoundException('Commande non trouvé');
        }

        $Livraison->setCommande($commande);
        $em->persist($Livraison);
        $em->flush();

        // Rediriger vers la page d'affichage des livraisons de ce commande
        return $this->redirectToRoute('afficher_livraison1', ['id' => $id]);
    }

    return $this->render('livraison/frontadd.html.twig', [
        'form' => $form->createView(),
        'commandeId' => $id
    ]);
}

 

}


?>                                                  