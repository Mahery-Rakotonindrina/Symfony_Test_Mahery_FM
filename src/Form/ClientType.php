<?php

namespace App\Form;

use App\Entity\Client;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',TextType::class, [
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Choisir un client'
                ])
            ->add('Prenoms',TextType::class, [
                'attr' => ['class' => 'form-control']
                ])
            ->add('Address',TextType::class, [
                'attr' => ['class' => 'form-control']
                ])
            ->add('Telephone',TextType::class, [
                'attr' => ['class' => 'form-control mb-4']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
