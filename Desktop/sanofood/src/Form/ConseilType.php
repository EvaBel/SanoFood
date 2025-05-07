<?php
// src/Form/ConseilType.php
namespace App\Form;

use App\Entity\Conseil;
use App\Entity\Demande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConseilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu du conseil',
                'attr' => [
                    'placeholder' => 'Entrez votre conseil ici...',
                ],
            ])
            ->add('dateConseil', DateTimeType::class, [
                'label' => 'Date du conseil',
                'widget' => 'single_text', // Afficher en un seul champ
                'html5' => true, // Utiliser le type HTML5 datetime-local
            ])
            ->add('demande', EntityType::class, [
                'class' => Demande::class,
                'choice_label' => 'nom', // Assurez-vous que 'nom' est un champ de l'entité Demande
                'label' => 'Demande associée',
                'placeholder' => 'Choisissez une demande',
            ])
           ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conseil::class,
        ]);
    }
}