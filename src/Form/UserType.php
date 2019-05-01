<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 * @package App\Form
 */
class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-rounded',
                    'oninvalid' => "setCustomValidity('Įveskite vartotojo vardą')",
                    'oninput' => "setCustomValidity('')"
                ],
                'label' => 'Vartotojo vardas:',
                'label_attr' => [
                    'class' => 'label-text',
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'form-control form-rounded',
                    'oninvalid' => "setCustomValidity('Įveskite slaptažodį')",
                    'oninput' => "setCustomValidity('')"
                ],
                'label' => 'Slaptažodis:',
                'label_attr' => [
                    'class' => 'label-text',
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}