<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Livraison;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('deliveryAddress')
            ->add('phone')
            ->add('paymentMethod', ChoiceType::class, [
                'choices' => [
                    'Carte' => 'Carte',
                    'Espèces' => 'Espèces',
                    'Paypal' => 'Paypal',
                ],
                'label' => 'Méthode de Paiement'
            ])            ->add('totalPrice')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email', // Display email instead of ID for better UX
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
