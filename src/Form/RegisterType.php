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
                    'class' => 'form-control',
                    'oninvalid' => "setCustomValidity('Įveskite vartotojo vardą')",
                    'oninput' => "setCustomValidity('')"
                ],
                'label' => 'Vartotojo vardas',
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Slaptažodžiai nesutapo',
                'options' => ['attr' => [
                    'class' => 'form-control',
                    'oninvalid' => "setCustomValidity('Įveskite slaptažodį')",
                    'oninput' => "setCustomValidity('')"
                ]],
                'required' => true,
                'first_options'  => ['label' => 'Slaptažodis'],
                'second_options' => ['label' => 'Pakartokite slaptažodį']
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
