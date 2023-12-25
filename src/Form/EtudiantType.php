<?php

namespace App\Form;
use App\Form\choices;
use App\Entity\Compte;
use App\Entity\Etudiant;
use App\Entity\Filiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
