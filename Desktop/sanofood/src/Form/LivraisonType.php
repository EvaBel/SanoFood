<?php

namespace App\Form;

use App\Entity\Commande;


use App\Entity\Livraison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class LivraisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commande', EntityType::class, [
                'class' => Commande::class,
                'choice_label' => 'titre',
            ])
            ->add('adresse')
            ->add('prix', IntegerType::class, [
                'attr' => ['min' => 1, 'max' => 100000000],
                'label' => 'Prix'
            ])
           
            ->add('statut', ChoiceType::class, [
                'choices'  => [
                    'En attente' => 'En attente',
                    'En cours' => 'En cours',
                    'Livré' => 'Livré',
                    'Annulé' => 'Annulé',
                ],
            ])
            ->add('created', DateTimeType::class, [
                'widget' => 'single_text'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livraison::class,
        ]);
    }
}
