<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Intervenant;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('heure',IntegerType::class,[
                'attr' => ['min' => 0]
            ])
            ->add('details',TextareaType::class)
            ->add('intervenant', EntityType::class,[
                'label'=>'Choissisez votre intervenant',
                'required'=>true,
                'class'=> Intervenant::class,
                'multiple'=>false,
                'expanded' =>true
            ])
            ->add('services',EntityType::class,[
                'label'=>'Choissisez votre service',
                'required'=>true,
                'class'=> Service::class,
                'multiple'=>true,
                'expanded' =>true,
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Envoyer'
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
