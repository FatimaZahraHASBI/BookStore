<?php

namespace App\Form;

use App\Entity\Auteur;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_prenom', null, [
                'label' => 'Nom et prénom',
                'attr' => ['class' => 'form-control my-3']
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Féminin' => 'F',
                    'Masculin' => 'M',
                ],
                'attr' => ['class' => 'form-control my-3']
            ])
            ->add('date_de_naissance', DateTime::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control my-3']
            ])
            ->add('nationalite', null, [
                'attr' => ['class' => 'form-control my-3']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}
