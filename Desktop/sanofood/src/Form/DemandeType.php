<?php
// src/Form/DemandeType.php
namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('content')
            ->add('email')

            ->add('specialite')

            ->add('dateInscription', DateType::class, [
                'widget' => 'single_text',
                'disabled' => true, // Rendre le champ en lecture seule
                'attr' => [
                    'readonly' => true, // Empêcher la modification manuelle
                ],
            ])
            
            ->add('Ajouter', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}