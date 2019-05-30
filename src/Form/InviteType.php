<?php

namespace App\Form;

use App\Entity\Invite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InviteType
 * @package App\Form
 */
class InviteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id', IntegerType::class, ['invalid_message' => 'Neteisingas user ID'])
            ->add('event_id', IntegerType::class, ['invalid_message' => 'Neteisingas event ID'])
            ->add('organisation_id', IntegerType::class, ['invalid_message' => 'Neteisingas organisation ID'])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invite::class,
            'csrf_protection' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return '';
    }
}
