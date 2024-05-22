<?php
namespace App\Form;

use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'multiple' => false,
                'attr' => ['class' => 'form-control',
                        'required => true'],
                'placeholder' => 'Veuillez choisir le client',
                'label' => 'Client'
            ])
            ->add('createdAt', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(), 
                'attr' => ['class' => 'form-control'],
                'label' => 'Date du Commande',
                'input' => 'datetime_immutable',
            ])
            ->add('produits', EntityType::class, [
                'class' => Produit::class,
                'multiple' => true,
                'expanded' => false,
                'attr' => ['class' => 'form-control select2'],
                'label' => 'Produits',
                'placeholder' => 'Veuillez choisir les produits que vous voulez acheter'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
