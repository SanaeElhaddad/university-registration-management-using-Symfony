<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\EtudiantStep3;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantStep3Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note_6eme')
            ->add('note_bac')
            ->add('Attestation_reussite')
            ->add('carte_nationale')
            ->add('E_step3', EntityType::class, [
                'class' => Etudiant::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtudiantStep3::class,
        ]);
    }
}
