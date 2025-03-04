<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_nutrition');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
    #[Route('/edit', name: 'app_register')]
    public function edit(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // Check if the user is authenticated
        if (!$user) {
            throw $this->createAccessDeniedException('You must be logged in to edit your profile.');
        }
        // Create and handle the form
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // Encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            $entityManager->persist($user);
            $entityManager->flush();

            // Do anything else you need here, like send an email

            return $this->redirectToRoute('app_nutrition');
        }
        return $this->render('registration/edit.html.twig', [
            'registrationForm' => $form,]);
        // Create and handle the form
        // $user = new User();
        // $form = $this->createForm(RegistrationFormType::class, $user);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     /** @var string $plainPassword */
        //     $plainPassword = $form->get('plainPassword')->getData();

        //     // encode the plain password
        //     $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

        //     $entityManager->persist($user);
        //     $entityManager->flush();

        //     // do anything else you need here, like send an email

        //     return $this->redirectToRoute('app_nutrition');
        // }

        // return $this->render('registration/edit.html.twig', [
        //     'registrationForm' => $form,
        // ]);
    }
}
