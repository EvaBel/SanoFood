<?php
namespace App\Form;

use App\Entity\Conseil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints as Assert;

class ConseilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu du Conseil',
                'attr' => ['placeholder' => 'Écrivez votre conseil ici...', 'class' => 'form-control'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le contenu ne doit pas être vide.']),
                    new Assert\Length([
                        'max' => 255,
                        'maxMessage' => 'Le contenu ne doit pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('dateConseil', DateTimeType::class, [
                'label' => 'Date du Conseil',
                'widget' => 'single_text',
                'html5' => true,
                'disabled' => true, // ✅ Prevent manual change
                'attr' => ['readonly' => true] // ✅ Disable input
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conseil::class,
        ]);
    }
}
