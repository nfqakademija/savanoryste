<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegisterType
 * @package App\Form
 */
class RegisterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'col-md-12 form-control form-rounded',
                    'oninvalid' => "setCustomValidity('Įveskite vartotojo vardą')",
                    'oninput' => "setCustomValidity('')"
                ],
                'label' => 'Vartotojo vardas',
                'label_attr' => [
                    'class' => 'col-md-12 label-text',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Slaptažodžiai nesutapo',
                'options' => ['attr' => [
                    'class' => 'col-md-12 form-control form-rounded',
                    'oninvalid' => "setCustomValidity('Įveskite slaptažodį')",
                    'oninput' => "setCustomValidity('')"
                ]],
                'required' => true,
                'first_options'  => ['label' => 'Slaptažodis',
                    'label_attr' => [
                        'class' => 'col-md-12 label-text',
                        ],
                    ],
                'second_options' => ['label' => 'Pakartokite slaptažodį',
                    'label_attr' => [
                        'class' => 'col-md-12 label-text',
                        ],
                    ]
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
