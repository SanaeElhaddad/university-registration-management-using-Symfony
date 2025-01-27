<?php

namespace App\Form;
use App\Form\choices;
use App\Entity\Compte;
use App\Entity\Etudiant;
use App\Entity\Filiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('cne')
            ->add('cin')
            ->add('nom')
            ->add('prenom')
            ->add('date_Naissance')
            ->add('telephone')
            ->add('email')
            ->add('genre',ChoiceType::class,[
                'choices' => [
                    'Femme'=>'Femme',
                    'Homme'=>'Homme',

                ],
               
                ])
            ->add('ville')
            ->add('adresse_postale')
            ->add('nationalite')
            ->add('profession_pere')
            ->add('profession_mere')
            ->add('gsm_mere')
            ->add('gsm_pere')
            
            ->add('mot_passe', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
                'invalid_message' => 'Les champs du mot de passe doivent correspondre.',
            ])

            
           
            ->add('filiere', EntityType::class, [
                'class' => Filiere::class,
'choice_label' => 'id',
            ])
             
            ->add('niveau',ChoiceType::class,[
                'choices' => [
                    ''=>'',
                    '1 ére Année'=>'1er',
                    '2 éme Année'=>'2eme',
                    '3 éme Année'=>'3eme',
                    '4 éme Année'=>'4eme',
                ],
               
                ])
            ->add('note_math')
            ->add('note_franc')
            
        
        ->add('note_6eme')
        ->add('note_bac')
        ->add('Attestation_reussite', FileType::class, [
            'label' => 'Attestation de Réussite ',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
        ])
        ->add('carte_nationale', FileType::class, [
            'label' => 'carte_nationale',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
        ])
        ->add('Attestation_reussite1', FileType::class, [
            'label' => 'Attestation de Réussite 1',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
            
        ])
        ->add('Attestation_reussite2', FileType::class, [
            'label' => 'Attestation de Réussite 2',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
        ])
        ->add('Attestation_reussite4', FileType::class, [
            'label' => 'Attestation de Réussite 4',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
        ])
        ->add('licence', FileType::class, [
            'label' => 'licence',
            'required' => false, // Set to true if the file is mandatory
            'attr' => ['class' => 'form-control'],
        ])
        
       
        
        ;
        

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
