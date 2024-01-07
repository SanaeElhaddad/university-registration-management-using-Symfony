<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\EtudiantStep2;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EtudiantStep2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('niveau',ChoiceType::class,[
                'choices' => [
                    '1 ére Année'=>'1 ére Année',
                    '2 éme Année'=>'2 éme Année',
                    '3 éme Année'=>'2 éme Année',
                    '4 éme Année'=>'2 éme Année',

                ],
               
                ])
            ->add('note_math')
            ->add('note_franc')
            ->add('etudiantstep2', EntityType::class, [
                'class' => Etudiant::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtudiantStep2::class,
        ]);
    }
}
