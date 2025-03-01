<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Livraison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivraisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $commande = $options['data']->getCommande();

        $builder
            ->add('dateLivraison', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['class' => 'form-control'],
                'label' => 'Date de Livraison'
            ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    '🕒 En attente' => 'En attente',
                    '🚚 En cours' => 'En cours',
                    '✅ Livré' => 'Livré',
                    '❌ Annulé' => 'Annulé',
                ],
                'attr' => ['class' => 'form-control'],
                'label' => 'Statut de la Livraison'
            ])
            ->add('livreur', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom du Livreur'
            ])
            ->add('livreurPhone', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Téléphone du Livreur'
            ])
            ->add('trackingNumber', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Numéro de Suivi'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livraison::class,
        ]);
    }
}
