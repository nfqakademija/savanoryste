<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class LoginType
 * @package App\Form
 */
class LoginType extends AbstractType
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection'       => true,
            'csrf_field_name'       => '_token',
            'csrf_token_id'         => 'login_auth'
        ]);
    }
}
