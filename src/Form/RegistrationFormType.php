<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
       
        ->add('email',EmailType::class,[
            'attr' => [
                'placeholder' => 'Email',
                'class' => 'form-input'
            ],
        ])
        ->add('nom',TextType::class,[
            'attr' => [
                'placeholder' => 'Nom',
                'class' => 'form-input'
            ],
        ])
        ->add('prenom',TextType::class,[
            'attr' => [
                'placeholder' => 'Prenom',
                'class' => 'form-input'
            ],
        ])
        ->add('adresse',TextType::class,[
            'attr' => [
                'placeholder' => 'Adress',
                'class' => 'form-input'
            ],
        ])
            // ->add('agreeTerms', CheckboxType::class, [
            //     'mapped' => false,
            //     'constraints' => [
            //         new IsTrue([
            //             'message' => 'You should agree to our terms.',
            //         ]),
            //     ],
            // ])
            ->add('password',RepeatedType::class,[
                'type'=> PasswordType::class,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identique',
                'required'=> true,
                'first_options'=>[
                    'label' => false,
                    'attr'=>[
                        'class'=>'form-input',
                        'placeholder' => 'mot de passe'

                    ]
                ],
                
                'second_options' =>[
                    'label' => false, 
                    'attr'=>[
                        'class'=>'form-input',
                        'placeholder' => 'Confirmez votre mot de passe'

                    ]
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
